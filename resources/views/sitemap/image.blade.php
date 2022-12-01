@extends('sitemap.main')

@section('content')
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
        @if ($rows)
            @foreach ($rows as $u)
                <url>
                    <loc>{{ Src::detail($u) }}</loc>
                    @if ($u['photonews'])
                        @foreach ($u['photonews'] as $img)
                            <image:image>
                                <image:loc>
                                    {{ $img['image']['real'] }}
                                </image:loc>
                            </image:image>
                        @endforeach
                    @endif
                </url>
            @endforeach
        @endif
    </urlset>
@endsection
