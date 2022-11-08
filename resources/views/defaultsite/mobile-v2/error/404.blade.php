@extends('defaultsite.mobile.layouts.ui-main')

@section('content')
    @include('defaultsite.mobile.components-ui.not-found')

    {{-- slider trending tapi data belum ada --}}
    @if ($popular = \Data::popular() ?? null)
        @include('defaultsite.mobile.components-ui.slider', ['hl' => $popular, 'title' => 'Popular News'])
    @endif

    {{--list populer news--}}
    @if ($popular = \Data::popular() ?? null)
        @include('defaultsite.mobile.components-ui.populer-news', ['hl' => $popular])
    @endif

    {{-- slider latest news --}}
    @if ($latest = \Data::latest() ?? null)
        @include('defaultsite.mobile.components-ui.slider', ['hl' => $latest, 'title' => 'Latest News'])
    @endif
@endsection