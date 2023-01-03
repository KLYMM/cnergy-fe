<?php
$themeClass = '';
if (!empty($_COOKIE['darkmode']) && $_COOKIE['darkmode'] == 'on') {
    $themeClass = 'dark';
}
?>
<!DOCTYPE html>
<html lang="en" class="<?php echo $themeClass; ?>">

<head>
    <meta charset="utf-8">
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

    <link rel="preconnect" href="https://via.placeholder.com/" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Nunito+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Red+Hat+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="{{ Src::mix('detail/css/main.css') }}" rel="stylesheet">
    <link href="{{ Src::mix('detail/css/color.css') }}" rel="stylesheet">
    <link href="{{ Src::mix('detail/css/trstdly.css') }}" rel="stylesheet">

    <link rel="preload" href="{{ Src::mix('css/detail-maverick.css') }}" as="style"
        onload="this.onload=null;this.rel='stylesheet'">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    @include('object_js', ['isMaverick' => true])
    <style>
        .section--dt {
            counter-increment: counter;
        }

        .section--dt .dt-number {
            bottom: 0;
            left: 0;
            pointer-events: none;
        }

        .section--dt:nth-child(odd) .dt-number {
            left: auto;
            right: 4px;
        }

        .section--dt .dt-number::before,
        .section--dt .dt-number::after {
            content: counter(counter);
            font-family: var(--font-primary1);
            font-weight: 700;
            /* -webkit-text-fill-color: transparent;
                                            -webkit-text-stroke-width: 1px;
                                            -webkit-text-stroke-color: var(--color-light1); */
            color: var(--color-light3);
            font-size: 12rem;
            line-height: 0;
            opacity: .2;
        }

        .section--dt .dt-number::after {
            -webkit-text-fill-color: transparent;
            -webkit-text-stroke-width: 1px;
            -webkit-text-stroke-color: var(--color-light1);
            color: transparent;
            position: absolute;
            top: 4px;
            left: 4px;
        }
    </style>
</head>

<body class="vh-text-md leading-normal font-primary-1 bg-stone-100 maverick-info">

    {{-- <header class="header fixed top-32 right-0 z-20 transition" data-header>
        <div
            class="switchTheme relative flex items-center rounded-tl-full rounded-bl-full h-12 px-3 bg-dark-0 transition opacity-50 hover:opacity-100">
            <input class="switchTheme-control" type="checkbox" name="checkbox" id="switchTheme" autocomplete="off">
            <label class="switchTheme-icon" for="switchTheme">
                <svg class="svg-both-white switchTheme-icon-dark" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M21 12.79C20.8427 14.4922 20.2039 16.1144 19.1582 17.4668C18.1126 18.8192 16.7035 19.8458 15.0957 20.4265C13.4879 21.0073 11.748 21.1181 10.0795 20.7461C8.41102 20.3741 6.88299 19.5345 5.67423 18.3258C4.46546 17.117 3.62594 15.589 3.25391 13.9205C2.88188 12.252 2.99272 10.5121 3.57346 8.9043C4.1542 7.29651 5.18083 5.88737 6.53321 4.84175C7.88559 3.79614 9.5078 3.15731 11.21 3C10.2134 4.34827 9.73385 6.00945 9.85853 7.68141C9.98321 9.35338 10.7039 10.9251 11.8894 12.1106C13.0749 13.2961 14.6466 14.0168 16.3186 14.1415C17.9906 14.2662 19.6517 13.7866 21 12.79V12.79Z"
                        fill="black" />
                </svg>
                <svg class="svg-stroke-white switchTheme-icon-light" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_1_6)">
                        <path
                            d="M12 17C14.7614 17 17 14.7614 17 12C17 9.23858 14.7614 7 12 7C9.23858 7 7 9.23858 7 12C7 14.7614 9.23858 17 12 17Z"
                            fill="none" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M12 1V3" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M12 21V23" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M4.22 4.22L5.64 5.64" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M18.36 18.36L19.78 19.78" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M1 12H3" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M21 12H23" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M4.22 19.78L5.64 18.36" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M18.36 5.64L19.78 4.22" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </g>
                    <defs>
                        <clipPath id="clip0_1_6">
                            <rect width="24" height="24" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </label>
        </div>
    </header> --}}

    <main class="main relative max-w-screen-md mx-auto h-full overflow-hidden">

        <!-- snap -->
        <div class="main-body relative overflow-y-auto flex flex-col w-full h-full snap-y snap-mandatory scroll-smooth"
            data-scroller>
            @include('defaultsite.mobile-v2.components.navbar-new')

            @yield('content')

        </div>
        <!-- end.snap -->

        <!--snap.indicator-->
        <div class="indicator absolute right-2 bottom-24 flex flex-col snap-y snap-mandatory scroll-smooth overflow-hidden dark:indicator-white hidden"
            data-indicator></div>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script>
        const toggleOpen = document.querySelectorAll("[data-toggle]");
        const toggleClose = document.querySelectorAll("[data-toggle-close]");

        toggleOpen.forEach(function(t, i) {
            t.addEventListener('click', function(e) {
                const attr = this.getAttribute('data-toggle');
                this.classList.toggle('is-active');
                if (this.classList.contains('is-active')) {
                    cseSearch();
                    document.body.classList.add('overflow-hidden');
                    document.querySelector('[data-toggle-open="' + attr + '"]').classList.add('open');
                } else {
                    document.body.classList.remove('overflow-hidden');
                    document.querySelector('[data-toggle-open="' + attr + '"]').classList.remove('open');
                    var s = document.getElementsByTagName('script')[0];
                    s.remove();
                }
                e.preventDefault();
            });
        });
        toggleClose.forEach(function(t, i) {
            t.addEventListener('click', function(e) {
                document.body.classList.remove('overflow-hidden');
                document.querySelector('[data-toggle]').classList.remove('is-active');
                document.querySelector('[data-toggle-open]').classList.remove('open');
                var s = document.getElementsByTagName('script')[0];
                s.remove();
                e.preventDefault();
            });
        });
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
        //switchtheme

        let selectSwitch = document.querySelector('.switchTheme-click');
        let selectOption = document.querySelectorAll(".switchTheme-option li a");
        let hour = (new Date).getHours();
        let date = new Date();
        date.setTime(date.getTime() + (30 * 24 * 60 * 60 * 1000));

        selectSwitch.addEventListener("click", (e) => {
            e.currentTarget.classList.toggle('is-active');
            if(e.currentTarget.classList.contains('is-active')){
                document.querySelector('.switchTheme-option').classList.add('open');
                for (var i = 0; i < selectOption.length; i++) {
                    selectOption[i].addEventListener('click', function() {

                        let value = this.dataset.value;
                        let valueHtml = this.querySelector('.icon-theme').innerHTML

                        document.querySelector(".switchTheme-option li.active").classList.remove("active");
                        this.parentNode.classList.add('active');
                        selectSwitch.innerHTML = valueHtml;

                        if(value === 'darkmode'){
                            document.documentElement.classList.add('dark')
                            document.cookie = "darkmode=on;expires=" + date.toUTCString() + ";path=/";
                        } else if (value = 'lightmode'){
                            document.documentElement.classList.remove('dark')
                            document.cookie = "darkmode=off;expires=" + date.toUTCString() + ";path=/";
                        }else{
                            document.documentElement.classList.remove('dark')
                            document.cookie = "darkmode=off;expires=" + date.toUTCString() + ";path=/";
                            if (hour >= 20) {
                                document.documentElement.classList.add('dark')
                                document.cookie = "darkmode=on;expires=" + date.toUTCString() + ";path=/";
                            }
                        }

                    });
                }
            }else{
                document.querySelector('.switchTheme-option').classList.remove('open');
            }
            e.preventDefault();
        });

        window.addEventListener('click', function(e){   
            if (!selectSwitch.contains(e.target)){
                selectSwitch.classList.remove('is-active');
                document.querySelector('.switchTheme-option').classList.remove('open');
            } 
        });

        //snapscroll
        const header = document.querySelector("[data-header]");
        const sections = document.querySelectorAll("[data-section]");
        const indicators = document.querySelector("[data-indicator]");
        const scrollRoot = document.querySelector('[data-scroller]')

        let currentIndex = 0;
        let prevYPosition = 0;

        let options = {
            root: scrollRoot,
            rootMargin: "0px",
            threshold: 0.6,
        };

        let swipers = [];
        const selector = document.querySelectorAll('.swiper--ads');
        for (var i = 0; i < selector.length; i++) {
            selector[i].classList.add('swiperAds' + i);
            swipers[i] = new Swiper('.swiperAds' + i, {
                autoplay: {
                    delay: 3000,
                    stopOnLastSlide: true,
                    disableOnInteraction: false
                },
                pagination: {
                    el: ".swiper-pagination",
                },
            });
            swipers[i].autoplay.stop();
        }

        const setScrollDirection = () => {
            if (scrollRoot.scrollTop > prevYPosition) {
                if (currentIndex % 5 === 0) {
                    indicators.scrollBy({
                        top: indicators.clientHeight,
                        behavior: 'smooth'
                    });
                }
            } else {
                if ((currentIndex + 1) % 5 === 0) {
                    indicators.scrollBy({
                        top: -indicators.clientHeight,
                        behavior: 'smooth'
                    });
                }
            }
            prevYPosition = scrollRoot.scrollTop
        }

        const setIndicator = () => {
            indicators.innerHTML = '';
            for (var i = 0; i < sections.length; i++) {
                var button = document.createElement('span');

                button.classList.add('snap-always', 'shrink-0', 'indicator-bullet');
                if (i === currentIndex) {
                    button.classList.add('indicator-bullet-active')
                }

                // (function(i) {
                //     button.onclick = function() {
                //         sections[i].scrollIntoView();
                //     }
                // })(i);

                indicators.appendChild(button);
            }
        }

        const io = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                const section = entry.target.dataset.section;
                const theme = entry.target.dataset.theme;

                if (entry.intersectionRatio > 0.6) {
                    document.body.setAttribute('data-theme', theme)
                    entry.target.classList.add("is-visible");

                    currentIndex = elementIndices[section];
                    setIndicator();
                    setScrollDirection();

                    onItersecting(entry.target, elementIndices[section]); // screen view

                    const videos = entry.target.querySelectorAll('video')
                    Array.prototype.forEach.call(videos, function(video) {
                        video.play()
                    });

                    for (var i = 0; i < selector.length; i++) {
                        if (entry.target.querySelector('.swiperAds' + i)) {
                            swipers[i].autoplay.start();
                        }
                    }

                    if (document.getElementById(section)) {
                        const iframe = document.getElementById(section).contentWindow
                        iframe.postMessage('vidio.playback.play', '*');
                        iframe.postMessage('enamplus.playback.play', '*');
                    }

                } else {
                    entry.target.classList.remove("is-visible");

                    const videos = document.querySelectorAll('video')
                    Array.prototype.forEach.call(videos, function(video) {
                        video.pause();
                        video.muted = true;
                    });

                    swipers.forEach(function(item) {
                        item.slideToLoop(0, 0);
                        item.autoplay.stop();
                    });

                    if (document.getElementById(section)) {
                        const iframe = document.getElementById(section).contentWindow
                        iframe.postMessage('vidio.playback.pause', '*');
                        iframe.postMessage('enamplus.playback.pause', '*');
                    }
                }
            });
        }, options);

        let subCategory = '';
        if (window.location.pathname.split('/')[1] == 'photo' || window.location.pathname.split('/')[1] == 'video') {
            subCategory = 'feed';
        } else if (window.location.pathname.split('/')[1] == 'tag') {
            subCategory = 'tag';
        } else if (window.location.pathname.split('/')[1] == '') {
            subCategory = 'home';
        } else if (window.location.pathname.split('/')[1] == 'index-berita') {
            subCategory = 'index-berita';
        } else {
            subCategory = window.location.pathname.split('/')[1];

        }

        function virtual_sv(data) {
            dataLayer.push({
                'event': 'screen_view',
                'virtual_screenview_path': data
                    .screenview_path, // contoh: merdeka.com/topik/$topikName?page=2 dst...
                'articleId': data.articleId,
                'contentTitle': data.articleTitle,
                'type': 'feed', //feed
                'subCategory': subCategory, //sesuai nama category-nya (home=root, index tag=tag, index category= nama kategorinya
                'authors': data.author,
                'publicationDate': data.publicationDate, //2022-10-26
                'publicationTime': data.publicationTime, //07:34:37
                'templateId': data.template_id, //1|2|3|4
                'templateName': data.template_name, //Headline 1|Headline 2|etc..
                'position': data.position //1|2|3|etc...}
            });
        }


        function virtual_pv(data) {
            dataLayer.push({
                'event': 'virtual_page_view',
                'virtual_pageview_path': data.pageview_path, // contoh: merdeka.com/topik/$topikName?page=2 dst...
                'articleId': data.articleId,
                'contentTitle': data.articleTitle,
                'type': 'feed', //feed
                'subCategory': subCategory, //sesuai nama category-nya (home=root, index tag=tag, index category= nama kategorinya
                'authors': data.author,
                'publicationDate': data.publicationDate, //2022-10-26
                'publicationTime': data.publicationTime, //07:34:37
                'templateId': data.template_id, //1|2|3|4
                'templateName': data.template_name, //Headline 1|Headline 2|etc..
                'position': data.position //1|2|3|etc...}
            });
        }

        function onScreen(target, currentIndex) {
            let date = target.querySelector('span.article-date').dataset.date.split(' ');
            let positionPage = currentIndex + 1;
            let authorName = target.querySelector('span.article-date').dataset.authors;
            target.setAttribute('data-position', currentIndex + 1)


            let data = {
                pageview_path: window.location.href + "?page=" + currentPage,
                articleId: target.dataset.id,
                articleTitle: target.querySelector('h1.article-title').textContent.trim(),
                articleType: target.dataset.type,
                author: authorName == undefined ? "" : authorName,
                publicationDate: target.querySelector('span.article-date').dataset.date,
                publicationTime: target.querySelector('span.article-date').dataset.hour,
                template_id: target.dataset.template,
                template_name: 'Feed ' + target.dataset.template,
                position: currentIndex + 1,
                is_virtual: currentIndex == 0 ? 0 : 1,
            }

            window.kly.gtm.pageTitle = data.articleTitle;
            window.kly.gtm.subCategory = subCategory;
            window.kly.gtm.type = "feedArticle";
            window.kly.gtm.contentTitle = data.articleTitle;
            window.kly.gtm.articleId = data.articleId;
            window.kly.gtm.authors = data.author;
            window.kly.gtm.publicationDate = data.publicationDate;
            window.kly.gtm.publicationTime = data.publicationTime;
            window.kly.gtm.templateId = data.template_id;
            window.kly.gtm.position = currentIndex + 1;
            window.kly.gtm.templateName = data.template_name;
            window.kly.gtm.is_virtual = data.is_virtual;
            window.kly.gtm.category = 'Article'


            virtual_pv(data);
        }


        function onItersecting(target, currentIndex) {
            // let date = target.querySelector('section .section-body').dataset.date.split(' ');
            let positionPage = currentIndex + 1;
            let authorName = document.querySelector('section[data-author]').dataset.author;
            target.setAttribute('data-position', currentIndex + 1)

            let data = {
                screenview_path: window.location.href + "?screen=" + positionPage,
                articleId: document.querySelector('section[data-id]').dataset.id,
                articleTitle: document.querySelector('h1.dt-desc-title').textContent.trim(),
                articleType: target.dataset.type,
                author: authorName == undefined ? "" : authorName,
                publicationDate: document.querySelector('section[data-id]').dataset.date,
                publicationTime: document.querySelector('section[data-id]').dataset.hour,
                template_id: target.dataset.template,
                template_name: 'Feed ' + target.dataset.template,
                position: currentIndex + 1,
                is_virtual: currentIndex == 0 ? 0 : 1,
            }

            window.kly.gtm.pageTitle = data.articleTitle;
            window.kly.gtm.subCategory = subCategory;
            window.kly.gtm.type = "feedArticle";
            window.kly.gtm.contentTitle = data.articleTitle;
            window.kly.gtm.articleId = data.articleId;
            window.kly.gtm.authors = data.author;
            window.kly.gtm.publicationDate = data.publicationDate;
            window.kly.gtm.publicationTime = data.publicationTime;
            window.kly.gtm.templateId = data.template_id;
            window.kly.gtm.position = currentIndex + 1;
            window.kly.gtm.templateName = data.template_name;
            window.kly.gtm.is_virtual = data.is_virtual;
            window.kly.gtm.category = 'Article'

            virtual_sv(data);

        }


        var elementIndices = {};
        var backtop = document.querySelector('.backtop');

        for (var i = 0; i < sections.length; i++) {
            elementIndices[sections[i].dataset.section] = i;
            io.observe(sections[i]);

            // backtop.addEventListener("click", function(e) {
            //     sections[0].scrollIntoView();
            //     e.preventDefault();
            // });
        }

        //lineclamp
        const lineclamp = document.querySelectorAll('.line-clamp-str p');
        for (var i = 0; i < lineclamp.length; i++) {
            const paragraph = lineclamp[i].innerText;
            const strlength = paragraph.length;
            let maxlength = 60;
            if (strlength > maxlength) {
                let visible = paragraph.substr(0, maxlength);
                let hidden = paragraph.substr(maxlength, strlength);
                lineclamp[i].innerHTML = visible + "<span class='dots'>...</span> <span class='more-text hidden'>" +
                    hidden +
                    "</span> <span class='dots-btn vh-text-sm font-semibold font-primary-1 block mt-4 cursor-pointer pointer-events-auto'>More</span> ";
            }

            const btn = lineclamp[i].querySelector('.dots-btn');
            btn.addEventListener("click", (e) => {
                const target = e.target;
                target.classList.toggle('active');
                if (target.classList.contains('active')) {
                    target.innerHTML = 'Less';
                    target.closest('p').querySelector('.dots').classList.add('hidden');
                    target.closest('p').querySelector('.more-text').classList.remove('hidden')
                } else {
                    target.innerHTML = 'More';
                    target.closest('p').querySelector('.dots').classList.remove('hidden');
                    target.closest('p').querySelector('.more-text').classList.add('hidden')
                }
            });
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
        }
    </script>
</body>

</html>
