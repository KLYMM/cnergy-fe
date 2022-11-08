<div class="photo-collection-container">
  @if (count($photo) > 0)
  <div style="display: flex">
    <h4>{{ $title }}</h4>
    <img class="silder-vector" src="{{ URL::asset('assets/images/vector-red.svg') }}" /> 
  </div>
  <div class="card-photo-content">
    @foreach ($photo as $r)
    <div class="card-photo-news">
      <div class="image-news">
        <a href="{{ Src::detail($r) }}" data-duration="{{ null }}"
            data-duration="{{ count($r['photonews'] ?? []) != 0 ? count($r['photonews']) : $r['photonews_count'] ?? 0 }}"
            aria-label="{{ $r['news_title'] ?? null }}">
            @include('image', [
                'source' => $r,
                'size' => '145x82',
                $r['news_title'] ?? null,
            ])
        </a>
      </div>
      <p class="photo-p"><a href="{{ Src::detail($r) }}">{{ $r['news_title'] ?? null }}</a></p>
    </div>
    @endforeach
  </div>
  @endif
</div>