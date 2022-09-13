@if ($latest = collect($latest)->slice(0, 6))
    <div class="section section--index">
        <h1 class="section-title text-16 mb-4">FOTO TERKINI</h1>
        <ul class="section--index-grid grid grid-cols-2 gap-4">
            @foreach ($latest as $r)
                <li class="section--index-grid-item">
                    <figure class="item">
                        <a href="{{ Src::detail($r) }}" class="item-img aspect-[200/112] rounded-lg">
                            @include('image', ['source'=>$r, 'size'=>'200x112', $r['news_title']??null])
                        </a>
                        <figcaption class="item-desc pt-2">
                            <h2 class="item-desc-title font-bold"><a href="{{ Src::detail($r) }}">{{$r['news_title']??null}}</a></h2>
                        </figcaption>
                    </figure>
                </li>
            @endforeach
        </ul>
    </div>
@endif