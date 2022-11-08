<div class="populer-container">
    <h4>Popular</h4>
    <div class="list-berita-populer">
        @foreach ($popular as $item)
            <a href="{{ Src::detail($item) }}" aria-label="{{ $item['news_title'] ?? null }}">
                <div>
                    <h1>{{ $loop->iteration }}</h1>
                </div>
                <div class="berita-populer-deskripsi">
                    <span>{{ $item['category_name'] }}</span>
                    <p>{{ $item['news_title'] }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>

