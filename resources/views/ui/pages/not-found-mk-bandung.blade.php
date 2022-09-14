@extends('ui.template.template')

@section('title', '404 Not Found')

@section('content-field')
{{-- LAYOUT HOMEPAGE --}}
<header>
    @include('ui.components.navbar')
    @include('ui.components.breaking-news')
</header>

<div class="mt-4">
    <div class="row gx-5">
        <div class="col-8">

            {{-- NOT FOUND --}}
            @include('ui.components.404-not-found')

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
