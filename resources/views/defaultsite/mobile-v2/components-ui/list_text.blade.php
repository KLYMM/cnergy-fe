<div class="list-main-news-container" style="margin: 25px 20px">
<article id="{{$r['news_id']}}" class="articles articles--text">
    <div class="card-news">
        <a href="{{ Src::detail($r) }}" aria-label="{{ $r['news_title'] ?? 'untitled' }}">
            <div class="image-news">
                @include('image', [
                    'source' => $r,
                    'size' => '85x85',
                    $r['news_title'] ?? null,
                ])
            </div>
            <div class="description" >
                <div class="banner">
                    <p class="text-category" href="{{ Src::category($r) }}">{{ $r['category_name'] ?? (last($r['news_category'])['name'] ?? '') }}</p>
                    <span>{{ Util::date($r['news_date_publish'], 'ago') }}</span>
                </div>
                <h4 class="text-title" href="{{ Src::detail($r) }}">{{ $r['news_title'] ?? null }}</h4>
            </div>
        </a>
    </div>
</article>
</div>

</article>
