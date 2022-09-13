@extends('sitemap.main')

@section('content')
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">
@if( $rows )
    @foreach( $rows as $u )
    <url>
        <loc>{{ Src::detail($u) }}</loc>
        <video:video>
            <video:title>
                <![CDATA[ {{ $u['news_title'] }} ]]>
            </video:title>
            <video:description>
                <![CDATA[ {{ $u['news_synopsis'] }} ]]>
            </video:description>
            <video:thumbnail_loc>{{ Src::imgNewsCdn($u, '640x360') }}</video:thumbnail_loc>
            <video:publication_date>{{ $u['news_date_publish'] }}</video:publication_date>
            <video:category>
                <![CDATA[ {{ $u['category_name'] }} ]]>
            </video:category>
            <!-- <video:player_loc>https://www.vidio.com/embed/6613143-kkn-di-desa-penari-hingga-pengabdi-setan-2-ini-film-horor-2022-yang-wajib-ditonton</video:player_loc> -->
        </video:video>
    </url>
    @endforeach
@endif
</urlset>
@endsection