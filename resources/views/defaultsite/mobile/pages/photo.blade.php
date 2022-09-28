@extends('defaultsite.mobile.layouts.ui-main')

{{-- @push('styles')
<style>
    .channel-ad_ad-headline{
        margin:15px 0;
        text-align: center;
        display: flex;
        justify-content: center;
    }
    .channel-ad_ad-sc,.channel-ad_ad-sc-2,.channel-ad_ad-exposer{
        margin:15px 0;
    }
</style>
@endpush --}}

{{-- @push('preload')
@if( $headline[0]['news_id'] ?? null )
<link rel="preload" as="image" href="{{ Src::imgNewsCdn($headline[0], '375x208', 'webp') }}" />
@endif
@endpush --}}

@section('content')
{{-- <div class="channel-ad channel-ad_ad-headline">
    {!! Util::getAds('headline') !!}
</div> --}}
<div class="main-body px-4">
    <div class="main-article">
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
        {{-- <div class="channel-ad channel-ad_ad-sc">
            {!! Util::getAds('showcase-1') !!}
        </div> --}}
        @if( $feed )
            @include( 'defaultsite.mobile.components-ui.listphoto', ['rows'=> $feed,'page'=> 'homepage','data'=> 'headline'])
        @endif
        @if( $popular )
            @include( 'defaultsite.mobile.components-ui.listphoto', ['rows'=> $popular,'page'=> 'homepage','data'=> 'popular'])
        @endif
        @if( $recommendation )
            @include( 'defaultsite.mobile.components-ui.listphoto', ['rows'=> $recommendation,'page'=> 'homepage','data'=> 'recommendation'])
        @endif
        @if( $latest )
            @include( 'defaultsite.mobile.components-ui.listphoto', ['rows'=> $latest,'page'=> 'homepage','data'=> 'latest'])
        @endif 
        {{-- <div class="section section--infscroll">
            <div class="section--infscroll-next flex flex-col items-center justify-end">
                <div class="section--infscroll-next-loading"><img class="lazyload" data-src="{{ Src::asset('img/kmk.gif') }}" width="60" height="60" alt="gif"></div>
                <div class="section--infscroll-next-btn"><a href="/" class="section--infscroll-next-btn-link">Indeks Berita</a></div>
            </div>
        </div> --}}
    </div>
</div>
@endsection