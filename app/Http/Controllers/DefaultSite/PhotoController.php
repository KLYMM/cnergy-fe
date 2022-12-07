<?php

namespace App\Http\Controllers\DefaultSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Html;

use Site, Data, Util, Str;

class PhotoController extends Controller
{
     //list photo
     function photo()
     {
         $headline = Data::headline(
             path: 'photonews',
             alltype: 0,
             limit: 4,
         )??[];
         $feed = collect($headline)->slice(1,3);
         $popular= Data::popular(news_type: 'photonews',limit: 8)??[];
         $recommendation=Data::recommendation(path: 'photonews',limit: 8)??[];
         $latest = Data::latest(
             path: 'photonews',
             alltype: 0,
             ex_id: Util::getNewsExId(array_merge($headline,$popular,$recommendation)),
             limit: 32
          );
 
 
         return Site::view('pages.photo', compact('headline', 'feed','latest','recommendation','popular'));
     }
}
