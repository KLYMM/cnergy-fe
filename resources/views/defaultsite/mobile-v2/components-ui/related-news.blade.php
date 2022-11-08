<div class="artikel-terkait-container">
  <h4 class="py-4">{{$title}}</h4>
   @foreach ($news as $new)
   <figure>
   <a href="{{ Src::detail($new) }}" aria-label="{{ $new[0]['news_title'] ?? null }}">
     <div class="image-news">
         @include('image', [
           'source' => $new,
           'size' => '375x208',
           $new['news_title'] ?? null,
       ])
         <span class="item-img-info">
            <div class="item-img-data" >{{ count($new['photonews']??[])!=0?count($new['photonews']):($new['photonews_count']??0) }}</div>
        </span>
     </div>
   </a>
   <figcaption>
       <h2 class="item-desc-title font-bold"><a  href="{{Src::detail($new)}}" >{{$new['news_title']??null}}</a></h2>
   </figcaption>
   </figure>
   @if (($page??null)=='readpage')
   @if ($loop->index==4)
       @if (($data??null)=='recommendation')
           {{-- <div class="channel-ad channel-ad_ad-sc">
               {!! Util::getAds('showcase-1') !!}
           </div> --}}
       @endif
   @endif
@endif

@endforeach 
</div>