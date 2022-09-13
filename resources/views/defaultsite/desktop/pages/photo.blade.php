@extends('defaultsite.desktop.layouts.main')

@push('styles')
<style>
    /*! indexAll */.section--topfoto{min-height:389px}.section--topfoto-item{display:grid;grid-template-columns:repeat(4, auto);grid-template-rows:repeat(4, auto);gap:1px}.section--topfoto-item .item-img img{object-fit:cover}.section--topfoto-item .item-img--main{width:761px;height:389px;grid-area:1 / 1 / 4 / 4}.section--topfoto-item .item-img--aside{width:230px;height:129px}.section--topfoto-item .item-img-overlay{position:absolute;left:0;bottom:0;width:100%;height:100%;display:flex;flex-flow:column;justify-content:flex-end;color:var(--color-white);background:linear-gradient(to top, rgba(0,0,0,0.5) 0%, rgba(255,255,255,0) 100%)}.section--topvideo{background-color:var(--bg-gray)}.section--topvideo-top{background-color:#000000;color:var(--color-white)}.section--topvideo-top .item-img{width:640px}.section--topvideo-top .item-desc-date{display:inline-block}.section--topvideo-top .item-desc-text{-webkit-line-clamp:5}.section--topvideo-list{margin:-.5rem}.section--topvideo-list-item{padding:.5rem}
</style>
@endpush

@section('content')
<main class="main py-8 pb-16" role="main">
    <div class="container w-kly px-8">
        <ul class="main-breadcrumb flex items-center flex-wrap list-none mb-6">
            <li class="main-breadcrumb-item"><a href="/">Home</a></li>
            <li class="main-breadcrumb-item active"><a href="/photo">Foto</a></li>
        </ul>
        <div class="main-full">

            {{-- <div class="section section--trending flex justify-between items-center">
                <h1 class="section-title text-16">TRENDING #</h1>
                <ul class="section--trending-bredcrumb pl-6 text-12 font-bold list-none flex items-center flex-wrap flex-1">
                    <li class="section--trending-bredcrumb-item"><a href="/">COVID-19</a></li>
                    <li class="section--trending-bredcrumb-item"><a href="/"><i class="icon icon--sm icon--checklist mr-1"></i> COVID-INDONESIA</a></li>
                    <li class="section--trending-bredcrumb-item"><a href="/"><i class="icon icon--sm icon--checklist mr-1"></i> SISTEM TRANSPORTASI</a></li>
                    <li class="section--trending-bredcrumb-item"><a href="/">EKSPOR MOBIL</a></li>
                    <li class="section--trending-bredcrumb-item"><a href="/">MOBIL SPORT HONDA</a></li>
                </ul>
            </div> --}}
            
            @if( $headline[0]['news_id'] ?? null )
            <div class="section section--topfoto">
                <div class="section--topfoto-item item rounded-lg">
                    <a href="{{ Src::detail($headline[0]) }}" class="item-img item-img--main" data-duration="{{ count($headline[0]['photonews']??0) }}" aria-label="{{$headline[0]['news_title']??null}}"> 
                        
                        @include('image', ['source'=>$headline[0], 'size'=>'761x389', $headline[0]['news_title']??null])

                        <span class="item-img-overlay p-6">
                            <p class="item-img-overlay-text text-30 font-bold">
                                <span>{{$headline[0]['news_title']??null}}</span> <i class="icon icon--big icon--maxphoto ml-2"></i>
                            </p>
                        </span>
                    </a>
                
                    <a href="{{ Src::detail($headline[1]) }}" class="item-img item-img--aside" data-duration="{{ count($headline[1]['photonews']??0) }}" aria-label="{{$headline[1]['news_title']??null}}">
                        @include('image', ['source'=>$headline[1], 'size'=>'230x129', $headline[1]['news_title']??null])
                        <span class="item-img-overlay p-3 pr-6">
                            <p class="item-img-overlay-text font-bold">{{$headline[1]['news_title']??null}}</p>
                        </span>
                    </a>
                    <a href="{{ Src::detail($headline[2]) }}" class="item-img item-img--aside" data-duration="{{ count($headline[2]['photonews']??0) }}" aria-label="{{$headline[2]['news_title']??null}}">
                        @include('image', ['source'=>$headline[2], 'size'=>'230x129', $headline[2]['news_title']??null])
                        <span class="item-img-overlay p-3 pr-6">
                            <p class="item-img-overlay-text font-bold">{{$headline[2]['news_title']??null}}</p>
                        </span>
                    </a>
                    <a href="{{ Src::detail($headline[3]) }}" class="item-img item-img--aside" data-duration="{{ count($headline[3]['photonews']??0) }}" aria-label="{{$headline[3]['news_title']??null}}">
                        @include('image', ['source'=>$headline[3], 'size'=>'230x129', $headline[3]['news_title']??null])
                        <span class="item-img-overlay p-3 pr-6">
                            <p class="item-img-overlay-text font-bold">{{$headline[3]['news_title']??null}}</p>
                        </span>
                    </a>
                </div>
            </div>
            @endif

            @if (count($popular)>0)
            <div class="section section--index">
                <h1 class="section-title text-16 mb-4">POPULER</h1>
                @include( 'defaultsite.desktop.components.listphoto', ['rows'=> $popular])
            </div>
            @endif
            @if (count($recommendation)>0)
            <div class="section section--index">
                <h1 class="section-title text-16 mb-4">REKOMENDASI</h1>
                @include( 'defaultsite.desktop.components.listphoto', ['rows'=> $recommendation])
            </div>
            @endif
            @if (count($latest)>0)
            <div class="section section--index">
                <h1 class="section-title text-16 mb-4">TERKINI</h1>
                @include( 'defaultsite.desktop.components.listphoto', ['rows'=> $latest])
                {{-- <div class="section section--infscroll">
                    <div class="section--infscroll-list">
                            <div  class="section--infscroll-list-item" id="infscroll-1">
                                @include( 'defaultsite.desktop.components.listphoto', ['rows'=> $latest])
                            </div>
                        </div>
                    <div class="section--infscroll-next flex flex-col items-center justify-end finished">
                        <div class="section--infscroll-next-loading"><img src="{{ Src::asset('img/kmk.gif') }}" width="60" height="60" alt="gif"></div>
                        <div class="section--infscroll-next-btn"><a href="/" class="section--infscroll-next-btn-link">Indeks Berita</a></div>
                    </div>
                </div> --}}
            </div>
            @endif

        </div>
    </div>
</main>
@endsection