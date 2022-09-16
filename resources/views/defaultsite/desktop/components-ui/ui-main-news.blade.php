<div class="main-news-container">
    <figure>
        <a href="{{ $hl[0]['news_image']['real'] }}" _noblank>
            <img src={{ $hl[0]['news_image']['real'] }}>
        </a>
        <figcaption>5 menit lalu</figcaption>
    </figure>
    <div class="main-news-deskripsi">
        <h3>{{ $hl[0]['news_title'] }}</h3>
        <p>{{ $hl[0]['news_synopsis'] }}</p>
    </div>
</div>
