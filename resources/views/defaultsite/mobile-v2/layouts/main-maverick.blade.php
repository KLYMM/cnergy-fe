<?php
$themeClass = '';
if (!empty($_COOKIE['darkmode']) && $_COOKIE['darkmode'] == 'on') {
    $themeClass = 'dark';
}
?>
<!DOCTYPE html>
<html lang="en" class="<?php echo $themeClass; ?>">

<head>
    <meta charset="utf-8" />
    <title>{{ config('site.attributes.meta.title') }}</title>

    <meta name="title" content="{!! config('site.attributes.meta.title') ?? null !!}">
    <meta name="description" content="{!! config('site.attributes.meta.site_description') ?? null !!}">
    <meta name="keywords" content="{{ config('site.attributes.meta.article_keyword') ?? null }}">
    <meta property="og:site_name" content="{{ config('site.attributes.reldomain.domain_name') ?? null }}">
    <meta property="og:url" content="{{ config('site.attributes.meta.article_url') ?? null }}">
    <meta property="og:title" content="{!! config('site.attributes.meta.article_title') ?? null !!}">
    <meta property="og:description" content="{!! config('site.attributes.meta.article_short_desc') ?? null !!}">
    <meta property="article:modified_time" content="{{ config('site.attributes.meta.article_last_update') ?? null }}">
    <meta property="og:updated_time" content="{{ config('site.attributes.meta.article_last_update') ?? null }}">
    <meta property="fb:app_id" content="{{ config('site.attributes.fb_app_id') ?? null }}">
    <meta property="og:type" content="{{ config('site.attributes.meta.type') ?? null }}">
    <meta property="og:image" content="{{ config('site.attributes.meta.article_url_image') ?? null }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{ config('site.attributes.twitter_username') ?? null }}">
    <meta name="twitter:creator" content="{{ config('site.attributes.twitter_username') ?? null }}">
    <meta http-equiv="cache-control" content="public, no-transform" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <link rel="icon" type="image/png" href="{{ config('site.attributes.favicon') }}">
    <link rel="shortcut icon" href="" />
    <link rel="canonical" href="" />

    @if (config('app.env') !== 'local')
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @endif
    <link rel="icon" type="image/png" href="{{ config('site.attributes.favicon') }}">
    <link rel="canonical" href="{{ request()->url() }}" />

    <link rel="dns-prefetch" href="https://cdns.klimg.com/" />

    <link rel="preconnect" href="https://via.placeholder.com/" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Nunito+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Red+Hat+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/css/styles-maverick.css') }}"> --}}
    <link rel="preload" href="{{ Src::mix('css/styles-maverick.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">

    <!-- <link rel="preload" href="{{ Src::mix('css/detail-maverick.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'"> -->

    <!-- <link href="{{ Src::mix('detail/css/main.css') }}" rel="stylesheet">
    <link href="{{ Src::mix('detail/css/color.css') }}" rel="stylesheet">
    <link href="{{ Src::mix('detail/css/trstdly.css') }}" rel="stylesheet"> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>


    <!--window kly object-->
    @include('object_js', ['isMaverick' => true])
</head>

<body class="vh-text-sm font-inter leading-normal bg-stone-100" style="padding-bottom: env(safe-area-inset-bottom)">
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KH4RTMT" height="0" width="0"
            style="display:none;visibility:hidden">
        </iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    @include('defaultsite.mobile-v2.components.navbar-maverick')

    @yield('content')

    {{-- @include('defaultsite.mobile-v2.components.footer-maverick') --}}

    @include('defaultsite.mobile-v2.footer_script')

</body>

</html>
