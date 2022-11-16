@extends('defaultsite.mobile-v2.layouts.main')

@section('content')
    {{-- 
<div class="channel-ad channel-ad_ad-headline">
    {!! Util::getAds('headline') !!}
</div> --}}


    <div class="main-body">
        <div class="main-article">
            {{-- headline news --}}
            <div class="main-news-container">
                <ul class="main-breadcrumb">
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


                {{-- main --}}
                <div class="swiper-wrapper">
                    @if (count($row['photonews'] ?? []) > 0)
                        <div class="header-photo">
                            <h3 class="photo-t">{{ $row['news_title'] ?? null }}</h3>
                            <div class="account">
                                <a href="{{ Src::author($row) }}">
                                    <img class="aspect-square"
                                        src="{{ $row['news_editor'][0]['image'] ??'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4AgJCiccVLvelQAABVVJREFUeNrtnG1v0zwUhm87WdqsCUm00nWgMgZMQrSbxJ/nZ6xSpexTAakbhdFutDSN17yZD6jTxsN49mKnHviW8jknl2/7HMcnIaenpxxadxbVCDTAlcpUKRhCyJXrsjjnVy4N8BdxzvHt2zdMJhPMZjMwxpBl2c8gTRO2bcN1Xfi+D9/3/wN4ZYO+qiRiGAYYYxiPxzg9PcV0OkWe5zdyoGEY8DwPGxsbqNfrsG0beZ7/OwA553j//j1OTk7uPR0JIdjc3MTLly9X4srSAY7HY3z48AHn5+egVEwOK4oC1WoVL168QL1e/zsBGoaBMAwxHo+l3qder6Pdbpc2pUsBmGUZer0eoigS5ro/udFxHOzv78M05edI6XUg5xy9Xg9xHEuHBwCUUsRxjF6vV0q5I/2Jut0u5vN56Yv7fD5Ht9t92AD7/T7m8/lqsiMhmM/n6Pf7Dw8gIQRRFGE4HK604CWEYDgcIooiaXFIAVgUBcIwLGXNu8maGIYhiqJ4GAAJIRgMBkiSRJn9apIkGAwGUlwoHGCaphiNRsrsVZeDOhqNkKap+gAZY2CMQTXJiksoQEopjo+PoaqOj4+Fr8vCHTgej5WavpensYxtJBUZ4GQykZbtRFUHk8lE6AALdeBsNlPSfZcHeTabqevAVe06VhmjUAcuFgvlAS4WC3WTyPIMQ2WJjpGKHmHVJTpGoQDX1taUByg6RqEAK5WKUme2v4pzjkqloiZAzjlqtZryAEXHKNSBrusqD9B1XXUd6Hme8mWM53nqOpBzjo2NDSVdKCs24QCbzaayAGXEJhyg4ziwLEs5gJZlwXEctQEuA63VasoBrNVqUgZWOEBKKba2tpSaxpxzbG1tSTnkojKCbTQaqFarSkDknKNaraLRaEiJh8oK+vXr18oAlBmLNICO4yAIgpUDDIJASvKQCnBZtG5vb6/0FX9RFNje3pZa3FPZo99qtVYCsSgKtFot6bNAKsA8z/H8+fOVTOUgCLCzsyO90VJ68wohBLu7uzAMozR4hmFgd3e3lHuV0v2zvr6Ovb290hos9/b2sL6+/vcAXLbddjodqRAppeh0OnAcp7R1t9T+M9/30W63YVmW0LKCcw7LstBut+H7fqlrbWkACSHgnCMIAnQ6HaH7Usuy0Ol0EAQBOOelvpOU0qW//NIoSRIwxnB+fo7v378jiiJEUYQ0TYV30GdZhrW1NTiOA8dx8OjRI1SrVdi2feF4GcW0UICUUhRFga9fv+LLly9gjCHPcxRFUaozlveilMIwDNi2jWaziUajcRGjEgCXQBaLBeI4xufPnzEaja64UJW3MUv3PX78GM1mE7Va7eKE7j7OvDNA0zQxmUxwdHSE2Wx20TKh+uH6ElalUoHrumi1WvB9/84dC7cGWBQFGGPo9/uYTqdKNJLft8TyPA+vXr2Cbdu3fp4bAzRNEycnJ/j06ROm0+mDcNttXel5Hp4+fYrNzc0bO/JGAJMkweHhofL9f6Jguq6LN2/e3KjUuhYgIQRZlmEwGGA4HKIoir8e3mWIlFI8efIEz549g2ma1yaa3wJcNiL2er0H0bImU6ZpYn9//9qWkN8CPDo6wsePHx98ghCZaHZ2dtBqtf4MkHOObreLOI41tWveKr19+/bKUkaXU5YxhoODAw3vD4rjGAcHB2CMXUAkZ2dnfDqdIgxDZFn2zySK+yQY0zTRbrfheR5oFEUIw/DilyNa/799zfMcYRj+/Iz23bt3PEkSDe8OTrQsCzRNUw3vjk5M01T/fOy+0gA1QA1QA9QAtTRADVAD1AC1NEANUAPUALU0QA1QA/x39AMzx8A5MRN2GAAAAABJRU5ErkJggg==' }}"
                                        width="40" height="40" alt="user">
                                </a>
                                <div class="account-detail">
                                    <p href="{{ Src::author($row) }}">
                                        <a href="{{ Src::author($row) }}">{{ $row['news_editor'][0]['name'] ?? null }}</a>
                                    </p>
                                    <span>Published {{ Util::date($row['news_date_publish'] ?? null, 'ago') }}</span>
                                </div>
                            </div>
                            <p class="photo-synopsis"> {{ $row['news_synopsis'] ?? null }}</p>
                        </div>
                        <div class="image-news">
                            @include('image', [
                                'source' => $row,
                                'size' => '380x214',
                                $row['news_title'] ?? null,
                            ])
                        </div>
                        @include('defaultsite.mobile-v2.components-ui.dt-share')

                        <p class="photo-content">{{ $row['news_imageinfo'] ?? null }}</p>

                        @foreach ($row['photonews'] as $s)
                            <div id="data-{{ $loop->index }}" data-target="{{ $loop->index }}"
                                class="@if ($loop->index != 0) pages-item-hidden @endif">
                                <div style="display:flex; align-items: center; margin: 20px;">
                                    <hr style="width:50%;text-align:left;margin-left:0">
                                    <div class="slider-counter">{{ $loop->iteration }}<span id="sliderCounter"></span> of
                                        {{ count($row['photonews']) }} photos</div>
                                    <hr style="width:50%;text-align:left;margin-left:0">
                                </div>

                                <a href="{{ Src::detail($s) }}" aria-label="{{ $s[0]['news_title'] ?? null }}">
                                    <figure>
                                        <div class="image-news">
                                            @include('image', [
                                                'source' => $s,
                                                'size' => '380x214',
                                                $s['news_title'] ?? null,
                                            ])
                                        </div>
                                        <p class="photo-content">{{ $row['news_imageinfo'] ?? null }}</p>
                                    </figure>
                                </a>

                                @if ($loop->iteration != $loop->last)
                                    <button class="pages-button pages-button--img mt-6"
                                        data-target="{{ $loop->iteration }}">
                                        <figure class="item item--text d-flex "
                                            style="align-items: center;justify-content: space-between; margin:0; ">
                                            <span class="item--text-img">
                                                <div class="image-news" alt="image">
                                                    @include('image', [
                                                        'source' => $s,
                                                        'size' => '93x53',
                                                        $s['news_title'] ?? null,
                                                    ])
                                                </div>
                                            </span>
                                            <figcaption class="item-desc d-flex  px-4"
                                                style="justify-content: space-between; align-items: center; flex: 1 1 0%;">
                                                <span class="pages-button--img-text">
                                                    <span class="pages-button-text">There are
                                                        {{ count($row['photonews']) - $loop->iteration }} more
                                                        photos</span>
                                                </span>
                                                <span class="pages-button-countdown ml-2" data-delay="5">
                                                    <span class="pages-button-countdown-html">5</span>
                                                    <svg class="pages-button-countdown-svg">
                                                        <circle r="14" cx="16" cy="16"
                                                            stroke-linecap="round" stroke-width="3" fill="none"
                                                            stroke="currentColor"></circle>
                                                    </svg>
                                                </span>
                                            </figcaption>
                                        </figure>
                                    </button>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div id="div-hidden" class="hidden-component">
                @if ($popular = \Data::popular() ?? null)
                    @include('defaultsite.mobile-v2.components-ui.read-too-list', ['news' => $popular])
                @endif

                @include('defaultsite.mobile-v2.components-ui.related-tag', ['title' => ''])


                @include('defaultsite.mobile-v2.components-ui.list-main-news', [
                    'latest' => $row['latest'],
                    'title' => 'Related Photo',
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


                @include('defaultsite.mobile-v2.components.footer-maverick')
            </div>

        </div>
    </div>

@endsection
