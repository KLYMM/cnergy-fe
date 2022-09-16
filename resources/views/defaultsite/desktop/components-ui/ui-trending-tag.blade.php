@if ($tag=collect(Data::trendingTag())->slice(0, 5)??null)
  @if (count($tag)>0)
    <div class="trending-tag-container">
      <h4>trending tag #</h4>
      <ul>
        @foreach ($tag as $r)
          <li><a href="{{Src::detailTag($r)}}">{{$r['title']??null}}</a></li>
        @endforeach
      </ul>
    </div>
  @endif
@endif