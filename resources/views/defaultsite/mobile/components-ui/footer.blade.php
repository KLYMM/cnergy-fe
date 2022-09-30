<div class="footer-container">
  <img src="{{ URL::asset('assets/images/logo-footer.png') }}" alt="logo footer" width="105px" height="21px">
  @if ($footer_menu = Data::menu(position: 'footer') ?? null)
  <div class="link-footer">
    @foreach ($footer_menu as $l)
    <a href="#">beritamusi.co.id</a>
    <a href="#">tentang kami</a>
    <a href="#">redaksi</a>
    <a href="#">pedoman media siber</a>
    <a href="#">kode perilaku wartawan beritamusi</a>
    <a href="{{ $l['url'] }}">{{ $l['title'] }}</a>
    <a href="#">pedoman hak wajib</a>
    <a href="#">kebijakan data pengguna</a>
  @endforeach
</div>
  @endif
  <p>Jakarta: Jl. Tebet Barat IV No.3 Jakarta Selatan, 12810 Malang: PBI Araya Blok A1-3 Blimbing, Malang, 65126 Email: redaksi.merdeka@kly.id Telp: (021) 8379 52 45</p>
  <div class="social-media mx-3">
    @php $socmed = json_decode(config('site.attributes.sosmed', '{}')) @endphp
    @if( $socmed->fb ?? null ) <a href="{{$socmed->fb}}"><img src="{{ URL::asset('assets/icons/facebook.svg') }}" alt="facebook"></a>@endif
    @if( $socmed->twitter ?? null )<a href="{{$socmed->twitter}}"><img src="{{ URL::asset('assets/icons/twitter.svg') }}" alt="twitter"></a>@endif
    @if( $socmed->vidio ?? null )<a href="{{$socmed->vidio}}"><img src="{{ URL::asset('assets/icons/vidio.svg') }}" alt="vidio"></a>@endif
    @if( $socmed->ig ?? null ) <a href="{{$socmed->ig}}"><img src="{{ URL::asset('assets/icons/instagram.svg') }}" alt="instagram"></a>@endif
    <a href="#"><img src="{{ URL::asset('assets/icons/rss.svg') }}" alt="rss"></a>
    <a href="#"><img src="{{ URL::asset('assets/icons/linkedin.svg') }}" alt="linkedin"></a>
    @if( $socmed->youtube ?? null )<a href="{{$socmed->youtube}}"><img src="{{ URL::asset('assets/icons/youtube.svg') }}" alt="youtube"></a>@endif
  </div>
  <span>Copyright © 2020 bandung.merdeka.com KLY KapanLagi Youniverse All Right Reserved</span>
</div>