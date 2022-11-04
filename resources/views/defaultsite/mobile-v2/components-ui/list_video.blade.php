<article id="{{$r['news_id']}}">
    <div class="highlight-article-container ">
        <a href="{{ Src::detail($r) }}" aria-label="{{ $r['news_title']??'untitled' }}">
            <figure>
                <div class="image-news" style="border-radius: 8px">
                    @include('image', [
                    'source' => $r,
                    'size' => '375x208',
                    $r['news_title'] ?? null,
                ])
                </div>
                <div class="banner">
                    <p>{{ $r['category_name'] ?? (last($r['news_category'])['name'] ?? '') }}</p>
                    <span>{{ Util::date(date('Y-M-d H:i:s', strtotime($r['news_date_publish'])), 'short') }}
                    </span>
                </div>
                <a style="color: black" href="{{ Src::detail($r) }}" > <h2 class="item-desc-highlight">{{ $r['news_title']??null }}</h2></a>
                
            </figure>
        </a>
    </div>
</article>
