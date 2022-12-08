<?php

namespace App\Services;

use DOMDocument;
use DOMXPath;

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

    public function checkElement($elm)
    {
        return $this->loadDOM($elm);
    }
}
