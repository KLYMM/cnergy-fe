@extends('defaultsite.desktop.layouts.main')

@push('preload')
@if( $headline[0]['news_id'] ?? null )
    <link rel="preload" as="image" href="{{ Src::imgNewsCdn($headline[0]??null, '640x360', 'webp') }}" />
@endif
@endpush

@section('content')
<main class="main py-8 pb-16" role="main">
    <div class="container w-kly px-8">
        <div class="main-body flex items-start justify-between">
            <div class="main-article">
                @if( $headline[0]['news_id'] ?? null )
                <div class="section section--headline rounded-border">
                    <div class="section--headline-top">
                        <figure class="item item--headline">
                            <a class="item-img aspect-[16/9]" href="{{ Src::detail($headline[0]) }}" aria-label="{{$headline[0]['news_title']??null}}">
                                
                                @include('image', ['source'=>$headline[0], 'size'=>'640x360', $headline[0]['news_title']??null])
                                
                                @if( $headline[0]['news_type'] == 'photonews' )
                                <span class="item-img-info">
                                    <i class="icon icon--photo icon--white mr-1"></i> Lihat Foto
                                </span>
                                @endif
                                @if( $headline[0]['news_type'] == 'video' )
                                <span class="item-img-info">
                                    <i class="icon icon--video icon--white mr-1"></i> Putar Video
                                </span>
                                @endif
                                
                            </a>
                            <figcaption class="item-desc p-6">
                                <span class="item-desc-time text-12 mb-1">{{ Util::date($headline[0]['news_date_publish'], 'ago') }}</span>
                                <h1 class="item-desc-title font-black text-28 mb-2"><a href="{{Src::detail($headline[0])}}">{{$headline[0]['news_title']??null}}</a></h1>
                                <p class="item-desc-text">{{$headline[0]['news_synopsis']}}</p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="section--headline-thumbs py-6 mx-6">
                        <h1 class="section-title text-16 mb-4">BERITA UTAMA LAINNYA</h1>
                        <div class="section-swiper section--headline-thumbs-swiper">
                            <div class="swiper" >
                                <div class="swiper-wrapper">
                                    <!-- <template x-for="x in headline" :key="x.id"> -->
                                    @if( $feed )
                                        @foreach( $feed as $r )
                                        <div class="swiper-slide">                                            
                                            <figure class="item">
                                                <a href="{{ Src::detail($r) }}" aria-label="{{ $r['news_title']??'untitled' }}">
                                                    <span class="item-img aspect-[19/11] rounded-lg">
                                                        @include('image', ['source'=>$r, 'size'=>'200x112', $r['news_title']??null])
                                                    </span>
                                                    <figcaption class="item-desc pt-2">
                                                        <div class="item-desc-header text-10 mb-1">
                                                            <!-- <template x-if="x.icon"> -->
                                                            @if( $r['news_type'] == 'photonews' )
                                                                <i class="icon icon--photo mr-1"></i> 
                                                            @endif
                                                            @if( $r['news_type'] == 'video' )
                                                                <i class="icon icon--video mr-1"></i> 
                                                            @endif
                                                            <!-- </template> -->
                                                            <span class="item-desc-time">{{ Util::date($r['news_date_publish'], 'ago') }}</span>
                                                        </div>
                                                        <h2 class="item-desc-title font-bold">{{ $r['news_title']??null }}</h2>
                                                    </figcaption>
                                                </a>
                                            </figure>                                            
                                        </div>
                                        @endforeach
                                    @endif
                                    <!-- </template> -->
                                </div>
                            </div>
                            <div class="swiper-button swiper-button-next"></div>
                            <div class="swiper-button swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="section section--infscroll">
                    
                    <!-- @include('defaultsite/desktop/components/latest', ['rows'=>$feed]) -->
                    @include('defaultsite/desktop/components/latest', ['rows'=>$latest])

                    <div class="section--infscroll-next flex flex-col items-center justify-end">
                        <div class="section--infscroll-next-loading"><img class="lazyload" data-src="{{ Src::asset('img/kmk.gif') }}" width="60" height="60" alt="gif"></div>
                    </div>
                </div>
                <div class="container-index"><a href="/index-berita" class="index-berita">Indeks Berita</a></div>
                
            </div>


            @include('defaultsite/desktop/components/aside',['reference'=>null])
        </div>
    </div>
</main>
@endsection