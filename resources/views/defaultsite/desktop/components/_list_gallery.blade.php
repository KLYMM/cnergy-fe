<article id="{{$r['news_id']}}" class="articles articles--galeri">

    <figure class="item item--galeri">
        <a class="item--galeri-img rounded-lg" href="{{ Src::detail($r) }}" aria-label="{{ $r['news_title']??'untitled' }}">
            <span class="item-img item-img--main">
                @include('image', ['source'=>$r, 'size'=>'426x238', $r['news_title']??null])
            </span>
            @if( $r['photonews'] )
            @foreach( array_slice($r['photonews'], 0, 2) as $p )
                <span class="item-img item-img--aside {{$loop->last ? 'item-img--overlay' : 'item-img--none'}}" {{$loop->last && ((count($r['photonews'])-2)>0) ? 'data-photo=+'.count($r['photonews'])-2 : ''}}>
                    @include('image', ['source'=>$p, 'size'=>'255x143', $r['news_title']??null])
                </span>
            @endforeach
            @endif
        </a>
        <figcaption class="item-desc pt-4">
            <div class="item-desc-header text-10 mb-2">
                <a href="{{ Src::category($r) }}" class="item-desc-tag mr-1">{{ $r['category_name'] ?? (last($r['news_category'])['name'] ?? '') }}</a> 
                <span class="item-desc-time">{{ Util::date($r['news_date_publish'], 'ago') }}</span>
            </div>
            <h2 class="item-desc-title text-16 font-bold"><a href="{{ Src::detail($r) }}">{{ $r['news_title']??null }}</a></h2>
        </figcaption>
    </figure>

</article>