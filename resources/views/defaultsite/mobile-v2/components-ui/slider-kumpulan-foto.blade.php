<div class="swiper-wrapper">
  @if (count($row['photonews']??[])>0)
    <div class="header-photo">
        <h3 class="photo-t">{{ $row['news_title'] ?? null }}</h3>
        <p class="photo-author pt-2">By <a style="color: #CA0000 ;"  href="{{ Src::author($row) }}">{{$row['news_editor'][0]['name']??null}}</a> {{ Util::date($row['news_date_publish'] ?? null, 'long_time') }}</p>
      <p class="photo-synopsis"> {{$row['news_synopsis']??null}}</p>       
    </div>
      <div class="slider-content">
        @foreach ($row['photonews'] as $s)
        <div class="swiper-slide">
          <a href="{{ Src::detail($s) }}" aria-label="{{ $s[0]['news_title'] ?? null }}"> 
            <figure>
              <div class="image-news-slider">
                @include('image', [
                  'source' => $s,
                  'size' => '375x208',
                  $s['news_title'] ?? null,
                ])
              </div>
            </figure>
          </a>
        </div>
       @endforeach
      </div>
      <div class="slider-counter"><span id="sliderCounter"></span> / {{ count($row['photonews']) }}</div>
    @endif
</div>
