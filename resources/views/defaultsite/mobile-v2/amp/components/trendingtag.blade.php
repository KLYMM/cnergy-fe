@if ($trendingTag = collect(\Data::trendingTag())->slice(0, 4) ?? null)
    @if (count($trendingTag) !== 0)
        <div class="section section--topik">
            <h2 class="section-title text-16 mb-4">POPULAR TOPIC</h2>
            <ul class="topik text-12 flex  flex-wrap">
                @foreach ($trendingTag as $tag)
                    <li><a class="topik-item p-4 " href="{{ Src::detailTag($tag) }}">{{ $tag['title'] }}</a></li>
                @endforeach
            </ul>
        </div>
    @endif
@endif
