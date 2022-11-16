@extends('defaultsite.mobile-v2.layouts.main')

{{-- @push('preload')
<link rel="ampHtml" href="{{config('site.attributes.object.ampUrl')??null}}"/>
<link rel="preload" as="image" href="{{ Src::imgNewsCdn($row, '375x208', 'webp') }}" />
{!! RecaptchaV3::initJs() !!}
@endpush --}}

{{-- @push('styles')
<link rel="preload" href="{{ Src::mix('css/detail.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ Src::mix('css/detail.css') }}" /></noscript>

@endpush --}}

@if (config('app.enabled_tracking'))
    @push('script')
        <script>
            var url = '{{ str_replace('api', 'analytics', config('app.api_url')) }}/jsview2/';
            var xhr = new XMLHttpRequest();
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('{!! http_build_query([
                'url' => Src::detail($row ?? null),
                'platform' => config('site.device') == 'mobile' ? 'm' : 'www',
            ]) !!}');
        </script>
    @endpush
@endif

@section('content')
    <ul class="main-breadcrumb" style="margin:20px;">
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
    {{-- @dump($row) --}}
    <div>
        <figure class="item-vidio-inner">
            <style>
                iframe {
                    aspect-ratio: 16 / 9;
                    width: 100%;
                    height: auto;
                    /* background-color: inherit; */
                }

                .item-vidio-inner {
                    position: relative;
                    height: auto;
                    width: 100%;
                    position: sticky;
                    top: 3.7rem;
                    z-index: 19;
                }
            </style>
            <div>
                {!! htmlspecialchars_decode($row['news_video']['video'] ?? null) !!}
            </div>
        </figure>

        <div class="main-news-container">
            <h3 class="photo-t" style="margin: 20px;">{{ $row['news_title'] ?? null }}</h3>
            <input type="checkbox" checked id="btn-read">
            <div class="dt-paragraph">
                {!! str_replace(
                    ['mce-mce-mce-mce-no/type', 'mce-no/type'],
                    '',
                    htmlspecialchars_decode($row['news_content'] ?? null),
                ) !!}

                @push('script')
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
                        console.log(document.getElementsByClassName('dt-paragraph'))
                    </script>
                @endpush

            </div>
            <label for="btn-read" class="btn-inner"></label>
        </div>


        @include('defaultsite.mobile-v2.components-ui.dt-share')

        <div class="header-photo">
            <h2 class="dt-title text-24 font-bold mb-6">{{ $row['news_sub_title'] ?? null }}</h2>
            <div class="d-flex  my-2 align-items-center gap-2">
                <img class="rounded rounded-5" src="{{ URL::asset('assets/images/author.PNG') }}" alt="author"
                    width="40" height="40px">
                <div class="d-flex flex-column justify-content-center gap-1">
                    <p class="photo-author font-outfit">
                        <a href="{{ Src::author($row) }}">{{ $row['news_editor'][0]['name'] ?? null }}
                        </a>
                    </p>
                    <span class="author_publish">
                        {{ Util::date($row['news_date_publish'] ?? null, 'long_time') }}</span>
                </div>
            </div>
        </div>

        @include('defaultsite.mobile-v2.components-ui.related-tag', ['title' => ''])

        @include('defaultsite.mobile-v2.components-ui.list-main-news', [
            'latest' => $row['latest'],
            'title' => 'Related Video',
        ])


        @if ($latest = \Data::latest() ?? null)
            @include('defaultsite.mobile-v2.components-ui.slider', [
                'hl' => $latest,
                'title' => 'Latest News',
            ])
        @endif

        @if ($popular = \Data::popular() ?? null)
            @include('defaultsite.mobile-v2.components-ui.populer-news', ['popular' => $popular])
        @endif

        @if ($latest = \Data::latest() ?? null)
            @include('defaultsite.mobile-v2.components-ui.related-article', [
                'news' => $latest,
                'title' => 'LATEST UPDATE',
            ])
        @endif
    </div>
@endsection
