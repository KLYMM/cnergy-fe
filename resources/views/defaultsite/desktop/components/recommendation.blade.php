@if ($news=\Data::recommendation($reference)??null)
    @if( count($news) !== 0 )
        <div class="section section--promotion">
            <h1 class="section-title text-16 mb-4">Berita Rekomendasi</h1>
            <ul class="section--promotion-list list-none">
                @foreach ($news as $new)
                    <li class="section--promotion-list-item">
                        @if ( $loop->index ==0)
                            <figure class="item">
                                <a href="{{Src::detail($new)}}" class="item-img aspect-[300/172] rounded-lg" aria-label="{{$new['news_title']??null}}">
                                    @include('image', ['source'=>$new, 'size'=>'300x172', $new['news_title']??null])
                                </a>
                                <figcaption class="item-desc pt-2">
                                    <h2 class="item-desc-title font-bold"><a href="{{Src::detail($new)}}">{{$new['news_title']??null}}</a></h2>
                                </figcaption>
                            </figure>
                        @else
                            <figure class="item item--text flex items-start justify-between">
                                <span class="item--text-img">
                                    <a href="{{Src::detail($new)}}" class="item-img aspect-square rounded-lg" aria-label="{{$new['news_title']??null}}">
                                        @include('image', ['source'=>$new, 'size'=>'60x60', $new['news_title']??null])
                                    </a>
                                </span>
                                <figcaption class="item-desc flex-1 pl-4">
                                    <h2 class="item-desc-title font-bold"><a href="{{Src::detail($new)}}">{{$new['news_title']??null}}</a></h2>
                                </figcaption>
                            </figure>
                        @endif
                        
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@endif