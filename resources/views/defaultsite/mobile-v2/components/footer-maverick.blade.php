<div class="footer-container">
    @if ($logo = \Site::api('fe-setting') ?? null)
    <img src="{{ $logo['data']['site_logo'] ?? null }}" alt="logo footer" width="105px" height="21px" style="filter: invert(1) grayscale(2) brightness(100);">
    @endif
    <h1 class="footer-follow">FOLLOW US</h1>
    <div class="social-media mx-3">
        @php $socmed = json_decode(config('site.attributes.sosmed', '{}')) @endphp
        @if( $socmed->fb ?? null ) <a href="{{$socmed->fb}}"><img width="24px" height="24px" src="{{ URL::asset('assets/icons/fb-white.svg') }}" alt="facebook"></a>@endif
        @if( $socmed->twitter ?? null )<a href="{{$socmed->twitter}}"><img width="24px" height="24px" src="{{ URL::asset('assets/icons/twit-white.svg') }}" alt="twitter"></a>@endif
        @if( $socmed->vidio ?? null )<a href="{{$socmed->vidio}}"><img width="24px" height="24px" src="{{ URL::asset('assets/icons/vidio.svg') }}" alt="vidio"></a>@endif
        @if( $socmed->ig ?? null ) <a href="{{$socmed->ig}}"><img width="24px" height="24px" src="{{ URL::asset('assets/icons/ig-white.svg') }}" alt="instagram"></a>@endif
        {{-- <a href="#"><img width="24px" height="24px" src="{{ URL::asset('assets/icons/rss.svg') }}" alt="rss"></a>
        <a href="#"><img width="24px" height="24px" src="{{ URL::asset('assets/icons/linkedin-white.svg') }}" alt="linkedin"></a> --}}
        @if( $socmed->youtube ?? null )<a href="{{$socmed->youtube}}"><img width="24px" height="24px" src="{{ URL::asset('assets/icons/yt-white.svg') }}" alt="youtube"></a>@endif
    </div>
    <span>{{ 'Copyright © ' . now()->year . ' Trstd.ly KLY KapanLagi Youniverse All Right Reserved' }}</span>
</div>
