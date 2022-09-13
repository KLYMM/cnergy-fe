<!--footer-->
<footer class="footer py-4">
    <div class="container w-kly px-8">
        <div class="footer-body flex items-center justify-center py-4 -mx-4">
            <div class="footer-item w-full px-4">
                <a href="/" class="footer-logo m-auto mb-4" style="background-image: url({{ Src::imgNewsCdn(config('site.attributes'), '320x', 'webp', 'file_logo') }});">Logo</a>
                @if ($footer_menu = Data::menu(position: 'footer') ?? null)
                <ul class="footer-nav list-none flex flex-wrap items-center justify-center px-8">
                    @if ($footer_menu != null || count($footer_menu > 0))
                    @foreach ($footer_menu as $l)
                    <li class="footer-nav-item mx-3"><a href="{{$l['url']}}">{{$l['title']}}</a></li>
                    @endforeach
                    @endif
                </ul>
                @endif
                <div class="footer-address mb-4 mt-8">
                    <p class="text-center">
                        {!! nl2br( config('site.attributes.address') ) !!}
                    </p>
                </div>
                @php $socmed = json_decode(config('site.attributes.sosmed', '{}')) @endphp
                <ul class="footer-socmed list-none flex flex-wrap items-center justify-center mb-6">
                    @if( $socmed->fb ?? null )<li class="footer-socmed-item"><a href="{{$socmed->fb}}" aria-label="facebook"><i class="icon icon--facebook"></i></a></li>@endif
                    @if( $socmed->twitter ?? null )<li class="footer-socmed-item"><a href="{{$socmed->twitter}}" aria-label="twitter"><i class="icon icon--twitter"></i></a></li>@endif
                    @if( $socmed->vidio ?? null )<li class="footer-socmed-item"><a href="{{$socmed->vidio}}" aria-label="vidio"><i class="icon icon--vidio"></i></a></li>@endif
                    @if( $socmed->youtube ?? null )<li class="footer-socmed-item"><a href="{{$socmed->youtube}}" aria-label="youtube"><i class="icon icon--youtube"></i></a></li>@endif
                    @if( $socmed->ig ?? null )<li class="footer-socmed-item"><a href="{{$socmed->ig}}" aria-label="instagram"><i class="icon icon--instagram"></i></a></li>@endif
                </ul>
            </div>
        </div>
        <span class="footer-copyright py-4">Copyright &copy; {{date("Y")}} {{ config('site.attributes.title') }} KLY KapanLagi Youniverse All Rights Reserved</span>
    </div>
</footer>
<div class="channel-ad channel-ad_ad-skinads">
    {!! Util::getAds('skin-ads') !!}
</div>
<div class="channel-ad channel-ad_ad-bttmfrm">
    {!! Util::getAds('bottom-frame') !!}
</div>
<a href="#" class="backtop" aria-label="backtop" data-turbolinks="false"><i class="icon icon--backtop"></i></a>