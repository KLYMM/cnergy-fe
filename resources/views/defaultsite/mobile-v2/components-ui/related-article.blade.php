<div class="artikel-terkait-container">

   <h4>{{$title}}</h4>
    @foreach ($news as $item)
    <figure>
    <a href="{{ Src::detail($item) }}" aria-label="{{ $item[0]['news_title'] ?? null }}">
      <div class="image-news">
          @include('image', [
            'source' => $item,
            'size' => '375x208',
            $item['news_title'] ?? null,
        ])
      </div>
    </a>
    <figcaption>
        <h2 class="item-desc-title font-bold"><a  href="{{Src::detail($item)}}" >{{$item['news_title']??null}}</a></h2>
        <div style="font-size:10px; min-width:max-content; margin-top:5px;"><span style="text-transform: uppercase; color:#FF3903;padding-right:5px; ">{{ $item['news_category'][0]['name'] }} </span> <span style="color:#999999;">{{  Util::date($item['news_date_publish'], 'ago') }}</span></div>
    </figcaption>
    </figure>

@endforeach 
</div>