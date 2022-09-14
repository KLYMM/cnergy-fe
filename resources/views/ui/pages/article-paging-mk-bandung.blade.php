@extends('ui.template.template')

@section('title', 'Article Page')

@section('content-field')
    {{-- LAYOUT HOMEPAGE --}}
    <header>
        @include('ui.components.navbar')
        @include('ui.components.breaking-news')
    </header>

    <div class="mt-4">
        <div class="row gx-5">
            <div class="col-8">

                {{-- BERITA UTAMA --}}
                @include('ui.components.main-content-news')

                {{-- RELATED TAG --}}
                @include('ui.components.related-tag')

                {{-- CREDITS --}}
                @include('ui.components.credit')

                {{-- SHARE NEWS --}}
                @include('ui.components.share-news')

                {{-- REPORT ARTICLE --}}
                @include('ui.components.report-article')

                {{-- BERITA TERKAIT --}}
                @include('ui.components.slider-news')

            </div>
            <div class="col-4">

                {{-- TRENDING TAG --}}
                @include('ui.components.trending-tag')

                {{-- LIVE STREAMING --}}
                @include('ui.components.live-streaming')

                {{-- BERITA SIDEBAR --}}
                @include('ui.components.sidebar-news')

                {{-- BERITA POPULER --}}
                @include('ui.components.populer-news')

            </div>
        </div>
    </div>

    {{-- FOOTER --}}
    @include('ui.components.footer')
@endsection
