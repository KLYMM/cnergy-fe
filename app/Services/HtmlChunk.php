<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Services\Template;
use DOMDocument;
use DOMXPath;
use DOMElement;

class HtmlChunk
{
    private $content;
    private $bg_color_order;
    private $bg_color_opt;
    private $fs_opt;
    private $allowedEl;
    private $max_char = 700;

    function __construct($rawContent)
    {
        $this->content = ($rawContent) ? $rawContent : false;

        $this->bg_color_order = -1;

        //allowed main element to be checked on chunk process
        $this->allowedEl = ['p', 'ol', 'ul', 'img', 'figure'];

        //adjust this according to each site provided UI Style
        $this->bg_color_opt = [
            'bg-light-0', 'bg-light-1', 'bg-light-2', 'bg-light-3', 'bg-light-4'
        ];

        $this->fs_opt = [
            'vh-text-xs' => ['min' => 501, 'max' => 10000],
            'vh-text-sm' => ['min' => 401, 'max' => 500],
            'vh-text-md' => ['min' => 301, 'max' => 400],
            'vh-text-lg' => ['min' => 171, 'max' => 300],
            'vh-text-xl' => ['min' => 61, 'max' => 170],
            'vh-text-2xl' => ['min' => 1, 'max' => 60],
        ];

        session()->put('last_text_template_key', 0);
        session()->put('last_image_template_key', 0);
    }

    public function parseNews($row)
    {
        $news = collect();

        $news = $news->merge($this->parseDom($this->replace_fig_with_p($row['news_content'])));

        if (isset($row['news_paging']) && count($row['news_paging']) > 0) {
            foreach ($row['news_paging'] as $np) {
                $news = $news->merge($this->parseDom($this->replace_fig_with_p(html_entity_decode($np['content']))));
            }
        }
        //print_r($news);
        $news = $this->transformElement($news);

        return $news;
    }

    private function replace_fig_with_p($text)
    {
        return str_replace("figure", "p", $text);
    }

    private function parseDom($data)
    {
        $dom = $this->loadDOM($data);
        $domx = new DOMXPath($dom);
        //$entries = $domx->evaluate("//p");
        $entries = $domx->evaluate("*/*");
        $arr = array();
        foreach ($entries as $entry) {
            //print_r($entry);
            if (in_array($entry->nodeName, $this->allowedEl)) {
                $arr[] = $entry;
            }
        }

        return $arr;
    }

    private function loadDOM($data, $opt = 0)
    {
        $dom = new DOMDocument();
        $dom->loadHTML($data, $opt);

        return $dom;
    }

    private function transformElement(Collection $elm): array
    {
        $elm->transform(function ($item, $key) {
            //print_r($item);

            $type = $this->get_type_basedOnNodes($item->childNodes);

            $return = [
                'type' => $type,
                'chars' => ($type == 'img') ? 0 : strlen($item->textContent),
                'words' => ($type == 'img') ? 0 : str_word_count(strip_tags($this->elmToHtml($item))),
                'content' => ($type == 'img') ? null : strip_tags($this->elmToHtml($item)),
                'rawContent' => $this->elmToHtml($item),
                'attributes' => $this->get_attributes($item),
                /*'santences' => [
                    'count' => count($this->getSentences(strip_tags($this->elmToHtml($item)))),
                    'items' => $this->getSentences(strip_tags($this->elmToHtml($item)))
                ],*/
            ];

            //check current text if it is part of image caption
            if (
                $return['type'] == 'text' &&
                count($return['attributes']) > 0 &&
                isset($return['attributes']['class']) &&
                $return['attributes']['class'] == 'content-image-caption'
            ) {
                $return['type'] = 'img-caption';
            }

            //skip no value on paragraph
            if ($return['chars'] > 5 || $return['type'] == 'img') {
                return $return;
            }
        });

        //Add template information
        return $this->suit_up_templates($elm->filter()->all());
    }

    private function suit_up_templates(array $rows): array
    {
        $data = [];
        $skip_next = 0;
        $curr_char = 0;
        $next_index = 0;
        //print_r(array_values($rows));
        $rows = array_values($rows);
        $p = 0;
        foreach ($rows as $index => $row) {
            //check if need to skip this itteration
            if ($skip_next > 0) {
                $skip_next--;
                $curr_char = 0;
                continue;
            }

            $templ_conf = [];
            //setup background color theme order
            $this->bg_color_order = ($this->bg_color_order >= 3) ? 0 : ($this->bg_color_order + 1);
            $templ_conf['bg_theme'] = $this->bg_color_opt[$this->bg_color_order];

            switch ($row['type']) {
                case 'img':
                    $template_name = $this->getTemplate($row['type'], $p);

                    //CASE : -- if next row is part of image caption
                    if (isset($rows[$index + 1]) && $rows[$index + 1]['type'] == 'img-caption') {
                        //combine next row data of image caption into this row
                        $row['attributes']['caption'] = $rows[$index + 1];
                        //skip for next itteration
                        $skip_next++;
                    }

                    break;
                case 'text':
                    $template_name = $this->getTemplate($row['type']);

                    //CASE : -- if current text still not reaching max total char per screen
                    if ($row['chars'] < $this->max_char) {
                        $curr_char = $row['chars'];
                        $next_index = $skip_next = 0;
                        while ($curr_char < $this->max_char) {
                            $next_index = $index + $skip_next + 1;
                            if (
                                isset($rows[$next_index]) &&
                                $rows[$next_index]['type'] == 'text' &&
                                ($row['chars'] + $rows[$next_index]['chars']) < $this->max_char
                            ) {
                                //combine with next row data (as long it also text)
                                $row['content'] .= ' ' . $rows[$next_index]['content'];
                                $row['rawContent'] .= $rows[$next_index]['rawContent'];
                                $row['chars'] = $curr_char = strlen($row['content']);
                                $row['words'] = str_word_count(strip_tags($row['content']));
                                $skip_next++;
                            } else {
                                //reset counter
                                $curr_char = $this->max_char + 1;
                            }
                        }
                    }
                    break;
                default:
            }

            //CASE : -- setup font size based on the length of text
            $templ_conf['fontSize_class'] = $this->get_fontSize($row['chars']);

            $row['template'] = $templ_conf;
            $row['template']['name'] = $template_name;
            $data[] = $row;
        }

        return $data;
    }

    private function get_fontSize($charLength = 0)
    {
        $fs_class = '';
        foreach ($this->fs_opt as $index => $range) {
            if ($charLength >= $range['min'] && $charLength <= $range['max']) $fs_class = $index;
        }

        return $fs_class;
    }

    /**
     * check the element inside <p> to decide the type of it
     */
    private function get_type_basedOnNodes($elm)
    {
        $type = 'text';

        for ($i = 0; $i < $elm->length; ++$i) {
            //print_r($elm->item($i));
            if ($elm->item($i)->nodeName == 'img') $type = 'img';
            if ($elm->item($i)->nodeName == 'ul' || $elm->item($i)->nodeName == 'ol') $type = 'list';
        }

        return $type;
    }

    /**
     * Check and populate all attributes on the element
     */
    private function get_attributes(DOMElement $dom): array
    {
        $attr = [];

        $elm = $dom->firstChild->nodeName == 'img' ? $dom->firstChild : $dom;

        for ($i = 0; $i < $elm->attributes->length; ++$i) {
            $name = $elm->attributes->item($i)->name;
            $attr[$name] = $elm->attributes->item($i)->value;
        }

        return $attr;
    }

    /**
     * save the element in the complete raw format
     */
    private function elmToHtml(DOMElement $dom): string
    {
        return $dom->ownerDocument->saveHtml($dom);
    }

    /**
     * itterate all the santences of paragraph
     */
    private function getSentences($data)
    {
        $sentence = explode('.', $data);

        $sentence_array = [];
        foreach ($sentence as $s) {
            if ($s != '') {
                $sentence_array[] = trim($s);
            }
        }

        return $sentence_array;
    }

    public function getTemplate(string $type)
    {
        $template = config('trstdly.templates');

        switch ($type) {
            case 'img':
                $img_template = $template['image'];

                // if((session('last_image_template_key') + 1) >= count($img_template)) session()->put('last_image_template_key', 0);

                $template_output = $img_template[session('last_image_template_key')];

                session()->increment('last_image_template_key');

                if ((session('last_image_template_key') + 1) > count($img_template)) {
                    session()->put('last_image_template_key', 0);
                }

                return $template_output;

                break;

            case 'text':
                $text_template = $template['text'];

                if ((session('last_text_template_key') + 1) > count($text_template)) {
                    session()->put('last_text_template_key', 0);
                }

                $template_output = $text_template[session('last_text_template_key')];

                session()->increment('last_text_template_key');

                return $template_output;

                break;


            case 'text-heading':
                $text_template = $template['text-heading'];

                // if((session('last_text_template_key') + 1) >= count($text_template)) {
                //     session()->put('last_text_template_key', 0);
                // }

                $template_output = $text_template[0];

                // session()->increment('last_text_template_key');

                // if ((session('last_text_template_key') + 1) > count($text_template)) {
                //     session()->put('last_text_template_key', 0);
                // }

                return $template_output;

                break;


            default:
        }
    }
}
