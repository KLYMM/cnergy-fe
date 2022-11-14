@if ($tag = collect(Data::trendingTag())->slice(0, 5) ?? null)
    @if (count($tag) > 0)
        <div class="trending-tag-container">
            <h4>trending tag</h4>
            <div class="list-trending-tag">
                @foreach ($tag as $r)
                    <a class="px-2" href="{{ Src::detailTag($r) }}">#{{ $r['title'] ?? null }}</a>
                @endforeach
            </div>
        </div>
    @endif
@endif
