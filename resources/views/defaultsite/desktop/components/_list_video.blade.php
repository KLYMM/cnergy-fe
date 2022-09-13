<article id="{{$r['news_id']}}" class="articles articles--video">
    <figure class="item item--video">
        <figcaption class="item-desc pb-4">
            <div class="item-desc-header text-10 mb-1">
                <a href="{{ Src::category($r) }}" class="item-desc-tag mr-1">{{ $r['category_name'] ?? (last($r['news_category'])['name'] ?? '') }}</a> 
                <span class="item-desc-time">{{ Util::date($r['news_date_publish'], 'ago') }}</span>
            </div>
            <h2 class="item-desc-title text-16 font-bold">
                <a href="{{ Src::detail($r) }}">{{ $r['news_title']??null }}</a>
            </h2>
        </figcaption>
        <a href="{{ Src::detail($r) }}" class="item-img aspect-[16/9] rounded-lg" aria-label="{{ $r['news_title']??'untitled' }}">
            @include('image', ['source'=>$r, 'size'=>'640x360', $r['news_title']??null])
        </a>
    </figure>
</article>
