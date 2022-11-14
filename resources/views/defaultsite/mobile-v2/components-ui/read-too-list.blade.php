<div class="baca-juga-list-container">
    <h4 class="mb-3">ALSO READ</h4>
    <ul>
        @foreach ($news as $item)
            <li class="mb-3"><a href="{{ Src::detail($item) }}"
                    aria-label="{{ $item['news_title'] ?? null }}">{{ $item['news_title'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
