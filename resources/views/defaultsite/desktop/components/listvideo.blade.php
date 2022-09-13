@if (count($rows)>0)
    <ul class="section--index-grid grid grid-cols-3 gap-4">
        @foreach ($rows as $r)
            <li class="section--index-grid-item">
                <figure class="item">
                    <a href="{{ Src::detail($r) }}" class="item-img aspect-[19/11] rounded-lg" data-duration="{{null}}" aria-label="{{$r['news_title']??null}}" style="--bg-black-opacity: transparant;">
                        <i class="icon icon--play icon--big"></i>
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
