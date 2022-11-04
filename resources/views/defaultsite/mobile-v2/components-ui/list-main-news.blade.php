<div class="list-main-news-container">
  @foreach ($listnews as $ln)
    <div class="card-news">
      <a  href="{{ Src::detail($ln) }}" aria-label="{{ $ln['news_title'] ?? null }}">
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