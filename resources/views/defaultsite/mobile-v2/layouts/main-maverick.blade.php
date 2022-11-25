<?php
$themeClass = '';
if (!empty($_COOKIE['darkmode']) && $_COOKIE['darkmode'] == 'on') {
    $themeClass = 'dark';
}
?>
<!DOCTYPE html>
<html lang="en" class="<?php echo $themeClass; ?>">

<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KH4RTMT');
    </script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8" />
    <title>{{ config('site.attributes.meta.title') }}</title>

    <meta name="title" content="{{ config('site.attributes.meta.title') ?? null }}">
    <meta name="description" content="{!! config('site.attributes.meta.site_description') ?? null !!}">
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
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Nunito+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Red+Hat+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/css/styles-maverick.css') }}"> --}}
    <link rel="preload" href="{{ Src::mix('css/styles-maverick.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"
        integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!--window kly object-->
    @include('object_js')
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

</body>

<script>
    //switchtheme
    const checkbox = document.querySelector(".switchTheme-control");
    const hour = new Date().getHours();
    checkbox.addEventListener("change", (e) => {
        document.documentElement.classList.toggle("dark");
        if (document.querySelector(".dark")) {
            document.cookie = "darkmode=on;path=/";
        } else {
            document.cookie = "darkmode=off;path=/";
        }
    });

    if (hour >= 18) {
        checkbox.click();
        document.cookie = "darkmode=on;path=/";
    }

    //snapscroll
    const header = document.querySelector("[data-header]");
    const sections = document.querySelectorAll("[data-section]");
    const indicators = document.querySelector("[data-indicator]");
    const scrollRoot = document.querySelector("[data-scroller]");
    let currentPage = 1;

    let currentIndex = 0;
    let prevYPosition = 0;

    let options = {
        rootMargin: "0px",
        threshold: 0.75,
    };

    const setScrollDirection = () => {
        if (scrollRoot.scrollTop > prevYPosition) {
            if (currentIndex % 5 === 0) {
                indicators.scrollBy({
                    top: indicators.clientHeight,
                    behavior: "smooth",
                });
            }
        } else {
            if ((currentIndex + 1) % 5 === 0) {
                indicators.scrollBy({
                    top: -indicators.clientHeight,
                    behavior: "smooth",
                });
            }
        }
        prevYPosition = scrollRoot.scrollTop;
    };

    const setIndicator = () => {
        const sections = document.querySelectorAll("[data-section]")
        indicators.innerHTML = "";
        for (var i = 0; i < sections.length; i++) {
            var button = document.createElement("span");

            button.classList.add("snap-always", "shrink-0", "indicator-bullet");
            if (i === currentIndex) {
                button.classList.add("indicator-bullet-active");
            }

            // (function(i) {
            //     button.onclick = function() {
            //         sections[i].scrollIntoView();
            //     }
            // })(i);

            indicators.appendChild(button);
        }
    };

    const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            const section = entry.target.dataset.section;
            const theme = entry.target.dataset.theme;


            if (entry.isIntersecting) {
                let elem = entry.target;
                console.log(elem.getAttribute('data-page'));

                if (elem.classList.contains('paginate')) {
                    // console.log('load ajax')
                    console.log(currentPage)
                    currentPage = currentPage + 1
                    io.unobserve(entry.target)
                    getNews(currentPage)
                    entry.target.classList.remove("paginate")
                }


                onItersecting(entry.target, elementIndices[section]);
                // console.log(elementIndices[section]);
                // window.kly.gtm.position = elementIndices[section] + 1;

            }

            if (entry.intersectionRatio > 0.75) {
                document.body.setAttribute("data-theme", theme);
                entry.target.classList.add("is-visible");

                currentIndex = elementIndices[section];
                setIndicator();
                setScrollDirection();

                if (document.getElementById(section)) {
                    const iframe = document.getElementById(section).contentWindow;
                    iframe.postMessage("vidio.playback.play", "*");
                    iframe.postMessage("enamplus.playback.play", "*");
                }
            } else {
                entry.target.classList.remove("is-visible");

                if (document.getElementById(section)) {
                    const iframe = document.getElementById(section).contentWindow;
                    iframe.postMessage("vidio.playback.pause", "*");
                    iframe.postMessage("enamplus.playback.pause", "*");
                }
            }
        });
    }, options);


    function virtual_pv(data) {
        dataLayer.push({
            'event': 'virtual_page_view',
            'virtual_pageview_path': data.pageview_path, // contoh: merdeka.com/topik/$topikName?page=2 dst...
            'articleId': data.articleId,
            'contentTitle': data.articleTitle,
            'type': data.articleType, //feed
            // 'subCategory': '$nama-category', //sesuai nama category-nya (home=root, index tag=tag, index category= nama kategorinya
            'authors': data.author,
            'publicationDate': data.publicationDate, //2022-10-26
            'publicationTime': data.publicationTime, //07:34:37
            'templateId': data.template_id, //1|2|3|4
            'templateName': data.template_name, //Headline 1|Headline 2|etc..
            'position': data.position //1|2|3|etc...}
        });
    }

    function onItersecting(target, currentIndex) {
        // console.log('intersecting => ', target);
        // console.log(target.dataset);
        let date = target.querySelector('span.article-date').dataset.date.split(' ');
        // console.log(target.querySelector('span.article-date').dataset.date);
        // console.log(elem.getAttribute('data-page'));

        let data = {
            pageview_path: window.location.href,
            articleId: target.dataset.id,
            articleTitle: target.querySelector('h1.article-title').textContent,
            articleType: target.dataset.type,
            author: target.dataset.author,
            publicationDate: date[0],
            publicationTime: date[1],
            template_id: target.dataset.template,
            template_name: 'Feed ' + target.dataset.template,
            position: currentIndex + 1,
        }

        window.kly.gtm.position = currentIndex + 1;
        window.kly.gtm.templateId = data.template_id;
        window.kly.gtm.templateName = data.template_name;

        virtual_pv(data);
    }

    const getNews = (page) => {
        let slug = url => new URL(url).pathname.match(/[^\/]+/g)
        let url = window.location.href.split('?')[0]

        if (slug(url) == null) {
            url = url + 'index-berita'
        }
        // console.log(url)
        window.axios.get(url + '/page-' + page + `?api_component=true`)
            .then(function(response) {
                // console.log('load')
                document.getElementById('feed-paging')
                    .insertAdjacentHTML('beforebegin', response.data)
                // setIndicator()
                startIO()

            })
            .catch(function(error) {
                console.log(error)
            })

    }

    var elementIndices = {};

    function startIO() {
        const sections = document.querySelectorAll("[data-section]");

        for (var i = 0; i < sections.length; i++) {


            if (i == (sections.length - 5)) {
                io.unobserve(sections[i])
                sections[i].classList.add("paginate")
            }

            elementIndices[sections[i].dataset.section] = i;
            io.observe(sections[i]);
        }
    }

    document.addEventListener('DOMContentLoaded', function(event) {
        startIO()
    })
</script>



<script>
    const mainNav = document.querySelector('.nav-main');
    const closeNav = document.querySelector('.nav-close');
    const openNav = document.querySelector('.nav-open');
    const headerNavbar = document.querySelector('header');

    openNav.addEventListener('click', show);
    closeNav.addEventListener('click', close);

    function show() {
        cseSearch();
        mainNav.style.transition = 'transform 0.5s ease';
        mainNav.style.transform = 'translateX(0)';
    }

    function close() {
        mainNav.style.transform = 'translateX(-150%)';
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
                "Search...");

            // if (focus) {
            //     document.getElementsByClassName("gsc-input")[2].focus()
            // }
        }
    };

    if (window.location.pathname == "/search") {
        cseSearch()
    }
</script>

</html>
