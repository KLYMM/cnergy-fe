@extends('defaultsite.mobile.layouts.ui-main')



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
            <li class="main-breadcrumb-item "><a href="#" style="color: red">Foto</a></li>
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
                    <div  class="item-desc-type-foto text-10 mt-2 " style="color: white" >
                        @if( $headline[0]['news_type'] == 'photonews' )
                        <i class="fa-solid fa-camera"><span class="photo-list">Open Photo</span></i>
                        @endif
                    </div>
                </div>
            </div>
          </div>
          @endif

        <div class="py-3">
            @include('defaultsite.mobile.components-ui.ads-on')
        </div>

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