<div class="slider-container">
    {{-- @dump($hl) --}}
    @if (count($hl) > 0)
        <h4>{{ $title }}</h4>
        <div class="slider-content">
            @foreach ($hl as $s)
                <div class="slider-news">
                    <a href="{{ Src::detail($s) }}" aria-label="{{ $s['news_title'] ?? null }}">
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
                                <div style="font-size:10px; min-width:max-content; margin-top:5px;">
                                    <span class="slider-category">{{ $s['category_name'] }} </span>
                                    <span
                                        class="slider-date-category">{{ Util::date($s['news_date_publish'], 'ago') }}</span>
                                </div>
                            </figcaption>
                        </figure>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
