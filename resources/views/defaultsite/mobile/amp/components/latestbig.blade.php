<ul class="tabs-recommend gap-4">
    @if ($news??null)
        @foreach ($news as $new)
            <li class="tabs-recommend-item">
            <figure class="item  rounded-lg ">
                <a href="{{Src::detail($new)}}" class="item-img aspect-[200/113]" aria-label="{{$new['news_title']??null}}">
                    @include('defaultsite/mobile/amp/image',['source'=>$new,  'sizeW'=>'375','sizeH'=>'208', $new['news_title']??null])
                    @if(($new['news_type']??null) == 'photonews'  )
                    <span class="item-img-info"> <i class="icon icon--maxphoto mr-1"></i> <span>{{ count($new['photonews']??[]) }}</span> </span>
                    @endif
                </a>
                <figcaption class="item-desc p-4">
                <h2 class="item-desc-title font-bold"><a href="{{Src::detail($new)}}">{{$new['news_title']??null}}</a></h2>
                </figcaption>
            </figure>
            </li>
            @if (($page??null)=='readpage')
                @if ($loop->index==4)
                    @if (($data??null)=='recommendation')
                        <div class="channel-ad channel-ad_ad-sc">
                            {!! Util::getAds('showcase-1') !!}
                        </div>
                    @endif
                    @if (($data??null)=='latest')
                        <div class="channel-ad channel-ad_ad-exposer">
                            {!! Util::getAds('exposer-2') !!}
                        </div>
                    @endif
                @endif
            @endif
        @endforeach
    @endif
  </ul>