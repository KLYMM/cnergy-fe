<div class="form-modal" id="report">
  <a class="modal__close" href="#"></a>
  <div class="modal__content">
    <a class="modal__content__close" href="#">x</a>
    <div class="form-report">
      <h4>Laporkan Artikel</h4>
      <div class="banner-article">
        <img src="{{ URL::asset('assets/images/news-image.webp') }}" alt="news" width="73px" height="41px">
        <p>Sepenggal Kenangan Nicky Hayden ketika ada di Jalanan Jakarta</p>
      </div>
      <div class="form-data-report">
        <input type="text" placeholder="Nama Depan">
        <input type="email" placeholder="Email">
        <input type="text" placeholder="Nomor HP">
        <input type="text" placeholder="Judul Laporan">
        <textarea cols="30" rows="5">Detail Laporan</textarea>
      </div>
      <div class="submit-report-content">
        <button>kirim</button>
      </div>
    </div>
  </div>
</div>