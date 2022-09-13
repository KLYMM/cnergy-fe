<div class="section--index">
    <ul class="section--index-grid gap-4">
        @if ($news??null)
            @foreach ($news as $new)
                <li class="section--index-grid-item">
                    <figure class="item rounded-lg">
                        <a href="{{Src::detail($new)}}" class="item-img aspect-[200/113]" aria-label="{{$new['news_title']??null}}">

                            @include('image', ['source'=>$new, 'size'=>'375x208', $new['news_title']??null])

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
                    @endif
                @endif
            @endforeach
        @endif
    </ul>
</div>