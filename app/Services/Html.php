<?php

namespace App\Services;

use DOMDocument;

class Html
{
    public function parseDom($data)
    {
        $html = new DOMDocument();
        $html->loadHTML(mb_convert_encoding($data,'HTML-ENTITIES', 'UTF-8'));
        $paragraph = $html->getElementsByTagName('p');
        $paragraph = collect($paragraph);

        return $paragraph;
    }
}
