<div class="baca-juga-list-container">
    <h4>Read More</h4>
    @foreach ($news as $item)
    <ul>
      <li><a href="{{ Src::detail($item) }}" aria-label="{{ $item['news_title'] ?? null }}">{{ $item['news_title'] }}</a></li>
      
    </ul>
    @endforeach 
  </div>