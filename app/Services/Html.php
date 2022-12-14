<?php

declare(strict_types=1);

namespace App\Services;

use DOMDocument;
use DOMElement;
use DOMXPath;
use Illuminate\Support\Collection;

class Html
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

        return $news;
    }

    public function parseDom($data)
    {
        $dom = $this->loadDOM($data);
        $domx = new DOMXPath($dom);
        $entries = $domx->evaluate("//p");
        $arr = array();
        foreach ($entries as $entry) {
            $arr[] = $entry->ownerDocument->saveHtml($entry);
        }

        return collect($arr);
    }

    public function loadDOM($data)
    {
        $dom = new DOMDocument();
        $dom->loadHTML($data);

        return $dom;
    }

    // public function loadDOMElement($elmData): DOMElement
    // {
    //     $elm = new DOMElement();
    //     $elm->loadHtml($elmData);

    //     return $elm;
    // }

    public function checkChildElement($elm): string
    {
        $dom = $this->loadDOM($elm);

        if(count($dom->childNodes) > 0) {
            dd($dom->firstChild);
        }
        return '';
    }

    public function transformElement(Collection $elm): array
    {
        $elm->transform(function($item, $key) {
            // $itemChildType = $this->checkChildElement($item);
            return [
                'type' => '',
                'chars' => strlen(strip_tags($item)),
                'words' => str_word_count(strip_tags($item)),
                'santences' => 0,
                'content' => $item
            ];
        });

        return $elm->all();
    }
}
