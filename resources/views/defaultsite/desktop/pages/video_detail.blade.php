@extends('defaultsite.desktop.layouts.main')

@section('content')
@push('preload')
    {!! RecaptchaV3::initJs() !!}
@endpush
@push('styles')
<link rel="preload" href="{{ Src::mix('css/detail.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ Src::mix('css/detail.css') }}" /></noscript>
<style>
    iframe {
        max-width: 100%;
        margin: auto;
    }
    .instagram-media-rendered{
        margin: 5px auto!important;
    }
</style>
@endpush

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

<main class="main py-8 pb-16" role="main">
    <div class="container w-kly px-8">

        <ul class="main-breadcrumb flex items-center flex-wrap list-none mb-6">
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

        <div class="main-body flex items-start justify-between">
            <div class="main-article">
                <div class="dt">
                    <div class="dt-pages">
                        <div class="dt-pages-item">
                            <div class="dt-header">
                                <h1 class="dt-title text-30 font-bold mb-6">{{$row['news_title']??null}}</h1>
                                <div class="dt-info flex items-center justify-between mb-6">
                                    <div class="dt-info-item">
                                        <div class="dt-info-user text-12 flex items-center justify-between">
                                            <a class="dt-info-user-image rounded-full" href="#">
                                                <img class="aspect-square" src="{{$row['news_editor'][0]['image'] ??'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4AgJCiccVLvelQAABVVJREFUeNrtnG1v0zwUhm87WdqsCUm00nWgMgZMQrSbxJ/nZ6xSpexTAakbhdFutDSN17yZD6jTxsN49mKnHviW8jknl2/7HMcnIaenpxxadxbVCDTAlcpUKRhCyJXrsjjnVy4N8BdxzvHt2zdMJhPMZjMwxpBl2c8gTRO2bcN1Xfi+D9/3/wN4ZYO+qiRiGAYYYxiPxzg9PcV0OkWe5zdyoGEY8DwPGxsbqNfrsG0beZ7/OwA553j//j1OTk7uPR0JIdjc3MTLly9X4srSAY7HY3z48AHn5+egVEwOK4oC1WoVL168QL1e/zsBGoaBMAwxHo+l3qder6Pdbpc2pUsBmGUZer0eoigS5ro/udFxHOzv78M05edI6XUg5xy9Xg9xHEuHBwCUUsRxjF6vV0q5I/2Jut0u5vN56Yv7fD5Ht9t92AD7/T7m8/lqsiMhmM/n6Pf7Dw8gIQRRFGE4HK604CWEYDgcIooiaXFIAVgUBcIwLGXNu8maGIYhiqJ4GAAJIRgMBkiSRJn9apIkGAwGUlwoHGCaphiNRsrsVZeDOhqNkKap+gAZY2CMQTXJiksoQEopjo+PoaqOj4+Fr8vCHTgej5WavpensYxtJBUZ4GQykZbtRFUHk8lE6AALdeBsNlPSfZcHeTabqevAVe06VhmjUAcuFgvlAS4WC3WTyPIMQ2WJjpGKHmHVJTpGoQDX1taUByg6RqEAK5WKUme2v4pzjkqloiZAzjlqtZryAEXHKNSBrusqD9B1XXUd6Hme8mWM53nqOpBzjo2NDSVdKCs24QCbzaayAGXEJhyg4ziwLEs5gJZlwXEctQEuA63VasoBrNVqUgZWOEBKKba2tpSaxpxzbG1tSTnkojKCbTQaqFarSkDknKNaraLRaEiJh8oK+vXr18oAlBmLNICO4yAIgpUDDIJASvKQCnBZtG5vb6/0FX9RFNje3pZa3FPZo99qtVYCsSgKtFot6bNAKsA8z/H8+fOVTOUgCLCzsyO90VJ68wohBLu7uzAMozR4hmFgd3e3lHuV0v2zvr6Ovb290hos9/b2sL6+/vcAXLbddjodqRAppeh0OnAcp7R1t9T+M9/30W63YVmW0LKCcw7LstBut+H7fqlrbWkACSHgnCMIAnQ6HaH7Usuy0Ol0EAQBOOelvpOU0qW//NIoSRIwxnB+fo7v378jiiJEUYQ0TYV30GdZhrW1NTiOA8dx8OjRI1SrVdi2feF4GcW0UICUUhRFga9fv+LLly9gjCHPcxRFUaozlveilMIwDNi2jWaziUajcRGjEgCXQBaLBeI4xufPnzEaja64UJW3MUv3PX78GM1mE7Va7eKE7j7OvDNA0zQxmUxwdHSE2Wx20TKh+uH6ElalUoHrumi1WvB9/84dC7cGWBQFGGPo9/uYTqdKNJLft8TyPA+vXr2Cbdu3fp4bAzRNEycnJ/j06ROm0+mDcNttXel5Hp4+fYrNzc0bO/JGAJMkweHhofL9f6Jguq6LN2/e3KjUuhYgIQRZlmEwGGA4HKIoir8e3mWIlFI8efIEz549g2ma1yaa3wJcNiL2er0H0bImU6ZpYn9//9qWkN8CPDo6wsePHx98ghCZaHZ2dtBqtf4MkHOObreLOI41tWveKr19+/bKUkaXU5YxhoODAw3vD4rjGAcHB2CMXUAkZ2dnfDqdIgxDZFn2zySK+yQY0zTRbrfheR5oFEUIw/DilyNa/799zfMcYRj+/Iz23bt3PEkSDe8OTrQsCzRNUw3vjk5M01T/fOy+0gA1QA1QA9QAtTRADVAD1AC1NEANUAPUALU0QA1QA/x39AMzx8A5MRN2GAAAAABJRU5ErkJggg=='}}" width="40" height="40" alt="user">
                                            </a>
                                            <div class="dt-info-user-desc">
                                                <a class="dt-info-user-desc-link" href="{{ Src::author($row) }}">{{$row['news_editor'][0]['name']??null}}</a>
                                                <span class="dt-info-user-desc-time">{{Util::date($row['news_date_publish']??null,'long_time')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dt-info-item">
                                        <div class="share flex flex-wrap items-center">
                                            <div class="share-item share-item--fb"><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current() .'?utm_source=Desktop&utm_medium=facebook&utm_campaign=Share_Top' )}}" target="_blank"><i class="icon icons--share icon--share-fb"></i></a></div>
                                            <div class="share-item share-item--tweet"><a href="https://twitter.com/intent/tweet?text={{ urlencode(url()->current() .'?utm_source=Desktop&utm_medium=twitter&utm_campaign=Share_Top' )}}" target="_blank"><i class="icon icons--share icon--share-tweet"></i></a></div>
                                            {{-- <div class="share-item share-item--wa"><a href="https://wa.me/?text={{ urlencode(url()->current()) .'?utm_source=Desktop&utm_medium=whatsapp&utm_campaign=Share_Top' }}" target="_blank"><i class="icon icons--share icon--share-wa"></i></a></div> --}}
                                            {{-- <div class="share-item share-item--gplus"><a href="#"><i class="icon icons--share icon--share-gplus"></i></a></div>
                                            <div class="share-item share-item--mail"><a href="#"><i class="icon icons--share icon--share-mail"></i></a></div>
                                            <div class="share-item share-item--count">
                                                <span class="share-item--count-label text-12">Share</span> 
                                                <p class="share-item--count-value text-18 font-semibold">13</p>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dt-body">
                                <div class="dt-body-pages">
                                    <div id="pages-intro" class="dt-body-pages-item">
                                        <div class="dt-image mb-6">
                                            <figure class="item">
                                                <div class="item-vidio rounded-lg">
                                                    <div class="item-vidio-inner">
                                                        {!! htmlspecialchars_decode($row['news_video']['video']??null)!!}
                                                        {{-- <script src="//static-web-prod-vidio.akamaized.net/assets/javascripts/vidio-embed.js"></script> --}}
                                                    </div>
                                                </div>
                                            </figure>
                                        </div>
                                        
                                        <h2 class="dt-title text-24 font-bold mb-6">{{$row['news_sub_title']??null}}</h2>
                                        <div class="dt-paragraph">
                                            
                                            {!! str_replace([
                                                    'mce-mce-mce-mce-no/type', 'mce-no/type'
                                                ], '', 
                                                htmlspecialchars_decode($row['news_content']??null)) !!}

                                            @push('script')
                                                <script>
                                                    if( document.getElementsByClassName('dt-paragraph') )
                                                    {
                                                        //change tag br to tag p
                                                        if (document.getElementsByClassName('dt-paragraph')[0].getElementsByTagName('br')[0]!=null) {
                                                            document.getElementsByClassName('dt-paragraph')[0].innerHTML=document.getElementsByClassName('dt-paragraph')[0].innerHTML.replace(/<br>\\*/g,'</p><p>')
                                                        }
                                                        //add ads
                                                        if( document.getElementsByClassName('dt-paragraph')[0].getElementsByTagName('p')[0]!=null )
                                                        {
                                                            //get 2 paragraf before add ads
                                                            var lis = document.getElementsByClassName('dt-paragraph')[0].getElementsByTagName('p')
                                                            var counter = 0

                                                            for (var i = 0; i < lis.length - 1; i++) {
                                                                if (lis[i].innerHTML !== "") {
                                                                    counter++
                                                                    if (counter==2) {
                                                                        document.getElementsByClassName('dt-paragraph')[0].getElementsByTagName('p')[i].insertAdjacentHTML('afterend','<div class="channel-ad channel-ad_ad-exposer">  {!! Util::getAds('exposer') !!} </div>');
                                                                        break
                                                                    }
                                                                } 
                                                            }
                                                        }
                                                    }
                                                </script>
                                            @endpush
                                            {{-- <p>Otosia.com Belum lama ini beredar sebuah foto yang diduga sebagai wujud Yamaha Nmax facelift. Tentu hal ini menggegerkan media sosial, terlebih para pecinta sepeda motor.</p>
                                            <p>Foto tersebut diunggah oleh pemilik akun Facebook bernama <a href="#">Yachya Doank</a>. Pada gambar itu tampak Yamaha Nmax facelift sedang melakoni uji jalan di jalur Indramayu-Cirebon, Jawa Barat.</p>
                                            <div class="dt-box dt-box--crosslink p-4">
                                                <h1 class="dt-box-title text-16 font-bold mb-4">BACA JUGA:</h1>
                                                <ul class="dt-box--crosslink-list text-12 font-bold flex flex-wrap list-none -mx-2">
                                                    <li class="dt-box--crosslink-list-item w-1/3 px-2"><a href="#">Honda BeAT Sudah Kekinian, Yamaha: Mio Tergantung Konsumen</a></li>
                                                    <li class="dt-box--crosslink-list-item w-1/3 px-2"><a href="#">Sepeda Motor Yamaha TMax 20th Anniversary</a></li>
                                                    <li class="dt-box--crosslink-list-item w-1/3 px-2"><a href="#">Yamaha Luncurkan XMax dan Aerox Edisi MAXI Signature</a></li>
                                                </ul>
                                            </div>
                                            <p>Terlihat jelas bagian belakang Yamaha Nmax facelift dibekali lampu belakang baru. Secara detail tampak beberapa baris LED.</p> --}}
                                        </div>
                                    </div>
                                    {{-- <div id="pages-1" class="dt-body-pages-item">
                                        <h2 class="dt-title text-24 font-bold mb-6">Eksterior Mobil Daihatsu Rocky</h2>
                                        <div class="dt-image mb-6">
                                            <figure class="item">
                                                <span class="item-img aspect-[16/9] rounded-lg"><img class="lazyload" data-src="https://via.placeholder.com/640x358" width="640" height="358" alt="image"></span>
                                                <figcaption class="item-desc pt-2">
                                                    <p class="item-desc-copyright text-12 text-gray">Spyshot Yamaha Nmax facelift (Facebook.com/ Yachya Doank)</p>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="dt-paragraph">
                                            <p>Otosia.com Belum lama ini beredar sebuah foto yang diduga sebagai wujud Yamaha Nmax facelift. Tentu hal ini menggegerkan media sosial, terlebih para pecinta sepeda motor.</p>
                                            <p>Foto tersebut diunggah oleh pemilik akun Facebook bernama <a href="#">Yachya Doank</a>. Pada gambar itu tampak Yamaha Nmax facelift sedang melakoni uji jalan di jalur Indramayu-Cirebon, Jawa Barat.</p>
                                            <div class="dt-box dt-box--crosslink p-4">
                                                <h1 class="dt-box-title text-16 font-bold mb-4">BACA JUGA:</h1>
                                                <ul class="dt-box--crosslink-list text-12 font-bold flex flex-wrap list-none -mx-2">
                                                    <li class="dt-box--crosslink-list-item w-1/3 px-2"><a href="#">Honda BeAT Sudah Kekinian, Yamaha: Mio Tergantung Konsumen</a></li>
                                                    <li class="dt-box--crosslink-list-item w-1/3 px-2"><a href="#">Sepeda Motor Yamaha TMax 20th Anniversary</a></li>
                                                    <li class="dt-box--crosslink-list-item w-1/3 px-2"><a href="#">Yamaha Luncurkan XMax dan Aerox Edisi MAXI Signature</a></li>
                                                </ul>
                                            </div>
                                            <p>Terlihat jelas bagian belakang Yamaha Nmax facelift dibekali lampu belakang baru. Secara detail tampak beberapa baris LED.</p>
                                        </div>
                                    </div> --}}
                                </div>
                                @if (($row['has_paging']??null)==1)
                                    @include( 'defaultsite.desktop.components.pagination2',[
                                        'current_page'=> $row['current_page'],
                                        'last_page'=> $row['last_page'],
                                        'slug'=> $row['slug']
                                    ])
                                @endif

                                {{-- <!--box.pagination-->
                                <div class="dt-box dt-box--pagination">
                                    <div class="flex items-center">
                                        <span class="font-bold mr-4">HALAMAN</span>
                                        <ul class="paginationlist list-none flex items-center flex-1">
                                            <li class="paginationlist-item active"><a href="#">1</a></li>
                                            <li class="paginationlist-item"><a href="#">2</a></li>
                                            <li class="paginationlist-item"><a href="#">3</a></li>
                                        </ul>
                                    </div>
                                </div> --}}
                                @if ($row['news_tag']??null)
                                    <div class="dt-box dt-box--tag">
                                        <ul class="section--trending-bredcrumb text-12 font-bold list-none flex items-center flex-wrap flex-1">
                                            @foreach ($row['news_tag'] as $r)
                                                {{-- @if ()
                                                    <li class="section--trending-bredcrumb-item"><a href="{{Src::detailTag($r)}}"><i class="icon icon--sm icon--checklist mr-1"></i> {{$r['tag_name']??null}}</a></li>
                                                @else --}}
                                                    <li class="section--trending-bredcrumb-item"><a href="{{Src::detailTag($r)}}">{{$r['tag_name']??null}}</a></li>
                                                {{-- @endif --}}
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="dt-box dt-box--info">
                                    <div class="dt-info flex items-center justify-between mb-6">
                                        <div class="dt-info-item">
                                            <h1 class="dt-info-title font-bold mb-2">Credits</h1>
                                            <div class="dt-info-user text-12 flex items-center justify-between">
                                                <a class="dt-info-user-image rounded-full" href="{{ Src::author($row) }}">
                                                    <img class="aspect-square" src="{{$row['news_editor'][0]['image'] ??'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4AgJCiccVLvelQAABVVJREFUeNrtnG1v0zwUhm87WdqsCUm00nWgMgZMQrSbxJ/nZ6xSpexTAakbhdFutDSN17yZD6jTxsN49mKnHviW8jknl2/7HMcnIaenpxxadxbVCDTAlcpUKRhCyJXrsjjnVy4N8BdxzvHt2zdMJhPMZjMwxpBl2c8gTRO2bcN1Xfi+D9/3/wN4ZYO+qiRiGAYYYxiPxzg9PcV0OkWe5zdyoGEY8DwPGxsbqNfrsG0beZ7/OwA553j//j1OTk7uPR0JIdjc3MTLly9X4srSAY7HY3z48AHn5+egVEwOK4oC1WoVL168QL1e/zsBGoaBMAwxHo+l3qder6Pdbpc2pUsBmGUZer0eoigS5ro/udFxHOzv78M05edI6XUg5xy9Xg9xHEuHBwCUUsRxjF6vV0q5I/2Jut0u5vN56Yv7fD5Ht9t92AD7/T7m8/lqsiMhmM/n6Pf7Dw8gIQRRFGE4HK604CWEYDgcIooiaXFIAVgUBcIwLGXNu8maGIYhiqJ4GAAJIRgMBkiSRJn9apIkGAwGUlwoHGCaphiNRsrsVZeDOhqNkKap+gAZY2CMQTXJiksoQEopjo+PoaqOj4+Fr8vCHTgej5WavpensYxtJBUZ4GQykZbtRFUHk8lE6AALdeBsNlPSfZcHeTabqevAVe06VhmjUAcuFgvlAS4WC3WTyPIMQ2WJjpGKHmHVJTpGoQDX1taUByg6RqEAK5WKUme2v4pzjkqloiZAzjlqtZryAEXHKNSBrusqD9B1XXUd6Hme8mWM53nqOpBzjo2NDSVdKCs24QCbzaayAGXEJhyg4ziwLEs5gJZlwXEctQEuA63VasoBrNVqUgZWOEBKKba2tpSaxpxzbG1tSTnkojKCbTQaqFarSkDknKNaraLRaEiJh8oK+vXr18oAlBmLNICO4yAIgpUDDIJASvKQCnBZtG5vb6/0FX9RFNje3pZa3FPZo99qtVYCsSgKtFot6bNAKsA8z/H8+fOVTOUgCLCzsyO90VJ68wohBLu7uzAMozR4hmFgd3e3lHuV0v2zvr6Ovb290hos9/b2sL6+/vcAXLbddjodqRAppeh0OnAcp7R1t9T+M9/30W63YVmW0LKCcw7LstBut+H7fqlrbWkACSHgnCMIAnQ6HaH7Usuy0Ol0EAQBOOelvpOU0qW//NIoSRIwxnB+fo7v378jiiJEUYQ0TYV30GdZhrW1NTiOA8dx8OjRI1SrVdi2feF4GcW0UICUUhRFga9fv+LLly9gjCHPcxRFUaozlveilMIwDNi2jWaziUajcRGjEgCXQBaLBeI4xufPnzEaja64UJW3MUv3PX78GM1mE7Va7eKE7j7OvDNA0zQxmUxwdHSE2Wx20TKh+uH6ElalUoHrumi1WvB9/84dC7cGWBQFGGPo9/uYTqdKNJLft8TyPA+vXr2Cbdu3fp4bAzRNEycnJ/j06ROm0+mDcNttXel5Hp4+fYrNzc0bO/JGAJMkweHhofL9f6Jguq6LN2/e3KjUuhYgIQRZlmEwGGA4HKIoir8e3mWIlFI8efIEz549g2ma1yaa3wJcNiL2er0H0bImU6ZpYn9//9qWkN8CPDo6wsePHx98ghCZaHZ2dtBqtf4MkHOObreLOI41tWveKr19+/bKUkaXU5YxhoODAw3vD4rjGAcHB2CMXUAkZ2dnfDqdIgxDZFn2zySK+yQY0zTRbrfheR5oFEUIw/DilyNa/799zfMcYRj+/Iz23bt3PEkSDe8OTrQsCzRNUw3vjk5M01T/fOy+0gA1QA1QA9QAtTRADVAD1AC1NEANUAPUALU0QA1QA/x39AMzx8A5MRN2GAAAAABJRU5ErkJggg=='}}" width="40" height="40" alt="user" title="{{$row['news_editor'][0]['name']??null}}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="dt-info-item">
                                            <h1 class="dt-info-title font-bold mb-2">Bagikan</h1>
                                            <div class="share flex flex-wrap items-center">
                                                <div class="share-item share-item--fb"><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current() .'?utm_source=Desktop&utm_medium=facebook&utm_campaign=Share_Bottom') }}" target="_blank"><i class="icon icons--share icon--share-fb"></i></a></div>
                                                <div class="share-item share-item--tweet"><a href="https://twitter.com/intent/tweet?text={{ urlencode(url()->current().'?utm_source=Desktop&utm_medium=twitter&utm_campaign=Share_Bottom') }}" target="_blank"><i class="icon icons--share icon--share-tweet"></i></a></div>
                                                {{-- <div class="share-item share-item--wa"><a href="https://wa.me/?text={{ urlencode(url()->current()) .'?utm_source=Desktop&utm_medium=whatsapp&utm_campaign=Share_Bottom' }}" target="_blank"><i class="icon icons--share icon--share-wa"></i></a></div> --}}
                                                {{-- <div class="share-item share-item--gplus"><a href="#"><i class="icon icons--share icon--share-gplus"></i></a></div>
                                                <div class="share-item share-item--mail"><a href="#"><i class="icon icons--share icon--share-mail"></i></a></div>
                                                <div class="share-item share-item--count">
                                                    <span class="share-item--count-label text-12">Share</span> 
                                                    <p class="share-item--count-value text-18 font-semibold">13</p>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section section--report">
                    <button data-toggle-open="rModal" class="btn btn--report py-3 px-4 border rounded-md inline-block"><img class="object-contain inline-block -mt-1 mr-1" src="{{ Src::asset('img/error.e43b81ee4b1c02e23191db01caefee9e.svg') }}" width="15" height="17"> LAPORKAN ARTIKEL</button> 
                </div>

                <div data-toggle="rModal" class="modal section--report">
                    <div class="modal-inner">
                        <div class="modal-inner-body">
                            <a data-toggle-close="rModal" class="modal-close" href="#"><img class="object-contain" src="{{ Src::asset('img/close-modal.a1c4fbc08020baeabc3c2f1fcd229bcc.svg') }}" width="14" height="14"></a>
                            <div class="modal-main">

                                <!--modal.form-->
                                <div class="modal-form">
                                    <h1 class="modal-title mb-4">LAPORKAN ARTIKEL</h1>
                                    <div class="form-box flex items-center">
                                        <div class="report-img">
                                            @include('image', ['source'=>$row, 'size'=>'640x360', $row['news_title']??null])
                                        </div>
                                        <div class="report-title">{{$row['news_title']??null}}</div>
                                    </div>
                                    <div class="modal-form-body">
                                        <form class="form-submit" id="form-report">
                                            <div class="form-box">
                                                <input type="hidden" class="form-control" value="{{url()->current()}}" name="url" hidden readonly>
                                            </div>
                                            <div class="form-box">
                                                <input type="text" class="form-control " placeholder="Nama Depan" value="" name="name">
                                                <label id="name-error" class="error label-error" for="name"></label>
                                            </div>
                                            <div class="form-box">
                                                <input type="email" class="form-control  " placeholder="Email" value="" name="from"  required='required' >
                                                <label id="from-error" class="error label-error" for="from"></label>
                                            </div>
                                            <div class="form-box">
                                                <input type="text" class="form-control  " placeholder="Nomor HP" value="" name="phone" rule='[^0-9]' required='required' minlength='9' maxlength='12'>
                                                <label id="phone-error" class="error label-error" for="phone"></label>
                                            </div>
                                            <div class="form-box">
                                                <select class="form-control" name="type">
                                                    <option value="Complaint">Complaint</option>
                                                    <option value="Feedback">Feedback</option>
                                                </select>
                                            </div>
                                            <div class="form-box">
                                                <input type="text" class="form-control  " placeholder="Judul Laporan" value="" name="subject"  required='required'>
                                                <label id="subject-error" class="error label-error" for="subject"></label>
                                            </div>
                                            <div class="form-box">
                                                <textarea class="form-control " rows="5" placeholder="Detail Laporan" value="" name="content"  required='required'></textarea>
                                                <label id="content-error" class="error label-error" for="content"></label>
                                            </div>
                                            <div class="form-box flex justify-between items-center">
                                                <div class="form-recapthca" >
                                                    <div hidden class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                                        {!! RecaptchaV3::field('register') !!}
                                                        @if ($errors->has('g-recaptcha-response'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="flex">
                                                        <img class="object-contain inline-block mr-1 google-captcha-error" style="display: none" src="{{ Src::asset('img/error.e43b81ee4b1c02e23191db01caefee9e.svg') }}" width="15" height="17">
                                                        <label id="g-recaptcha-response-error" class="error label-error" for="g-recaptcha-response"></label>
                                                    </div>
                                                </div>
                                                <div class="form-button">
                                                    <button type="submit" class="btn btn--submit py-2 px-6 rounded-md">Kirim</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!--modal.alert-->
                                <div class="modal-alert hidden">
                                    <div class="modal-alert-body flex items-center justify-center flex-col" style="min-height: 300px">
                                        <img class="modal-icon object-contain mb-4" src="{{ Src::asset('img/checkmark-modal.f381295fc0b9b93ca76855ce5a5b507e.svg') }}" width="74" height="64">
                                        <h1 class="modal-title">BERHASIL</h1>
                                        <p class="modal-text">Laporan Anda berhasil dikirim</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($row['latest']??null)
                <div class="section section--index">
                    <h1 class="section-title text-16 mb-4">BERITA TERKAIT</h1>
                    <ul class="section--index-grid grid grid-cols-3 gap-4">
                        @foreach ($row['latest'] as $new)
                            <li class="section--index-grid-item">
                                <figure class="item">
                                    <a href="{{Src::detail($new)}}" class="item-img aspect-[200/113] rounded-lg" aria-label="{{$row['news_title']??null}}">
                                        @include('image', ['source'=>$new, 'size'=>'200x112', $new['news_title']??null])
                                    </a>
                                    <figcaption class="item-desc pt-2">
                                        <h2 class="item-desc-title font-bold"><a href="{{Src::detail($new)}}">{{$new['news_title']??null}}</a></h2>
                                    </figcaption>
                                </figure>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- <div class="section section--index">
                    <h1 class="section-title text-16 mb-4">BERITA TERKAIT</h1>
                    <ul class="section--index-grid grid grid-cols-3 gap-4" x-data="{
                        terkait: [
                            {
                                title: 'Sosok Yamaha MT-15 2019 versi Indonesia',
                                img: 'https://via.placeholder.com/200x113',
                                link: '#'
                            },
                            {
                                title: 'Sosok Yamaha MT-15 2019 versi Indonesia',
                                img: 'https://via.placeholder.com/200x113',
                                link: '#'
                            },
                            {
                                title: 'KNKT: Ban Jadi Penyebab Terbesar Kecelakaan di Jalan Raya',
                                img: 'https://via.placeholder.com/200x113',
                                link: '#'
                            },
                            {
                                title: 'Annies Road, Jalan Angker yang Dihuni Hantu Wanita di Amerika Serikat',
                                img: 'https://via.placeholder.com/200x113',
                                link: '#'
                            },
                            {
                                title: 'Motor Yamaha MX-King Punya Tiga Baju Baru, Harga Mulai Rp 24 Jutaan',
                                img: 'https://via.placeholder.com/200x113',
                                link: '#'
                            },
                            {
                                title: 'Suami Nia Ramadhani Ajak Anak-Anaknya Naik Motor, Netizen Salah Fokus',
                                img: 'https://via.placeholder.com/200x113',
                                link: '#'
                            },
                        ]
                    }">
                        <template x-for="news in terkait">
                            <li class="section--index-grid-item">
                                <figure class="item">
                                    <a href="#" class="item-img aspect-[200/113] rounded-lg">
                                        <img class="lazyload" :data-src="news.img" alt="image" width="200" height="113">
                                    </a>
                                    <figcaption class="item-desc pt-2">
                                        <h2 class="item-desc-title font-bold"><a href="#" x-text="news.title"></a></h2>
                                    </figcaption>
                                </figure>
                            </li>
                        </template>
                    </ul>
                </div> --}}

            </div>
            @include('defaultsite/desktop/components/aside',['reference'=>$row??null])
            
        </div>
    </div>
</main>
@endsection