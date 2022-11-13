{{-- @dump( Data::trendingTag() ?? null) --}}
@if ($trendingTag = collect(\Data::trendingTag())->slice(0, 4) ?? null)
    @if (count($trendingTag) !== 0) 
            <ul>
                @foreach ($trendingTag as $tag)
                    <li><a  href="{{ Src::detailTag($tag) }}">#{{ $tag['title'] }}</a></li>
                @endforeach
            </ul>
    @endif
@endif