@extends('defaultsite/mobile/amp/layouts/main')

@push('preload')
<script id="rich-card" type="application/ld+json">
    {!!$datarich!!}
</script>
@if (strstr(htmlspecialchars_decode($row['news_video']['video'] ?? null),'youtube.com'))
    <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
@elseif (strstr(htmlspecialchars_decode($row['news_content']??null),'youtube.com'))
    <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
@endif
@if (strstr(htmlspecialchars_decode($row['news_content']??null),'blockquote>'))
    @if (strstr(htmlspecialchars_decode($row['news_content']??null),'.instagram.com'))
        <script async custom-element="amp-instagram" src="https://cdn.ampproject.org/v0/amp-instagram-0.1.js"></script>
    @endif
    @if(strstr(htmlspecialchars_decode($row['news_content']??null),'.tiktok.com'))
        <script async custom-element="amp-tiktok" src="https://cdn.ampproject.org/v0/amp-tiktok-0.1.js"></script>
    @endif
@endif
@endpush

@section('content')

    <!--main.body-->
    <ul class="main-breadcrumb flex items-center flex-wrap list-none m-4">
        <li class="main-breadcrumb-item"><a href="/">Home</a></li>
        @foreach ($row['news_category'] as $r)
            @if ($loop->iteration==1)
                <li class="main-breadcrumb-item {{$loop->count==1?'active':''}}"><a href="{{ Src::category($row) }}">{{$r['name']??null}}</a></li>
            @elseif($loop->iteration==2)
                <li class="main-breadcrumb-item {{$loop->count==2?'active':''}}"><a href="{{ url(( $row['news_category'][0]['url']??'' ).'/'.( $row['news_category'][1]['url']??'' )) }}">{{$r['name']??null}}</a></li>
            @elseif($loop->iteration==3)
                <li class="main-breadcrumb-item {{$loop->count==3?'active':''}}"><a href="{{ url(( $row['news_category'][0]['url']??'' ).'/'.( $row['news_category'][1]['url']??'' ).'/'.( $row['news_category'][2]['url']??'' )) }}">{{$r['name']??null}}</a></li>
            @endif
        @endforeach
    </ul>
    <div class="channel-ad channel-ad_ad-headline">
        {!! Util::getAds('headline-1') !!}
    </div>
    <div class="main-body px-4">
        <div class="main-article">
            <article class="dt">
                <div class="dt-pages">
                    <div class="dt-pages-item">
                        <div class="dt-header">
                            <h1 class="dt-title text-24 font-black mb-1">{{ $row['news_title'] ?? null }}</h1>
                            <div class="dt-info mb-4">
                                <span class="dt-info-detail text-12">Oleh <a class="dt-info-link" href="#">{{ $row['news_editor'][0]['name'] ?? null }}</a> pada {{ Util::date($row['news_date_publish'] ?? null, 'long_time') }}</span>
                            </div>
                        </div>
                        <div class="dt-body">
                            <div class="dt-body-pages">
                                <div id="pages-intro" class="dt-body-pages-item">
                                    <div class="dt-image mb-6">
                                        <figure class="item -mx-4">
                                            <div class="item-vidio rounded-lg">
                                                <div class="item-vidio-inner">
                                                    {{-- {!! htmlspecialchars_decode($row['news_video']['video'] ?? null) !!} --}}
                                                    {{-- <script src="//static-web-prod-vidio.akamaized.net/assets/javascripts/vidio-embed.js"></script> --}}
                                                    @php
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
                                                        $ori_vid=htmlspecialchars_decode($row['news_video']['video'] ?? null);
                                                        if (strstr($ori_vid,'/iframe>')) {
                                                            if (strstr($ori_vid,'youtube.com')) {
                                                                echo getEmbedYtb($ori_vid);
                                                            } else {
                                                                echo str_replace("iframe", "amp-iframe",$ori_vid);
                                                            }
                                                        } else {
                                                            echo $ori_vid;
                                                        }
                                                    @endphp
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                    <div class="dt-share">
                                        <div class="share flex flex-wrap items-center mb-4">
                                            <div class="share-item share-item--fb"><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=facebook&utm_campaign=Share_Bottom') }}" target="_blank"><i class="icon icons--share icon--share-fb"></i></a></div>
                                            <div class="share-item share-item--wa"><a href="https://wa.me/?text={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=whatsapp&utm_campaign=Share_Bottom') }}" target="_blank"><i class="icon icons--share icon--share-wa"></i></a></div>
                                            <div class="share-item share-item--tweet"><a href="https://twitter.com/intent/tweet?u={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=twitter&utm_campaign=Share_Bottom') }}" target="_blank"><i class="icon icons--share icon--share-tweet"></i></a></div>
                                        </div>
                                    </div>
                                    <div class="dt-paragraph">
                                        @php
                                            function DOMinnerHTML(DOMNode $element)
                                            {
                                                $innerHTML = "";
                                                $children  = $element->childNodes;
            
                                                foreach ($children as $child)
                                                {
                                                    $innerHTML .= $element->ownerDocument->saveHTML($child);
                                                }
            
                                                return $innerHTML;
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
                                                if ($doc->getElementsByTagName('br')[0]!=null) {
                                                    $doc->loadHTML(preg_replace('#(?:<br\s*/?>\s*?){2,}#', '</p><p>', $doc->saveHTML()));
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
                                @if (($row['has_paging'] ?? null) == 1)
                                    @include('defaultsite/mobile/amp/components/pagination2', [
                                        'current_page' => $row['current_page'],
                                        'last_page' => $row['last_page'],
                                        'slug' => $row['slug'],
                                    ])
                                @endif
                                @if ($row['news_tag'] ?? null)
                                    <div class="dt-box dt-box--tag">
                                        <h2 class="text-16 font-bold mb-4">Tag Terkait</h2>
                                        <ul class="section--trending-bredcrumb list-none flex items-center flex-wrap flex-1">
                                            @foreach ($row['news_tag'] as $r)
                                                <li class="section--trending-bredcrumb-item"><a href="{{ Src::detailTag($r) }}">{{ $r['tag_name'] ?? null }}</a></li>
                                                {{-- @if ($loop->index == 3)
                                                <li class="section--trending-bredcrumb-item" id="more_tag" x-show="!open" @click="open = ! open"><span>More Tag</span></li>
                                            @endif --}}
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            {!! Util::getAds('widget') !!}
                            <div class="dt-foot pt-6">
                                <div class="tabs -mx-4">
                                    <div class="tabs-btn w-full flex">
                                        <button class="tabs-btn-item p-3 flex-1 active" [class]="tabs1  ? 'tabs-btn-item p-3 flex-1 active' : 'tabs-btn-item p-3 flex-1'" on="tap:AMP.setState({tabs1: true, tabs2: false})">
                                            <span>Rekomendasi</span>
                                        </button>
                                        <button class="tabs-btn-item p-3 flex-1" [class]="tabs2  ? 'tabs-btn-item p-3 flex-1 active' : 'tabs-btn-item p-3 flex-1'" on="tap:AMP.setState({tabs2: true, tabs1: false})">
                                            <span>Kredit</span>
                                            {{-- <span class="tabs-btn-item-info">1</span> --}}
                                        </button>
                                    </div>
                                    <div class="tabs-content w-full px-4">
                                        <div class="tabs-content-item pt-4 show" [class]="tabs1  ? 'tabs-content-item pt-4 show' : 'tabs-content-item pt-4'">
                                            @include('defaultsite/mobile/amp/components/latestbig', ['news' => \Data::recommendation($row), 'page' => 'readpage', 'data' => 'recommendation'])
                                        </div>
                                        <div class="tabs-content-item pt-4" [class]="tabs2  ? 'tabs-content-item pt-4 show' : 'tabs-content-item pt-4'">
                                            <div class="dt-user flex items-center pb-4">
                                                <a class="dt-user-image rounded-full" href="#">
                                                    <amp-img class="aspect-square rounded-full" src="{{$row['news_editor'][0]['image'] ??'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4AgJCiccVLvelQAABVVJREFUeNrtnG1v0zwUhm87WdqsCUm00nWgMgZMQrSbxJ/nZ6xSpexTAakbhdFutDSN17yZD6jTxsN49mKnHviW8jknl2/7HMcnIaenpxxadxbVCDTAlcpUKRhCyJXrsjjnVy4N8BdxzvHt2zdMJhPMZjMwxpBl2c8gTRO2bcN1Xfi+D9/3/wN4ZYO+qiRiGAYYYxiPxzg9PcV0OkWe5zdyoGEY8DwPGxsbqNfrsG0beZ7/OwA553j//j1OTk7uPR0JIdjc3MTLly9X4srSAY7HY3z48AHn5+egVEwOK4oC1WoVL168QL1e/zsBGoaBMAwxHo+l3qder6Pdbpc2pUsBmGUZer0eoigS5ro/udFxHOzv78M05edI6XUg5xy9Xg9xHEuHBwCUUsRxjF6vV0q5I/2Jut0u5vN56Yv7fD5Ht9t92AD7/T7m8/lqsiMhmM/n6Pf7Dw8gIQRRFGE4HK604CWEYDgcIooiaXFIAVgUBcIwLGXNu8maGIYhiqJ4GAAJIRgMBkiSRJn9apIkGAwGUlwoHGCaphiNRsrsVZeDOhqNkKap+gAZY2CMQTXJiksoQEopjo+PoaqOj4+Fr8vCHTgej5WavpensYxtJBUZ4GQykZbtRFUHk8lE6AALdeBsNlPSfZcHeTabqevAVe06VhmjUAcuFgvlAS4WC3WTyPIMQ2WJjpGKHmHVJTpGoQDX1taUByg6RqEAK5WKUme2v4pzjkqloiZAzjlqtZryAEXHKNSBrusqD9B1XXUd6Hme8mWM53nqOpBzjo2NDSVdKCs24QCbzaayAGXEJhyg4ziwLEs5gJZlwXEctQEuA63VasoBrNVqUgZWOEBKKba2tpSaxpxzbG1tSTnkojKCbTQaqFarSkDknKNaraLRaEiJh8oK+vXr18oAlBmLNICO4yAIgpUDDIJASvKQCnBZtG5vb6/0FX9RFNje3pZa3FPZo99qtVYCsSgKtFot6bNAKsA8z/H8+fOVTOUgCLCzsyO90VJ68wohBLu7uzAMozR4hmFgd3e3lHuV0v2zvr6Ovb290hos9/b2sL6+/vcAXLbddjodqRAppeh0OnAcp7R1t9T+M9/30W63YVmW0LKCcw7LstBut+H7fqlrbWkACSHgnCMIAnQ6HaH7Usuy0Ol0EAQBOOelvpOU0qW//NIoSRIwxnB+fo7v378jiiJEUYQ0TYV30GdZhrW1NTiOA8dx8OjRI1SrVdi2feF4GcW0UICUUhRFga9fv+LLly9gjCHPcxRFUaozlveilMIwDNi2jWaziUajcRGjEgCXQBaLBeI4xufPnzEaja64UJW3MUv3PX78GM1mE7Va7eKE7j7OvDNA0zQxmUxwdHSE2Wx20TKh+uH6ElalUoHrumi1WvB9/84dC7cGWBQFGGPo9/uYTqdKNJLft8TyPA+vXr2Cbdu3fp4bAzRNEycnJ/j06ROm0+mDcNttXel5Hp4+fYrNzc0bO/JGAJMkweHhofL9f6Jguq6LN2/e3KjUuhYgIQRZlmEwGGA4HKIoir8e3mWIlFI8efIEz549g2ma1yaa3wJcNiL2er0H0bImU6ZpYn9//9qWkN8CPDo6wsePHx98ghCZaHZ2dtBqtf4MkHOObreLOI41tWveKr19+/bKUkaXU5YxhoODAw3vD4rjGAcHB2CMXUAkZ2dnfDqdIgxDZFn2zySK+yQY0zTRbrfheR5oFEUIw/DilyNa/799zfMcYRj+/Iz23bt3PEkSDe8OTrQsCzRNUw3vjk5M01T/fOy+0gA1QA1QA9QAtTRADVAD1AC1NEANUAPUALU0QA1QA/x39AMzx8A5MRN2GAAAAABJRU5ErkJggg=='}}" width="34" height="34"></amp-img>
                                                </a>
                                                <div class="dt-user-desc flex flex-col ml-3">
                                                    <a class="dt-user-desc-link font-bold" href="#">{{ $row['news_editor'][0]['name'] ?? null }}</a>
                                                    <span class="dt-user-desc-role text-12 text-gray">Author</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </article>
            @include('defaultsite/mobile/amp/components/trendingtag')
            <div class="channel-ad channel-ad_ad-headline">
                {!! Util::getAds('headline-2') !!}
            </div>
            <div class="section section--index">
                <h2 class="section-title text-16 mb-4">BERITA TERBARU</h2>
                @include('defaultsite/mobile/amp/components/latestbig', ['news' => $row['latest'], 'page' => 'readpage', 'data' => 'latest'])
            </div>
            <div class="channel-ad channel-ad_ad-sc-2">
                {!! Util::getAds('showcase-2') !!}
            </div>
        </div>
    </div>
@endsection
