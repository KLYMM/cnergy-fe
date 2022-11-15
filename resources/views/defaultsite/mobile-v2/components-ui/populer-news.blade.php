<div class="populer-container">
    <h4 class="title-popular" style="color: white">Popular News</h4>
    <div class="list-berita-populer">
        @foreach ($popular as $item)
            <a href="{{ Src::detail($item) }}" aria-label="{{ $item['news_title'] ?? null }}">
                <div>
                    <h1>{{ $loop->iteration }}</h1>
                </div>
                <div class="berita-populer-deskripsi">
                    <p>{{ $item['news_title'] }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>

