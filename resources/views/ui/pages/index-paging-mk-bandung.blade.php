@extends('ui.template.template')

@section('title', 'Index Paging')

@section('content-field')
    {{-- LAYOUT HOMEPAGE --}}
    <header>
        @include('ui.components.navbar')
        @include('ui.components.breaking-news')
    </header>

    <div class="mt-4">
        <div class="row gx-5">
            <div class="col-4">

                {{-- INDEX KANAL --}}
                @include('ui.components.index-kanal')

            </div>
            <div class="col-8">

                {{-- SEARCH INDEX --}}
                @include('ui.components.search-index')

                <h4 class="special-font-lato fw-bold text-uppercase fs-6 fst-italic">index news</h4>
                @include('ui.components.list-main-news')
                @include('ui.components.list-main-news')

            </div>
        </div>
    </div>

    {{-- FOOTER --}}
    @include('ui.components.footer')
@endsection
