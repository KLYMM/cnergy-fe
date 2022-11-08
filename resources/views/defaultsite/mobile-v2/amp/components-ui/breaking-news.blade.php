@if ($breaking = \Data::headline() ?? null)
    @if (count($breaking) > 0)
        <div class="breaking-news-container">
            <div class="breaking-news-logo">
                breaking news
            </div>
            <div class="breaking-text-marquee">
                <div class="marquee-left" >
                    <span>{{ $breaking[0]['news_title'] }}</span>
                </div>
            </div>
        </div>
    @endif
@endif