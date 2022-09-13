<article id="{{$r['news_id']}}" class="articles articles--text">
    <figure class="item item--text flex items-start justify-between">
        <figcaption class="item-desc flex-1 pr-4">
            <div class="item-desc-header text-10 mb-1">
                <a href="{{ Src::category($r) }}" class="item-desc-tag mr-1">{{ $r['category_name'] ?? (last($r['news_category'])['name'] ?? '') }}</a> 
                <span class="item-desc-time">{{ Util::date(date('Y-M-d H:i:s', strtotime($r['news_date_publish'])), 'short') }}</span>
            </div>
            <h2 class="item-desc-title text-16 font-bold mb-2"><a href="{{ Src::detail($r) }}">{{ $r['news_title']??null }}</a></h2>
        </figcaption>
        <span class="item--text-img">
            <a class="item-img aspect-square rounded-lg" href="{{ Src::detail($r) }}" aria-label="{{ $r['news_title']??'' }}">
                @include('image', ['source'=>$r, 'size'=>'85x85', $r['news_title']??null])
            </a>
        </span>
    </figure>
</article>