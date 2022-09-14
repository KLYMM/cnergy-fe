@if( $rows )
    @foreach( $rows as $r )
        <article id="{{$r['news_id']}}" class="articles articles--galeri">
            <figure class="item item--galeri">
                <a href="{{ Src::detail($r) }}" class="item-img aspect-[16/9] rounded-lg" aria-label="{{ $r['news_title']??'untitled' }}">
                    @include('image', ['source'=>$r, 'size'=>'380x214', $r['news_title']??null])
                    <span class="item-img-info">
                        <i class="icon icon--video mr-1"></i>
                        <span>{{ null}}</span>
                    </span>
                </a>
                <figcaption class="item-desc pt-4">
                    <div class="item-desc-header text-10 mb-2">
                        <span class="item-desc-time">{{ Util::date(date('Y-M-d H:i:s', strtotime($r['news_date_publish'])), 'short') }}</span>
                    </div>
                    <h2 class="item-desc-title text-16 font-bold"><a href="{{ Src::detail($r) }}">{{ $r['news_title']??null }}</a></h2>
                </figcaption>
            </figure>
        </article>
    @endforeach
@endif