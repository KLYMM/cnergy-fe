<article id="{{$r['news_id']}}" class="articles articles--text">
  <figure class="item item--text flex items-start justify-between">
    <span class="item--text-img">
        <a href="{{ Src::detail($r) }}" class="item-img aspect-[19/11] rounded-lg" aria-label="{{ $r['news_title']??'untitled' }}">
            @include('image', ['source'=>$r, 'size'=>'200x112', $r['news_title']??null])
        </a>
    </span>
    <figcaption class="item-desc flex-1 pl-4">
      <div class="item-desc-header text-10 mb-1">
        <a href="{{ Src::category($r) }}" class="item-desc-tag mr-1">{{ $r['category_name'] ?? (last($r['news_category'])['name'] ?? '') }}</a>
        <span class="item-desc-time">{{ Util::date($r['news_date_publish'], 'ago') }}</span>
      </div>
      <h2 class="item-desc-title text-16 font-bold mb-2">
        <a href="{{ Src::detail($r) }}">{{ $r['news_title']??null }}</a>
      </h2>
      <p class="item-desc-text">
        {{ $r['news_synopsis'] }}
      </p>
    </figcaption>
  </figure>
</article>
