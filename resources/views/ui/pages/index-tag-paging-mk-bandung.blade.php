@extends('ui.template.template')

@section('title', 'Index Tag Paging')

@section('content-field')
{{-- LAYOUT HOMEPAGE --}}
<header>
    @include('ui.components.navbar')
    @include('ui.components.breaking-news')
</header>

@include('ui.components.tab-news')

<div class="mt-4">
    <div class="row gx-5">
        <div class="col-4">

            {{-- MORE INFO --}}
            @include('ui.components.more-info')

            {{-- PHOTO COLLECTION --}}
            @include('ui.components.photo-collection')

            {{-- VIDEO COLLECTION --}}
            @include('ui.components.video-collection')

        </div>
        <div class="col-8">

            {{-- LIST NEWS --}}
            @include('ui.components.list-main-news')
            @include('ui.components.list-main-news')

            {{-- VIDEO NEWS --}}
            @include('ui.components.video-news')

        </div>
    </div>
</div>

{{-- FOOTER --}}
@include('ui.components.footer')
@endsection
