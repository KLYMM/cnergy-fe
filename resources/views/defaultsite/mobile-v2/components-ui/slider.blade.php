<div class="slider-container">
@if (count($hl) > 0)
  <h4 class="font-outfit">{{ $title }}</h4>
  <div class="slider-content">
    @foreach ($hl as $s)
    <div class="slider-news">
      <a href="{{ Src::detail($s) }}" aria-label="{{ $s[0]['news_title'] ?? null }}">
        <figure>
          <div class="image-news">
            @include('image', [
              'source' => $s,
              'size' => '212x115',
              $s['news_title'] ?? null,
          ])
          </div>
          <figcaption>
            <div class="title_slider">{{ $s['news_title'] }}</div>
            <div style="font-size:10px; min-width:max-content; margin-top:5px;"><span class="font-inter" style="text-transform: uppercase; color:#FF3903;padding-right:5px; ">{{ $s['news_category'][0]['name'] }} </span> <span class="font-outfit" style="color:#999999;">{{  Util::date($s['news_date_publish'], 'ago') }}</span></div>
          </figcaption>
        </figure>
      </a>
    </div>
   @endforeach
  </div>
@endif
</div>
