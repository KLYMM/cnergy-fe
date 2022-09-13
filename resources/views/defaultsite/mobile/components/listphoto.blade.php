@if( $rows )
    @foreach( $rows as $r )
        @if ($loop->index==0)
            @if (($page??null)=='homepage')
                @if (($data??null)=='latest')
                    <div class="channel-ad channel-ad_ad-sc-2">
                        {!! Util::getAds('showcase-2') !!}
                    </div>
                @endif
            @endif
        @endif
        <article id="{{$r['news_id']}}" class="articles articles--galeri">
            <figure class="item item--galeri">
                <a href="{{ Src::detail($r) }}" class="item-img aspect-[16/9] rounded-lg" aria-label="{{ $r['news_title']??'untitled' }}">
                    @include('image', ['source'=>$r, 'size'=>'380x214', $r['news_title']??null])
                    <span class="item-img-info">
                        <i class="icon icon--maxphoto mr-1"></i>
                        <span>{{ count($r['photonews']??[])!=0?count($r['photonews']):($r['photonews_count']??0) }}</span>
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
        @if ($loop->index==3)
            @if (($page??null)=='homepage')
                @if (($data??null)=='popular')
                    <div class="channel-ad channel-ad_ad-exposer ">
                        {!! Util::getAds('exposer') !!}
                    </div>
                @endif
            @endif
        @endif
        
    @endforeach
@endif