<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('site.attributes.meta.title') }}</title>
    <meta http-equiv="cache-control" content="public, no-transform" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link rel="{{ config('site.attributes.meta.rel_to_amp') ?? 'canonical' }}"
        href="{{ config('site.attributes.meta.ampUrl') ?? request()->url() }}" />
    <link rel="icon" type="image/png" href="{{ config('site.attributes.favicon') }}">

    <meta name="title" content="{{ config('site.attributes.meta.title') ?? null }}">
    <meta name="description" content="{{ config('site.attributes.meta.site_description') ?? null }}">
    <meta name="keywords" content="{{ config('site.attributes.meta.article_keyword') ?? null }}">
    <meta property="og:site_name" content="{{ config('site.attributes.reldomain.domain_name') ?? null }}">
    <meta property="og:url" content="{{ config('site.attributes.meta.article_url') ?? null }}">
    <meta property="og:title" content="{{ config('site.attributes.meta.article_title') ?? null }}">
    <meta property="og:description" content="{{ config('site.attributes.meta.article_short_desc') ?? null }}">
    <meta property="article:modified_time" content="{{ config('site.attributes.meta.article_last_update') ?? null }}">
    <meta property="og:updated_time" content="{{ config('site.attributes.meta.article_last_update') ?? null }}">
    <meta property="fb:app_id" content="{{ config('site.attributes.fb_app_id') ?? null }}">
    <meta property="og:type" content="{{ config('site.attributes.meta.type') ?? null }}">
    <meta property="og:image" content="{{ config('site.attributes.meta.article_url_image') ?? null }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{ config('site.attributes.twitter_username') ?? null }}">
    <meta name="twitter:creator" content="{{ config('site.attributes.twitter_username') ?? null }}">

    <meta name="adx:sections" content="{{ config('site.attributes.meta.type') ?? null }}">
    <meta name="adx:keywords" content="{{ config('site.attributes.meta.article_keyword') ?? null }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Prompt:wght@400;600&display=swap);" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" async></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" defer></script> -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/styles-mobile.css') }}">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" defer></script> -->
    <title>@yield('title')</title>
</head>

<body>

    <div class=" max-w-full">
        {{-- Header --}}
        @include('defaultsite.mobile.components-ui.navbar')

        {{-- Breaking news --}}
        @include('defaultsite.mobile.components-ui.breaking-news')

        @yield('content')

        {{-- Footer --}}
        @if (config('site.use_footer', 'yes') == 'yes')
            @include('defaultsite.mobile.components-ui.footer')
        @endif
    </div>
    {{-- @yield('m-photo-detail') --}}

    <a id="btn-back-toTop" class="hover"></a>

</body>

<script>
    const mainNav = document.querySelector('.nav-main');
    const closeNav = document.querySelector('.nav-close');
    const openNav = document.querySelector('.nav-open');

    openNav.addEventListener('click', show);
    closeNav.addEventListener('click', close);

    function show() {
        mainNav.style.transition = 'transform 0.5s ease';
        mainNav.style.transform = 'translateX(0)';
    }

    function close() {
        mainNav.style.transform = 'translateX(-100%)';
    }

    const openSearch = document.querySelector('.search-container');
    const closeSearch = document.querySelector('.search-background');
    const iconSearch = document.querySelector('.search-icon');

    iconSearch.addEventListener('click', openSearchHeader);
    closeSearch.addEventListener('click', closeSearchHeader);

    function openSearchHeader() {
        cseSearch();

        openSearch.style['z-index'] = 10;
        openSearch.style['opacity'] = 1;
        openSearch.style['-webkit-transition'] = 'opacity 1s';
        openSearch.style['-moz-transition'] = 'opacity 1s';
        openSearch.style['transition'] = 'opacity 1s';

    }

    function closeSearchHeader() {
        openSearch.style['z-index'] = -1;
        openSearch.style['opacity'] = 0;
        var s = document.getElementsByTagName('script')[0];
        s.remove();
    }
</script>

<script>
    function cseSearch() {
        var cx = "{{ config('site.attributes.reldomain.cse_id') ?? null }}";
        var gcse = document.createElement('script');
        gcse.type = 'text/javascript';
        gcse.async = true;
        gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(gcse, s);
    }

    window.__gcse = {
        callback: function cseSearch() {
            document.getElementsByClassName("gsc-input")[2].setAttribute("placeholder",
                "Search news, keywords, and more...");

            if (focus) {
                document.getElementsByClassName("gsc-input")[2].focus()
            }
        }
    };

    if (window.location.pathname == "/search") {
        cseSearch()
    }
</script>

<script>
    var btn = document.querySelector('#btn-back-toTop');

    document.addEventListener('scroll', (e) => {
        if (document.documentElement.scrollTop > 300) {
            btn.classList.add('show');
        } else {
            btn.classList.remove('show');
        }
    })

    btn.addEventListener('click', (e) => {
        e.preventDefault();
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    })
</script>

<script>
    function copyToClipboard() {
        var dummy = document.createElement('input'),
            text = window.location.href;
        document.body.appendChild(dummy);
        dummy.value = text;
        dummy.select();
        document.execCommand('copy');
        document.body.removeChild(dummy);
        var button = document.querySelector(".icons-share-link")
        button.innerHTML = "Copied !"
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>

<script>
    // infinite delay scroll
    var scrolling
    buttons = document.getElementsByClassName('pages-button')
    var elementPositionButton = buttons[0]
    pagination = 0

    function callback() {
        for (i = 0; i < buttons.length; i++) {
            if (i == pagination) {
                var attr = buttons[i].getAttribute('data-target')
                selected = document.querySelector('#data-' + attr)
                selectedCount = buttons[i].getElementsByClassName('pages-button-countdown')[0]
                parentButton = selectedCount.parentNode
                maxParentTry = 3
                while (!parentButton.classList.contains('pages-button') && maxParentTry-- > 0) {
                    parentButton = parentButton.parentNode;
                };

                if (i + 1 != buttons.length) {
                    elementPositionButton = buttons[i + 1]
                }

                counter = selectedCount.getAttribute('data-delay')
                number = selectedCount.querySelector('.pages-button-countdown-html')
                circle = selectedCount.querySelector('.pages-button-countdown-svg circle')
                radius = circle.getAttribute('r')
                circumference = 2 * Math.PI * radius

                circle.style.strokeDasharray = circumference
                circle.style.strokeDashoffset = 0

                var timer = window.setInterval(function() {
                    counter--;
                    if (counter >= 0) {
                        number.innerHTML = counter;
                        circle.style.strokeDashoffset = circumference / counter
                    }
                    if (counter === 0) {
                        selected.classList.remove('pages-item-hidden');
                        parentButton.classList.add('pages-button-hidden')

                        var headerOffset = 20;
                        elementPosition = selected.getBoundingClientRect().top;
                        offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                        window.scrollTo({
                            top: offsetPosition,
                            behavior: 'smooth'
                        })

                        window.clearInterval(timer);
                        scrolling = false;
                    }
                }, 1000);
            }
            if (pagination == buttons.length) {
                var hiddenComponent = document.getElementById("div-hidden");
                hiddenComponent.classList.remove("hidden-component");
            }
        }
        pagination++;
    }

    window.addEventListener("scroll", (e) => {
        if (elementPositionButton.getBoundingClientRect().bottom <= window.innerHeight) {
            if (!scrolling) {
                scrolling = true;
                callback();
            }
            scrolling = true;
        }
    });
</script>

</html>
