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
    <meta charset="utf-8">
    <title>{{ config('site.attributes.meta.title') }}</title>
    <meta http-equiv="cache-control" content="public, no-transform" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link rel="{{ config('site.attributes.meta.rel_to_amp') ?? 'canonical' }}" href="{{ config('site.attributes.meta.ampUrl') ?? request()->url() }}" />
    <link rel="canonical" href="{{ request()->url() }}" />

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

    <link rel="dns-prefetch" href="https://cdns.klimg.com/" />
    <link rel="preconnect" href="https://cdn.jsdelivr.net" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" />
    <meta name="adx:sections" content="{{ config('site.attributes.meta.type') ?? null }}">
    <meta name="adx:keywords" content="{{ config('site.attributes.meta.article_keyword') ?? null }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Prompt:wght@400;600&display=swap);" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/styles-mobile.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/styles-maverick.css') }}">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Nunito+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Red+Hat+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>

    <title>@yield('title')</title>
</head>

<body style="margin:auto;">
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KH4RTMT" height="0" width="0"
            style="display:none;visibility:hidden">
        </iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class=" max-w-full">
        {{-- Share Section on News Detail --}}
        <div class="dt-share-container-fixed">
            <div class="icons d-flex align-items-center justify-content-between my-2 gap-4">
                <h3 style="font-weight:bolder;">Share</h3>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=facebook&utm_campaign=Share_Bottom') }}" target="_blank"><i class="icon icons--share icon--share-fb fs-5"><i class="fa-brands fa-fb fa-facebook-f  "></i></i></a>
                <a href="https://wa.me/?text={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=whatsapp&utm_campaign=Share_Bottom') }}" target="_blank"><i class="icon icons--share icon--share-fb fs-5"><i class="fa-brands fa-wa fa-whatsapp"></i></i></a>
                <a href="https://twitter.com/intent/tweet?u={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=twitter&utm_campaign=Share_Bottom') }}" target="_blank"><i class="icon icons--share icon--share-fb "><i class="fa-brands fa-twitter fa-twitter fs-5"></i></i></a>
                <a href="https://t.me/share/url?url={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=telegram&utm_campaign=Share_Bottom') }}" target="_blank"><i class="fa-brands fa-telegram  "></i> </a>
                <a class="icons-share-link-bar" value="copy" onclick="copyToClipboard()"> <i class="fa-solid fa-link fs-5"></i></a>
            </div>
        </div>

        {{-- Header --}}
        @include('defaultsite.mobile-v2.components.navbar')

        {{-- Breaking news --}}
        {{-- @include('defaultsite.mobile.components-ui.breaking-news') --}}
        <div style="margin-top: 6rem;">
            @yield('content')
        </div>

        {{-- Footer --}}
        @if (config('site.use_footer', 'yes') == 'yes')
        @include('defaultsite.mobile-v2.components.footer-maverick')
        @endif
    </div>


    <a id="btn-back-toTop" class="hover"></a>

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
        indicators.innerHTML = "";
        for (var i = 0; i < sections.length; i++) {
            var button = document.createElement("span");

            button.classList.add("snap-always", "shrink-0", "indicator-bullet");
            if (i === currentIndex) {
                button.classList.add("indicator-bullet-active");
            }
            indicators.appendChild(button);
        }
    };

    const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            const section = entry.target.dataset.section;
            const theme = entry.target.dataset.theme;

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

    var elementIndices = {};
    for (var i = 0; i < sections.length; i++) {
        elementIndices[sections[i].dataset.section] = i;
        io.observe(sections[i]);
    }
</script>
<script>
    const mainNav = document.querySelector('.nav-main');
    const closeNav = document.querySelector('.nav-close');
    const openNav = document.querySelector('.nav-open');
    const body = document.querySelector('body');

    openNav.addEventListener('click', show);
    closeNav.addEventListener('click', close);

    function show() {
        cseSearch();
        mainNav.style.transition = 'transform 0.5s ease';
        mainNav.style.transform = 'translateX(0)';
        body.style.overflowY='hidden'
    }

    function close() {
        mainNav.style.transform = 'translateX(-150%)';
        body.style.overflowY='auto'
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
        }
    };

    if (window.location.pathname == "/search") {
        cseSearch()
    }
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
        var button2 = document.querySelector(".icons-share-link-bar")
        button.style.opacity = 0.5;
        button2.style.opacity = 0.5;
    }
</script>

<script>
    // infinite delay scroll

    var btn = document.querySelector('#btn-back-toTop');
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

    if (document.getElementsByClassName('pages-button').length != 0) {
        window.addEventListener("scroll", (e) => {
            if (elementPositionButton.getBoundingClientRect().bottom <= window.innerHeight) {
                if (!scrolling) {
                    scrolling = true;
                    callback();
                }
                scrolling = true;
            }
        });
    }
</script>
<script>
    var btn = document.querySelector('#btn-back-toTop');

    document.addEventListener('scroll', (e) => {
        if (document.getElementsByClassName('pages-button').length != 0 && pagination <= buttons.length) {
            btn.classList.remove('show');
        } else {
            if (document.documentElement.scrollTop > 300) {
                btn.classList.add('show');
            } else {
                btn.classList.remove('show');
            }
        }
    })

    btn.addEventListener('click', (e) => {
        e.preventDefault();
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    })
</script>
<script>
    var shareSection = document.querySelector(".dt-share-container")
    var iframe = document.querySelector(".item-vidio-inner")
    var shareSectionSticky = document.querySelector(".dt-share-container-fixed")
    var navbar = document.querySelector("nav")
    var position = 0
    if (shareSection !== null && iframe == null) {
        window.addEventListener("scroll", (e) => {
            if (window.scrollY < position) {
                shareSectionSticky.style.transform = 'translateY(-150%)';
                header.classList.remove("hide")
                position = window.scrollY
            } else if (shareSection.getBoundingClientRect().bottom <= 0) {
                shareSectionSticky.style.transform = 'translateY(-1%)';
                shareSectionSticky.style.transition = 'transform 0.1s ease-in-out';
                header.classList.add("hide")
                position = window.scrollY
            }
        })
    }
</script>
<script>
    var moreButton = document.querySelector("#more")
    var relatedTags = document.querySelectorAll(".hiddenLi")

    function showMoreRelatedTag() {
        if (moreButton.classList.contains("more")) {
            for (let tag of relatedTags) {
                tag.style.display = "block"
            }
            moreButton.innerHTML = "Show Less"
            moreButton.classList.remove("more")
        } else {
            for (let tag of relatedTags) {
                tag.style.display = "none"
            }
            moreButton.innerHTML = "More+"
            moreButton.classList.add("more")
        }
    }
</script>

</html>
