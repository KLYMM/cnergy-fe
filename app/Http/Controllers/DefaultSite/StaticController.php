<?php

namespace App\Http\Controllers\DefaultSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Html;

use Site, Data, Util, Str;

class StaticController extends Controller
{
    // static
    function static($slug)
    {
        $row=Data::staticPage($slug);

        config()->set('site.attributes.meta', [
            "title"=>$row['title']??null,
            "article_title"=>$row['title']??null,
            "site_description"=>config('site.attributes.site_description')??null,
            "article_short_desc"=>config('site.attributes.site_description')??null,
            "article_keyword"=>null,
            "article_url"=>config('site.attributes.reldomain.domain_url')??null,
            "article_last_update"=>config('site.attributes.updated_at')??null,
            "article_url_image"=> config('site.attributes.site_logo')??null,
            "type"=>'static'
        ]);

        //kly object
        config()->set('site.attributes.object', [
            "pageType"=>'Staticpage',
            "category"=>[
                'name'=> config('site.attributes.title'),
            ],
        ]);

        return Site::view('pages.static',compact('row'));
    }
}
