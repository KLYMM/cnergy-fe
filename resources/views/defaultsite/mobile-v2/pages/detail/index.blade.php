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

@if ($popular = collect(Data::popular())->slice(0, 4)??null)
@if (count($popular)>0)
@include('defaultsite.mobile-v2.components-ui.content-read-also-detail', ['news' => $popular])
@endif
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
