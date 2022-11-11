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
        <ol class="breadcrumb">
            @foreach ($row['news_tag'] as $r)
                <li class="d-flex flex-wrap gap-3">
                    <a href="{{ Src::detailTag($r) }}"
                        style="font-weight: 700; color: #ff3903; background-color: #FFF0EC; padding: 4px 8px;">{{ $r['tag_name'] ?? null }}
                    </a>
                    <span style="font-weight: 700; color: #ff3903;  padding: 4px 8px;">More
                        +</span>
                </li>
            @endforeach
        </ol>
    </div>
@endif
