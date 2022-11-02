<div class="section-theme">
    <figure>
        <img src="{{ $newsItem['news_image']['real'] }}" class="rounded-4" alt="gambar Sambo" width="375" height="225">
    </figure>

    <h1>{{ $newsItem['news_title'] }}</h1>

    <span>{{ $newsItem['news_date_publish'] }}</span>

    <p>{{ $newsItem['news_synopsis'] }}</p>

    <hr style="border-top: 2px solid black">

    <h4>
        @foreach ($newsItem['news_tag'] as $items)
            <span>{{ $items['tag_name'] }}</span>
        @endforeach
    </h4>
</div>

<div class="menu-selengkapnya">
    <a href="{{ Src::detail($newsItem) }}">
        <span>Selengkapnya</span>
        <i class="fa-solid fa-arrow-right fs-2"></i>
    </a>
    <button>
        <i class="fa-regular fa-heart"></i>
    </button>
    <button>
        <i class="fa-solid fa-share-nodes"></i>
    </button>
</div>