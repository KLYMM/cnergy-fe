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
    </figcaption>
    </figure>

@endforeach 
</div>