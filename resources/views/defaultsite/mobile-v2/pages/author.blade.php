@extends('defaultsite.mobile-v2.layouts.main')

@section('content')
    {{-- @push('styles')
    <link rel="preload" href="{{ Src::mix('css/tag.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ Src::mix('css/tag.css') }}" /></noscript>
    <style>
        .channel-ad_ad-headline{
            margin:15px 0;
            text-align: center;
            display: flex;
            justify-content: center;
        }
    </style>
@endpush --}}

    <div class="tags" x-data="{ openTab: 1 }">
        <div x-show="openTab === 1" class="tags-all mt-8">
            <div class="main-body px-4">
                <div class="main-article py-5 ">
                    <div class="section section--tags">
                        <h1 class="section-title section-title--tags mb-4">{{ ucwords($author[0]) ?? null }}</h1>

                        {{-- <div class="channel-ad channel-ad_ad-headline">
                        {!! Util::getAds('headline') !!}
                    </div> --}}
                    </div>
                    <div class="section section--infscroll">
                        @include('defaultsite.mobile.components-ui.list-main-news-index', [
                            'rows' => $rows,
                            'page' => 'author',
                        ])
                        {{-- <div class="section--infscroll-next flex flex-col items-center justify-end">
                        <div class="section--infscroll-next-loading"><img src="desktop/assets/kmk.gif" width="60" height="60" alt="gif"></div>
                        <div class="section--infscroll-next-btn"><a href="/" class="section--infscroll-next-btn-link">Indeks Berita</a></div>
                    </div> --}}
                    </div>
                    @include('defaultsite.mobile.components-ui.pagination', [
                        'current_page' => $data['attributes']['current_page'],
                        'last_page' => $data['attributes']['last_page'],
                        'slug' => 'author/' . $idAuthor . '/' . Str::slug($author[0]),
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection
