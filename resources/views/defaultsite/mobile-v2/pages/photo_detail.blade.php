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
                        <div style="margin: 20px 0;">
                            <h3 class="photo-t" style="margin: 0px 20px">{{ $row['news_title'] ?? null }}</h3>
                            <div class="account" style="margin:20px;">
                                <a href="{{ Src::author($row) }}">
                                    <img class="rounded rounded-5" src="{{ URL::asset('assets/images/author.PNG') }}"
                                        alt="author" width="40" height="40px">
                                </a>
                                <div class="account-detail">
                                    <p href="{{ Src::author($row) }}">
                                        trstd.ly
                                    </p>
                                    <span>Published {{ Util::date($row['news_date_publish'] ?? null, 'ago') }}</span>
                                </div>
                            </div>
                            @include('defaultsite.mobile-v2.components-ui.dt-share')
                        </div>
                        <div class="image-news">
                            @include('image', [
                                'title' => $row['news_title'],
                                'source' => $row,
                                'size' => '380x214',
                                $row['news_title'] ?? null,
                            ])
                            <p class="photo-synopsis"> {{ $row['news_synopsis'] ?? null }}</p>
                        </div>

                        <p class="photo-content">{{ $row['news_imageinfo'] ?? null }}</p>

                        @foreach ($row['photonews'] as $s)
                            {{-- @dump($s) --}}
                            <div id="data-{{ $loop->index }}" data-target="{{ $loop->index }}"
                                class="@if ($loop->index != 0) pages-item-hidden @endif">
                                <div style="display:flex; align-items: center; margin: 20px;">
                                    <hr class="hr-list">
                                    <div class="slider-counter">{{ $loop->iteration }}<span id="sliderCounter"></span> of
                                        {{ count($row['photonews']) }} photos</div>
                                    <hr class="hr-list">
                                </div>

                                <a href="{{ Src::detail($s) }}" aria-label="{{ $s[0]['news_title'] ?? null }}">
                                    <figure>
                                        <div class="image-news">
                                            @include('image', [
                                                'title' => $s['title'],
                                                'source' => $s,
                                                'size' => '380x214',
                                                $s['title'] ?? null,
                                            ])
                                        </div>
                                        <p class="photo-content">{{ $row['news_imageinfo'] ?? null }}</p>
                                    </figure>
                                </a>

                                <div style="text-align:center">
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
