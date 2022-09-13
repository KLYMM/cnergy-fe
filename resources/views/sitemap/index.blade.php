@extends('sitemap.main')

@section('content')

@if( isset($urls['data']) )    
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach( $urls['data'] as $u )
    <url>
        <loc>{{ Src::detail($u) }}</loc>
    </url>
    @endforeach
</urlset>
@else
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach( $urls as $u )
    <sitemap>
        <loc>{{ $u }}</loc>
    </sitemap>
    @endforeach
</sitemapindex>
@endif
@endsection