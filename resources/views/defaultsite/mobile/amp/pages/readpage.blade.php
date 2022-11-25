@extends('defaultsite/mobile/amp/layouts/ui-main')

@push('preload')
    <script id="rich-card" type="application/ld+json">
  {!!$datarich!!}
</script>
    @if (strstr(htmlspecialchars_decode($row['news_video']['video'] ?? null), 'youtube.com'))
        <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
    @elseif (strstr(htmlspecialchars_decode($row['news_content'] ?? null), 'youtube.com'))
        <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
    @endif
    @if (strstr(htmlspecialchars_decode($row['news_content'] ?? null), 'blockquote>'))
        @if (strstr(htmlspecialchars_decode($row['news_content'] ?? null), '.instagram.com'))
            <script async custom-element="amp-instagram" src="https://cdn.ampproject.org/v0/amp-instagram-0.1.js"></script>
        @endif
        @if (strstr(htmlspecialchars_decode($row['news_content'] ?? null), '.tiktok.com'))
            <script async custom-element="amp-tiktok" src="https://cdn.ampproject.org/v0/amp-tiktok-0.1.js"></script>
        @endif
    @endif
@endpush

@section('content')
    <!--main.body-->
    <ul class="main-breadcrumb">
        <li class="main-breadcrumb-item"><a href="/">Home</a></li>
        @foreach ($row['news_category'] as $r)
            @if ($loop->iteration == 1)
                <li class="main-breadcrumb-item {{ $loop->count == 1 ? 'active' : '' }}"><a
                        href="{{ url($row['news_category'][0]['url'] ?? '') }}">{{ $r['name'] ?? null }}</a></li>
            @elseif($loop->iteration == 2)
                <li class="main-breadcrumb-item {{ $loop->count == 2 ? 'active' : '' }}"><a
                        href="{{ url(($row['news_category'][0]['url'] ?? '') . '/' . ($row['news_category'][1]['url'] ?? '')) }}">{{ $r['name'] ?? null }}</a>
                </li>
            @elseif($loop->iteration == 3)
                <li class="main-breadcrumb-item {{ $loop->count == 3 ? 'active' : '' }}"><a
                        href="{{ url(($row['news_category'][0]['url'] ?? '') . '/' . ($row['news_category'][1]['url'] ?? '') . '/' . ($row['news_category'][2]['url'] ?? '')) }}">{{ $r['name'] ?? null }}</a>
                </li>
            @endif
        @endforeach
    </ul>

    <div class="main-news-deskripsi">
            <figure>
                <div class="image-news">
                    @include('defaultsite/mobile/amp/image', [
                        'source' => $row,
                        'sizeW' => '380',
                        'sizeH' => '214',
                        $row['news_title'] ?? null,
                    ])
                </div>
                <div class="frame-bottom"></div>
            </figure>
            <h3 class="author-title">{{ $row['news_title'] ?? null }}</h3>
            <div class="header-photo">
                <div class="header-author">
                    <amp-img class="rounded rounded-5" src="{{ URL::asset('assets/images/author.PNG') }}" alt="author"
                        width="40" height="40">
                    </amp-img>  
                    <div class="d-flex flex-column justify-content-center gap-1">
                        <p class="photo-author ">
                            trstd.ly
                        </p>
                        <span class="author_publish">
                            {{ Util::date($row['news_date_publish'] ?? null, 'long_time') }}</span>
                    </div>
                </div>
            </div>
    </div>

        <div class="dt-share-container">
            <div class="share flex flex-wrap items-center">
                <div class="share-item share-item--fb"><a
                        href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=facebook&utm_campaign=Share_Bottom') }}"
                        target="_blank"><i class="icon icons--share icon--share-fb"></i></a></div>
                <div class="share-item share-item--wa"><a
                        href="https://wa.me/?text={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=whatsapp&utm_campaign=Share_Bottom') }}"
                        target="_blank"><i class="icon icons--share icon--share-wa"></i></a></div>
                <div class="share-item share-item--tweet"><a
                        href="https://twitter.com/intent/tweet?u={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=twitter&utm_campaign=Share_Bottom') }}"
                        target="_blank"><i class="icon icons--share icon--share-tweet"></i></a></div>
                <div class="share-item share-item--tele"><a href="https://t.me/share/url?url={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=telegram&utm_campaign=Share_Bottom') }}"
                    target="_blank"><i class="icon icons--share icon--share-tele"></i></a></div>
                    <div class="share-item share-item--link"><a href="https://t.me/share/url?url={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=telegram&utm_campaign=Share_Bottom') }}"
                        target="_blank"><i class="icon icons--share icon--share-link"></i></a></div>
            </div>
        </div>

        @if (count($row['news_paging']) > 0)
        @foreach ($row['news_paging'] as $news_content)
            @if ($loop->iteration != 1)
                <div style="display:flex; align-items: center; margin: 20px; margin-bottom:46px;">
                    <hr class="hr-list">
                    <div class="slider-counter">Page {{ $loop->iteration }}<span id="sliderCounter"></span> of
                        {{ count($row['news_paging']) }}</div>
                    <hr class="hr-list">
                </div>
            @endif
            <div class="dt-paragraph">
                {!! str_replace(
                    ['mce-mce-mce-mce-no/type', 'mce-no/type'],
                    '',
                    htmlspecialchars_decode($news_content['content'] ?? null),
                ) !!}
            </div>
        @endforeach
    @else
        <div class="dt-paragraph">
            {!! str_replace(
                ['mce-mce-mce-mce-no/type', 'mce-no/type'],
                '',
                htmlspecialchars_decode($row['news_content'] ?? null),
            ) !!}
        </div>
    @endif
    {{-- @push('script')
        <script>
            if (document.getElementsByClassName('dt-paragraph')) {
                //change tag br to tag p
                if (document.getElementsByClassName('dt-paragraph')[0].getElementsByTagName('br')[0] != null) {
                    document.getElementsByClassName('dt-paragraph')[0].innerHTML = document.getElementsByClassName(
                        'dt-paragraph')[0].innerHTML.replace(/<br>\\*/g, '</p><p>')
                }
                //add ads
                if (document.getElementsByClassName('dt-paragraph')[0].getElementsByTagName('p')[0] != null) {
                    //get 2 paragraf before add ads
                    var lis = document.getElementsByClassName('dt-paragraph')[0].getElementsByTagName('p')
                    var counter = 0
                    for (var i = 0; i < lis.length - 1; i++) {
                        if (lis[i].innerHTML !== "") {
                            counter++
                            if (counter == 2) {
                                document.getElementsByClassName('dt-paragraph')[0].getElementsByTagName('p')[i]
                                    .insertAdjacentHTML('afterend', (
                                            '<div class="channel-ad channel-ad_ad-exposer">  {!! str_replace('script', 'scr+ipt', Util::getAds('exposer')) !!} </div>')
                                        .replaceAll('+', ''));
                                break
                            }
                        }
                    }
                }
            }
        </script>
    @endpush --}}

    {{-- read too list --}}
    @if ($popular = \Data::popular() ?? null)
        @include('defaultsite.mobile.amp.components-ui.read-too-list', ['news' => $popular])
    @endif

    {{-- related tag --}}
   
    @include('defaultsite.mobile.amp.components-ui.related-tag')

    @if ($latest = \Data::popular() ?? null)
        @include('defaultsite.mobile.amp.components-ui.related-article', [
            'news' => $latest,
            'title' => 'Latest News',
        ])
    @endif

    {{-- trending tag --}}
    @include('defaultsite.mobile.amp.components-ui.trending-tag')

    {{-- slider latest news --}}
    @if ($popular = \Data::popular() ?? null)
        @include('defaultsite.mobile.amp.components-ui.slider', [
            'hl' => $popular,
            'title' => 'Popular News',
        ])
    @endif

    {{-- list populer news --}}
    @if ($popular = \Data::popular() ?? null)
        @include('defaultsite.mobile.amp.components-ui.populer-news', ['hl' => $popular])
    @endif

    {{-- slider latest news --}}
    @if ($latest = \Data::latest() ?? null)
        @include('defaultsite.mobile.amp.components-ui.slider', [
            'hl' => $latest,
            'title' => 'Latest News',
        ])
    @endif
@endsection
