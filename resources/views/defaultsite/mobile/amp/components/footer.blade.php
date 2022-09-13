<!--footer-->
<footer class="footer">
    <div class="container max-w-full">
        <div class="footer-body p-4">
            <div class="footer-item py-4">
                <div class="text-center"> 
                    <a href="/" class="header-logo" style="background-image: url({{ Src::imgNewsCdn(config('site.attributes'), '320x', 'webp', 'file_logo') }})">Logo</a>
                </div>
            </div>
            {{-- <div class="footer-item py-4">
                <h2 class="footer-title mb-4">Jaringan</h2>
                <ul class="footer-channels list-none flex flex-wrap items-start">
                    <li class="footer-channels-item w-1/2"><a href="http://liputan6.com" target="_blank"><i class="icon icon--lip6"></i> Liputan6.com</a></li>
                    <li class="footer-channels-item w-1/2"><a href="http://bola.com" target="_blank"><i class="icon icon--bolacom"></i> Bola.com</a></li>
                    <li class="footer-channels-item w-1/2"><a href="http://bola.net" target="_blank"><i class="icon icon--bolanet"></i> Bola.net</a></li>
                    <li class="footer-channels-item w-1/2"><a href="http://brilio.net" target="_blank"><i class="icon icon--brilio"></i> Brilio.net</a></li>
                    <li class="footer-channels-item w-1/2"><a href="http://famous.id" target="_blank"><i class="icon icon--famous"></i> Famous.id</a></li>
                    <li class="footer-channels-item w-1/2"><a href="http://fimela.com" target="_blank"><i class="icon icon--fimela"></i> Fimela.com</a></li>
                    <li class="footer-channels-item w-1/2"><a href="http://kapanLagi.com" target="_blank"><i class="icon icon--kl"></i> KapanLagi.com</a></li>
                    <li class="footer-channels-item w-1/2"><a href="http://merdeka.com" target="_blank"><i class="icon icon--mdk"></i> Merdeka.com</a></li>
                    <li class="footer-channels-item w-1/2"><a href="http://otosia.com" target="_blank"><i class="icon icon--otosia"></i >Otosia.com</a></li>
                    <li class="footer-channels-item w-1/2"><a href="http://dream.co.id" target="_blank"><i class="icon icon--drm"></i> Dream.co.id</a></li>
                </ul>
            </div> --}}
            @if ($footer_menu = Data::menu(position: 'footer') ?? null)
            <div class="footer-item py-4 text-center">
                <ul class="footer-nav list-none">
                    @if ($footer_menu != null || count($footer_menu > 0))
                    @foreach ($footer_menu as $l)
                    <li class="footer-nav-item"><a href="{{ $l['url'] }}">{{ $l['title'] }}</a></li>
                    @endforeach
                    @endif
                </ul>
            </div>
            @endif
            <div class="footer-item text-center">
                <p class="pt-3">{!! nl2br(config('site.attributes.address')) !!}</p>
                @php $socmed = json_decode(config('site.attributes.sosmed', '{}')) @endphp
                <ul class="footer-socmed list-none " style="display: inline-flex;align-items: center;justify-content: space-between;">
                    @if( $socmed->fb ?? null )<li class="footer-socmed-item"><a href="{{$socmed->fb}}" aria-label="facebook"><i class="icon icon--facebook"></i></a></li>@endif
                    @if( $socmed->twitter ?? null )<li class="footer-socmed-item"><a href="{{$socmed->twitter}}" aria-label="twitter"><i class="icon icon--twitter"></i></a></li>@endif
                    @if( $socmed->vidio ?? null )<li class="footer-socmed-item"><a href="{{$socmed->vidio}}" aria-label="vidio"><i class="icon icon--vidio"></i></a></li>@endif
                    @if( $socmed->youtube ?? null )<li class="footer-socmed-item"><a href="{{$socmed->youtube}}" aria-label="youtube"><i class="icon icon--youtube"></i></a></li>@endif
                    @if( $socmed->ig ?? null )<li class="footer-socmed-item"><a href="{{$socmed->ig}}" aria-label="instagram"><i class="icon icon--instagram"></i></a></li>@endif
                </ul>
            </div>
        </div>
        <span class="footer-copyright p-4">Copyright &copy; {{ date('Y') }} {{config('site.attributes.title')}} <br>KLY KapanLagi Youniverse All Rights Reserved </span>
    </div>
</footer>
<div class="channel-ad channel-ad_ad-bttmfrm">
    {!! Util::getAds('bottom-frame') !!}
</div>
<a href="#" class="backtop" aria-label="backtop" data-turbolinks="false"><i class="icon icon--backtop"></i></a>