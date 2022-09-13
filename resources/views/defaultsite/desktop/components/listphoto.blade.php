@if (count($rows)>0)
    <ul class="section--index-grid grid grid-cols-4 gap-4">
        @foreach ($rows as $r)
            <li class="section--index-grid-item">
                <figure class="item">
                    <a href="{{ Src::detail($r) }}" class="item-img rounded-lg" data-duration="{{ count($r['photonews']??[])!=0?count($r['photonews']):($r['photonews_count']??0) }}" aria-label="{{$r['news_title']??null}}">
                        @include('image', ['source'=>$r, 'size'=>'145x82', $r['news_title']??null])
                    </a>
                    <figcaption class="item-desc pt-2">
                        <h2 class="item-desc-title font-bold"><a href="{{ Src::detail($r) }}" >{{$r['news_title']??null}}</a></h2>
                    </figcaption>
                </figure>
            </li>
        @endforeach
    </ul>
@endif
