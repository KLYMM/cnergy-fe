@if( $rows )
    @foreach( $rows as $r )
        @if ($loop->index==0)
            @if (($page??null)=='homepage')
                @if (($data??null)=='latest')
                    {{-- <div class="channel-ad channel-ad_ad-sc-2">
                        {!! Util::getAds('showcase-2') !!}
                    </div> --}}
                @endif
            @endif
        @endif
        <article id="{{$r['news_id']}}" class="artikel-terkait-container mb-5">
            <figure class="image-news mb-3" >
                <a href="{{ Src::detail($r) }}" aria-label="{{ $r[0]['news_title'] ?? null }}">
                        @include('image', [
                          'source' => $r,
                          'force' => '375x208',
                          'size' => '375x208',
                          $r['news_title'] ?? null,
                      ])
                    <span class="item-img-info">
                        <div class="item-img-data" >{{ count($r['photonews']??[])!=0?count($r['photonews']):($r['photonews_count']??0) }}</div>
                    </span>
                </a>
            </figure>
            <figcaption> 
                <div class="d-flex "> 
                     <a class="text-category" href="{{ Src::category($r) }}">{{ $r['category_name'] ?? (last($r['news_category'])['name'] ?? '') }}
                </a>
                <p class="item-desc-time ms-3">{{ Util::date(date('Y-M-d H:i:s', strtotime($r['news_date_publish'])), 'short') }}</p> 
                </div>
                <h2 class="item-desc-title py-3"><a  href="{{Src::detail($r)}}" >{{$r['news_title']??null}}</a></h2>
            </figcaption>
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