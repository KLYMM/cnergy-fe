<div class="highlight-article-container ">
    <a href="#">
        <figure>
            <div class="image-news" style="border-radius: 8px">
                @include('image', [
                  'source' => $headline,
                  'size' => '375x208',
                  $headline['news_title'] ?? null,
              ])
            </div>
            <div class="banner">
                <p>{{$headline['news_category'][0]['name']}}</p>
                <span>{{$headline['news_last_update']}}
                </span>
            </div>
            <a style="color: black" href="{{Src::detail($headline)}}" > <h2 class="item-desc-highlight">{{$headline['news_title']??null}}</h2></a>
        </figure>
    </a>
</div>