@extends('defaultsite.mobile.layouts.main')

@section('content')
@push('styles')
    <link rel="preload" href="{{ Src::mix('css/tag.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ Src::mix('css/tag.css') }}" /></noscript>
    <style>
        .channel-ad_ad-headline{
            margin:15px 0;
            text-align: center;
            display: flex;
            justify-content: center;
        }
    </style>
@endpush

<div class="tags" x-data="{ openTab: 1 }">
    {{-- <ul class="tags-menu flex items-center flex-wrap list-none mb-6 w-full">
        <li class="tags-menu-item" @click="openTab = 1"><span class="tags-menu-item-link" :class="{'tags-menu-item-link--active' : openTab === 1}">Semua</span></li>
        <li class="tags-menu-item" @click="openTab = 2"><span class="tags-menu-item-link" :class="{'tags-menu-item-link--active' : openTab === 2}">Artikel</span></li>
        <li class="tags-menu-item" @click="openTab = 3"><span class="tags-menu-item-link" :class="{'tags-menu-item-link--active' : openTab === 3}">Foto</span></li>
        <li class="tags-menu-item" @click="openTab = 4"><span class="tags-menu-item-link" :class="{'tags-menu-item-link--active' : openTab === 4}">Video</span></li>
    </ul><hr> --}}
    <div x-show="openTab === 1" class="tags-all mt-8">
        <div class="main-body px-4">
            <div class="main-article">
                <div class="section section--tags">
                    <h1 class="section-title section-title--tags mb-4">{{$tag['name']??null}}</h1>
                    <h3 class="mb-4">{{$tag['description']??null}}</h3>
                    <div class="channel-ad channel-ad_ad-headline">
                        {!! Util::getAds('headline') !!}
                    </div>
                    {{-- <div class="accordion" x-data="{selected:null}">
                        <div class="accordion-content relative overflow-hidden transition-all max-h-0 duration-1000" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                            <div class="section--side-menu-foto">
                                <a href="/"><h1 class="section-title text-16 mb-4 text-center">FOTO <i class="icon icon--chevronright"></i></h1></a>
                                <ul class="section--index-grid grid grid-cols-2 gap-4" x-data ="{
                                    populers: [
                                        {
                                            title: 'Galeri Mitsubishi Xpander Cross',
                                            img: 'http://placehold.it/145x82',
                                            qty: '10',
                                            link: '#'
                                        },
                                        {
                                            title: 'Galeri Mitsubishi Xpander Cross',
                                            img: 'http://placehold.it/145x82',
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
                            <div class="section--side-menu-video">
                                <a href="/"><h1 class="section-title text-16 mb-4 mt-4 text-center">VIDEO <i class="icon icon--chevronright"></i></h1></a>
                                <div class="section ">
                                    <ul class="section--index-grid grid grid-cols-2 gap-4" x-data ="{
                                        populers: [
                                            {
                                                title: 'Galeri Mitsubishi Xpander Cross',
                                                img: 'http://placehold.it/145x82',
                                                duration: '10:00',
                                                link: '#'
                                            },
                                            {
                                                title: 'Galeri Mitsubishi Xpander Cross',
                                                img: 'http://placehold.it/145x82',
                                                duration: '10:00',
                                                link: '#'
                                            },
                                        ]
                                    }">
                                        <template x-for="populer in populers" :key="populer.title">
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
                            </div>
                        </div>
                        <button type="button" class="accordion-btn w-full px-8 py-2 text-left border border-red-500 " @click="selected !== 1 ? selected = 1 : selected = null" :class="[selected ? 'mt-6' : 'mt-2']">
                            <div class="accordion-btn-box flex items-center justify-between">
                                <span class="accordion-btn-box-text" x-show="!selected">Tampilkan foto dan video</span>
                                <span class="accordion-btn-box-text" x-show="selected">Tampilkan ringkas</span>
                                <span class="accordion-btn-box-icon"><i class="icon icon--chevronright rotate-90" :class="[selected ? '-rotate-90' : '']"></i></span>
                            </div>
                        </button>
                    </div> --}}
                </div>
                <div class="section section--infscroll">
                    @include( 'defaultsite.mobile.components.latest', ['rows'=> $rows,'page'=> 'tag'])
                    <div class="section--infscroll-next flex flex-col items-center justify-end">
                        <div class="section--infscroll-next-loading"><img src="desktop/assets/kmk.gif" width="60" height="60" alt="gif"></div>
                        {{-- <div class="section--infscroll-next-btn"><a href="/" class="section--infscroll-next-btn-link">Indeks Berita</a></div> --}}
                    </div>
                </div>
                @include( 'defaultsite.mobile.components.pagination',[
                    'current_page'=> $data['attributes']['current_page'],
                    'last_page'=> $data['attributes']['last_page'],
                    'slug'=> 'tag/'.$tag['slug']
                ])
            </div>
        </div>
    </div>
    {{-- <div x-show="openTab === 2" class="tags-article mt-8">
        <div class="main-body px-4">
            <div class="main-article">
                <div class="section section--infscroll">
                    <div class="section--infscroll-list" x-data="{
                        infscroll: [
                            {
                                id: '1',
                                articles: [
                                    {
                                        id: '1',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Sosok Yamaha MT-15 2019 versi Indonesia',
                                    },
                                    {
                                        id: '2',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Sosok Yamaha MT-15 2019 versi Indonesia',
                                    },
                                    {
                                        id: '3',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Sosok Yamaha MT-15 2019 versi Indonesia',
                                    },
                                    {
                                        id: '4',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Sosok Yamaha MT-15 2019 versi Indonesia',
                                    },
                                    {
                                        id: '5',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Sosok Yamaha MT-15 2019 versi Indonesia',
                                    },
                                    {
                                        id: '6',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Text',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '7',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                    {
                                        id: '8',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Brand',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '9',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Sosok Yamaha MT-15 2019 versi Indonesia',
                                    },
                                    {
                                        id: '10',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Sosok Yamaha MT-15 2019 versi Indonesia',
                                    },
                                    {
                                        id: '11',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Text',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '12',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                    {
                                        id: '13',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Brand',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '14',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Sosok Yamaha MT-15 2019 versi Indonesia',
                                    },
                                    {
                                        id: '15',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Text',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '16',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                    {
                                        id: '17',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Brand',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                ],
                            },
                            {
                                id: '2',
                                articles: [
                                    {
                                        id: '1',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Sosok Yamaha MT-15 2019 versi Indonesia',
                                    },
                                    {
                                        id: '2',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Text',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '3',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                    {
                                        id: '4',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Brand',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '5',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Sosok Yamaha MT-15 2019 versi Indonesia',
                                    },
                                    {
                                        id: '6',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Text',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '7',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                    {
                                        id: '8',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Brand',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                ],
                            }
                        ], 
                    }">
                        <template x-for="item in infscroll" :key="item.id">
                            <div :id="`infscroll-${item.id}`" class="section--infscroll-list-item">
                                <template x-for="list in item.articles" :key="list.id">
                                    <article :id="list.id" :class="`articles articles--${list.type}`">
                                        <!--text-->
                                        <template x-if="list.type == 'text'">
                                            <figure class="item item--text flex items-start justify-between">
                                                <figcaption class="item-desc flex-1 pr-4">
                                                    <div class="item-desc-header text-10 mb-1">
                                                        <a href="/" class="item-desc-tag mr-1" x-text="list.tag"></a> 
                                                        <span class="item-desc-time" x-text="list.date"></span>
                                                    </div>
                                                    <h2 class="item-desc-title text-16 font-bold mb-2"><a href="/" x-text="list.title"></a></h2>
                                                </figcaption>
                                                <span class="item--text-img"><a href="/" class="item-img aspect-square rounded-lg"><img class="lazyload" :data-src="list.img" width="85" height="85" alt="image"></a></span>
                                            </figure>
                                        </template>
                                    </article>
                                </template>
                            </div>
                        </template>
                    </div>
                    <div class="section--infscroll-next flex flex-col items-center justify-end">
                        <div class="section--infscroll-next-loading"><img src="desktop/assets/kmk.gif" width="60" height="60" alt="gif"></div>
                        <div class="section--infscroll-next-btn"><a href="/" class="section--infscroll-next-btn-link">Indeks Berita</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div x-show="openTab === 3" class="tags-foto mt-8">
        <div class="main-body px-4">
            <div class="main-article">
                <div class="section section--infscroll">
                    <div class="section--infscroll-list" x-data="{
                        infscroll: [
                            {
                                id: '1',
                                articles: [
                                    {
                                        id: '1',
                                        type: 'galeri',
                                        img: 'http://placehold.it/640x360',
                                        max: '10',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '2',
                                        type: 'galeri',
                                        img: 'http://placehold.it/640x360',
                                        max: '10',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '3',
                                        type: 'galeri',
                                        img: 'http://placehold.it/640x360',
                                        max: '10',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '4',
                                        type: 'galeri',
                                        img: 'http://placehold.it/640x360',
                                        max: '10',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '5',
                                        type: 'galeri',
                                        img: 'http://placehold.it/640x360',
                                        max: '10',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '6',
                                        type: 'galeri',
                                        img: 'http://placehold.it/640x360',
                                        max: '10',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '7',
                                        type: 'galeri',
                                        img: 'http://placehold.it/640x360',
                                        max: '10',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '8',
                                        type: 'galeri',
                                        img: 'http://placehold.it/640x360',
                                        max: '10',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '9',
                                        type: 'galeri',
                                        img: 'http://placehold.it/640x360',
                                        max: '10',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                ],
                            },
                            {
                                id: '2',
                                articles: [
                                    {
                                        id: '1',
                                        type: 'galeri',
                                        img: 'http://placehold.it/640x360',
                                        max: '10',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '2',
                                        type: 'galeri',
                                        img: 'http://placehold.it/640x360',
                                        max: '10',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '3',
                                        type: 'galeri',
                                        img: 'http://placehold.it/640x360',
                                        max: '10',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '4',
                                        type: 'text',
                                        img: 'http://placehold.it/85x85',
                                        tag: 'Brand',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '5',
                                        type: 'galeri',
                                        img: 'http://placehold.it/640x360',
                                        max: '10',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '6',
                                        type: 'galeri',
                                        img: 'http://placehold.it/640x360',
                                        max: '10',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '7',
                                        type: 'galeri',
                                        img: 'http://placehold.it/640x360',
                                        max: '10',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                    {
                                        id: '8',
                                        type: 'galeri',
                                        img: 'http://placehold.it/640x360',
                                        max: '10',
                                        tag: 'Galeri',
                                        date: '14 Des 2021',
                                        title: 'Motor Suzuki Satria F150 Punya Banyak Peminat di Luar Negeri',
                                    },
                                ],
                            }
                        ], 
                    }">
                        <template x-for="item in infscroll" :key="item.id">
                            <div :id="`infscroll-${item.id}`" class="section--infscroll-list-item">
                                <template x-for="list in item.articles" :key="list.id">
                                    <article :id="list.id" :class="`articles articles--${list.type}`">

                                        <!--galeri-->
                                        <template x-if="list.type == 'galeri'">
                                            <figure class="item item--galeri">
                                                <a href="/" class="item-img aspect-[16/9] rounded-lg">
                                                    <img class="lazyload" :data-src="list.img" width="640" height="360" alt="image">
                                                    <span class="item-img-info">
                                                        <i class="icon icon--maxphoto mr-1"></i>
                                                        <span x-text="list.max"></span>
                                                    </span>
                                                </a>
                                                <figcaption class="item-desc pt-4">
                                                    <div class="item-desc-header text-10 mb-2">
                                                        <a href="/" class="item-desc-tag mr-1" x-text="list.tag"></a> 
                                                        <span class="item-desc-time" x-text="list.date"></span>
                                                    </div>
                                                    <h2 class="item-desc-title text-16 font-bold"><a href="/" x-text="list.title"></a></h2>
                                                </figcaption>
                                            </figure>
                                        </template>

                                    </article> 
                                </template>
                            </div>
                        </template>
                    </div>
                    <div class="section--infscroll-next flex flex-col items-center justify-end">
                        <div class="section--infscroll-next-loading"><img src="desktop/assets/kmk.gif" width="60" height="60" alt="gif"></div>
                        <div class="section--infscroll-next-btn"><a href="/" class="section--infscroll-next-btn-link">Indeks Berita</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div x-show="openTab === 4" class="tags-video mt-8">
        <div class="main-body px-4">
            <div class="main-article">
                <div class="section section--infscroll">
                    <div class="section--infscroll-list" x-data="{
                        infscroll: [
                            {
                                id: '1',
                                articles: [
                                    {
                                        id: '1',
                                        type: 'video',
                                        img: 'http://placehold.it/640x360',
                                        duration: '00:59',
                                        tag: 'Video',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                    {
                                        id: '2',
                                        type: 'video',
                                        img: 'http://placehold.it/640x360',
                                        duration: '00:59',
                                        tag: 'Video',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                    {
                                        id: '3',
                                        type: 'video',
                                        img: 'http://placehold.it/640x360',
                                        duration: '00:59',
                                        tag: 'Video',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                    {
                                        id: '4',
                                        type: 'video',
                                        img: 'http://placehold.it/640x360',
                                        duration: '00:59',
                                        tag: 'Video',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                    {
                                        id: '5',
                                        type: 'video',
                                        img: 'http://placehold.it/640x360',
                                        duration: '00:59',
                                        tag: 'Video',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                    {
                                        id: '6',
                                        type: 'video',
                                        img: 'http://placehold.it/640x360',
                                        duration: '00:59',
                                        tag: 'Video',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                    {
                                        id: '7',
                                        type: 'video',
                                        img: 'http://placehold.it/640x360',
                                        duration: '00:59',
                                        tag: 'Video',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                    {
                                        id: '8',
                                        type: 'video',
                                        img: 'http://placehold.it/640x360',
                                        duration: '00:59',
                                        tag: 'Video',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                ],
                            },
                            {
                                id: '2',
                                articles: [
                                    {
                                        id: '1',
                                        type: 'video',
                                        img: 'http://placehold.it/640x360',
                                        duration: '00:59',
                                        tag: 'Video',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                    {
                                        id: '2',
                                        type: 'video',
                                        img: 'http://placehold.it/640x360',
                                        duration: '00:59',
                                        tag: 'Video',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                    {
                                        id: '3',
                                        type: 'video',
                                        img: 'http://placehold.it/640x360',
                                        duration: '00:59',
                                        tag: 'Video',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                    {
                                        id: '4',
                                        type: 'video',
                                        img: 'http://placehold.it/640x360',
                                        duration: '00:59',
                                        tag: 'Video',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                    {
                                        id: '5',
                                        type: 'video',
                                        img: 'http://placehold.it/640x360',
                                        duration: '00:59',
                                        tag: 'Video',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                    {
                                        id: '6',
                                        type: 'video',
                                        img: 'http://placehold.it/640x360',
                                        duration: '00:59',
                                        tag: 'Video',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                    {
                                        id: '7',
                                        type: 'video',
                                        img: 'http://placehold.it/640x360',
                                        duration: '00:59',
                                        tag: 'Video',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                    {
                                        id: '8',
                                        type: 'video',
                                        img: 'http://placehold.it/640x360',
                                        duration: '00:59',
                                        tag: 'Video',
                                        date: '14 Des 2021',
                                        title: 'Pesona Kecantikan SPG di IMOS 2018',
                                    },
                                ],
                            }
                        ], 
                    }">
                        <template x-for="item in infscroll" :key="item.id">
                            <div :id="`infscroll-${item.id}`" class="section--infscroll-list-item">
                                <template x-for="list in item.articles" :key="list.id">
                                    <article :id="list.id" :class="`articles articles--${list.type}`">

                                        <!--video-->
                                        <template x-if="list.type == 'video'">
                                            <figure class="item item--video">
                                                <a href="/" class="item-img aspect-[16/9] rounded-lg">
                                                    <img class="lazyload" :data-src="list.img" width="640" height="360" alt="image">
                                                    <span class="item-img-info">
                                                        <span x-text="list.duration"></span>
                                                    </span>
                                                </a>
                                                <figcaption class="item-desc pt-4">
                                                    <div class="item-desc-header text-10 mb-1">
                                                        <a href="/" class="item-desc-tag mr-1" x-text="list.tag"></a> 
                                                        <span class="item-desc-time" x-text="list.date"></span>
                                                    </div>
                                                    <h2 class="item-desc-title text-16 font-bold"><a href="/" x-text="list.title"></a></h2>
                                                </figcaption>
                                            </figure>
                                        </template>
                                    </article>
                                    
                                </template>
                            </div>
                        </template>
                    </div>
                    <div class="section--infscroll-next flex flex-col items-center justify-end">
                        <div class="section--infscroll-next-loading"><img src="desktop/assets/kmk.gif" width="60" height="60" alt="gif"></div>
                        <div class="section--infscroll-next-btn"><a href="/" class="section--infscroll-next-btn-link">Indeks Berita</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>

{{-- <div class="main-body px-4">
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
                    <a class="item-img aspect-[16/9]" href="{{ Src::detail($headline) }}" aria-label="{{$headline['news_title']}}">
                        @include('image', ['source'=>$headline, 'size'=>'375x208', $headline['news_title']??null])
                    </a>
                    <figcaption class="item-desc p-4">
                        <span class="item-desc-time text-10 mb-1">{{ Util::date($headline['news_date_publish'], 'ago') }}</span>
                        <h1 class="item-desc-title text-20 font-bold">
                            <a href="{{Src::detail($headline)}}">{{$headline['news_title']??null}}</a>
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
            </div>
        </div>
        @endif
        
        @if( $feed )
        <div class="section section--infscroll">
            
            @include( 'defaultsite.mobile.components.latest', ['rows'=> $feed])

            <div class="section--infscroll-next flex flex-col items-center justify-end">
                <div class="section--infscroll-next-loading"><img src="{{ Src::asset('img/kmk.gif') }}" width="60" height="60" alt="gif"></div>
            </div>
        </div>
        @endif

    </div>
</div> --}}
@endsection