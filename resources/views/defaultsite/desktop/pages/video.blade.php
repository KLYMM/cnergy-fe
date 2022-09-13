@extends('defaultsite.desktop.layouts.main')

@push('styles')
<style>
    /*! indexAll */.section--topfoto{min-height:389px}.section--topfoto-item{display:grid;grid-template-columns:repeat(4, auto);grid-template-rows:repeat(4, auto);gap:1px}.section--topfoto-item .item-img img{object-fit:cover}.section--topfoto-item .item-img--main{width:761px;height:389px;grid-area:1 / 1 / 4 / 4}.section--topfoto-item .item-img--aside{width:230px;height:129px}.section--topfoto-item .item-img-overlay{position:absolute;left:0;bottom:0;width:100%;height:100%;display:flex;flex-flow:column;justify-content:flex-end;color:var(--color-white);background:linear-gradient(to top, rgba(0,0,0,0.5) 0%, rgba(255,255,255,0) 100%)}.section--topvideo{background-color:var(--bg-gray)}.section--topvideo-top{background-color:#000000;color:var(--color-white)}.section--topvideo-top .item-img{width:640px}.section--topvideo-top .item-desc-date{display:inline-block}.section--topvideo-top .item-desc-text{-webkit-line-clamp:5}.section--topvideo-list{margin:-.5rem}.section--topvideo-list-item{padding:.5rem}
    .main-aside{
        position: unset
    }
</style>
@endpush

@section('content')
<main class="main py-8 pb-16" role="main">
    <div class="container w-kly px-8">

        <ul class="main-breadcrumb flex items-center flex-wrap list-none mb-6">
            <li class="main-breadcrumb-item"><a href="/">Home</a></li>
            <li class="main-breadcrumb-item active"><a href="/video">Video</a></li>
        </ul>

        <div class="main-full mb-8">
            @if( $headline[0]['news_id'] ?? null )
            <div class="section section--topvideo rounded-lg">
                <div class="section--topvideo-top">
                    <figure class="item flex items-start justify-between">
                        <a href="{{ Src::detail($headline[0]) }}" class="item-img aspect-[16/9]">
                            @include('image', ['source'=>$headline[0], 'size'=>'640x360', $headline[0]['news_title']??null])
                        </a>
                        <figcaption class="item-desc p-6 flex-1">
                            <div class="item-desc-header text-10 mb-2">
                                <a href="/" class="item-desc-tag mr-1">TIPS TRIK</a> 
                                {{-- <span class="item-desc-time">5 Menit Lalu</span> --}}
                            </div>
                            <span class="item-desc-date mb-2">{{Util::date($headline[0]['news_date_publish']??null,'long_time')}}</span>
                            <h2 class="item-desc-title text-22 font-bold mb-2"><a href="{{ Src::detail($headline[0]) }}">{{$headline[0]['news_title']??null}}</a></h2>
                            <p class="item-desc-text">{{$headline[0]['news_synopsis']}}</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="section--topvideo-thumbs p-6">
                    <ul class="section--topvideo-list list-none flex">
                            @if ($feed??null)
                                @foreach ($feed as $r)
                                    <li class="section--topvideo-list-item w-1/4">
                                        <figure class="item">
                                            <a href="{{ Src::detail($r) }}" class="item-img aspect-[19/11] rounded-lg" data-duration="{{null}}" style="--bg-black-opacity: transparant;">
                                                <i class="icon icon--play icon--big"></i>
                                                @include('image', ['source'=>$r, 'size'=>'145x82', $r['news_title']??null])
                                            </a>
                                            <figcaption class="item-desc pt-2">
                                                <h2 class="item-desc-title font-bold"><a href="{{ Src::detail($r) }}">{{$r['news_title']??null}}</a></h2>
                                            </figcaption>
                                        </figure>
                                    </li>
                                @endforeach
                            @endif
                    </ul>
                </div>
            </div>
            @endif
        </div>

        <div class="main-body flex items-start justify-between">
            <div class="main-article">

                <div class="section section--index">
                    <h1 class="section-title flex items-center justify-between text-16 mb-4">VIDEO TERBARU 
                        {{-- <a href="/" class="section-title-linkall text-12">Lihat Semua <i class="icon icon--chevronright"></i></a> --}}
                    </h1>
                    @include( 'defaultsite.desktop.components.listvideo', ['rows'=> $latest])

                    {{-- <div class="section section--infscroll">
                        <div class="section--infscroll-list">
                            <div class="section--infscroll-list-item">
                                @include( 'defaultsite.desktop.components.listvideo', ['rows'=> $latest])
                            </div>
                        </div>
                        <div class="section--infscroll-next flex flex-col items-center justify-end">
                            <div class="section--infscroll-next-loading"><img src="{{ Src::asset('img/kmk.gif') }}" width="60" height="60" alt="gif"></div>
                            <div class="section--infscroll-next-btn"><a href="/" class="section--infscroll-next-btn-link">Indeks Berita</a></div>
                        </div>
                    </div> --}}
                </div>
            </div>

            <aside class="main-aside">
                @if (count($popular)>0)
                <div class="section section--index">
                    <h1 class="section-title flex items-center justify-between text-16 mb-4">TRENDING 
                        {{-- <a href="/" class="section-title-linkall text-12">Lihat Semua <i class="icon icon--chevronright"></i></a> --}}
                    </h1>
                    <ul class="section--index-aside list-none">
                        @foreach ($popular as $r)
                        {{-- {{dd($r)}} --}}
                            <li class="section--index-aside-item">
                                <figure class="item item--text flex items-start justify-between">
                                    <span class="item--text-img">
                                        <a href="{{ Src::detail($r) }}" data-duration="{{null}}" aria-label="{{$r['news_title']??null}}" style="--bg-black-opacity: transparant;" class="item-img aspect-[19/11] rounded-lg">
                                            @include('image', ['source'=>$r, 'size'=>'145x82', $r['news_title']??null])
                                        </a>
                                    </span>
                                    <figcaption class="item-desc flex-1 pl-4">
                                        <a href="{{ Src::detail($r) }}" class="item-desc-tag text-10 font-bold">{{$r['category_name']??null}}</a> 
                                        <h2 class="item-desc-title text-12 font-bold"><a href="{{ Src::detail($r) }}" >{{$r['news_title']??null}}</a></h2>
                                    </figcaption>
                                </figure>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </aside>
        </div>
    </div>
</main>
@endsection