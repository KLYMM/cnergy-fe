@extends('defaultsite.mobile.layouts.ui-main')

{{-- @push('preload')
<link rel="preload" as="image" href="{{ Src::imgNewsCdn($row, '375x208', 'webp') }}" />
{!! RecaptchaV3::initJs() !!}
@endpush --}}

{{-- @push('styles')
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
@endpush --}}

{{-- @if( config('app.enabled_tracking') )
    @push('script')
    <script>
        var url = '{{ str_replace('api', 'analytics', config('app.api_url')) }}/jsview2/';
        var xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('{!! http_build_query(['url'=>Src::detail($row??null), 'platform'=>config('site.device')=='mobile'?'m':'www']) !!}');
    </script>
    @endpush
@endif --}}

{{-- @push('script')
<script>
To trigger the Event
window.addEventListener('load', function(){
    document.dispatchEvent(new Event("hyperlocal:load"));
});
</script>
@endpush --}}

@section('content')
{{-- 
<div class="channel-ad channel-ad_ad-headline">
    {!! Util::getAds('headline') !!}
</div> --}}


<div class="main-body">
    <div class="main-article">
        {{-- headline news --}}
        <div class="main-news-container">
            <ul class="main-breadcrumb">
                <li class="main-breadcrumb-item"><a href="/">Home</a></li>
                @foreach ($row['news_category'] as $r)
                    @if ($loop->iteration==1)
                        <li class="main-breadcrumb-item {{$loop->count==1?'active':''}}"><a href="{{ url(( $row['news_category'][0]['url']??'' )) }}">{{$r['name']??null}}</a></li>
                    @elseif($loop->iteration==2)
                        <li class="main-breadcrumb-item {{$loop->count==2?'active':''}}"><a href="{{ url(( $row['news_category'][0]['url']??'' ).'/'.( $row['news_category'][1]['url']??'' )) }}">{{$r['name']??null}}</a></li>
                    @elseif($loop->iteration==3)
                        <li class="main-breadcrumb-item {{$loop->count==3?'active':''}}"><a href="{{ url(( $row['news_category'][0]['url']??'' ).'/'.( $row['news_category'][1]['url']??'' ).'/'.( $row['news_category'][2]['url']??'' )) }}">{{$r['name']??null}}</a></li>
                    @endif
                @endforeach
            </ul>


            {{-- main --}}
                {{-- @include('defaultsite.mobile.components-ui.slider-kumpulan-foto') --}}
                <div class="swiper-wrapper">
                    @if (count($row['photonews']??[])>0)
                      <div class="header-photo">
                          <h3 class="photo-t">{{ $row['news_title'] ?? null }}</h3>
                          <p class="photo-author pt-2">By <a style="color: #CA0000 ;"  href="{{ Src::author($row) }}">{{$row['news_editor'][0]['name']??null}}</a> {{ Util::date($row['news_date_publish'] ?? null, 'long_time') }}</p>
                        <p class="photo-synopsis"> {{$row['news_synopsis']??null}}</p>       
                      </div>
                      <div class="image-news">
                        @include('image', [
                            'source' => $row,
                            'size' => '380x214',
                            $row['news_title'] ?? null,
                        ])
                    </div>
                    <div class="dt-share-container">
                        <div class="icons mt-2 " style="display: flex; ">
                            <div>
                                <a class="icons-share-a" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current() .'?utm_source=Mobile&utm_medium=facebook&utm_campaign=Share_Bottom' )}}" target="_blank"><i class="icon icons--share icon--share-fb"><i class="fa-brands fa-fb fa-facebook-f  "></i></i></a>
                            </div>
                            <div>
                                <a class="icons-share-a" href="https://wa.me/?text={{ urlencode(url()->current() .'?utm_source=Mobile&utm_medium=whatsapp&utm_campaign=Share_Bottom' )}}" target="_blank"><i class="icon icons--share icon--share-fb"><i class="fa-brands fa-wa fa-whatsapp" style="margin-left: 10px"></i></i></a>
                            </div>
                            <div>
                                <a class="icons-share-a" href="https://twitter.com/intent/tweet?u={{ urlencode(url()->current() .'?utm_source=Mobile&utm_medium=twitter&utm_campaign=Share_Bottom' )}}" target="_blank"><i class="icon icons--share icon--share-fb"><i class="fa-brands fa-twitter fa-twitter" style="margin-left: 10px"></i></i></a>
                            </div>  
                            <div class="ms-3">
                                {{-- <input type="text" id="copy-link" value={{ url()->current() }}> --}}
                                <button class="icons-share-link px-2" value="copy" onclick="copyToClipboard()">  <i class="fa-solid fa-link mx-1"></i> Copy Link</button>
                            </div>
                        </div>
                    </div>

                    <p class="photo-content">{{ $row['news_imageinfo'] ?? null }}</p>
                    
                          @foreach ($row['photonews'] as $s)
                          <div class="slider-counter">Foto  <span id="sliderCounter"></span> dari {{ count($row['photonews']) }}</div>
                          <div class="dt-share-container">
                            <div class="icons mt-2 " style="display: flex; ">
                                <div>
                                    <a class="icons-share-a" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current() .'?utm_source=Mobile&utm_medium=facebook&utm_campaign=Share_Bottom' )}}" target="_blank"><i class="icon icons--share icon--share-fb"><i class="fa-brands fa-fb fa-facebook-f  "></i></i></a>
                                </div>
                                <div>
                                    <a class="icons-share-a" href="https://wa.me/?text={{ urlencode(url()->current() .'?utm_source=Mobile&utm_medium=whatsapp&utm_campaign=Share_Bottom' )}}" target="_blank"><i class="icon icons--share icon--share-fb"><i class="fa-brands fa-wa fa-whatsapp" style="margin-left: 10px"></i></i></a>
                                </div>
                                <div>
                                    <a class="icons-share-a" href="https://twitter.com/intent/tweet?u={{ urlencode(url()->current() .'?utm_source=Mobile&utm_medium=twitter&utm_campaign=Share_Bottom' )}}" target="_blank"><i class="icon icons--share icon--share-fb"><i class="fa-brands fa-twitter fa-twitter" style="margin-left: 10px"></i></i></a>
                                </div>  
                                <div class="ms-3">
                                    {{-- <input type="text" id="copy-link" value={{ url()->current() }}> --}}
                                    <button class="icons-share-link px-2" value="copy" onclick="copyToClipboard()">  <i class="fa-solid fa-link mx-1"></i> Copy Link</button>
                                </div>
                            </div>
                        </div>

                            <a href="{{ Src::detail($s) }}" aria-label="{{ $s[0]['news_title'] ?? null }}"> 
                                <figure>
                                    <div class="image-news">
                                        @include('image', [
                                            'source' => $s,
                                            'size' => '380x214',
                                            $s['news_title'] ?? null,
                                        ])
                                    </div>
                                

                                    <p class="photo-content">{{ $row['news_imageinfo'] ?? null }}</p>
                                   
                                </figure>
                            </a>

                            <button class="pages-button pages-button--img mt-6" data-target="pages-2-1">
                                <figure class="item item--text d-flex " style="align-items: center;ustify-content: space-between; ">
                                    <span class="item--text-img"><div class="image-news" alt="image">
                                        @include('image', [
                                            'source' => $s,
                                            'size' => '93x53',
                                            $s['news_title'] ?? null,
                                        ])
                                    </div></span>
                                    <figcaption class="item-desc d-flex  px-4" style="justify-content: space-between; align-items: center; flex: 1 1 0%;">
                                        <span class="pages-button--img-text">
                                            <span class="pages-button-text">There are 
                                                3 more photos</span>
                                        </span>
                                        <span class="pages-button-countdown ml-2" data-delay="5" >
                                            <span class="pages-button-countdown-html">3</span>
                                            <svg class="pages-button-countdown-svg"><circle r="14" cx="16" cy="16" stroke-linecap="round" stroke-width="3" fill="none" stroke="currentColor"></circle></svg>
                                        </span>
                                    </figcaption>
                                </figure>
                            </button>
                       
                         @endforeach
                       
                       
                      @endif
                  </div>

            {{-- st-share --}}
            {{-- <div class="pt-5"> 
                @include('defaultsite.mobile.components-ui.dt-share')
            </div> --}}


            {{-- report --}}
            <div style="margin:20px;">
                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-light report-btn"><i
                class="fa-solid fa-triangle-exclamation" style="color: #ca0000; margin-right: 10px;"></i>REPORT ARTICLE</button>

                <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            {{-- FORM REPORT --}}
                            @include('defaultsite.mobile.components-ui.form-report')
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

        {{-- related tag --}}
        @include('defaultsite.mobile.components-ui.related-tag', ['title' => 'RELATED TAGS'])

        {{-- trending tag --}}
        @include('defaultsite.mobile.components-ui.trending-tag')

        {{-- <div class="channel-ad channel-ad_ad-sc-2">
            {!! Util::getAds('showcase-2') !!}
        </div> --}}
        @include( 'defaultsite.mobile.components-ui.related-news',['news'=>$row['latest'], 'title' => 'LATEST NEWS'] )

    </div>
</div>

@endsection