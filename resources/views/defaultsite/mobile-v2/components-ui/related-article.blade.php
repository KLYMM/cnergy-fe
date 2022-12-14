<div class="artikel-terkait-container">
    <h4>{{ $title }}</h4>
    @foreach ($news as $item)
        <figure>
            <a href="{{ Src::detail($item) }}" aria-label="{{ $item['news_title'] ?? null }}">
                <div class="image-news">
                    @include('image', [
                        'source' => $item,
                        'size' => '375x208',
                        $item['news_title'] ?? null,
                    ])
                </div>
            </a>
            <figcaption>
                <h2 class="item-desc-title font-bold"><a
                        href="{{ Src::detail($item) }}">{{ $item['news_title'] ?? null }}</a></h2>
                <div style="font-size:10px; min-width:max-content; margin-top:5px;"><span
                        class="related-span">{{ $item['news_category'][0]['name'] }} </span> <span
                        class="related-span2">{{ Util::date($item['news_date_publish'], 'ago') }}</span></div>
            </figcaption>
        </figure>
    @endforeach
</div>
