@extends('defaultsite.desktop.layouts.main')
@push('preload')
    {!! RecaptchaV3::initJs() !!}
@endpush

@push('styles')
<style>
    /*! detail */.dt-pages{padding-bottom:2rem;border-bottom:1px solid var(--color-border)}.dt-info-user-image{background-repeat:no-repeat;background-position:center;background-size:cover;background-image:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4AgJCiccVLvelQAABVVJREFUeNrtnG1v0zwUhm87WdqsCUm00nWgMgZMQrSbxJ/nZ6xSpexTAakbhdFutDSN17yZD6jTxsN49mKnHviW8jknl2/7HMcnIaenpxxadxbVCDTAlcpUKRhCyJXrsjjnVy4N8BdxzvHt2zdMJhPMZjMwxpBl2c8gTRO2bcN1Xfi+D9/3/wN4ZYO+qiRiGAYYYxiPxzg9PcV0OkWe5zdyoGEY8DwPGxsbqNfrsG0beZ7/OwA553j//j1OTk7uPR0JIdjc3MTLly9X4srSAY7HY3z48AHn5+egVEwOK4oC1WoVL168QL1e/zsBGoaBMAwxHo+l3qder6Pdbpc2pUsBmGUZer0eoigS5ro/udFxHOzv78M05edI6XUg5xy9Xg9xHEuHBwCUUsRxjF6vV0q5I/2Jut0u5vN56Yv7fD5Ht9t92AD7/T7m8/lqsiMhmM/n6Pf7Dw8gIQRRFGE4HK604CWEYDgcIooiaXFIAVgUBcIwLGXNu8maGIYhiqJ4GAAJIRgMBkiSRJn9apIkGAwGUlwoHGCaphiNRsrsVZeDOhqNkKap+gAZY2CMQTXJiksoQEopjo+PoaqOj4+Fr8vCHTgej5WavpensYxtJBUZ4GQykZbtRFUHk8lE6AALdeBsNlPSfZcHeTabqevAVe06VhmjUAcuFgvlAS4WC3WTyPIMQ2WJjpGKHmHVJTpGoQDX1taUByg6RqEAK5WKUme2v4pzjkqloiZAzjlqtZryAEXHKNSBrusqD9B1XXUd6Hme8mWM53nqOpBzjo2NDSVdKCs24QCbzaayAGXEJhyg4ziwLEs5gJZlwXEctQEuA63VasoBrNVqUgZWOEBKKba2tpSaxpxzbG1tSTnkojKCbTQaqFarSkDknKNaraLRaEiJh8oK+vXr18oAlBmLNICO4yAIgpUDDIJASvKQCnBZtG5vb6/0FX9RFNje3pZa3FPZo99qtVYCsSgKtFot6bNAKsA8z/H8+fOVTOUgCLCzsyO90VJ68wohBLu7uzAMozR4hmFgd3e3lHuV0v2zvr6Ovb290hos9/b2sL6+/vcAXLbddjodqRAppeh0OnAcp7R1t9T+M9/30W63YVmW0LKCcw7LstBut+H7fqlrbWkACSHgnCMIAnQ6HaH7Usuy0Ol0EAQBOOelvpOU0qW//NIoSRIwxnB+fo7v378jiiJEUYQ0TYV30GdZhrW1NTiOA8dx8OjRI1SrVdi2feF4GcW0UICUUhRFga9fv+LLly9gjCHPcxRFUaozlveilMIwDNi2jWaziUajcRGjEgCXQBaLBeI4xufPnzEaja64UJW3MUv3PX78GM1mE7Va7eKE7j7OvDNA0zQxmUxwdHSE2Wx20TKh+uH6ElalUoHrumi1WvB9/84dC7cGWBQFGGPo9/uYTqdKNJLft8TyPA+vXr2Cbdu3fp4bAzRNEycnJ/j06ROm0+mDcNttXel5Hp4+fYrNzc0bO/JGAJMkweHhofL9f6Jguq6LN2/e3KjUuhYgIQRZlmEwGGA4HKIoir8e3mWIlFI8efIEz549g2ma1yaa3wJcNiL2er0H0bImU6ZpYn9//9qWkN8CPDo6wsePHx98ghCZaHZ2dtBqtf4MkHOObreLOI41tWveKr19+/bKUkaXU5YxhoODAw3vD4rjGAcHB2CMXUAkZ2dnfDqdIgxDZFn2zySK+yQY0zTRbrfheR5oFEUIw/DilyNa/799zfMcYRj+/Iz23bt3PEkSDe8OTrQsCzRNUw3vjk5M01T/fOy+0gA1QA1QA9QAtTRADVAD1AC1NEANUAPUALU0QA1QA/x39AMzx8A5MRN2GAAAAABJRU5ErkJggg==");width:40px;height:40px;overflow:hidden;margin-right:.75rem}.dt-info-user-image img{object-fit:cover}.dt-info-user-desc-time{display:block;color:var(--color-gray)}.dt-paragraph p{margin-bottom:1.5rem;font-size:15px;line-height:1.8}.dt-paragraph p a{color:var(--color-primary)}.dt-box:not(:last-child){margin-bottom:2rem}.dt-box--crosslink{background-color:var(--bg-gray)}.dt-box--crosslink-list-item:not(:first-of-type){border-left:1px solid var(--color-border)}.main-gallery{position:fixed;top:0;left:0;width:100%;height:100%;background-color:#000000;color:var(--color-white);padding-top:82px}.main-gallery-body{height:100%}.main-gallery-body-left{min-width:0px;overflow-y:auto}.main-gallery-body-left .main-photo{height:100%}.main-gallery-body-left .main-photo-header-fullscreen .icon--close{display:none}.main-gallery-body-left .main-photo-swiper{position:relative;max-height:1200px}.main-gallery-body-left .main-photo-swiper .item,.main-gallery-body-left .main-photo-swiper .item-img,.main-gallery-body-left .main-photo-swiper .swiper{width:100%;height:100%}.main-gallery-body-left .main-photo-swiper .swiper-button{top:50%;margin-top:-18px}.main-gallery-body-left .main-photo-swiper .swiper-button-prev{left:1rem;background-image:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACYAAAA8CAYAAAAKcMhTAAAACXBIWXMAACE4AAAhOAFFljFgAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAC0SURBVHgB7dpBCsMgEEDRsb2IR+gVevIcxdygvcFUadJFIagBnYH8D4ObLF50JShilKrGPEtZxUsbKum35AL3h1IXuAOULa6CssE1oubiOlE/3F0Gtv35kieKl07uVOmV5yEjAgUKFChQoECBAgUKVNL+roW6ifdcHiU4cODAgQMHDhw4cODAzcYNvb6FENa8PPOs0tdbZtS5c+W7KLNqxM1FNeJsUBWcLWpPPT4I2dPKE5oPZuVEmAwgMscAAAAASUVORK5CYII=")}.main-gallery-body-left .main-photo-swiper .swiper-button-next{right:1rem;background-image:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACYAAAA8CAYAAAAKcMhTAAAACXBIWXMAACE4AAAhOAFFljFgAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAACdSURBVHgB7dnBCsQgDEXRZ398Ml+eGaHdFKQqaEK5F7I/uHsoNXL3Tz1l6kRd5cDdUDlwDVQs7gEVg+tE7cUNorbhjv8VjWc7cPXVzOcCBw4cOHDgwIEDBw4cuHfhDq3LNdfMnOzL50Z0zbQqUKBAgQIFChQoUKBAgepp9vftW0oxrc7HxqlpZ504U0QPOFNkDZwpQzecKVMnzhTUD27Dmg5SGd3xAAAAAElFTkSuQmCC")}.main-gallery-body-left .main-photo-swiper-top,.main-gallery-body-left .main-photo-swiper-thumbs{position:relative;padding-left:76px;padding-right:76px}.main-gallery-body-left .main-photo-swiper-top{max-width:992px}.main-gallery-body-left .main-photo-swiper-thumbs{max-width:540px;min-height:80px}.main-gallery-body-left .main-photo-swiper-thumbs .swiper{padding-top:20px;padding-bottom:20px}.main-gallery-body-left .main-photo-swiper-thumbs .swiper-button{width:24px;height:24px;margin-top:-12px}.main-gallery-body-left .main-photo-swiper-thumbs .swiper-slide{width:20%;transition:.5s ease;opacity:.5}.main-gallery-body-left .main-photo-swiper-thumbs .swiper-slide-active{transform:scale(1.2);opacity:1}.main-gallery-body-right{background-color:var(--color-white);color:var(--color-black);overflow-y:auto;width:400px}.main-gallery-body-right .dt-author{border-top:1px solid var(--color-border);padding-top:1.5rem;padding-bottom:1.5rem}.main-gallery-body-right .dt-author-item{display:block}.section--reaction-list-item{font-size:12px;text-align:center}.section--reaction-list-item-icon,.section--reaction-list-item-count,.section--reaction-list-item-type{display:block}.section--reaction-list-item-icon::after{width:60px;height:60px}.section--reaction-list-item-count{font-weight:bold}.fullscreen .main-gallery{z-index:999}.fullscreen .main-gallery-body-left .main-photo{position:fixed;top:0;left:0;width:100%;height:100%;background-color:#000000;z-index:100;padding:4rem}.fullscreen .main-gallery-body-left .main-photo-header-back{display:none}.fullscreen .main-gallery-body-left .main-photo-header-fullscreen .icon--fullscreen{display:none}.fullscreen .main-gallery-body-left .main-photo-header-fullscreen .icon--close{display:block}@media (min-width: 1400px){.main-gallery-body-left .main-photo-swiper-top{max-width:1200px}}
    /*! footer */
    .footer{
        font-size: 12px;background-color: var(--color-black);
        color: var(--color-white);border-top: 4px solid var(--color-primary);
    }
    .footer .header-logo{
        filter: brightness(0) invert(1);
    }
    .footer-item:not(:first-child){
        border-top:0px solid var(--color-border)
    }
    .footer-title{
        font-size:14px;
        font-weight:700;
        color:var(--color-black);
        text-transform:uppercase;
    }
    .footer-socmed{
        margin-top:1rem;
        justify-content: center;
    }
    .footer-socmed-item{
        margin-right:.5rem
    }
    .footer-copyright{
        display:block;
        text-align:center;
        background-color: var(--color-black);
        color: var(--color-white)
    }
    .header-logo {
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        display: inline-block;
        text-indent: -999px;
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
<main class="main py-8 pb-16" role="main">
    <div class="container w-kly px-8">

        <!--main.gallery-->
        <div class="main-gallery">
            <div class="main-gallery-body flex">
                <div class="main-gallery-body-left flex-1 pt-14 p-4">
                    <div class="main-photo flex flex-col">
                        <div class="main-photo-header flex justify-between items-center mb-4">
                            <div class="main-photo-header-item">
                                <a href="/photo" class="main-photo-header-back"><i class="icon icon--sm icon--arrowback"></i> Kembali</a>
                            </div>
                            <div class="main-photo-header-center flex-1">
                                <div class="share flex flex-wrap justify-center items-center">
                                    <div class="share-item"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current() .'?utm_source=Desktop&utm_medium=facebook&utm_campaign=Share_Top' )}}"><i class="icon icon--share-outline icon--share-outline-fb"></i></a></div>
                                    <div class="share-item"><a target="_blank" href="https://twitter.com/intent/tweet?text={{ urlencode(url()->current() .'?utm_source=Desktop&utm_medium=twitter&utm_campaign=Share_Top' )}}"><i class="icon icon--share-outline icon--share-outline-tweet"></i></a></div>
                                    <div class="share-item"><a class="copy-text" data-turbolinks="false" href="#"><i class="icon icon--share-outline icon--share-outline-copy"></i></a></div>
                                </div>
                            </div>
                            <div class="main-photo-header-item">
                                <a href="#" class="main-photo-header-fullscreen">
                                    <i class="icon icon--fullscreen"></i>
                                    <i class="icon icon--close"></i>
                                </a>
                            </div>
                        </div>
                        <div class="main-photo-swiper flex flex-col items-center flex-1">
                            @if (count($row['photonews']??[])>0)
                            <div class="main-photo-swiper-top flex-1">
                                <div class="swiper-button swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-ca797fcd2bd31a3e"></div>
                                <div class="swiper-button swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-ca797fcd2bd31a3e"></div>
                                <div class="swiper swiper-initialized swiper-horizontal swiper-pointer-events">
                                    <div class="swiper-wrapper" id="swiper-wrapper-ca797fcd2bd31a3e" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(-9432px, 0px, 0px);">
                                        
                                        @foreach ($row['photonews'] as $r)
                                            <div class="swiper-slide" data-swiper-slide-index="{{$loop->index}}" role="group" aria-label="{{$loop->index+1}} / {{$loop->count}}" style="width: 1048px;">

                                                <figure class="item">
                                                    <span class="item-img aspect-[16/9]">
                                                        <source class="lazyload" data-srcset="{{ Src::imgNewsCdn($r, '761x389', 'webp') }}" type="image/webp">
                                                        <source class="lazyload" data-srcset="{{ Src::imgNewsCdn($r, '761x389', 'jpeg') }}" type="image/jpeg">
                                                        <img class="lazyload" data-src="{{ Src::imgNewsCdn($r, '761x389', 'webp') }}" width="761" height="389" alt="{{$r['title']}}">
                                                    </span>
                                                </figure>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-desc">
                                        <div class="swiper-desc-pagination swiper-pagination-fraction swiper-pagination-horizontal">
                                            <span class="swiper-pagination-current">5</span> / <span class="swiper-pagination-total">6</span>
                                        </div>
                                        {{-- <p class="swiper-desc-text">Spyshot Yamaha Nmax facelift</p> --}}
                                    </div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                            </div>
                            <span id="photonews-data" data-page="{{$row['current_page']??1}}" data-url="{{Src::detail($row)}}"></span>
                            <div class="main-photo-swiper-thumbs">
                                <div class="swiper-button swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-ca797fcd2bd31a3e"></div>
                                <div class="swiper-button swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-ca797fcd2bd31a3e"></div>
                                <div class="swiper swiper-initialized swiper-horizontal swiper-pointer-events">
                                    <div class="swiper-wrapper" id="swiper-wrapper-b4e8451074ba3e1d4" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(-543.141px, 0px, 0px);">
                                        @foreach ($row['photonews'] as $r)
                        
                                            <div class="swiper-slide" data-swiper-slide-index="{{$loop->index}}" role="group" aria-label="{{$loop->index+1}} / {{$loop->count}}">

                                                <figure class="item">
                                                    <span class="item-img aspect-[16/9]">
                                                        <source class="lazyload" data-srcset="{{ Src::imgNewsCdn($r, '93x53', 'webp') }}" type="image/webp">
                                                        <source class="lazyload" data-srcset="{{ Src::imgNewsCdn($r, '93x53', 'jpeg') }}" type="image/jpeg">
                                                        <img class="lazyload" data-src="{{ Src::imgNewsCdn($r, '93x53', 'webp') }}" width="93" height="53" alt="{{$r['title']}}">
                                                    </span>
                                                </figure>
                                            </div>
                        
                                        @endforeach
                                    </div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="main-gallery-body-right">
                    <div class="main-dt pt-14 p-4">
                        <div class="dt">
                            <div class="dt-body">
                                <div class="dt-body-pages">
                                    <div id="pages-intro" class="dt-body-pages-item">
                                        <div class="dt-header">
                                            <h1 class="dt-title text-30 font-bold mb-4">{{$row['news_title']??null}}</h1>
                                            <div class="dt-info mb-6">
                                                <div class="dt-info-item">
                                                    <div class="dt-info-user">
                                                        <div class="dt-info-user-desc">
                                                            <a class="dt-info-user-desc-link" href="{{ Src::author($row) }}">{{$row['news_editor'][0]['name']??null}}</a>
                                                            <span class="dt-info-user-desc-time">{{Util::date($row['news_date_publish']??null,'long_time')}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-body">
                                            <div class="dt-paragraph text-gray mb-6">
                                                <p>{{$row['news_synopsis']??null}}</p>
                                            </div>
                                            <div class="dt-author">
                                                <span class="dt-author-item"><b>Editor:</b> {{$row['news_editor'][0]['name']??null}} </span>
                                                <span class="dt-author-item"><b>Photographer:</b> {{$row['news_photographer'][0]['name']??null}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($row['news_tag']??null)
                                    <div class="dt-box dt-box--tag">
                                        <ul class="section--trending-bredcrumb text-12 font-bold list-none flex items-center flex-wrap flex-1">
                                            @foreach ($row['news_tag'] as $r)
                                                {{-- @if ()
                                                    <li class="section--trending-bredcrumb-item"><a href="{{Src::detailTag($r)}}"><i class="icon icon--sm icon--checklist mr-1"></i> {{$r['tag_name']??null}}</a></li>
                                                @else --}}
                                                    <li class="section--trending-bredcrumb-item"><a href="{{Src::detailTag($r)}}">{{$r['tag_name']??null}}</a></li>
                                                {{-- @endif --}}
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
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

                        <!--box.reaction-->
                        {{-- <div class="section section--reaction">
                            <h1 class="section-title text-16 mb-4">REAKSI ANDA</h1>
                            <ul class="section--reaction-list flex justify-between">
                                <li class="section--reaction-list-item">
                                    <a href="#">
                                        <i class="section--reaction-list-item-icon icon icon--reaction icon--reaction-suka mb-2"></i> 
                                        <span class="section--reaction-list-item-count">0%</span> 
                                        <span class="section--reaction-list-item-type">Suka</span>   
                                    </a>
                                </li>
                                <li class="section--reaction-list-item">
                                    <a href="#">
                                        <i class="section--reaction-list-item-icon icon icon--reaction icon--reaction-lucu mb-2"></i> 
                                        <span class="section--reaction-list-item-count">0%</span> 
                                        <span class="section--reaction-list-item-type">Lucu</span>   
                                    </a>
                                </li>
                                <li class="section--reaction-list-item">
                                    <a href="#">
                                        <i class="section--reaction-list-item-icon icon icon--reaction icon--reaction-kaget mb-2"></i> 
                                        <span class="section--reaction-list-item-count">0%</span> 
                                        <span class="section--reaction-list-item-type">Kaget</span>   
                                    </a>
                                </li>
                                <li class="section--reaction-list-item">
                                    <a href="#">
                                        <i class="section--reaction-list-item-icon icon icon--reaction icon--reaction-sedih mb-2"></i> 
                                        <span class="section--reaction-list-item-count">0%</span> 
                                        <span class="section--reaction-list-item-type">Sedih</span>   
                                    </a>
                                </li>
                                <li class="section--reaction-list-item">
                                    <a href="#">
                                        <i class="section--reaction-list-item-icon icon icon--reaction icon--reaction-marah mb-2"></i> 
                                        <span class="section--reaction-list-item-count">0%</span> 
                                        <span class="section--reaction-list-item-type">Marah</span>   
                                    </a>
                                </li>
                            </ul>
                        </div> --}}

                        <!--box.terkini-->
                        @include( 'defaultsite.desktop.components.latestphoto', ['latest'=> $row['latest']])
                        
                    </div>

                    <!--footer-->
                    <footer class="footer">
                        <div class="container max-w-full">
                            <div class="footer-body p-4">
                                <div class="footer-item py-4">
                                    <div class="text-center">
                                        <a href="/" class="header-logo" style="background-image: url({{ Src::imgNewsCdn(config('site.attributes'), '320x', 'webp', 'file_logo') }});background-image: url(https://cdns.klimg.com/newshub.id/resized/production/webp/168x34/fe_setting/2022/04/11/1/fe-setting-1-rev3.png); width: 168px; background-position: center;">
                                        </a>
                                    </div>
                                </div>
                                <div class="footer-item text-center">
                                    <p class="pt-3">{!! nl2br( config('site.attributes.address') ) !!}
                                    </p>
                                    @php $socmed = json_decode(config('site.attributes.sosmed', '{}')) @endphp
                                    <ul class="footer-socmed list-none flex flex-wrap items-start">
                                        @if( $socmed->fb ?? null )<li class="footer-socmed-item"><a href="{{$socmed->fb}}" aria-label="facebook"><i class="icon icon--facebook"></i></a></li>@endif
                                        @if( $socmed->twitter ?? null )<li class="footer-socmed-item"><a href="{{$socmed->twitter}}" aria-label="twitter"><i class="icon icon--twitter"></i></a></li>@endif
                                        @if( $socmed->vidio ?? null )<li class="footer-socmed-item"><a href="{{$socmed->vidio}}" aria-label="vidio"><i class="icon icon--vidio"></i></a></li>@endif                   
                                        @if( $socmed->youtube ?? null )<li class="footer-socmed-item"><a href="{{$socmed->youtube}}" aria-label="youtube"><i class="icon icon--vidio"></i></a></li>@endif    
                                    </ul>
                                </div>
                            </div> 
                            <span class="footer-copyright p-4">Copyright &copy; {{date("Y")}} {{ config('site.attributes.title') }} KLY KapanLagi Youniverse All Rights Reserved 
                        </div>
                    </footer>

                </div>
            </div>
        </div>
        <!--end.main.gallery-->

    </div>
</main>
@endsection