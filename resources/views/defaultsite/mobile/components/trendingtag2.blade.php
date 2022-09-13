@if ($trendingTag=collect(\Data::trendingTag())->slice(0, 4)??null)
    @if( count($trendingTag) !== 0 )
        <div class="section section--trending">
            <h1 class="section-title text-16 mb-4">TOPIK POPULER</h1>
            <ul class="section--trending-list list-none" >
                @foreach($trendingTag as $p)
                <li class="section--trending-list-item"><a href="{{ Src::detailTag($p) }}">{{ $p['title'] }}</a></li>
                @endforeach
            </ul>
        </div>
    @endif
@endif
