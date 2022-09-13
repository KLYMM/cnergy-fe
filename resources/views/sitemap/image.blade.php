@extends('sitemap.main')

@section('content')
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
@if( $rows )
@foreach( $rows as $u )
    <!-- loop -->
    <url>
        <loc>{{ Src::detail($u) }}</loc>
        <image:image>
            <image:loc>
                <![CDATA[ {{ $u['news_image']['real'] }} ]]>
            </image:loc>
            <image:caption>
                <![CDATA[ {{ $u['news_synopsis'] }} ]]>
            </image:caption>
            <image:title>
            <![CDATA[ {{ $u['news_title'] }} ]]>
            </image:title>
        </image:image>
    </url>
    <!-- loop -->

    @if($u['photonews'])
        @foreach( $u['photonews'] as $img )
        <!-- loop photos -->
        <url>
            <loc>{{ url('photonews/read/'.$img['id'].'/'.$img['url']) }}</loc>
            <image:image>
                <image:loc>
                    <![CDATA[ {{ $img['image']['real'] }} ]]>
                </image:loc>
            </image:image>
        </url>
        <!-- loop -->
        @endforeach
    @endif
@endforeach
@endif
</urlset>
@endsection