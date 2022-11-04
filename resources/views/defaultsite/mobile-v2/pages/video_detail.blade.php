@extends('defaultsite.mobile.layouts.ui-main')

{{-- @push('preload')
<link rel="ampHtml" href="{{config('site.attributes.object.ampUrl')??null}}"/>
<link rel="preload" as="image" href="{{ Src::imgNewsCdn($row, '375x208', 'webp') }}" />
{!! RecaptchaV3::initJs() !!}
@endpush --}}

{{-- @push('styles')
<link rel="preload" href="{{ Src::mix('css/detail.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ Src::mix('css/detail.css') }}" /></noscript>

@endpush --}}

@if( config('app.enabled_tracking') )
    @push('script')
    <script>
        var url = '{{ str_replace('api', 'analytics', config('app.api_url')) }}/jsview2/';
        var xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('{!! http_build_query(['url'=>Src::detail($row??null), 'platform'=>config('site.device')=='mobile'?'m':'www']) !!}');
    </script>
    @endpush
@endif

@section('content')

<ul class="main-breadcrumb" style="margin:20px;">
    <li class="main-breadcrumb-item"><a href="/">Home</a></li>
    @foreach ($row['news_category'] as $r)
        @if ($loop->iteration==1)
            <li class="main-breadcrumb-item {{$loop->count==1?'active':''}}"><a href="{{ url(( $row['news_category'][0]['url']??'' )) }}">{{$r['name']??null}}</a></li>
        @elseif($loop->iteration==2)
            <li class="main-breadcrumb-item {{$loop->count==2?'active':''}}"><a href="{{ url(( $row['news_category'][0]['url']??'' ).'/'.( $row['news_category'][1]['url']??'' )) }}">{{$r['name']??null}}</a></li>
        @elseif($loop->iteration==3)
            <li class="main-breadcrumb-item {{$loop->count==3?'active':''}}"><a href="{{ url(( $row['news_category'][0]['url']??'' ).'/'.( $row['news_category'][1]['url']??'' ).'/'.( $row['news_category'][2]['url']??'' )) }}">{{$r['name']??null}}</a></li>
        @endif
    @endforeach
</ul>

<div>
    <div class="header-photo">
        <h3 class="photo-t">{{ $row['news_title'] ?? null }}</h3>
        <p class="photo-author pt-2">By <a style="color: #CA0000 ;"  href="{{ Src::author($row) }}">{{$row['news_editor'][0]['name']??null}}</a> {{ Util::date($row['news_date_publish'] ?? null, 'long_time') }}</p>
    </div> 
        <figure class="">
        <style>
                        iframe {
                            aspect-ratio: 16 / 9;
                            width: 100%;
                            height: auto;
                        }

                        .item-vidio-inner{
                            position: relative;
                            height: auto;
                            width: 100%;
                        }
                    </style>
                <div class="item-vidio-inner">
                    {!! htmlspecialchars_decode($row['news_video']['video']??null)!!}
                </div>
        </figure>
        <h2 class="dt-title text-24 font-bold mb-6">{{$row['news_sub_title']??null}}</h2>
</div>

@include( 'defaultsite.mobile.components-ui.dt-share')

<div class="main-news-container">
    <div class="dt-paragraph">
        @php
            function DOMinnerHTML(DOMNode $element){
                $innerHTML = "";
                $children  = $element->childNodes;

                foreach ($children as $child){
                    $innerHTML .= $element->ownerDocument->saveHTML($child);
                }
                return $innerHTML;
            }

            function getEmbedYtb($str){
                $embedYtb=[];
                if(preg_match('/\/embed\/(.*?)"/', $str, $code) == 1) {
                    $embedYtb['code']=$code[1]??null;
                }
                if(preg_match('/height="(.*?)"/', $str, $height) == 1) {
                    $embedYtb['height']=$height[1]??9;
                }
                if(preg_match('/width="(.*?)"/', $str, $width) == 1) {
                    $embedYtb['width']=$width[1]??16;
                }
                return '<amp-youtube 
                            width="'.($embedYtb['width']).'"
                            height="'.($embedYtb['height']).'"
                            layout="responsive"
                            data-videoid="'.$embedYtb['code'].'">
                        </amp-youtube>';
            }

            function getEmbedTik($str){
                $embedTik=[];
                if(preg_match('/data-video-id="(.*?)"/', $str, $code) == 1) {
                    $embedTik['code']=$code[1]??null;
                }
                return $embedTik['code'];
            }

            function getEmbedIg($str){
                $embedIg=[];
                if(preg_match('/\/p\/(.*?)\//', $str, $code) == 1) {
                    $embedIg['code']=$code[1]??null;
                }
                return $embedIg['code'];
            }

            $doc = new DOMDocument();
            // set error level
            $internalErrors = libxml_use_internal_errors(true);
            $doc->loadHTML(htmlspecialchars_decode($row['news_content']??null));
            // Restore error level
            libxml_use_internal_errors($internalErrors);
            if( $doc )
            {
                //change tag br to tag p
                if ($doc->getElementsByTagName('br')[1]!=null) {
                    libxml_use_internal_errors(true);
                    $doc->loadHTML(preg_replace('#(?:<br\s*/?>\s*?){2,}#', '</p><p>', $doc->saveHTML()));
                    libxml_clear_errors();
                }
                //embed ig and tiktok (blockquote)
                if ($doc->getElementsByTagName('blockquote')[0]!=null) {
                    $blockquote = $doc->getElementsByTagName('blockquote');
                    for ($i = 0; $i <= $blockquote->length - 1; $i) {
                        $tag=$blockquote[$i]->ownerDocument->saveHtml($blockquote[$i]);
                        $old = $blockquote->item($i);

                        if (strstr($tag,'instagram.com')) {
                            $new = $doc->createElement("p");
                            $old->parentNode->replaceChild($new, $old);
                            $link = $doc->createElement("amp-instagram");
                            $link->setAttribute('data-shortcode', getEmbedIg($tag));
                            $link->setAttribute('data-captioned',true);
                            $link->setAttribute('width', 1);
                            $link->setAttribute('height', 1);
                            $link->setAttribute('layout', 'responsive');
                            $new->appendChild($link);
                        } elseif(strstr($tag,'tiktok.com')){
                            $new = $doc->createElement("p");
                            $old->parentNode->replaceChild($new, $old);
                            $link = $doc->createElement("amp-tiktok");
                            $link->setAttribute('data-src', getEmbedTik($tag));
                            // $link->setAttribute('width', 1);
                            $link->setAttribute('height', 1);
                            $new->appendChild($link);
                        } else{
                            $i++;
                        }
                    }
                    // dd($doc->saveHtml());

                }
                //add ads
                if( $doc->getElementsByTagName('p')[0]!=null )
                {
                    //get 2 paragraf before add ads
                    $lis = $doc->getElementsByTagName('p');
                    $counter = 0;
                    
                    for ($i = 0; $i <= $lis->length - 1; $i++) {
                        $p=DOMinnerHTML($lis[$i]);
                        if($p){
                            if (strstr($p,'/iframe>')) {
                                if (strstr($p,'youtube.com')) {
                                    echo getEmbedYtb($p);
                                } else {
                                    echo '<p>'.str_replace("iframe", "amp-iframe",$p).'<p>';
                                }
                            } else {
                                echo '<p>'.$p.'<p>';
                            }
                        $counter++;
                        if ($counter==2) 
                        {
                            $exposer1 = str_replace("script", "scr+ipt", str_replace('+', '',Util::getAds("exposer-1")));
                            echo '<div class="channel-ad channel-ad_ad-exposer">'.$exposer1.'</div>';
                        }
                        }; 
                    }
                }
            }
        @endphp
    </div>
</div>


@include('defaultsite.mobile.components-ui.related-tag', ['title' => 'RELATED TAGS'])

{{-- report --}}
<div style="margin:0px 20px 30px;">
    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-light report-btn"><i
        class="fa-solid fa-triangle-exclamation" style="color: #ca0000; margin-right: 10px;"></i>REPORT NEWS</button>
        <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    {{-- FORM REPORT --}}
                    @include('defaultsite.mobile.components-ui.form-report')
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection