@extends('ui.template.template')

@section('title', '404 Not Found')

@section('content-field')
{{-- LAYOUT HOMEPAGE --}}
<header>
    @include('components.navbar')
    @include('components.breaking-news')
</header>

<div class="mt-4">
    <div class="row gx-5">
        <div class="col-8">

            {{-- NOT FOUND --}}
            @include('components.404-not-found')

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
