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
            <h3>{{ $row['news_title'] ?? null }}</h3>
            <p>By <span><a href="{{ Src::author($row) }}"
                        style="color: #CA0000;">{{ $row['news_editor'][0]['name'] ?? null }}</a></span>
                {{ Util::date($row['news_date_publish'] ?? null, 'long_time') }}</p>
            <figure>
                <div class="image-news">
                    @include('image', [
                        'source' => $row,
                        'size' => '380x214',
                        $row['news_title'] ?? null,
                    ])
                </div>
                <p>{{ $row['news_imageinfo'] ?? null }}</p>
            </figure>
        </div>
        {{-- adds --}}
        <div class="channel-ad channel-ad_ad-headline text-center">
            {!! Util::getAds('headline') !!}
        </div>
        @include('defaultsite.mobile.components-ui.ads-on')
        {{-- st-share --}}
        @include('defaultsite.mobile-v2.components-ui.dt-share')

        <div class="dt-paragraph">
            @php
                function DOMinnerHTML(DOMNode $element)
                {
                    $innerHTML = '';
                    $children = $element->childNodes;
                
                    foreach ($children as $child) {
                        $innerHTML .= $element->ownerDocument->saveHTML($child);
                    }
                    return $innerHTML;
                }
                
                function getEmbedYtb($str)
                {
                    $embedYtb = [];
                    if (preg_match('/\/embed\/(.*?)"/', $str, $code) == 1) {
                        $embedYtb['code'] = $code[1] ?? null;
                    }
                    if (preg_match('/height="(.*?)"/', $str, $height) == 1) {
                        $embedYtb['height'] = $height[1] ?? 9;
                    }
                    if (preg_match('/width="(.*?)"/', $str, $width) == 1) {
                        $embedYtb['width'] = $width[1] ?? 16;
                    }
                    return '<amp-youtube 
                      width="' .
                        $embedYtb['width'] .
                        '"
                      height="' .
                        $embedYtb['height'] .
                        '"
                      layout="responsive"
                      data-videoid="' .
                        $embedYtb['code'] .
                        '">
                  </amp-youtube>';
                }
                
                function getEmbedTik($str)
                {
                    $embedTik = [];
                    if (preg_match('/data-video-id="(.*?)"/', $str, $code) == 1) {
                        $embedTik['code'] = $code[1] ?? null;
                    }
                    return $embedTik['code'];
                }
                
                function getEmbedIg($str)
                {
                    $embedIg = [];
                    if (preg_match('/\/p\/(.*?)\//', $str, $code) == 1) {
                        $embedIg['code'] = $code[1] ?? null;
                    }
                    return $embedIg['code'];
                }
                
                $doc = new DOMDocument();
                // set error level
                $internalErrors = libxml_use_internal_errors(true);
                $doc->loadHTML(htmlspecialchars_decode($row['news_content'] ?? null));
                // Restore error level
                libxml_use_internal_errors($internalErrors);
                if ($doc) {
                    //change tag br to tag p
                    if ($doc->getElementsByTagName('br')[1] != null) {
                        libxml_use_internal_errors(true);
                    $doc->loadHTML(preg_replace('#(?:<br\s*/@endphp\s*?){2,}#', '</p><p>', $doc->saveHTML()));
        libxml_clear_errors();
    }
    //embed ig and tiktok (blockquote)
    if ($doc->getElementsByTagName('blockquote')[0] != null) {
        $blockquote = $doc->getElementsByTagName('blockquote');
        for ($i = 0; $i <= $blockquote->length - 1; $i) {
            $tag = $blockquote[$i]->ownerDocument->saveHtml($blockquote[$i]);
            $old = $blockquote->item($i);

            if (strstr($tag, 'instagram.com')) {
                $new = $doc->createElement('p');
                $old->parentNode->replaceChild($new, $old);
                $link = $doc->createElement('amp-instagram');
                $link->setAttribute('data-shortcode', getEmbedIg($tag));
                $link->setAttribute('data-captioned', true);
                $link->setAttribute('width', 1);
                $link->setAttribute('height', 1);
                $link->setAttribute('layout', 'responsive');
                $new->appendChild($link);
            } elseif (strstr($tag, 'tiktok.com')) {
                $new = $doc->createElement('p');
                $old->parentNode->replaceChild($new, $old);
                $link = $doc->createElement('amp-tiktok');
                $link->setAttribute('data-src', getEmbedTik($tag));
                // $link->setAttribute('width', 1);
                $link->setAttribute('height', 1);
                $new->appendChild($link);
            } else {
                $i++;
            }
        }
        // dd($doc->saveHtml());
    }
    //add ads
    if ($doc->getElementsByTagName('p')[0] != null) {
        //get 2 paragraf before add ads
        $lis = $doc->getElementsByTagName('p');
        $counter = 0;

        for ($i = 0; $i <= $lis->length - 1; $i++) {
            $p = DOMinnerHTML($lis[$i]);
            if ($p) {
                if (strstr($p, '/iframe>')) {
                    if (strstr($p, 'youtube.com')) {
                        echo getEmbedYtb($p);
                    } else {
                        echo '<p>' . str_replace('iframe', 'amp-iframe', $p) . '<p>';
                    }
                } else {
                    echo '<p>' . $p . '<p>';
                }
                $counter++;
                if ($counter == 2) {
                    $exposer1 = str_replace('script', 'scr+ipt', str_replace('+', '', Util::getAds('exposer-1')));
                    echo '<div class="channel-ad channel-ad_ad-exposer">' . $exposer1 . '</div>';
                }
            }
        }
    }
}
?>
        </div>

        @if (($row['has_paging'] ?? null) == 1)
            @include('defaultsite/mobile/components-ui/pagination2', [
                'current_page' => $row['current_page'],
                'last_page' => $row['last_page'],
                'slug' => $row['slug'],
            ])
        @endif

        {{-- report --}}
        <div style="margin:0px 20px;">
            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-light report-btn"><i
                    class="fa-solid fa-triangle-exclamation" style="color: #ca0000; margin-right: 10px;"></i>REPORT
                ARTICLE</button>

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body">
                            {{-- FORM REPORT --}}
                            @include('defaultsite.mobile.components-ui.form-report')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    {{-- read too list --}}
    @if ($popular = \Data::popular() ?? null)
        @include('defaultsite.mobile.components-ui.read-too-list', ['news' => $popular])
    @endif

    {{-- related tag --}}

    @include('defaultsite.mobile.components-ui.related-tag', ['title' => 'Related Tags'])

    {{-- related artikel --}}
    @if ($latest = \Data::popular() ?? null)
        @include('defaultsite.mobile.components-ui.related-article', [
            'news' => $latest,
            'title' => 'Related News',
        ])
    @endif
    <div class="channel-ad channel-ad_ad-sc text-center">
        {!! Util::getAds('showcase-1') !!}
    </div>

    {{-- trending tag --}}
    @include('defaultsite.mobile.components-ui.trending-tag')

    {{-- slider latest news --}}
    @if ($popular = \Data::popular() ?? null)
        @include('defaultsite.mobile.components-ui.slider', ['hl' => $popular, 'title' => 'Popular News'])
    @endif
    <div class="channel-ad channel-ad_ad-sc-2 text-center">
        {!! Util::getAds('showcase-2') !!}
    </div>

    {{-- list populer news --}}
    @if ($popular = \Data::popular() ?? null)
        @include('defaultsite.mobile.components-ui.populer-news', ['hl' => $popular])
    @endif

    {{-- slider latest news --}}
    @if ($latest = \Data::latest() ?? null)
        @include('defaultsite.mobile.components-ui.slider', ['hl' => $latest, 'title' => 'Latest News'])
    @endif
@endsection
