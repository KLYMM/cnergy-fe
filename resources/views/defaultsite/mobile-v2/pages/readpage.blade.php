@extends('defaultsite.mobile-v2.layouts.main')
@section('content')
    {{-- headline news --}}
    <div class="main-news-container">
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
                    @include('image', [
                        'source' => $row,
                        'size' => '380x214',
                        $row['news_title'] ?? null,
                    ])
                </div>
                <div class="frame-bottom"></div>
                {{-- <p>{{ $row['news_imageinfo'] ?? null }}</p> --}}
            </figure>
            <h3 class="author-title">{{ $row['news_title'] ?? null }}</h3>
            <p class="author-detail">By <span><a class="author-name" href="{{ Src::author($row) }}">{{ $row['news_editor'][0]['name'] ?? null }}</a></span>
                {{ Util::date($row['news_date_publish'] ?? null, 'long_time') }}
            </p>
        </div>
        {{-- adds --}}
        {{-- <div class="channel-ad channel-ad_ad-headline text-center">
            {!! Util::getAds('headline') !!}
        </div> --}}
        {{-- @include('defaultsite.mobile.components-ui.ads-on') --}}
        {{-- st-share --}}
        @include('defaultsite.mobile-v2.components-ui.dt-share')

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
                </script>
            @endpush
        </div>
    </div>

    @if (($row['has_paging'] ?? null) == 1)
        @include('defaultsite/mobile-v2/components-ui/pagination2', [
            'current_page' => $row['current_page'],
            'last_page' => $row['last_page'],
            'slug' => $row['slug'],
        ])
    @endif

    {{-- report --}}




    {{-- read too list --}}
    @if ($popular = \Data::popular() ?? null)
        @include('defaultsite.mobile-v2.components-ui.read-too-list', ['news' => $popular])
    @endif

    {{-- related tag --}}

    @include('defaultsite.mobile-v2.components-ui.related-tag', ['title' => ''])

    <div style="margin:30px 20px;">
        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-light report-btn"><i
                class="fa-solid fa-triangle-exclamation" style="color: #ca0000; margin-right: 10px;"></i>REPORT
            ARTICLE</button>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        {{-- FORM REPORT --}}
                        @include('defaultsite.mobile-v2.components-ui.form-report')
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('defaultsite.mobile-v2.components-ui.list-main-news', [
        'latest' => $row['latest'],
        'title' => 'Related News',
    ])



    <div class="channel-ad channel-ad_ad-sc text-center">
        {!! Util::getAds('showcase-1') !!}
    </div>

    {{-- trending tag --}}
    @include('defaultsite.mobile-v2.components-ui.trending-tag')


    {{-- related artikel --}}
    @if ($latest = \Data::latest() ?? null)
        @include('defaultsite.mobile-v2.components-ui.related-article', [
            'news' => $latest,
            'title' => 'Latest Update',
        ])
    @endif

    {{-- slider latest news --}}
    {{-- @if ($latest = \Data::latest() ?? null)
        @include('defaultsite.mobile-v2.components-ui.slider', [
            'hl' => $latest,
            'title' => 'Latest News',
        ])
    @endif --}}

    <div class="channel-ad channel-ad_ad-sc-2 text-center">
        {!! Util::getAds('showcase-2') !!}
    </div>

    {{-- list populer news --}}
    @if ($popular = \Data::popular() ?? null)
        @include('defaultsite.mobile-v2.components-ui.populer-news', ['popular' => $popular])
    @endif
@endsection
