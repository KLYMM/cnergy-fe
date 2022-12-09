@extends('defaultsite.mobile-v2.layouts.main-detail')


@section('content')
    {{-- @dd($content[3]->ownerDocument->saveHtml($content[3]->firstChild)) --}}
    @include('defaultsite.mobile-v2.pages.detail.components.dua', ['row' => $row])
    @include('defaultsite.mobile-v2.pages.detail.components.textCase.textTemp1')
    @include('defaultsite.mobile-v2.pages.detail.components.textCase.textTemp2')
    @include('defaultsite.mobile-v2.pages.detail.components.textCase.textTemp3')
    {{-- @foreach ($content->chunk(2) as $chunk)
        @if ($loop->odd)
            @include('defaultsite.mobile-v2.pages.detail.components.textCase.textCase2', [
                'chunk' => $chunk,
            ])
        @else
            @include('defaultsite.mobile-v2.pages.detail.components.listCase.listCase2', [
                'chunk' => $chunk,
            ])
        @endif
    @endforeach
    @include('defaultsite.mobile-v2.pages.detail.components.listCase.listCase1', ['row' => $row])
    @include('defaultsite.mobile-v2.pages.detail.components.listCase.listCase2', ['row' => $row])
    @include('defaultsite.mobile-v2.pages.detail.components.listCase.listCase3', ['row' => $row])
    @include('defaultsite.mobile-v2.pages.detail.components.listCase.listCase4', ['row' => $row])
    @endforeach --}}
@endsection
