@extends('defaultsite.mobile.layouts.main')

@push('preload')
<link rel="preload" as="image" href="{{ Src::imgNewsCdn($row, '375x208', 'webp') }}" />
{!! RecaptchaV3::initJs() !!}
@endpush

@push('styles')
<link rel="preload" href="{{ Src::mix('css/detail.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ Src::mix('css/detail.css') }}" /></noscript>
<style>
    .swiper-pagination{
        position: relative;
    }
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
@endpush

@if( config('app.enabled_tracking') )
    @push('script')
    <script>
        var url = '{{ str_replace('api', 'analytics', config('app.api_url')) }}/jsview2/';
        var xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('{!! http_build_query(['url'=>Src::detail($row??null), 'platform'=>config('site.device')=='mobile'?'m':'www']) !!}');
    </script>
    @endpush
@endif

@push('script')
<script>
// To trigger the Event
window.addEventListener('load', function(){
    document.dispatchEvent(new Event("hyperlocal:load"));
});
</script>
@endpush

@section('content')

<div class="channel-ad channel-ad_ad-headline">
    {!! Util::getAds('headline') !!}
</div>

<ul class="main-breadcrumb flex items-center flex-wrap list-none m-4">
    <li class="main-breadcrumb-item"><a href="/">Home</a></li>
    @foreach ($row['news_category'] as $r)
        @if ($loop->iteration==1)
            <li class="main-breadcrumb-item {{$loop->count==1?'active':''}}"><a href="{{ Src::category($row) }}">{{$r['name']??null}}</a></li>
        @elseif($loop->iteration==2)
            <li class="main-breadcrumb-item {{$loop->count==2?'active':''}}"><a href="{{ url(( $row['news_category'][0]['url']??'' ).'/'.( $row['news_category'][1]['url']??'' )) }}">{{$r['name']??null}}</a></li>
        @elseif($loop->iteration==3)
            <li class="main-breadcrumb-item {{$loop->count==3?'active':''}}"><a href="{{ url(( $row['news_category'][0]['url']??'' ).'/'.( $row['news_category'][1]['url']??'' ).'/'.( $row['news_category'][2]['url']??'' )) }}">{{$r['name']??null}}</a></li>
        @endif
    @endforeach
</ul>
<div class="main-body px-4">
    <div class="main-article">
        <div class="dt">
            <div class="dt-pages">
                <div class="dt-pages-item">
                    <div class="dt-header">
                        <h1 class="dt-title text-24 font-black mb-1">{{$row['news_title']??null}}</h1>
                        <div class="dt-info mb-4">
                            <span class="dt-info-detail text-12">Oleh <a class="dt-info-link" href="{{ Src::author($row) }}">{{$row['news_editor'][0]['name']??null}}</a> pada {{Util::date($row['news_date_publish']??null,'long_time')}}</span>
                        </div>
                    </div>
                    <div class="dt-body">
                        <div class="dt-body-pages">
                            <div id="pages-intro" class="dt-body-pages-item">
                                <div class="dt-paragraph">
                                    <p>{{$row['news_synopsis']??null}}</p>
                                </div>
                                <div class="dt-photo -mx-4">
                                    <div class="swiper mb-6">
                                        <div class="swiper-wrapper">
                                            @if (count($row['photonews']??[])>0))
                                            @foreach ($row['photonews'] as $r)
                                                <div class="swiper-slide">
                                                    <a href="{{ Src::detail($r) }}">
                                                        <figure class="item">
                                                            <span class="item-img aspect-[9/5]">
                                                                @include('image', ['source'=>$r, 'size'=>'375x208', $r['news_title']??null])
                                                            </span>
                                                        </figure>
                                                    </a>
                                                </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        {{-- <span class="dt-photo-desc px-4 py-2 text-12 text-white">Spyshot Yamaha Nmax facelift (Facebook.com/ Yachya Doank)</p>
                                        </span> --}}
                                        <div class="swiper-pagination p-4 text-16"></div>
                                    </div>
                                </div>
                                <span id="photonews-data" data-page="{{$row['current_page']??1}}" data-url="{{Src::detail($row)}}"></span>
                                <div class="dt-share">
                                    <div class="share flex flex-wrap items-center mb-4">
                                        <div class="share-item share-item--fb"><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current() .'?utm_source=Mobile&utm_medium=facebook&utm_campaign=Share_Bottom' )}}" target="_blank"><i class="icon icons--share icon--share-fb"></i></a></div>
                                        <div class="share-item share-item--wa"><a href="https://wa.me/?text={{ urlencode(url()->current() .'?utm_source=Mobile&utm_medium=whatsapp&utm_campaign=Share_Bottom' )}}" target="_blank"><i class="icon icons--share icon--share-wa"></i></a></div>
                                        <div class="share-item share-item--tweet"><a href="https://twitter.com/intent/tweet?u={{ urlencode(url()->current() .'?utm_source=Mobile&utm_medium=twitter&utm_campaign=Share_Bottom' )}}" target="_blank"><i class="icon icons--share icon--share-tweet"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($row['news_tag']??null)
                            <div class="dt-box dt-box--tag" x-data="{ open: false }">
                                <h2 class="text-16 font-bold mb-4" >Tag Terkait</h2>
                                <ul class="section--trending-bredcrumb list-none flex items-center flex-wrap flex-1" :class="open ? 'show' : ''">
                                        @foreach ($row['news_tag'] as $r)
                                            <li class="section--trending-bredcrumb-item"><a href="{{Src::detailTag($r)}}">{{$r['tag_name']??null}}</a></li>
                                            @if ( $loop->index ==3)
                                                <li class="section--trending-bredcrumb-item" id="more_tag" x-show="!open" @click="open = ! open"><span>More Tag</span></li>
                                            @endif
                                        @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="section section--report">
                            <button data-toggle-open="rModal" class="btn btn--report py-3 px-4 border rounded-md inline-block"><img class="object-contain inline-block -mt-1 mr-1" src="{{ Src::asset('img/error.e43b81ee4b1c02e23191db01caefee9e.svg') }}" width="15" height="17"> LAPORKAN ARTIKEL</button> 
                        </div>
                
                        <div data-toggle="rModal" class="modal section--report">
                            <div class="modal-inner">
                                <div class="modal-inner-body">
                                    <a data-toggle-close="rModal" class="modal-close" href="#"><img class="object-contain" src="{{ Src::asset('img/close-modal.a1c4fbc08020baeabc3c2f1fcd229bcc.svg') }}" width="14" height="14"></a>
                                    <div class="modal-main">
                
                                        <!--modal.form-->
                                        <div class="modal-form">
                                            <h1 class="modal-title mb-4">LAPORKAN ARTIKEL</h1>
                                            <div class="form-box flex items-center">
                                                <div class="report-img">
                                                    @include('image', ['source'=>$row, 'size'=>'640x360', $row['news_title']??null])
                                                </div>
                                                <div class="report-title">{{$row['news_title']??null}}</div>
                                            </div>
                                            <div class="modal-form-body">
                                                <form class="form-submit" id="form-report">
                                                    <div class="form-box">
                                                        <input type="hidden" class="form-control" value="{{url()->current()}}" name="url" hidden readonly>
                                                    </div>
                                                    <div class="form-box">
                                                        <input type="text" class="form-control " placeholder="Nama Depan" value="" name="name">
                                                        <label id="name-error" class="error label-error" for="name"></label>
                                                    </div>
                                                    <div class="form-box">
                                                        <input type="email" class="form-control  " placeholder="Email" value="" name="from"  required='required' >
                                                        <label id="from-error" class="error label-error" for="from"></label>
                                                    </div>
                                                    <div class="form-box">
                                                        <input type="text" class="form-control  " placeholder="Nomor HP" value="" name="phone" rule='[^0-9]' required='required' minlength='9' maxlength='12'>
                                                        <label id="phone-error" class="error label-error" for="phone"></label>
                                                    </div>
                                                    <div class="form-box">
                                                        <select class="form-control" name="type">
                                                            <option value="Complaint">Complaint</option>
                                                            <option value="Feedback">Feedback</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-box">
                                                        <input type="text" class="form-control  " placeholder="Judul Laporan" value="" name="subject"  required='required'>
                                                        <label id="subject-error" class="error label-error" for="subject"></label>
                                                    </div>
                                                    <div class="form-box">
                                                        <textarea class="form-control " rows="5" placeholder="Detail Laporan" value="" name="content"  required='required'></textarea>
                                                        <label id="content-error" class="error label-error" for="content"></label>
                                                    </div>
                                                    <div class="form-box flex justify-between items-center">
                                                        <div class="form-recapthca" >
                                                            <div hidden class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                                                {!! RecaptchaV3::field('register') !!}
                                                                @if ($errors->has('g-recaptcha-response'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="flex">
                                                                <img class="object-contain inline-block mr-1 google-captcha-error" style="display: none" src="{{ Src::asset('img/error.e43b81ee4b1c02e23191db01caefee9e.svg') }}" width="15" height="17">
                                                                <label id="g-recaptcha-response-error" class="error label-error" for="g-recaptcha-response"></label>
                                                            </div>
                                                        </div>
                                                        <div class="form-button">
                                                            <button type="submit" class="btn btn--submit py-2 px-6 rounded-md">Kirim</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                
                                        <!--modal.alert-->
                                        <div class="modal-alert hidden">
                                            <div class="modal-alert-body flex items-center justify-center flex-col" style="min-height: 300px">
                                                <img class="modal-icon object-contain mb-4" src="{{ Src::asset('img/checkmark-modal.f381295fc0b9b93ca76855ce5a5b507e.svg') }}" width="74" height="64">
                                                <h1 class="modal-title">BERHASIL</h1>
                                                <p class="modal-text">Laporan Anda berhasil dikirim</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dt-foot pt-6">
                        <div class="tabs -mx-4" x-data="{ openTab: 1 }">
                            <ul class="tabs-btn w-full flex">
                                <li class="tabs-btn-item p-3 flex-1" @click="openTab = 1" :class="{'active' : openTab === 1}">
                                    <span>Rekomendasi</span>
                                </li>
                                <li class="tabs-btn-item p-3 flex-1" @click="openTab = 2" :class="{'active' : openTab === 2}">
                                    <span>Kredit</span>
                                    {{-- <span class="tabs-btn-item-info">1</span> --}}
                                </li>
                            </ul>
                            <div class="tabs-content w-full px-4">
                                <div class="tabs-content-item pt-4" x-show="openTab === 1">
                                    @include( 'defaultsite.mobile.components.latestbig',['news'=>\Data::recommendation($row),'page'=> 'readpage','data'=> 'recommendation'])
                                </div>
                                <div class="tabs-content-item pt-4" x-show="openTab === 2">
                                    <div class="dt-user flex items-center">
                                        <a class="dt-user-image rounded-full" href="{{ Src::author($row) }}">
                                            <img class="aspect-square rounded-full" src="{{$row['news_editor'][0]['image'] ??'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4AgJCiccVLvelQAABVVJREFUeNrtnG1v0zwUhm87WdqsCUm00nWgMgZMQrSbxJ/nZ6xSpexTAakbhdFutDSN17yZD6jTxsN49mKnHviW8jknl2/7HMcnIaenpxxadxbVCDTAlcpUKRhCyJXrsjjnVy4N8BdxzvHt2zdMJhPMZjMwxpBl2c8gTRO2bcN1Xfi+D9/3/wN4ZYO+qiRiGAYYYxiPxzg9PcV0OkWe5zdyoGEY8DwPGxsbqNfrsG0beZ7/OwA553j//j1OTk7uPR0JIdjc3MTLly9X4srSAY7HY3z48AHn5+egVEwOK4oC1WoVL168QL1e/zsBGoaBMAwxHo+l3qder6Pdbpc2pUsBmGUZer0eoigS5ro/udFxHOzv78M05edI6XUg5xy9Xg9xHEuHBwCUUsRxjF6vV0q5I/2Jut0u5vN56Yv7fD5Ht9t92AD7/T7m8/lqsiMhmM/n6Pf7Dw8gIQRRFGE4HK604CWEYDgcIooiaXFIAVgUBcIwLGXNu8maGIYhiqJ4GAAJIRgMBkiSRJn9apIkGAwGUlwoHGCaphiNRsrsVZeDOhqNkKap+gAZY2CMQTXJiksoQEopjo+PoaqOj4+Fr8vCHTgej5WavpensYxtJBUZ4GQykZbtRFUHk8lE6AALdeBsNlPSfZcHeTabqevAVe06VhmjUAcuFgvlAS4WC3WTyPIMQ2WJjpGKHmHVJTpGoQDX1taUByg6RqEAK5WKUme2v4pzjkqloiZAzjlqtZryAEXHKNSBrusqD9B1XXUd6Hme8mWM53nqOpBzjo2NDSVdKCs24QCbzaayAGXEJhyg4ziwLEs5gJZlwXEctQEuA63VasoBrNVqUgZWOEBKKba2tpSaxpxzbG1tSTnkojKCbTQaqFarSkDknKNaraLRaEiJh8oK+vXr18oAlBmLNICO4yAIgpUDDIJASvKQCnBZtG5vb6/0FX9RFNje3pZa3FPZo99qtVYCsSgKtFot6bNAKsA8z/H8+fOVTOUgCLCzsyO90VJ68wohBLu7uzAMozR4hmFgd3e3lHuV0v2zvr6Ovb290hos9/b2sL6+/vcAXLbddjodqRAppeh0OnAcp7R1t9T+M9/30W63YVmW0LKCcw7LstBut+H7fqlrbWkACSHgnCMIAnQ6HaH7Usuy0Ol0EAQBOOelvpOU0qW//NIoSRIwxnB+fo7v378jiiJEUYQ0TYV30GdZhrW1NTiOA8dx8OjRI1SrVdi2feF4GcW0UICUUhRFga9fv+LLly9gjCHPcxRFUaozlveilMIwDNi2jWaziUajcRGjEgCXQBaLBeI4xufPnzEaja64UJW3MUv3PX78GM1mE7Va7eKE7j7OvDNA0zQxmUxwdHSE2Wx20TKh+uH6ElalUoHrumi1WvB9/84dC7cGWBQFGGPo9/uYTqdKNJLft8TyPA+vXr2Cbdu3fp4bAzRNEycnJ/j06ROm0+mDcNttXel5Hp4+fYrNzc0bO/JGAJMkweHhofL9f6Jguq6LN2/e3KjUuhYgIQRZlmEwGGA4HKIoir8e3mWIlFI8efIEz549g2ma1yaa3wJcNiL2er0H0bImU6ZpYn9//9qWkN8CPDo6wsePHx98ghCZaHZ2dtBqtf4MkHOObreLOI41tWveKr19+/bKUkaXU5YxhoODAw3vD4rjGAcHB2CMXUAkZ2dnfDqdIgxDZFn2zySK+yQY0zTRbrfheR5oFEUIw/DilyNa/799zfMcYRj+/Iz23bt3PEkSDe8OTrQsCzRNUw3vjk5M01T/fOy+0gA1QA1QA9QAtTRADVAD1AC1NEANUAPUALU0QA1QA/x39AMzx8A5MRN2GAAAAABJRU5ErkJggg=='}}" width="34" height="34" alt="user">
                                        </a>
                                        <div class="dt-user-desc flex flex-col ml-3">
                                            <a class="dt-user-desc-link font-bold" href="{{ Src::author($row) }}">{{$row['news_editor'][0]['name']??null}}</a>
                                            <span class="dt-user-desc-role text-12 text-gray">Author</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('defaultsite/mobile/components/trendingtag')
        

        <div class="channel-ad channel-ad_ad-sc-2">
            {!! Util::getAds('showcase-2') !!}
        </div>

        <div class="section section--index">
            <h2 class="section-title text-16 mb-4">BERITA TERBARU</h2>
            @include( 'defaultsite.mobile.components.latestbig',['news'=>$row['latest']])
        </div>
    </div>
</div>
@endsection