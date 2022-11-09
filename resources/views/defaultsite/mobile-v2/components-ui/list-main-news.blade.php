@if (count($latest) > 0)
    @if ($latest = collect($latest)->slice(0, 5))
        {{-- !! --}}
        <h2 class="HASAN TAMBAHIN">{{ $title ?? 'Related News' }}</h2>
        <div class="list-main-news-container">
            @foreach ($latest as $ln)
                <div class="card-news">
                    <a href="{{ Src::detail($ln) }}" aria-label="{{ $ln['news_title'] ?? null }}">
                        <div class="image-news">
                            @include('image', [
                                'source' => $ln,
                                'size' => '85x85',
                                $ln['news_title'] ?? null,
                            ])
                        </div>

                        <div class="description">
                            <div class="banner">
                                <p>{{ $ln['category_name'] }}</p>
                                <span>{{ Util::date($ln['news_date_publish'], 'ago') }}</span>
                            </div>
                            <h4>{{ $ln['news_title'] }}</h4>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
@endif
