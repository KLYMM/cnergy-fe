@extends('ui.template.template')

@section('title', 'Index Paging')

@section('content-field')
    {{-- LAYOUT HOMEPAGE --}}
    <header>
        @include('components.navbar')
        @include('components.breaking-news')
    </header>

    <div class="mt-4">
        <div class="row gx-5">
            <div class="col-4">

                {{-- INDEX KANAL --}}
                @include('components.index-kanal')

            </div>
            <div class="col-8">

                {{-- SEARCH INDEX --}}
                @include('components.search-index')

                <h4 class="special-font-lato fw-bold text-uppercase fs-6 fst-italic">index news</h4>
                @include('components.list-main-news')
                @include('components.list-main-news')

            </div>
        </div>
    </div>

    {{-- FOOTER --}}
    @include('components.footer')
@endsection
