@if ($breaking = \Data::headline() ?? null)
    @if (count($breaking) > 0)
        <div class="breaking-news-container">
            <div class="breaking-news-logo">
                breaking news
            </div>
            <div class="breaking-text-marquee">
                <marquee direction="left">
                    {{ $breaking[0]['news_title'] }}
                </marquee>
            </div>
        </div>
    @endif
@endif