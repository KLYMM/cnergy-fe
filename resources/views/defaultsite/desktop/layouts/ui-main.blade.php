<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('site.attributes.meta.title') }}</title>
    <meta name="description" content="{{ config('meta.description', config('site.attributes.title')) }}" />
    <meta name="keywords"
        content="{{ config('meta.keywords', Site::keywords(config('meta.description', config('site.attributes.title')))) }}" />
    <meta http-equiv="cache-control" content="public, no-transform" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=1056, initial-scale=1, shrink-to-fit=no">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link rel="{{ config('site.attributes.meta.rel_to_amp') ?? 'canonical' }}"
        href="{{ config('site.attributes.meta.ampUrl') ?? request()->url() }}" />
    <link rel="preconnect" href="{{ env('ASSET_URL', request()->root()) }}" crossorigin="anonymous" />
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js"></script>
</head>

<body>
    <div class="container w-kly">
        {{-- Header --}}
        @include('defaultsite.desktop.components-ui.ui-header')

        {{-- Breaking news --}}
        {{-- @section('breaking')
            @include('defaultsite.desktop.components-ui.ui-breaking-news')
        @show --}}

        {{-- Content --}}
        @yield('content')

        {{-- Footer --}}
        @if (config('site.use_footer', 'yes') == 'yes')
            @include('defaultsite.desktop.components-ui.ui-footer')
        @endif
    </div>

    <a id="btn-back-toTop"></a>

</body>
<script>
    const sliderContainers = [...document.querySelectorAll('.slider-container')];
    const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
    const preBtn = [...document.querySelectorAll('.pre-btn')];

    sliderContainers.forEach((item, i) => {
        let containerDimensions = item.getBoundingClientRect();
        let containerWidth = containerDimensions.width;

        nxtBtn[i].addEventListener('click', () => {
            item.scrollLeft += containerWidth;
        })

        preBtn[i].addEventListener('click', () => {
            item.scrollLeft -= containerWidth;
        })
    })
</script>

<script>
    document.querySelectorAll('img').forEach((img) => {
        img.onerror = function(e) {
            let default_img = "{{ Src::mix('img/320x180_no_image.jpg') }}";

            e.target.onerror = null;
            e.currentTarget.parentNode.children[0].setAttribute('srcset', default_img)
            e.currentTarget.parentNode.children[0].setAttribute('data-srcset', default_img)

            e.currentTarget.parentNode.children[1].setAttribute('srcset', default_img)
            e.currentTarget.parentNode.children[1].setAttribute('data-srcset', default_img)

            e.currentTarget.parentNode.children[2].setAttribute('src', default_img)
            e.currentTarget.parentNode.children[2].setAttribute('data-src', default_img)
        }
    });
</script>


<script>
    (function() {
        var cx = "{{ config('site.attributes.reldomain.cse_id') ?? null }}";
        var gcse = document.createElement('script');
        gcse.type = 'text/javascript';
        gcse.async = true;
        gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(gcse, s);
    })();

    window.__gcse = {
        callback: function() {
            document.getElementsByClassName("gsc-input")[2].setAttribute("placeholder",
                "Search news, keywords, and more...");

            if (focus) {
                document.getElementsByClassName("gsc-input")[2].focus()
            }
        }
    };
</script>

<script>
    var btn = $('#btn-back-toTop');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '300');
    });
</script>

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


@stack('script')


</html>
