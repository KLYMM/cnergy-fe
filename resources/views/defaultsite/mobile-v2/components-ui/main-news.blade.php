<div class="main-news-container">
  <figure>
    <a href="{{ Src::detail($mn[0]) }}" aria-label="{{ $mn[0]['news_title'] ?? null }}">
      <div class="image-news">
        @include('image', [
              'source' => $mn[0],
              'size' => '375x208',
              $mn['news_title'] ?? null,
          ])
      </div>
    </a>
  </figure>
  <div class="main-news-deskripsi" >
    <a href="{{ Src::detail($mn[0]) }}" aria-label="{{ $mn[0]['news_title'] ?? null }}"><h3>{{ $mn[0]['news_title'] }}</h3></a>
    <p>{{ Util::date($mn[0]['news_date_publish'], 'ago') }} </p>
    <div class="main-section " style="margin: 0 20px" >
      @if( $mn[0]['news_type'] == 'photonews' )
      <i class="fa-solid fa-camera text-danger"> <span class="photo-list"><a href="{{ Src::detail($mn[0]) }}" >Open Photo </a></span></i>
      @endif 
      @if( $mn[0]['news_type'] == 'video' )
      <i class="fa-brands fa-youtube text-danger" style="width:100%; height:100%;"><span class="video-list" > <a href="{{ Src::detail($mn[0]) }}" >Play Video </a></span> </i>
      @endif
    </div>
  </div>
</div>