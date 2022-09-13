<nav>
  <div class="nav-first_section d-flex justify-content-between">
    <a href="/">
      <img src="{{ URL::asset('assets/images/logo.webp') }}" alt="logo" width="168px" height="34px">
    </a>
    <div class="search-container">
      <input type="text" placeholder="Berita apa yang anda ingin baca hari ini?">
      <img src="{{ URL::asset('assets/icons/search-icon.svg') }}" alt="Search">
    </div>
  </div>

  <div class="nav-second_section d-flex justify-content-between">
    <ul>
      <li><a href="#">berita daerah</a></li>
      <li><a href="#">ekonomi bisnis</a></li>
      <li><a href="#">politik</a></li>
      <li><a href="#">olahraga</a></li>
      <li><a href="#">hukum & kriminal</a></li>
      <li><a href="#">agri farming</a></li>
      <li><a href="#">hiburan</a></li>
      <li><a href="#">photo</a></li>
      <li><a href="#">video</a></li>
      <li><a href="#">lainnya ></a></li>
    </ul>
    <div class="route_login">
      <a href="#">masuk</a>
    </div>
  </div>
</nav>