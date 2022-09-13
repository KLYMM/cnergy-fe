@if ($tag=collect(Data::trendingTag())->slice(0, 5)??null)
     @if (count($tag)>0)
        <div class="section section--trending">
            <h1 class="section-title text-16 mb-4">TRENDING TAG #</h1>
            <ul class="section--trending-list list-none" >
                @foreach ($tag as $r)
                    <li class="section--trending-list-item"><a href="{{Src::detailTag($r)}}"><span>{{$r['title']??null}}</span> <i class="icon icon--chevronright"></i></a></li>
                @endforeach
            </ul>
        </div>
    @endif
@endif