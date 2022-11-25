@extends('defaultsite.mobile-v2.layouts.main')
@php
    $popular = \Data::popular();
    
    $row = collect($popular)->slice(0, Site::isMobile() ? 20 : 21);
@endphp

@section('content')
    {{-- @dump($row) --}}
    @include('defaultsite.mobile-v2.components-ui.not-found')

    {{-- slider trending tapi data belum ada --}}

    @include('defaultsite.mobile-v2.components-ui.slider', [
        'hl' => $row,
        'title' => 'Trending News',
    ])


    @if ($latest = \Data::latest() ?? null)
        @include('defaultsite.mobile-v2.components-ui.list-main-news', [
            'latest' => $latest,
            'title' => 'Latest News',
        ])
    @endif
@endsection
