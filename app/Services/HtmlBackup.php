<?php

namespace App\Services;

use DOMDocument;
use DOMXPath;
use DOMElement;
use Illuminate\Support\Collection;

class HtmlBackup
{

    private $content;
    private $bg_color_order;
    private $bg_color_opt;
    private $fs_opt;
    protected $last_image_template_key;
    protected $last_text_template_key;

    function __construct($rawContent)
    {
        $this->content = ($rawContent) ? $rawContent : false;

        $this->bg_color_order = -1;

        $this->bg_color_opt = [
            'bg-light-0', 'bg-light-1', 'bg-light-2', 'bg-light-3'
        ];

        $this->fs_opt = [
            'vh-text-xs' => [
                'min' => 601, 'max' => 1000
            ],
            'vh-text-sm' => [
                'min' => 351, 'max' => 600
            ],
            'vh-text-md' => [
                'min' => 201, 'max' => 350
            ],
            'vh-text-lg' => [
                'min' => 101, 'max' => 200
            ],
            'vh-text-xl' => [
                'min' => 1, 'max' => 100
            ],
        ];

        $this->last_text_template_key = session()->put('last_text_template_key', 0);
        $this->last_image_template_key = session()->put('last_image_template_key', 0);
    }

    public function parseNews($row)
    {
        $news = collect();

        $news = $news->merge($this->parseDom($row['news_content']));

        if (count($row['news_paging']) > 0) {
            foreach ($row['news_paging'] as $np) {
                $news = $news->merge($this->parseDom(html_entity_decode($np['content'])));
            }
        }

        $news = $this->transformElement($news);

        return $news;
    }

    public function parseDom($data)
    {
        $dom = $this->loadDOM($data);
        $domx = new DOMXPath($dom);
        $entries = $domx->evaluate("//p");
        $arr = array();
        foreach ($entries as $entry) {
            $arr[] = $entry; // $entry->ownerDocument->saveHtml($entry);
        }

        return collect($arr);
    }

    public function loadDOM($data, $opt = 0)
    {
        $dom = new DOMDocument();
        $dom->loadHTML($data, $opt);

        return $dom;
    }

    public function transformElement(Collection $elm): array
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
                'sentences' => [
                    'count' => count($this->getSentences(strip_tags($this->elmToHtml($item)))),
                    'items' => $this->getSentences(strip_tags($this->elmToHtml($item)))
                ],
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
        $skip_next = false;

        foreach ($rows as $index => $row) {
            //check if need to skip this itteration
            if ($skip_next) {
                $skip_next = false;
                continue;
            }

            $templ_conf = [];
            $template_name = '';
            //setup background color theme order
            $this->bg_color_order = ($this->bg_color_order >= 3) ? 0 : ($this->bg_color_order + 1);
            $templ_conf['bg_theme'] = $this->bg_color_opt[$this->bg_color_order];

            switch ($row['type']) {
                case 'img':
                    $template_name = $this->getTemplate($row['type']);

                    //CASE : -- if next row is part of image caption
                    if (isset($rows[$index + 1]['type']) && $rows[$index + 1]['type'] == 'img-caption') {
                        //combine next row data of image caption into this row
                        $row['attributes']['caption'] = $rows[$index + 1];
                        //skip for next itteration
                        $skip_next = true;
                    }

                    break;
                case 'text':
                    $template_name = $this->getTemplate($row['type']);

                    //CASE : -- if current text is really short
                    if ($row['chars'] <= 60) {
                        //combine with next row data (as long it also text)
                        if (isset($rows[$index + 1]) && $rows[$index + 1]['type'] == 'text') {
                            $row['attributes']['subcontent'] = $rows[$index + 1];

                            //populate template configuration for subcontent
                            $row['attributes']['subcontent']['template'] = [
                                'bg_theme' => $templ_conf['bg_theme'],
                                'fontSize_class' => $this->get_fontSize($row['attributes']['subcontent']['chars'])
                            ];

                            //change the type to heading
                            $row['type'] = 'text-heading';
                            $template_name = $this->getTemplate($row['type']);

                            //skip for next itteration
                            $skip_next = true;
                        }
                    }
                    break;

                default:
            }

            //CASE : -- setup font size based on the length of text
            $templ_conf['fontSize_class'] = $this->get_fontSize($row['chars']);

            // dump($template_name);
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
}
