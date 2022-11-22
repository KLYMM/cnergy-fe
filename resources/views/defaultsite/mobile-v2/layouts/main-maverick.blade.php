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
    <title>Trstd.ly</title>
    <meta name="description" content="Maverick" />
    <meta name="keywords" content="Maverick" />
    <meta http-equiv="cache-control" content="public, no-transform" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <link rel="shortcut icon" href="" />
    <link rel="canonical" href="" />

    <link rel="preconnect" href="https://via.placeholder.com/" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Nunito+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Red+Hat+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/styles-maverick.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"
        integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

                if (elem.classList.contains('paginate')) {
                    console.log('load ajax')
                    currentPage = currentPage + 1
                    io.unobserve(entry.target)
                    getNews(currentPage)
                    entry.target.classList.remove("paginate")
                }
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

    const getNews = (page) => {
        let url = window.location.href.split('?')[0]

        window.axios.get(url + '/page-' + page + `?api_component=true`)
            .then(function(response) {
                console.log('load')
                document.getElementById('feed-paging')
                    .insertAdjacentHTML('beforebegin', response.data)
                // setIndicator()
                startIO()

            })
            .catch(function(error) {
                console.log(response)
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
    // let darkmode = document.querySelector(".switchTheme-control-2");
    // darkmode.addEventListener("change", (e) => {
    //     document.documentElement.classList.toggle("dark");
    //     console.log("masuk1")
    //     if (document.querySelector(".dark")){
    //         console.log("masuk2")
    //         document.cookie = "darkmode=on;";
    //     }
    //     else{
    //         document.cookie = "darkmode=off;";
    //     }
    // });
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
