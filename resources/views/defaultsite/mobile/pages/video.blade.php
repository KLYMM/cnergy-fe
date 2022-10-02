@extends('defaultsite.mobile.layouts.ui-main')

{{-- @push('styles')
<style>
    .channel-ad_ad-headline{
        margin:15px 0;
        text-align: center;
        display: flex;
        justify-content: center;
    }
</style>
@endpush --}}

{{-- @push('preload')
@if( $headline[0]['news_id'] ?? null )
<link rel="preload" as="image" href="{{ Src::imgNewsCdn($headline[0], '375x208', 'webp') }}" />
@endif
@endpush --}}

@section('content')
<ul class="main-breadcrumb" style="margin:20px;">
    <li class="main-breadcrumb-item"><a href="/">Home</a></li>
    {{-- @foreach ($headline['news_category'] as $r) --}}
        {{-- @if ($loop->iteration==1) --}}
            <li class="main-breadcrumb-item "><a href="#" style="color: red">Video</a></li>
        {{-- @elseif($loop->iteration==2)
            <li class="main-breadcrumb-item {{$loop->count==2?'active':''}}"><a href="{{ url(( $row['news_category'][0]['url']??'' ).'/'.( $row['news_category'][1]['url']??'' )) }}">{{$r['name']??null}}</a></li>
        @elseif($loop->iteration==3)
            <li class="main-breadcrumb-item {{$loop->count==3?'active':''}}"><a href="{{ url(( $row['news_category'][0]['url']??'' ).'/'.( $row['news_category'][1]['url']??'' ).'/'.( $row['news_category'][2]['url']??'' )) }}">{{$r['name']??null}}</a></li> --}}
        {{-- @endif --}}
    {{-- @endforeach --}}
</ul>
{{-- <div class="channel-ad channel-ad_ad-headline">
    {!! Util::getAds('headline') !!}
</div> --}}

<div class="main-body ">
    <div class="main-article">
        @if( $headline[0]['news_id'] ?? null )
        <div class="main-news-container photo-container">
            <div class="photo-container">
                <a href="{{ Src::detail($headline[0]) }}" aria-label="{{ $headline[0]['news_title'] ?? null }}">
                    <div class="image-news" >
                    @include('image', [
                            'source' => $headline[0],
                            'size' => '375x208',
                            $headline['news_title'] ?? null,
                        ])
                    </div>
                </a>
                <div class="item-desc-photo text-white" >
                    <p class="photo-desc-date">{{ Util::date($headline[0]['news_date_publish'], 'ago') }} </p>
                    <a href="{{ Src::detail($headline[0]) }}" aria-label="{{ $headline[0]['news_title'] ?? null }}"><p class="photo-desc-p">{{ $headline[0]['news_title'] }}</p></a>
                    <div  class="item-desc-type-foto d-flex text-10 mt-3 " style="color: white" >
                        @if( $headline[0]['news_type'] == 'video' )
                        <i class="fa-brands fa-youtube" style="width:100%; height:100%;"><span class="video-list">Putar Video</span></i>
                        @endif
                    </div>
                </div>
            </div>
          </div>
          @endif
        {{-- @if( $headline[0]['news_id'] ?? null )
        <div class="section section--headline -mx-4">
            <div class="section--headline-top">
                <figure class="item item--headline">
                   <a class="item-img aspect-[16/9]" href="{{ Src::detail($headline[0]) }}" aria-label="{{$headline[0]['news_title']??null}}">
                        @include('image', ['source'=>$headline[0], 'size'=>'375x208', $headline[0]['news_title']??null])
                    </a>
                    <figcaption class="item-desc p-4">
                        <span class="item-desc-time text-10 mb-1">{{ Util::date($headline[0]['news_date_publish'], 'ago') }}</span>
                        <h1 class="item-desc-title text-20 font-bold">
                            <a href="{{Src::detail($headline[0])}}">{{$headline[0]['news_title']??null}}</a>
                        </h1>
                        <span class="item-desc-type text-10 mt-4">
                            @if( $headline[0]['news_type'] == 'video' )
                            <i class="icon icon--sm icon--video mr-1"></i> Putar Video
                            @endif
                            @if( $headline[0]['news_type'] == 'photonews' )
                            <i class="icon icon--sm icon--photo mr-1"></i> Lihat Foto
                            @endif
                        </span>
                    </figcaption>
                </figure>
            </div>
        </div>
        @endif --}}
        <div class="py-3">
            @include('defaultsite.mobile.components-ui.ads-on')
        </div>

        @if( $feed )
            @include( 'defaultsite.mobile.components-ui.listvideo', ['rows'=> $feed,'page'=> 'homepage','data'=> 'headline'])
        @endif
        @if( $popular )
            @include( 'defaultsite.mobile.components-ui.listvideo', ['rows'=> $popular,'page'=> 'homepage','data'=> 'popular'])
        @endif
        @if( $latest )
            @include( 'defaultsite.mobile.components-ui.listvideo', ['rows'=> $latest,'page'=> 'homepage','data'=> 'latest'])
        @endif
        {{-- @if( $feed )
            @include( 'defaultsite.mobile.components.listvideo', ['rows'=> $feed,'page'=> 'homepage','data'=> 'headline'])
        @endif
        @if( $popular )
            @include( 'defaultsite.mobile.components.listvideo', ['rows'=> $popular,'page'=> 'homepage','data'=> 'latest'])
        @endif
        @if( $latest )
            @include( 'defaultsite.mobile.components.listvideo', ['rows'=> $latest,'page'=> 'homepage','data'=> 'latest'])
        @endif --}}
        {{-- <div class="section section--infscroll">
            <div class="section--infscroll-next flex flex-col items-center justify-end">
                <div class="section--infscroll-next-loading"><img class="lazyload" data-src="{{ Src::asset('img/kmk.gif') }}" width="60" height="60" alt="gif"></div>
                <div class="section--infscroll-next-btn"><a href="/" class="section--infscroll-next-btn-link">Indeks Berita</a></div>
            </div>
        </div> --}}
    </div>
</div>
@endsection