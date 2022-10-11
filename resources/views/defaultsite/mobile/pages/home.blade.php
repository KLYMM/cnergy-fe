@extends('defaultsite.mobile.layouts.ui-main')

@section('content')

{{-- headline --}}    
<div class="main-news-container">
  <figure>
    <a href="{{ Src::detail($headline[0]) }}" aria-label="{{ $headline[0]['news_title'] ?? null }}">
      <div class="image-news">
        @include('image', [
              'source' => $headline[0],
              'size' => '375x208',
              $headline['news_title'] ?? null,
          ])
      </div>
    </a>
  </figure>
  <div class="main-news-deskripsi" >
    <a href="{{ Src::detail($headline[0]) }}" aria-label="{{ $headline[0]['news_title'] ?? null }}"><h3>{{ $headline[0]['news_title'] }}</h3></a>
    <p>{{ Util::date($headline[0]['news_date_publish'], 'ago') }} </p>
    <div class="main-section " style="margin: 0 20px" >
      @if( $headline[0]['news_type'] == 'photonews' )
      <i class="fa-solid fa-camera text-danger"> <span class="photo-list"><a href="{{ Src::detail($headline[0]) }}" >Open Photo </a></span></i>
      @endif 
      @if( $headline[0]['news_type'] == 'video' )
      <i class="fa-brands fa-youtube text-danger" style="width:100%; height:100%;"><span class="video-list" > <a href="{{ Src::detail($headline[0]) }}" >Play Video </a></span> </i>
      @endif
    </div>
  </div>
</div>

{{-- Adds-1 --}}    
@if ($headline[2]['news_id'] ?? null) 
 @include('defaultsite.mobile.components-ui.ads-on')
 @endif 

{{-- trending tag --}}
@include('defaultsite.mobile.components-ui.trending-tag')

{{-- list main news --}}
@if ($headline[0]['news_id'] ?? null)
    @include('defaultsite.mobile.components-ui.list-main-news', ['listnews' => $headline])
@endif

{{-- slider --}}
@if ($headline[0]['news_id'] ?? null)
@include('defaultsite.mobile.components-ui.slider', ['hl' => $headline, 'title' => 'Berita Terbaru'])
@endif

@include('defaultsite.mobile.components-ui.ads-main')

{{-- list main news --}}
@if ($headline[0]['news_id'] ?? null)
    @include('defaultsite.mobile.components-ui.list-main-news', ['listnews' => $headline])
@endif

{{-- slider --}}
@if ($headline[0]['news_id'] ?? null)
@include('defaultsite.mobile.components-ui.slider', ['hl' => $headline, 'title' => 'Berita Terbaru'])
@endif

{{-- list main news --}}
@if ($headline[0]['news_id'] ?? null)
    @include('defaultsite.mobile.components-ui.list-main-news', ['listnews' => $headline])
@endif


@endsection  