@extends('defaultsite.mobile-v2.layouts.main-maverick')

@section('content')
    <main class="main relative max-w-screen-md mx-auto h-full bg-white text-black dark:bg-black dark:text-white">
        <!-- snap -->
        <div class="main-body relative overflow-y-auto flex flex-col w-full h-full snap-y snap-mandatory scroll-smooth"
            data-scroller>
            @if (count($feed) > 0 ?? null)
                @foreach ($feed as $item)
                    @if ($loop->iteration % 5 == 1)
                        <!-- theme.1 -->
                        <section data-section="section{{ $loop->iteration }}"
                            class="section snap-always snap-start w-full h-full flex flex-col shrink-0 pt-16 pb-6 transition bg-white dark:bg-black dark:text-white-20"
                            data-theme="default">
                            @include('defaultsite.mobile-v2.components.section-list-news', [
                                'newsItem' => $item,
                            ])
                        </section>
                    @elseif($loop->iteration % 5 == 2)
                        <!-- theme.2 -->
                        <section data-section="section{{ $loop->iteration }}"
                            class="section snap-always snap-start w-full h-full flex flex-col shrink-0 pt-16 pb-6 transition bg-white dark:bg-black dark:text-white-20"
                            data-theme="default">
                            @include('defaultsite.mobile-v2.components.section-list-news2', [
                                'newsItem' => $item,
                            ])
                        </section>
                    @elseif($loop->iteration % 5 == 3)
                        <!-- theme3 -->
                        <section data-section="section{{ $loop->iteration }}"
                            class="section snap-always snap-start w-full h-full flex flex-col shrink-0 pt-16 pb-6 transition bg-yellow dark:bg-black dark:text-white-20"
                            data-theme="yellow">
                            @include('defaultsite.mobile-v2.components.section-list-news3', [
                                'newsItem' => $item,
                            ])
                        </section>
                    @elseif($loop->iteration % 5 == 4)
                        <!-- theme.4 -->
                        <section data-section="section{{ $loop->iteration }}"
                            class="section snap-always snap-start w-full h-full flex flex-col shrink-0 pt-16 pb-6 transition bg-white dark:bg-black dark:text-white-20"
                            data-theme="default">
                            @include('defaultsite.mobile-v2.components.section-list-news4', [
                                'newsItem' => $item,
                            ])
                        </section>
                    @elseif($loop->iteration % 5 == 0)
                        <!--theme.5-->
                        <section data-section="section{{ $loop->iteration }}"
                            class="section snap-always snap-start w-full h-full flex flex-col shrink-0 pt-16 pb-6 transition bg-white dark:bg-black dark:text-white-20"
                            data-theme="default">
                            @include('defaultsite.mobile-v2.components.section-list-news5', [
                                'newsItem' => $item,
                            ])
                        </section>
                    @endif
                @endforeach
            @endif
            {{-- ?? END OF SECTION !! --}}
        </div>
        <!-- end.snap -->

        <!-- snap.indicator -->
        <div class="indicator absolute right-2 bottom-24 flex flex-col snap-y snap-mandatory scroll-smooth overflow-hidden dark:indicator-white"
            data-indicator>
        </div>
    </main>

    <script>
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

        //switchtheme
        const checkbox = document.querySelector(".switchTheme-control");
        const hour = new Date().getHours();
        checkbox.addEventListener("change", (e) => {
            document.documentElement.classList.toggle("dark");
        });

        if (hour >= 18) {
            checkbox.click();
        }
    </script>

    <script>
        let darkmode = document.querySelector(".switchTheme-control-2");
        // const hour = new Date().getHours();
        darkmode.addEventListener("change", (e) => {
            document.documentElement.classList.toggle("dark");
        });

        if (hour >= 18) {
            checkbox.click();
        }
    </script>

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
                    "Search...");
                if (focus) {
                    document.getElementsByClassName("gsc-input")[2].focus()
                }
            }
        };
    </script>
@endsection
