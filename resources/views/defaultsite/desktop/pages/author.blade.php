@extends('defaultsite.desktop.layouts.main')

@section('content')
@push('styles')
    <link rel="preload" href="{{ Src::mix('css/tag.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ Src::mix('css/tag.css') }}" /></noscript>
    <style>
        .channel-ad_ad-sc,.channel-ad_ad-sc2,.channel-ad_ad-hl{
            margin-top:15px;
            margin-bottom:15px;
        }
        .main-aside{
            position: unset
        }
    </style>
@endpush
<main class="main py-8 pb-16" role="main">
    <div class="container w-kly px-8">
        <div class="tags" x-data="{ openTab: 1 }">
            <h1 class="tags-title">{{ucwords($author[0])??null}}</h1>

            <div x-show="openTab === 1" class="tags-all mt-8">
                <div class="main-body flex items-start justify-between">
                    <aside class="main-aside">
                        <div class="section section--side-menu">
                            <p class="section-title section-title--tags mb-4"></p>
                            <div class="channel-ad channel-ad_ad-sc">
                                {!! Util::getAds('showcase-1') !!}
                            </div>
                            @if (count($photo)>0)
                                <div class="section--side-menu-foto">
                                    <a href="/"><h1 class="section-title text-16 mb-4">FOTO <i class="icon icon--chevronright"></i></h1></a>
                                    <ul class="section--index-grid grid grid-cols-2 gap-4">
                                        @foreach ($photo as $r)
                                            <li class="section--index-grid-item">
                                                <figure class="item">
                                                    <a href="{{ Src::detail($r) }}" class="item-img rounded-lg" data-duration="{{ count($r['photonews']??[])!=0?count($r['photonews']):($r['photonews_count']??0) }}" aria-label="{{$r['news_title']??null}}">
                                                        @include('image', ['source'=>$r, 'size'=>'145x82', $r['news_title']??null])
                                                    </a>
                                                    <figcaption class="item-desc pt-2">
                                                        <h2 class="item-desc-title font-bold"><a href="{{ Src::detail($r) }}" >{{$r['news_title']??null}}</a></h2>
                                                    </figcaption>
                                                </figure>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (count($video)>0)
                            <div class="section--side-menu-video">
                                <a href="/"><h1 class="section-title text-16 mb-4">VIDEO <i class="icon icon--chevronright"></i></h1></a>
                                <ul class="section--index-grid grid grid-cols-2 gap-4">
                                    @foreach ($video as $r)
                                        <li class="section--index-grid-item">
                                            <figure class="item">
                                                <a href="{{ Src::detail($r) }}" class="item-img rounded-lg" data-duration="{{null}}" aria-label="{{$r['news_title']??null}}" style="--bg-black-opacity: transparant;">
                                                    <i class="icon icon--play icon--big"></i>
                                                    @include('image', ['source'=>$r, 'size'=>'145x82', $r['news_title']??null])
                                                </a>
                                                <figcaption class="item-desc pt-2">
                                                    <h2 class="item-desc-title font-bold"><a href="{{ Src::detail($r) }}" >{{$r['news_title']??null}}</a></h2>
                                                </figcaption>
                                            </figure>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="channel-ad channel-ad_ad-hl">
                                {!! Util::getAds('half-page') !!}
                            </div>
                            <div class="channel-ad channel-ad_ad-sc2">
                                {!! Util::getAds('showcase-2') !!}
                            </div>
                            
                        </div>
                    </aside>
                    <div class="main-article">
                        <div class="section section--infscroll">
                            @include( 'defaultsite.desktop.components.latest', ['rows'=> $rows])
                        </div>
                            <!--section.pagination-->
                            @include( 'defaultsite.desktop.components.pagination',[
                                'current_page'=> $data['attributes']['current_page'],
                                'last_page'=> $data['attributes']['last_page'],
                                'slug'=> 'author/'.$idAuthor.'/'.Str::slug($author[0])
                            ])
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection