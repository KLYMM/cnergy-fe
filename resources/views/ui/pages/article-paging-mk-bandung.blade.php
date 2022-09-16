@extends('ui.template.template')

@section('title', 'Article Page')

@section('content-field')
    {{-- LAYOUT HOMEPAGE --}}
    <header>
        @include('components.navbar')
        @include('components.breaking-news')
    </header>

    <div class="mt-4">
        <div class="row gx-5">
            <div class="col-8">

                {{-- BERITA UTAMA --}}
                @include('components.main-content-news')

                {{-- RELATED TAG --}}
                @include('components.related-tag')

                {{-- CREDITS --}}
                @include('components.credit')

                {{-- SHARE NEWS --}}
                @include('components.share-news')

                {{-- REPORT ARTICLE --}}
                @include('components.report-article')

                {{-- BERITA TERKAIT --}}
                @include('ui.components.slider-news')

            </div>
            <div class="col-4">

                {{-- TRENDING TAG --}}
                @include('components.trending-tag')

                {{-- LIVE STREAMING --}}
                @include('components.live-streaming')

                {{-- BERITA SIDEBAR --}}
                @include('components.sidebar-news')

                {{-- BERITA POPULER --}}
                @include('components.populer-news')

            </div>
        </div>
    </div>

    {{-- FOOTER --}}
    @include('components.footer')
@endsection
