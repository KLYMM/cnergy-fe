@extends('defaultsite.mobile-v2.layouts.main')

{{-- @push('preload')
<link rel="ampHtml" href="{{config('site.attributes.object.ampUrl')??null}}"/>
<link rel="preload" as="image" href="{{ Src::imgNewsCdn($row, '375x208', 'webp') }}" />
{!! RecaptchaV3::initJs() !!}
@endpush --}}

{{-- @push('styles')
<link rel="preload" href="{{ Src::mix('css/detail.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ Src::mix('css/detail.css') }}" /></noscript>

@endpush --}}

@if (config('app.enabled_tracking'))
    @push('script')
        <script>
            var url = '{{ str_replace('api', 'analytics', config('app.api_url')) }}/jsview2/';
            var xhr = new XMLHttpRequest();
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('{!! http_build_query([
                'url' => Src::detail($row ?? null),
                'platform' => config('site.device') == 'mobile' ? 'm' : 'www',
            ]) !!}');
        </script>
    @endpush
@endif

@section('content')
    <ul class="main-breadcrumb" style="margin:20px;">
        <li class="main-breadcrumb-item"><a href="/">Home</a></li>
        @foreach ($row['news_category'] as $r)
            @if ($loop->iteration == 1)
                <li class="main-breadcrumb-item {{ $loop->count == 1 ? 'active' : '' }}"><a
                        href="{{ url($row['news_category'][0]['url'] ?? '') }}">{{ $r['name'] ?? null }}</a></li>
            @elseif($loop->iteration == 2)
                <li class="main-breadcrumb-item {{ $loop->count == 2 ? 'active' : '' }}"><a
                        href="{{ url(($row['news_category'][0]['url'] ?? '') . '/' . ($row['news_category'][1]['url'] ?? '')) }}">{{ $r['name'] ?? null }}</a>
                </li>
            @elseif($loop->iteration == 3)
                <li class="main-breadcrumb-item {{ $loop->count == 3 ? 'active' : '' }}"><a
                        href="{{ url(($row['news_category'][0]['url'] ?? '') . '/' . ($row['news_category'][1]['url'] ?? '') . '/' . ($row['news_category'][2]['url'] ?? '')) }}">{{ $r['name'] ?? null }}</a>
                </li>
            @endif
        @endforeach
    </ul>
    {{-- @dump($row) --}}
    <div>
        <figure class="item-vidio-inner">
            <style>
                iframe {
                    aspect-ratio: 16 / 9;
                    width: 100%;
                    height: auto;
                    /* background-color: inherit; */
                }
                .item-vidio-inner {
                    position: relative;
                    height: auto;
                    width: 100%;
                    position: sticky;
                    top: 3.7rem;
                    z-index: 19;
                }
            </style>
            <div >
                {!! htmlspecialchars_decode($row['news_video']['video'] ?? null) !!}
            </div>
        </figure>

        <div class="main-news-container">
            <h3 class="photo-t" style="margin: 20px;">{{ $row['news_title'] ?? null }}</h3>
            <input type="checkbox" checked id="btn-read">
            <div class="dt-paragraph">
                {!! str_replace(
                    ['mce-mce-mce-mce-no/type', 'mce-no/type'],
                    '',
                    htmlspecialchars_decode($row['news_content'] ?? null),
                ) !!}

                @push('script')
                    <script>
                        if (document.getElementsByClassName('dt-paragraph')) {
                            //change tag br to tag p
                            if (document.getElementsByClassName('dt-paragraph')[0].getElementsByTagName('br')[0] != null) {
                                document.getElementsByClassName('dt-paragraph')[0].innerHTML = document.getElementsByClassName(
                                    'dt-paragraph')[0].innerHTML.replace(/<br>\\*/g, '</p><p>')
                            }
                            //add ads
                            if (document.getElementsByClassName('dt-paragraph')[0].getElementsByTagName('p')[0] != null) {
                                //get 2 paragraf before add ads
                                var lis = document.getElementsByClassName('dt-paragraph')[0].getElementsByTagName('p')
                                var counter = 0

                                for (var i = 0; i < lis.length - 1; i++) {
                                    if (lis[i].innerHTML !== "") {
                                        counter++
                                        if (counter == 2) {
                                            document.getElementsByClassName('dt-paragraph')[0].getElementsByTagName('p')[i]
                                                .insertAdjacentHTML('afterend', (
                                                        '<div class="channel-ad channel-ad_ad-exposer">  {!! str_replace('script', 'scr+ipt', Util::getAds('exposer')) !!} </div>')
                                                    .replaceAll('+', ''));
                                            break
                                        }
                                    }
                                }
                            }
                        }
                        console.log(document.getElementsByClassName('dt-paragraph'))
                    </script>
                @endpush

            </div>
            <label for="btn-read" class="btn-inner"></label>
        </div>


        @include('defaultsite.mobile-v2.components-ui.dt-share')

        <div class="header-photo">
            <h2 class="dt-title text-24 font-bold mb-6">{{ $row['news_sub_title'] ?? null }}</h2>
            <div class="d-flex  my-2 align-items-center gap-2">
                <a class="" href="#">
                    <img class="rounded rounded-5"
                        src="{{ $row['news_editor'][0]['image'] ??'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4AgJCiccVLvelQAABVVJREFUeNrtnG1v0zwUhm87WdqsCUm00nWgMgZMQrSbxJ/nZ6xSpexTAakbhdFutDSN17yZD6jTxsN49mKnHviW8jknl2/7HMcnIaenpxxadxbVCDTAlcpUKRhCyJXrsjjnVy4N8BdxzvHt2zdMJhPMZjMwxpBl2c8gTRO2bcN1Xfi+D9/3/wN4ZYO+qiRiGAYYYxiPxzg9PcV0OkWe5zdyoGEY8DwPGxsbqNfrsG0beZ7/OwA553j//j1OTk7uPR0JIdjc3MTLly9X4srSAY7HY3z48AHn5+egVEwOK4oC1WoVL168QL1e/zsBGoaBMAwxHo+l3qder6Pdbpc2pUsBmGUZer0eoigS5ro/udFxHOzv78M05edI6XUg5xy9Xg9xHEuHBwCUUsRxjF6vV0q5I/2Jut0u5vN56Yv7fD5Ht9t92AD7/T7m8/lqsiMhmM/n6Pf7Dw8gIQRRFGE4HK604CWEYDgcIooiaXFIAVgUBcIwLGXNu8maGIYhiqJ4GAAJIRgMBkiSRJn9apIkGAwGUlwoHGCaphiNRsrsVZeDOhqNkKap+gAZY2CMQTXJiksoQEopjo+PoaqOj4+Fr8vCHTgej5WavpensYxtJBUZ4GQykZbtRFUHk8lE6AALdeBsNlPSfZcHeTabqevAVe06VhmjUAcuFgvlAS4WC3WTyPIMQ2WJjpGKHmHVJTpGoQDX1taUByg6RqEAK5WKUme2v4pzjkqloiZAzjlqtZryAEXHKNSBrusqD9B1XXUd6Hme8mWM53nqOpBzjo2NDSVdKCs24QCbzaayAGXEJhyg4ziwLEs5gJZlwXEctQEuA63VasoBrNVqUgZWOEBKKba2tpSaxpxzbG1tSTnkojKCbTQaqFarSkDknKNaraLRaEiJh8oK+vXr18oAlBmLNICO4yAIgpUDDIJASvKQCnBZtG5vb6/0FX9RFNje3pZa3FPZo99qtVYCsSgKtFot6bNAKsA8z/H8+fOVTOUgCLCzsyO90VJ68wohBLu7uzAMozR4hmFgd3e3lHuV0v2zvr6Ovb290hos9/b2sL6+/vcAXLbddjodqRAppeh0OnAcp7R1t9T+M9/30W63YVmW0LKCcw7LstBut+H7fqlrbWkACSHgnCMIAnQ6HaH7Usuy0Ol0EAQBOOelvpOU0qW//NIoSRIwxnB+fo7v378jiiJEUYQ0TYV30GdZhrW1NTiOA8dx8OjRI1SrVdi2feF4GcW0UICUUhRFga9fv+LLly9gjCHPcxRFUaozlveilMIwDNi2jWaziUajcRGjEgCXQBaLBeI4xufPnzEaja64UJW3MUv3PX78GM1mE7Va7eKE7j7OvDNA0zQxmUxwdHSE2Wx20TKh+uH6ElalUoHrumi1WvB9/84dC7cGWBQFGGPo9/uYTqdKNJLft8TyPA+vXr2Cbdu3fp4bAzRNEycnJ/j06ROm0+mDcNttXel5Hp4+fYrNzc0bO/JGAJMkweHhofL9f6Jguq6LN2/e3KjUuhYgIQRZlmEwGGA4HKIoir8e3mWIlFI8efIEz549g2ma1yaa3wJcNiL2er0H0bImU6ZpYn9//9qWkN8CPDo6wsePHx98ghCZaHZ2dtBqtf4MkHOObreLOI41tWveKr19+/bKUkaXU5YxhoODAw3vD4rjGAcHB2CMXUAkZ2dnfDqdIgxDZFn2zySK+yQY0zTRbrfheR5oFEUIw/DilyNa/799zfMcYRj+/Iz23bt3PEkSDe8OTrQsCzRNUw3vjk5M01T/fOy+0gA1QA1QA9QAtTRADVAD1AC1NEANUAPUALU0QA1QA/x39AMzx8A5MRN2GAAAAABJRU5ErkJggg==' }}"
                        width="40" height="40" alt="user">
                </a>
                <div class="d-flex flex-column justify-content-center gap-1">
                    <p class="photo-author pt-2 font-outfit">
                        <a href="{{ Src::author($row) }}">{{ $row['news_editor'][0]['name'] ?? null }}
                        </a>

                    </p>
                    <span class="author_publish"> {{ Util::date($row['news_date_publish'] ?? null, 'long_time') }}</span>
                </div>
            </div>
        </div>

        @include('defaultsite.mobile-v2.components-ui.related-tag', ['title' => ''])

        <div style="margin:20px;">

            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-light report-btn" style="background-color:#FFF0EC; font-weight:bolder;"><i
                    class="fa-solid fa-triangle-exclamation font-outfit"
                    style="color:#ff3903; margin-right: 10px;"></i>REPORT
                NEWS</button>

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            @include('defaultsite.mobile-v2.components-ui.form-report')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('defaultsite.mobile-v2.components-ui.list-main-news', [
            'latest' => $row['latest'],
            'title' => 'Related Video',
        ])


        @if ($latest = \Data::latest() ?? null)
            @include('defaultsite.mobile-v2.components-ui.slider', [
                'hl' => $latest,
                'title' => 'Latest News',
            ])
        @endif

        @if ($popular = \Data::popular() ?? null)
            @include('defaultsite.mobile-v2.components-ui.populer-news', ['popular' => $popular])
        @endif

        @if ($latest = \Data::latest() ?? null)
            @include('defaultsite.mobile-v2.components-ui.related-article', [
                'news' => $latest,
                'title' => 'LATEST UPDATE',
            ])
        @endif
    </div>
@endsection
