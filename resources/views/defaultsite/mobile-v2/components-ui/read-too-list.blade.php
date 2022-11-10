<div class="baca-juga-list-container">
  <h4>READ TOO</h4>
  <ul>
  @foreach ($news as $item)
    <li style="padding:15px 5px;"><a href="{{ Src::detail($item) }}" aria-label="{{ $item['news_title'] ?? null }}">{{ $item['news_title'] }}</a></li>
  @endforeach
  </ul>
</div>