<?php

declare(strict_types=1);

namespace App\Services;

use DOMDocument;
use DOMElement;
use DOMXPath;
use Illuminate\Support\Collection;

class HtmlBackup
{
    public function parseNews($row)
    {
        $news = collect();

        $news = $news->merge($this->parseDom($row['news_content']));

        if(count($row['news_paging']) > 0) {
            foreach($row['news_paging'] as $np) {
                $news = $news->merge($this->parseDom(html_entity_decode($np['content'])));
            }
        }

        $news = $this->transformElement($news);

        dd($news);
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

    public function loadDOM($data, $opt=0)
    {
        $dom = new DOMDocument();
        $dom->loadHTML($data, $opt);

        return $dom;
    }

    public function transformElement(Collection $elm): array
    {
        $elm->transform(function($item, $key) {
            return [
                'type' => $this->checkChildElement($item),
                'chars' => strlen(strip_tags($this->elmToHtml($item))),
                'words' => str_word_count(strip_tags($this->elmToHtml($item))),
                'santences' => [
                    'count' => count($this->getSentences(strip_tags($this->elmToHtml($item)))),
                    'items' => $this->getSentences(strip_tags($this->elmToHtml($item)))
                ],
                'templateName' => $this->getTemplate($this->checkChildElement($item)),
                'content' => $this->elmToHtml($item),
                // 'rawContent' => $this->elmToHtml($item)
            ];
        });

        return $elm->all();
    }

    public function elmToHtml(DOMElement $dom): string
    {
        return $dom->ownerDocument->saveHtml($dom);
    }

    public function getChildElement($dom)
    {
        return $dom->firstChild;
    }

    public function checkChildElement($dom)
    {
        return $dom->firstChild->nodeName;
    }

    public function getTemplate($type)
    {
        $template = config('trstdly.templates');

        switch ($type) {
            case 'img':
                return collect($template['image'])->random();

                break;

            default:
                return collect($template['text'])->random();

                break;
        }

        return $template;
    }

    public function getSentences($data)
    {
        $sentence = explode('.', $data);

        $sentence_array = [];
        foreach($sentence as $s) {
            if($s != '') {
                $sentence_array[] = trim($s);
            }
        }

        return $sentence_array;
    }
}
