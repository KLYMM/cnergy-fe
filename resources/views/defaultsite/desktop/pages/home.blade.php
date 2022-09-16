@extends('defaultsite.desktop.layouts.ui-main')

{{-- @push('preload')
    @if ($headline[0]['news_id'] ?? null)
        <link rel="preload" as="image" href="{{ Src::imgNewsCdn($headline[0] ?? null, '640x360', 'webp') }}" />
    @endif
@endpush --}}

@section('content')
    <header>
        @include('ui.components.navbar')
        @include('ui.components.breaking-news')
    </header>

    <div class="mt-4">
        <div class="row gx-5">
            <div class="col-8">


                {{-- HEADLINE --}}
                @if ($headline[0]['news_id'] ?? null)
                    @include('defaultsite.desktop.components-ui.ui-main-news', ['hl' => $headline])
                @endif
                {{-- BERITA UTAMA LAINNYA --}}
                <div class="mt-4">
                    <h4 class="special-font-prompt text-uppercase fst-italic fw-bold"
                        style="font-size: 16px; margin-left: 20px">Berita Utama Lainnya</h4>
                    @include('ui.components.slider-news')
                </div>

                {{-- BERITA SPOTLIGHT --}}
                <div class="mt-4">
                    <h4 class="special-font-prompt text-uppercase fst-italic fw-bold"
                        style="font-size: 16px; margin-left: 20px">spotlight</h4>
                    @include('ui.components.slider-news')
                </div>

                {{-- LIST MAIN NEWS --}}
                @include('ui.components.list-main-news')


                {{-- GALLERY BERITA --}}
                @include('ui.components.gallery-news')


                {{-- PROMOTION PRODUCT --}}
                @include('ui.components.promotion-product')


                {{-- VIDEO NEWS --}}
                {{-- @dump($feed) --}}
                @if ($feed[1]['news_id'] ?? null)
                    @include('defaultsite.desktop.components-ui.ui-video-news', ['r' => $feed])
                @endif
                {{-- LIST MAIN NEWS REPEAT --}}
                @include('ui.components.list-main-news')

            </div>
            <div class="col-4">

                {{-- TRENDING TAG --}}
                @include('defaultsite.desktop.components-ui.ui-trending-tag')

                {{-- LIVE STREAMING --}}
                @include('ui.components.live-streaming')

                {{-- BERITA SIDEBAR --}}
                @include('ui.components.sidebar-news')

                {{-- BERITA POPULER --}}
                @include('ui.components.populer-news')

            </div>
        </div>
    </div>
@endsection
