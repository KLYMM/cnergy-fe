@extends('ui.template.template')

@section('title', 'Index Tag Paging')

@section('content-field')
{{-- LAYOUT HOMEPAGE --}}
<header>
    @include('components.navbar')
    @include('components.breaking-news')
</header>

@include('components.tab-news')

<div class="mt-4">
    <div class="row gx-5">
        <div class="col-4">

            {{-- MORE INFO --}}
            @include('components.more-info')

            {{-- PHOTO COLLECTION --}}
            @include('components.photo-collection')

            {{-- VIDEO COLLECTION --}}
            @include('components.video-collection')

        </div>
        <div class="col-8">

            {{-- LIST NEWS --}}
            @include('components.list-main-news')
            @include('components.list-main-news')

            {{-- VIDEO NEWS --}}
            @include('components.video-news')

        </div>
    </div>
</div>

{{-- FOOTER --}}
@include('components.footer')
@endsection
