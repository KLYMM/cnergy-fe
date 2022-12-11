@extends('defaultsite.mobile-v2.layouts.main-detail')


@section('content')
{{-- @dd($content->chunk(2)) --}}
@include('defaultsite.mobile-v2.pages.detail.components.dua', ['row' => $row])
@foreach ($content->chunk(2) as $chunk)
@if ($loop->odd)
@include('defaultsite.mobile-v2.pages.detail.components.satu', ['chunk' => $chunk])
@else
@include('defaultsite.mobile-v2.pages.detail.components.tiga', ['chunk' => $chunk])
@endif
@endforeach
@endsection
