@extends('defaultsite.mobile-v2.layouts.main-detail')


@section('content')
    {{-- @dd($content[3]->ownerDocument->saveHtml($content[3]->firstChild)) --}}
    @include('defaultsite.mobile-v2.pages.detail.components.imageCase.imageCase1', ['row' => $row])
    @foreach ($content->chunk(2) as $chunk)
        @if ($loop->odd)
            @include('defaultsite.mobile-v2.pages.detail.components.textCase.textCase1', [
                'chunk' => $chunk,
            ])
        @else
            @include('defaultsite.mobile-v2.pages.detail.components.tiga', ['chunk' => $chunk])
        @endif
    @endforeach
@endsection
