@extends('sitemap.main')

@section('content')
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">

        @if ($rows)
            @foreach ($rows as $u)
                <url>
                    <loc>{{ Src::detailTag($u) }}</loc>
                    <news:news>
                        <news:publication>
                            <news:name>{{ config('site.attributes.title') }}</news:name>
                            <news:language>id</news:language>
                        </news:publication>
                        <news:publication_date>{{ date('Y-m-d\TH:i:sP', strtotime($u['date_entry'])) }}
                        </news:publication_date>
                        <news:title>
                            <![CDATA[ {{ $u['name'] }} ]]>
                        </news:title>
                    </news:news>
                </url>
            @endforeach
        @endif
    </urlset>
@endsection
