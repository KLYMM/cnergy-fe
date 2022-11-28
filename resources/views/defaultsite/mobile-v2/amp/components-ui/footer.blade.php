<div class="footer-container">
  <a href="/" class="header-logo" style="background-image: url({{ Src::imgNewsCdn(config('site.attributes'), '320x', 'webp', 'file_logo') }})">Logo</a>
    {{-- @if ($footer_menu = Data::menu(position: 'footer') ?? null)
    <div class="link-footer ">
      @foreach ($footer_menu as $l)
      <a href="{{ $l['url'] }}">{{ $l['title'] }}</a>
    @endforeach --}}
  </div>
    {{-- @endif --}}
    <h1 class="footer-follow">FOLLOW US</h1>
    <div class="social-media mx-3">
      @php $socmed = json_decode(config('site.attributes.sosmed', '{}')) @endphp
      @if( $socmed->fb ?? null ) <li class="footer-socmed-item"><a href="{{$socmed->fb}}" aria-label="facebook"><i class="icon icon--facebook"></i></a></li>@endif
      @if( $socmed->twitter ?? null )<li class="footer-socmed-item"><a href="{{$socmed->twitter}}" aria-label="twitter"><i class="icon icon--twitter"></i></a></li>@endif
      @if( $socmed->vidio ?? null )<li class="footer-socmed-item"><a href="{{$socmed->vidio}}" aria-label="vidio"><i class="icon icon--vidio"></i></a></li>@endif
      @if( $socmed->ig ?? null ) <li class="footer-socmed-item"><a href="{{$socmed->ig}}" aria-label="instagram"><i class="icon icon--instagram"></i></a></li>@endif
      {{-- <a href="#"><img src="{{ URL::asset('assets/icons/rss.svg') }}" alt="rss"></a>
      <a href="#"><img src="{{ URL::asset('assets/icons/linkedin.svg') }}" alt="linkedin"></a> --}}
      @if( $socmed->youtube ?? null )<li class="footer-socmed-item"><a href="{{$socmed->youtube}}" aria-label="youtube"><i class="icon icon--youtube"></i></a></li>@endif
    </div>
    <span>{{ 'Copyright © ' . now()->year . ' trstdly KLY KapanLagi Youniverse All Right Reserved' }}</span>
  </div>