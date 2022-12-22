@extends('defaultsite.mobile-v2.layouts.main-detail')


@section('content')
{{-- @include('defaultsite.mobile-v2.pages.detail.components.imageCase.imageCase1', ['row' => $row])
    @foreach ($content as $chunk)

@include('defaultsite.mobile-v2.pages.detail.components.dua', ['row' => $row])
@include('defaultsite.mobile-v2.pages.detail.components.textCase.textTemp1')
@include('defaultsite.mobile-v2.pages.detail.components.textCase.textTemp2')
@include('defaultsite.mobile-v2.pages.detail.components.textCase.textTemp3') --}}

@include('defaultsite.mobile-v2.pages.detail.components.satu')
@foreach ($content as $chunk)

@include('defaultsite.mobile-v2.pages.detail.components.' . $chunk['template']['name'], [
'chunk' => $chunk,
])

{{-- @if ($loop->even && !$loop->first)
        @include('defaultsite.mobile-v2.pages.detail.components.textCase.textCase1', [
            'chunk' => $chunk,
        ])
    @else
        @include('defaultsite.mobile-v2.pages.detail.components.dua', [
            'chunk' => $chunk,
        ])
    @endif --}}
@endforeach
{{-- content --}}
{{-- @if ($popular = \Data::popular() ?? null)
@include('defaultsite.mobile-v2.components-ui.read-too-list', ['news' => $popular])
@endif --}}

@if ($latest = collect($row['latest'])->slice(0,2)??null)
@include('defaultsite.mobile-v2.pages.detail.components.content.detail-related-news', [
    'news' =>  $latest,
])
@endif


@if ($latest = collect(Data::latest())->slice(0,2)??null)
@include('defaultsite.mobile-v2.pages.detail.components.content.detail-latest-news', [
    'news' => $latest,
])
@endif


{{-- list-case-sample --}}
{{-- @include('defaultsite.mobile-v2.pages.detail.components.listCase.listCase1', ['row' => $row])
    @include('defaultsite.mobile-v2.pages.detail.components.listCase.listCase2', ['row' => $row])
    @include('defaultsite.mobile-v2.pages.detail.components.listCase.listCase3', ['row' => $row])

    @include('defaultsite.mobile-v2.pages.detail.components.listCase.listCase4', ['row' => $row]) --}}
{{-- text+photo sample --}}
{{-- @include('defaultsite.mobile-v2.pages.detail.components.textPhotocase.temp2', ['row' => $row])
@include('defaultsite.mobile-v2.pages.detail.components.textPhotocase.temp3', ['row' => $row])
@include('defaultsite.mobile-v2.pages.detail.components.textPhotocase.temp4', ['row' => $row])
@include('defaultsite.mobile-v2.pages.detail.components.textPhotocase.temp5', ['row' => $row]) --}}
{{-- @endforeach  --}}
@endsection
