{{-- @if ($row['news_tag'] ?? null)
    <h4 class="related-tag-title">{{ $title }}</h4>
    <div class="related-tag-container">
        @foreach ($row['news_tag'] as $r)
            <a class="btn btn-related" href="{{ Src::detailTag($r) }}">{{ $r['tag_name'] ?? null }}</a>
        @endforeach
    </div>
@endif --}}

@if ($row['news_tag'] ?? null)
    <div aria-label="breadcrumb" style="margin: 0px 20px">
        <h4 class="related-tag-title">{{ $title }}</h4>
        <ol class="d-flex flex-wrap gap-3 align-items-center">
            @foreach ($row['news_tag'] as $r)
                <li >
                    <a href="{{ Src::detailTag($r) }}" class="newstag-a">#{{ $r['tag_name'] ?? null }}
                    </a>
                </li>
            @endforeach
            <li class="newstag-a_a">More+</li>
        </ol>
    </div>
@endif
