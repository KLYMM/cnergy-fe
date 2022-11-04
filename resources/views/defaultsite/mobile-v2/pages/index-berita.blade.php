@extends('defaultsite.mobile.layouts.ui-main')

@section('content')

<div class="main-body ">
    <div class="main-article">
        @if( $headline )
        <div class="section section--headline -mx-4">
            <div class="section--headline-top">
                <figure class="item item--headline">
                    <a class="item-img" href="{{ Src::detail($headline) }}" aria-label="{{$headline['news_title']??null}}" >
                        <div class="image-news">
                             @include('image', ['source'=>$headline, 'size'=>'375x208', $headline['news_title']??null])
                        </div>
                       </a>
                    <div class="main-news-deskripsi">
                        <p class="item-desc-time text-10 mb-1">{{ Util::date($headline['news_date_publish'], 'ago') }}</p>
                            <a href="{{\Src::detail($headline)}}"><h3>{{$headline['news_title']??null}}</h3></a>
                        <span class="item-desc-type text-10 mt-4">
                            @if( $headline['news_type'] == 'video' )
                            <i class="icon icon--sm icon--video mr-1"></i> Play Video
                            @endif
                            @if( $headline['news_type'] == 'photonews' )
                            <i class="icon icon--sm icon--photo mr-1"></i> Open Photo
                            @endif
                        </span>
                    </div>
                </figure>
            </div>
        </div>
        @endif

        <div class="section section--infscroll">
            @if( $feed ??null )
                @include( 'defaultsitory'e.mobile.components-ui.list-main-news-index', ['rows'=> $feed,'page'=> 'categ,'data'=> 'headline'])
            @endif
            @if( $latest ??null)
                @include( 'defaultsite.mobile.components-ui.list-main-news-index', ['rows'=> $latest['data'],'page'=> 'category','data'=> 'latest'])
                <!-- <div class="section--infscroll-next flex flex-col items-center justify-end">
                    {{-- <div class="section--infscroll-next-loading"><img src="{{ Src::asset('img/kmk.gif') }}" width="60" height="60" alt="gif"></div> --}}
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

        {{-- slider trending tapi data belum ada --}}
        @if ($popular = \Data::popular() ?? null)
            @include('defaultsite.mobile.components-ui.slider', ['hl' => $popular, 'title' => 'Berita Populer'])
        @endif

        {{--list populer news--}}
        @if ($popular = \Data::popular() ?? null)
            @include('defaultsite.mobile.components-ui.populer-news', ['hl' => $popular])
        @endif

        {{-- slider latest news --}}
        @if ($latest = \Data::latest() ?? null)
            @include('defaultsite.mobile.components-ui.slider', ['hl' => $latest, 'title' => 'Berita Terbaru'])
        @endif


    </div>
</div>
@endsection