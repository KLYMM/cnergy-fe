@extends('defaultsite.desktop.layouts.main')
@push('styles')
<style>
    .body-container{
        min-height: 40vh;
    }
</style>
@endpush

@section('content')
<div class="container w-kly px-8 my-5 body-container">
    <h1 class="dt-title text-30 font-bold mb-4">{{$row['title']??null}}</h1>
    <div>{!! htmlspecialchars_decode($row['content']??null)!!}</div>
</div>
@endsection