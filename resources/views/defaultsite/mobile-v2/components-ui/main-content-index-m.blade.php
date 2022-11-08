
 {{-- <div class="main-news-deskripsi">
    <h3>{{ $headline['news_title'] ?? null }}</h3>
    <p>By <span><a href="{{ Src::author($headline) }}" style="color: #CA0000;">{{$headline['news_editor'][0]['name']??null}}</a></span> {{ Util::date($row['news_date_publish'] ?? null, 'long_time') }}</p>
   <figure>
      <div class="image-news">
          @include('image', [
              'source' => $headline,
              'size' => '380x214',
              $headline['news_title'] ?? null,
          ])
      </div>
      <p>{{ $headline['news_imageinfo'] ?? null }}</p>
  </figure>
</div> --}}
<div class="more-info-container-index">

    {{-- <p>{{ $tag['content'] ?? null }}</p> --}}
    <h1 class="index-h1"> {{ $headline['news_title'] ?? null }}</h1>
    {{$tag['name']??null}}
    {{-- <p class="index-tag">{{$headline['news_category']}}</p> --}}
   
    <div class="desc-index">
            <p class="index-p">
                {{$tag['description']??null}}   
                <span class="index-span">Selengkapnya</span>
        </p>
    <p class="index-tentang">About: {{ $headline['news_synopsis'] ?? null }}</p>
    <p class="index-lokasi">Location: {{ $headline['news_city'] ?? null }}</p>
    <p class="index-date">News Date Publish: {{ Util::date($headline['news_entry'], 'ago') }}</p>
    </div>  
    
</div>
    