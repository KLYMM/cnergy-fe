@extends('defaultsite.mobile.layouts.ui-main')

@section('content')

<div class="main-body">
    <div class="main-article">
        @if( $headline )
        <div class="section section--headline -mx-4">
            <div class="section--headline-top">
                <figure class="item item--headline">
                    <!--
                    <div class="item-vidio">
                        <div class="item-vidio-inner">
                            <iframe class="vidio-embed lazyload" data-src="https://www.vidio.com/embed/2350967-spider-man-homecoming?autoplay=true&player_only=true&live_chat=false&enable_websocket=false&mute=false&" width="560" height="317" scrolling="no" frameborder="0" allowfullscreen allow="encrypted-media *;" title="video"></iframe>
                            <script src="//static-web-prod-vidio.akamaized.net/assets/javascripts/vidio-embed.js"></script>
                        </div>
                    </div> -->
                    <a class="item-img aspect-[16/9]" href="{{ Src::detail($headline) }}" aria-label="{{$headline['news_title']??null}}" >
                        <div class="image-news" >
                            @include('image', [
                                   'source' => $headline,
                                'force' => '375x208',
                                'size' => '375x208',
                                $headline['news_title'] ?? null,
                            ])
                        </div>
                    </a>
                    <figcaption style="margin: 5px 20px;">
                        <span class="publish_category">{{ Util::date($headline['news_date_publish'], 'ago') }}</span>
                        <h1 class="item-desc-title-category ">
                            <a href="{{\Src::detail($headline)}}">{{$headline['news_title']??null}}</a>
                        </h1>
                        <span class="item-desc-type text-10 mt-4">
                            @if( $headline['news_type'] == 'video' )
                            <i class="icon icon--sm icon--video mr-1"></i> Putar Video
                            @endif
                            @if( $headline['news_type'] == 'photonews' )
                            <i class="icon icon--sm icon--photo mr-1"></i> Lihat Foto
                            @endif
                        </span>
                    </figcaption>
                </figure>
                {{-- <div class="channel-ad channel-ad_ad-headline">
                    {!! Util::getAds('headline') !!}
                </div> --}}
            </div>
        </div>
        @endif

        {{-- trending tag --}}
        @if ($latest['attributes']['current_page']==1)
            @include('defaultsite.mobile.components-ui.trending-tag')
        @endif

        <div class="section section--infscroll">
            @if( $feed ??null )
                @include( 'defaultsite.mobile.components-ui.list-main-news-index', ['rows'=> $feed,'page'=> 'category','data'=> 'headline'])
            @endif
            @if( $latest ??null)
                @include( 'defaultsite.mobile.components-ui.list-main-news-index', ['rows'=> $latest['data'],'page'=> 'category','data'=> 'latest'])
                <!-- <div class="section--infscroll-next flex flex-col items-center justify-end">
                    <div class="section--infscroll-next-loading"><img src="{{ Src::asset('img/kmk.gif') }}" width="60" height="60" alt="gif"></div>
                </div> -->
            @endif
        </div>

        <div style="margin: 20px">
              @include( 'defaultsite.mobile.components-ui.pagination',[
                    'current_page'=> $latest['attributes']['current_page'],
                    'last_page'=> $latest['attributes']['last_page'],
                    'slug'=> $slug
                ])
        </div>
    </div>
</div>
@endsection