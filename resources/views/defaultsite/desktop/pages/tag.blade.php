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
            <h1 class="tags-title">{{$tag['name']??null}}</h1>
            {{-- <ul class="tags-menu flex items-center flex-wrap list-none mb-6">
                <li class="tags-menu-item" @click="openTab = 1"><span class="tags-menu-item-link" :class="{'tags-menu-item-link--active' : openTab === 1}">Semua</span></li>
                <li class="tags-menu-item" @click="openTab = 2"><span class="tags-menu-item-link" :class="{'tags-menu-item-link--active' : openTab === 2}">Artikel</span></li>
                <li class="tags-menu-item" @click="openTab = 3"><span class="tags-menu-item-link" :class="{'tags-menu-item-link--active' : openTab === 3}">Video</span></li>
                <li class="tags-menu-item" @click="openTab = 4"><span class="tags-menu-item-link" :class="{'tags-menu-item-link--active' : openTab === 4}">Foto</span></li>
            </ul><hr> --}}

            <div x-show="openTab === 1" class="tags-all mt-8">
                <div class="main-body flex items-start justify-between">
                    <aside class="main-aside">
                        <div class="section section--side-menu">
                            <p class="section-title section-title--tags mb-4">{{$tag['description']??null}}</p>
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
                            {{-- <div class="section--infscroll-list"  x-data="{
                                infscroll: [
                                    {
                                        id: '1',
                                        articles: [
                                            {
                                                id: '1',
                                                type: 'text',
                                                img: 'https://via.placeholder.com/200x112',
                                                tag: 'Galeri',
                                                date: '14 Des 2021',
                                                title: 'Sosok Yamaha MT-15 2019 versi Indonesia',
                                                text: 'Mobil-mobil yang diproduksi dan dipasarkan ke seluruh dunia juga memiliki sesuatu hal yang menarik. Fakta-fakta mobil tersebut bahkan tak disadari.'
                                            },
                                            {
                                                id: '2',
                                                type: 'video',
                                                img: 'https://via.placeholder.com/640x360',
                                                duration: '00:59',
                                                tag: 'Video',
                                                date: '14 Des 2021',
                                                title: 'Sosok Yamaha MT-15 2019 versi Indonesia',
                                            },
                                            {
                                                id: '3',
                                                type: 'text',
                                                img: 'https://via.placeholder.com/200x112',
                                                tag: 'Galeri',
                                                date: '14 Des 2021',
                                                title: 'Sosok Yamaha MT-15 2019 versi Indonesia',
                                                text: 'Mobil-mobil yang diproduksi dan dipasarkan ke seluruh dunia juga memiliki sesuatu hal yang menarik. Fakta-fakta mobil tersebut bahkan tak disadari.'
                                            },
                                            {
                                                id: '4',
                                                type: 'text',
                                                img: 'https://via.placeholder.com/200x112',
                                                tag: 'Text',
                                                date: '14 Des 2021',
                                                title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                                text: 'Mobil-mobil yang diproduksi dan dipasarkan ke seluruh dunia juga memiliki sesuatu hal yang menarik. Fakta-fakta mobil tersebut bahkan tak disadari.'
                                            },
                                            {
                                                id: '5',
                                                type: 'text',
                                                img: 'https://via.placeholder.com/200x112',
                                                tag: 'Galeri',
                                                date: '14 Des 2021',
                                                title: 'Pesona Kecantikan SPG di IMOS 2018',
                                                text: 'Mobil-mobil yang diproduksi dan dipasarkan ke seluruh dunia juga memiliki sesuatu hal yang menarik. Fakta-fakta mobil tersebut bahkan tak disadari.'
                                            },
                                            {
                                                id: '6',
                                                type: 'text',
                                                img: 'https://via.placeholder.com/200x112',
                                                tag: 'Brand',
                                                date: '14 Des 2021',
                                                title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                                text: 'Mobil-mobil yang diproduksi dan dipasarkan ke seluruh dunia juga memiliki sesuatu hal yang menarik. Fakta-fakta mobil tersebut bahkan tak disadari.'
                                            },
                                            {
                                                id: '7',
                                                type: 'text',
                                                img: 'https://via.placeholder.com/200x112',
                                                tag: 'Galeri',
                                                date: '14 Des 2021',
                                                title: 'Sosok Yamaha MT-15 2019 versi Indonesia',
                                                text: 'Mobil-mobil yang diproduksi dan dipasarkan ke seluruh dunia juga memiliki sesuatu hal yang menarik. Fakta-fakta mobil tersebut bahkan tak disadari.'
                                            },
                                            {
                                                id: '8',
                                                type: 'text',
                                                img: 'https://via.placeholder.com/200x112',
                                                tag: 'Text',
                                                date: '14 Des 2021',
                                                title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                                text: 'Mobil-mobil yang diproduksi dan dipasarkan ke seluruh dunia juga memiliki sesuatu hal yang menarik. Fakta-fakta mobil tersebut bahkan tak disadari.'
                                            },
                                            {
                                                id: '9',
                                                type: 'text',
                                                img: 'https://via.placeholder.com/200x112',
                                                tag: 'Galeri',
                                                date: '14 Des 2021',
                                                title: 'Pesona Kecantikan SPG di IMOS 2018',
                                                text: 'Mobil-mobil yang diproduksi dan dipasarkan ke seluruh dunia juga memiliki sesuatu hal yang menarik. Fakta-fakta mobil tersebut bahkan tak disadari.'
                                            },
                                            {
                                                id: '10',
                                                type: 'text',
                                                img: 'https://via.placeholder.com/200x112',
                                                tag: 'Brand',
                                                date: '14 Des 2021',
                                                title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                                text: 'Mobil-mobil yang diproduksi dan dipasarkan ke seluruh dunia juga memiliki sesuatu hal yang menarik. Fakta-fakta mobil tersebut bahkan tak disadari.'
                                            },
                                        ],
                                    }
                                ]
                                }">
                                <template x-for="item in infscroll" :key="item.id">
                                    <div :id="`infscroll-${item.id}`" class="section--infscroll-list-item">
                                        <template x-for="list in item.articles" :key="list.id">
                                            <article :id="list.id" :class="`articles articles--${list.type}`">
                                                <!--text-->
                                                <template x-if="list.type == 'text'">
                                                    <figure class="item item--text flex items-start justify-between">
                                                        <span class="item--text-img"><a href="/" class="item-img aspect-[19/11] rounded-lg"><img class="lazyload" :data-src="list.img" width="200" height="112" alt="image"></a></span>
                                                        <figcaption class="item-desc flex-1 pl-4">
                                                            <div class="item-desc-header text-10 mb-1">
                                                                <a href="/" class="item-desc-tag mr-1" x-text="list.tag"></a> 
                                                                <span class="item-desc-time" x-text="list.date"></span>
                                                            </div>
                                                            <h2 class="item-desc-title text-16 font-bold mb-2"><a href="/" x-text="list.title"></a></h2>
                                                            <p class="item-desc-text" x-text="list.text"></p>
                                                        </figcaption>
                                                    </figure>
                                                </template>

                                                <!--video-->
                                                <template x-if="list.type == 'video'">
                                                    <figure class="item item--video">
                                                        <figcaption class="item-desc pb-4">
                                                            <div class="item-desc-header text-10 mb-1">
                                                                <a href="/" class="item-desc-tag mr-1" x-text="list.tag"></a> 
                                                                <span class="item-desc-time" x-text="list.date"></span>
                                                            </div>
                                                            <h2 class="item-desc-title text-16 font-bold"><a href="/" x-text="list.title"></a></h2>
                                                        </figcaption>
                                                        <a href="/" class="item-img aspect-[16/9] rounded-lg" :data-duration="list.duration"><img class="lazyload" :data-src="list.img" width="640" height="360" alt="image"></a>
                                                    </figure>
                                                </template>
                                            </article>
                                        </template>
                                    </div>
                                </template>
                            </div> --}}
                            @include( 'defaultsite.desktop.components.latest', ['rows'=> $rows])
                        </div>
                            <!--section.pagination-->
                            @include( 'defaultsite.desktop.components.pagination',[
                                'current_page'=> $data['attributes']['current_page'],
                                'last_page'=> $data['attributes']['last_page'],
                                'slug'=> 'tag/'.$tag['slug']
                            ])
                            {{-- <div class="section--pagination mt-8">
                                <ul class="paginationlist list-none flex items-center justify-center">
                                    <li class="paginationlist-item active"><a href="/">1</a></li>
                                    <li class="paginationlist-item"><a href="/">2</a></li>
                                    <li class="paginationlist-item"><a href="/">3</a></li>
                                    <li class="paginationlist-item"><a href="/">4</a></li>
                                    <li class="paginationlist-item"><a href="/">5</a></li>
                                    <li class="paginationlist-item"><a href="/">6</a></li>
                                    <li class="paginationlist-item"><a href="/">7</a></li>
                                    <li class="paginationlist-item"><a href="/">8</a></li>
                                    <li class="paginationlist-item"><a href="/">9</a></li>
                                    <li class="paginationlist-item"><a href="/">LANJUT<svg class="iconSVG ml-1" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg></a></li>
                                    <li class="paginationlist-item"><a href="/">
                                        <svg class="iconSVG" width="10" height="9"  fill="currentColor" viewBox="0 0 10 9" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.959644L3.54038 4.50002L0 8.04041L0.919237 8.95964L4.91924 4.95964L5.37886 4.50002L4.91924 4.04041L0.919237 0.0404053L0 0.959644ZM4 0.959644L7.54038 4.50002L4 8.04041L4.91924 8.95964L8.91924 4.95964L9.37886 4.50002L8.91924 4.04041L4.91924 0.0404053L4 0.959644Z"/></svg>
                                    </a></li>
                                </ul>
                            </div> --}}
                    </div>
                </div>
            </div>
            {{-- <div x-show="openTab === 2" class="tags-article mt-8">
                <div class="main-body flex items-start justify-between">
                    <div class="main-article">
                        <div class="section section--infscroll">
                            <div class="section--infscroll-list"  x-data="{
                                infscroll: [
                                    {
                                        id: '1',
                                        articles: [
                                            {
                                                id: '1',
                                                type: 'text',
                                                img: 'https://via.placeholder.com/200x112',
                                                tag: 'Galeri',
                                                date: '14 Des 2021',
                                                title: 'Sosok Yamaha MT-15 2019 versi Indonesia',
                                                text: 'Mobil-mobil yang diproduksi dan dipasarkan ke seluruh dunia juga memiliki sesuatu hal yang menarik. Fakta-fakta mobil tersebut bahkan tak disadari.'
                                            },
                                            {
                                                id: '2',
                                                type: 'text',
                                                img: 'https://via.placeholder.com/640x360',
                                                duration: '00:59',
                                                tag: 'Galeri',
                                                date: '14 Des 2021',
                                                title: 'Sosok Yamaha MT-15 2019 versi Indonesia',
                                                
                                                text: 'Mobil-mobil yang diproduksi dan dipasarkan ke seluruh dunia juga memiliki sesuatu hal yang menarik. Fakta-fakta mobil tersebut bahkan tak disadari.'
                                            },
                                            {
                                                id: '3',
                                                type: 'text',
                                                img: 'https://via.placeholder.com/200x112',
                                                tag: 'Galeri',
                                                date: '14 Des 2021',
                                                title: 'Sosok Yamaha MT-15 2019 versi Indonesia',
                                                text: 'Mobil-mobil yang diproduksi dan dipasarkan ke seluruh dunia juga memiliki sesuatu hal yang menarik. Fakta-fakta mobil tersebut bahkan tak disadari.'
                                            },
                                            {
                                                id: '4',
                                                type: 'text',
                                                img: 'https://via.placeholder.com/200x112',
                                                tag: 'Text',
                                                date: '14 Des 2021',
                                                title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                                text: 'Mobil-mobil yang diproduksi dan dipasarkan ke seluruh dunia juga memiliki sesuatu hal yang menarik. Fakta-fakta mobil tersebut bahkan tak disadari.'
                                            },
                                            {
                                                id: '5',
                                                type: 'text',
                                                img: 'https://via.placeholder.com/200x112',
                                                tag: 'Galeri',
                                                date: '14 Des 2021',
                                                title: 'Pesona Kecantikan SPG di IMOS 2018',
                                                text: 'Mobil-mobil yang diproduksi dan dipasarkan ke seluruh dunia juga memiliki sesuatu hal yang menarik. Fakta-fakta mobil tersebut bahkan tak disadari.'
                                            },
                                            {
                                                id: '6',
                                                type: 'text',
                                                img: 'https://via.placeholder.com/200x112',
                                                tag: 'Brand',
                                                date: '14 Des 2021',
                                                title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                                text: 'Mobil-mobil yang diproduksi dan dipasarkan ke seluruh dunia juga memiliki sesuatu hal yang menarik. Fakta-fakta mobil tersebut bahkan tak disadari.'
                                            },
                                            {
                                                id: '7',
                                                type: 'text',
                                                img: 'https://via.placeholder.com/200x112',
                                                tag: 'Galeri',
                                                date: '14 Des 2021',
                                                title: 'Sosok Yamaha MT-15 2019 versi Indonesia',
                                                text: 'Mobil-mobil yang diproduksi dan dipasarkan ke seluruh dunia juga memiliki sesuatu hal yang menarik. Fakta-fakta mobil tersebut bahkan tak disadari.'
                                            },
                                            {
                                                id: '8',
                                                type: 'text',
                                                img: 'https://via.placeholder.com/200x112',
                                                tag: 'Text',
                                                date: '14 Des 2021',
                                                title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                                text: 'Mobil-mobil yang diproduksi dan dipasarkan ke seluruh dunia juga memiliki sesuatu hal yang menarik. Fakta-fakta mobil tersebut bahkan tak disadari.'
                                            },
                                            {
                                                id: '9',
                                                type: 'text',
                                                img: 'https://via.placeholder.com/200x112',
                                                tag: 'Galeri',
                                                date: '14 Des 2021',
                                                title: 'Pesona Kecantikan SPG di IMOS 2018',
                                                text: 'Mobil-mobil yang diproduksi dan dipasarkan ke seluruh dunia juga memiliki sesuatu hal yang menarik. Fakta-fakta mobil tersebut bahkan tak disadari.'
                                            },
                                            {
                                                id: '10',
                                                type: 'text',
                                                img: 'https://via.placeholder.com/200x112',
                                                tag: 'Brand',
                                                date: '14 Des 2021',
                                                title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                                text: 'Mobil-mobil yang diproduksi dan dipasarkan ke seluruh dunia juga memiliki sesuatu hal yang menarik. Fakta-fakta mobil tersebut bahkan tak disadari.'
                                            },
                                        ],
                                    }
                                ]
                            }">
                                <template x-for="item in infscroll" :key="item.id">
                                    <div :id="`infscroll-${item.id}`" class="section--infscroll-list-item">
                                        <template x-for="list in item.articles" :key="list.id">
                                            <article :id="list.id" :class="`articles articles--${list.type}`">
                                                <!--text-->
                                                <template x-if="list.type == 'text'">
                                                    <figure class="item item--text flex items-start justify-between">
                                                        <span class="item--text-img"><a href="/" class="item-img aspect-[19/11] rounded-lg"><img class="lazyload" :data-src="list.img" width="200" height="112" alt="image"></a></span>
                                                        <figcaption class="item-desc flex-1 pl-4">
                                                            <div class="item-desc-header text-10 mb-1">
                                                                <a href="/" class="item-desc-tag mr-1" x-text="list.tag"></a> 
                                                                <span class="item-desc-time" x-text="list.date"></span>
                                                            </div>
                                                            <h2 class="item-desc-title text-16 font-bold mb-2"><a href="/" x-text="list.title"></a></h2>
                                                            <p class="item-desc-text" x-text="list.text"></p>
                                                        </figcaption>
                                                    </figure>
                                                </template>
                                            </article>
                                        </template>
                                    </div>
                                </template>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div x-show="openTab === 3" class="tags-video mt-8">
                <div class="main-body flex items-start justify-between">
                    <div class="main-article">
                        <div class="section section--index">
                            <div class="section">
                                <div class="section--infscroll-list" x-data="{
                                    infscroll: [
                                        {
                                            id: '1',
                                            populers: [
                                                {
                                                    title: 'Galeri Mitsubishi Xpander Cross',
                                                    img: 'https://via.placeholder.com/145x82',
                                                    duration: '10:00',
                                                    link: '#'
                                                },
                                                {
                                                    title: 'Galeri Mitsubishi Xpander Cross',
                                                    img: 'https://via.placeholder.com/145x82',
                                                    duration: '10:00',
                                                    link: '#'
                                                },
                                                {
                                                    title: 'Galeri Mitsubishi Xpander Cross',
                                                    img: 'https://via.placeholder.com/145x82',
                                                    duration: '10:00',
                                                    link: '#'
                                                },
                                                {
                                                    title: 'Galeri Mitsubishi Xpander Cross',
                                                    img: 'https://via.placeholder.com/145x82',
                                                    duration: '10:00',
                                                    link: '#'
                                                },
                                                {
                                                    title: 'Galeri Mitsubishi Xpander Cross',
                                                    img: 'https://via.placeholder.com/145x82',
                                                    duration: '10:00',
                                                    link: '#'
                                                },
                                                {
                                                    title: 'Galeri Mitsubishi Xpander Cross',
                                                    img: 'https://via.placeholder.com/145x82',
                                                    duration: '10:00',
                                                    link: '#'
                                                },
                                                {
                                                    title: 'Galeri Mitsubishi Xpander Cross',
                                                    img: 'https://via.placeholder.com/145x82',
                                                    duration: '10:00',
                                                    link: '#'
                                                },
                                                {
                                                    title: 'Galeri Mitsubishi Xpander Cross',
                                                    img: 'https://via.placeholder.com/145x82',
                                                    duration: '10:00',
                                                    link: '#'
                                                },
                                                {
                                                    title: 'Galeri Mitsubishi Xpander Cross',
                                                    img: 'https://via.placeholder.com/145x82',
                                                    duration: '10:00',
                                                    link: '#'
                                                },
                                            ]
                                        },
                                    ]
                                }">
                                    <template x-for="item in infscroll" :key="item.id">
                                        <div :id="`infscroll-${item.id}`" class="section--infscroll-list-item">
                                            <ul class="section--index-grid grid grid-cols-3 gap-4">
                                                <template x-for="populer in item.populers" :key="populer.title">
                                                    <li class="section--index-grid-item">
                                                        <figure class="item">
                                                            <a href="/" class="item-img rounded-lg" :data-duration="populer.duration">
                                                                <i class="icon icon--play icon--big"></i>
                                                                <img class="lazyload" :data-src="populer.img" alt="image" width="145" height="82">
                                                            </a>
                                                            <figcaption class="item-desc pt-2">
                                                                <h2 class="item-desc-title font-bold"><a href="/" x-text="populer.title"></a></h2>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                </template>
                                            </ul>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show="openTab === 4" class="tags-foto mt-8">
                <div class="main-body flex items-start justify-between">
                    <div class="main-article">
                        <div class="section section--index">
                            <ul class="section--index-grid grid grid-cols-3 gap-4" x-data ="{
                                populers: [
                                    {
                                        title: 'Galeri Mitsubishi Xpander Cross',
                                        img: 'https://via.placeholder.com/145x82',
                                        qty: '10',
                                        link: '#'
                                    },
                                    {
                                        title: 'Galeri Mitsubishi Xpander Cross',
                                        img: 'https://via.placeholder.com/145x82',
                                        qty: '10',
                                        link: '#'
                                    },
                                    {
                                        title: 'Galeri Mitsubishi Xpander Cross',
                                        img: 'https://via.placeholder.com/145x82',
                                        qty: '10',
                                        link: '#'
                                    },
                                    {
                                        title: 'Galeri Mitsubishi Xpander Cross',
                                        img: 'https://via.placeholder.com/145x82',
                                        qty: '10',
                                        link: '#'
                                    },
                                    {
                                        title: 'Galeri Mitsubishi Xpander Cross',
                                        img: 'https://via.placeholder.com/145x82',
                                        qty: '10',
                                        link: '#'
                                    },
                                    {
                                        title: 'Galeri Mitsubishi Xpander Cross',
                                        img: 'https://via.placeholder.com/145x82',
                                        qty: '10',
                                        link: '#'
                                    },
                                    {
                                        title: 'Galeri Mitsubishi Xpander Cross',
                                        img: 'https://via.placeholder.com/145x82',
                                        qty: '10',
                                        link: '#'
                                    },
                                    {
                                        title: 'Galeri Mitsubishi Xpander Cross',
                                        img: 'https://via.placeholder.com/145x82',
                                        qty: '10',
                                        link: '#'
                                    },
                                    {
                                        title: 'Galeri Mitsubishi Xpander Cross',
                                        img: 'https://via.placeholder.com/145x82',
                                        qty: '10',
                                        link: '#'
                                    },
                                ]
                            }">
                                <template x-for="populer in populers" :key="populer.title">
                                    <li class="section--index-grid-item">
                                        <figure class="item">
                                            <a href="/" class="item-img rounded-lg" :data-duration="populer.qty">
                                                <img class="lazyload" :data-src="populer.img" alt="image" width="145" height="82">
                                            </a>
                                            <figcaption class="item-desc pt-2">
                                                <h2 class="item-desc-title font-bold"><a href="/" x-text="populer.title"></a></h2>
                                            </figcaption>
                                        </figure>
                                    </li>
                                </template>
                            </ul>  
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</main>
@endsection