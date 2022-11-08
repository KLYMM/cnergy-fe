@extends('defaultsite.mobile-v2.layouts.main')

@section('content')
    <div id="v5-content" class=" my-4 mx-4" style="min-height: 80vh; overflow: hidden; ">
        <h1 class="dt-title text-30 font-bold mb-4 " style="text-align: center">{{ $row['title'] ?? null }}</h1>
        <div style="text-align: justify; line-height: 2.5em; ">{!! htmlspecialchars_decode($row['content'] ?? null) !!}</div>
    </div>
@endsection
