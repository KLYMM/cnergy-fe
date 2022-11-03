<div data-section="3" class="item-section">
    <article>
        <div class="content-tag d-flex flex-wrap  align-items-center pt-3">
            @foreach ($newsItem['news_tag'] as $items)
                <h2 class="pt-1">{{ $items['tag_name'] }}</h2>
            @endforeach
        </div>
        <div class="content-title mb-1">
            <h1>{{ $newsItem['news_title'] }}</h1>
            <span>{{ $newsItem['news_date_publish'] }}</span>
        </div>
        <div class="content-image">
            <figure>
                <img src="{{ $newsItem['news_image']['real'] }}" alt="images" width="375" height="225">
            </figure>
        </div>
        <div class="content-desc my-1 pb-3">
            <p>{{ $newsItem['news_synopsis'] }}</p>
        </div>
    </article>
    <div class="button-section p-3">
        <a class="read-more" href="{{ Src::detail($newsItem) }}">Selengkapnya<i
                class="fa-solid fa-arrow-right ms-1"></i></a>
        <a class="like-button" href="#"><i class="fa-regular fa-heart fs-2"></i></a>
        <a class="share-button" href="#"><i class="fa-sharp fa-solid fa-share-nodes fs-2"></i></a>
    </div>
</div>
