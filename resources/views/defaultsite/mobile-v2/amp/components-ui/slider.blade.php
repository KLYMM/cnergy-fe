<div class="slider-container">
    @if (count($hl) > 0)
      <h4>{{ $title }}</h4>
      <div class="slider-content">
        @foreach ($hl as $s)
        <div class="slider-news">
          <a href="{{ Src::detail($s) }}" aria-label="{{ $s[0]['news_title'] ?? null }}">
            <figure>
              <div class="image-news">
                @include('defaultsite/mobile/amp/image', [
                  'source' => $s,
                  'sizeW' => '212',
                  'sizeH' => '115',
                  $s['news_title'] ?? null,
              ])
              </div>
              <figcaption>{{ $s['news_title'] }}</figcaption>
            </figure>
          </a>
        </div>
       @endforeach
      </div>
    @endif
    </div>
   