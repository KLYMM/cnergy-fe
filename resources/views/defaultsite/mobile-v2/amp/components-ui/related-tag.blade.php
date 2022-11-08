@if ($row['news_tag'] ?? null)
    <h4 class="related-title">Related Tags</h4>
    <div class="related-tag-container">
        @foreach ($row['news_tag'] as $r)
            <a class="btn btn-related"  href="{{ Src::detailTag($r) }}">{{ $r['tag_name'] ?? null }}</a>
        @endforeach
      </div>
@endif