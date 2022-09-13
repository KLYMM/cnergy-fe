@extends('defaultsite.mobile.layouts.main')

@section('content')
<div id="v5-content" class=" my-4 mx-3" style="min-height: 80vh; overflow: hidden;">
    <h1 class="dt-title text-30 font-bold mb-4 ">{{$row['title']??null}}</h1>
    <div>{!! htmlspecialchars_decode($row['content']??null)!!}</div>
</div>
@endsection