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
    //switchtheme
    const checkbox = document.querySelector(".switchTheme-control");
    const hour = new Date().getHours();
    checkbox.addEventListener("change", (e) => {
        document.documentElement.classList.toggle("dark");
        if (document.querySelector(".dark")) {
            document.cookie = "darkmode=on;path=/";
            window.localStorage.setItem('darkmode', 'on')
        } else {
            document.cookie = "darkmode=off;path=/";
            window.localStorage.setItem('darkmode', 'off')
        }
    });
    // if (hour >= 18) {
    //     checkbox.click();
    //     document.cookie = "darkmode=on;path=/";
    // }

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

    // if (window.kly.gtm.category == "TagPage" && window.location.hash ) {
    //     let newsId = window.location.hash.replace("#", "");
    //     newsId = newsId.split("/")[0];
    //     alert(news);

    // }

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
                // console.log(i)
                button.classList.add("indicator-bullet-active");
            }
            indicators.appendChild(button);
        }
        if (sections.length % 5 != 0) {
            let buttonsNeeded
            for (var j = 1; j < 5; j++) {
                if ((sections.length + j) % 5 == 0) {
                    buttonsNeeded = j;
                }
            }
            for (var i = 1; i <= buttonsNeeded; i++) {
                var button = document.createElement("span");
                button.classList.add("snap-always", "shrink-0", "indicator-bullet", "invisible");
                indicators.appendChild(button);
            }
        }
    };

    const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            const section = entry.target.dataset.section;
            const theme = entry.target.dataset.theme;
            const nextbtn = document.getElementById("btn-up-id");

            if (entry.isIntersecting) {
                let elem = entry.target;

                if (elem.dataset.list == sections.length && elem.dataset.list % 25 == 0) {
                    if (elem.querySelector("#btn-up-id")) {
                        elem.querySelector("#btn-up-id").classList.remove("mb-6");
                        elem.querySelector("#btn-up-id").classList.add("mb-16");
                    }
                }

                if (elem.dataset.list % 25 == 1 && elem.dataset.list != 1) {
                    onScreen(entry.target, elementIndices[section]);
                }

                if (elem.classList.contains('paginate')) {
                    currentPage = currentPage + 1
                    // io.unobserve(entry.target)
                    getNews(currentPage)
                    entry.target.classList.remove("paginate")
                }

                onItersecting(entry.target, elementIndices[section]); // screen view
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
            'virtual_screenview_path': data.screenview_path, // contoh: merdeka.com/topik/$topikName?page=2 dst...
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
        window.kly.gtm.type = "feed";
        window.kly.gtm.contentTitle = data.articleTitle;
        window.kly.gtm.articleId = data.articleId;
        window.kly.gtm.authors = data.author;
        window.kly.gtm.publicationDate = data.publicationDate;
        window.kly.gtm.publicationTime = data.publicationTime;
        window.kly.gtm.templateId = data.template_id;
        window.kly.gtm.position = currentIndex + 1;
        window.kly.gtm.templateName = data.template_name;
        window.kly.gtm.is_virtual = data.is_virtual;


        virtual_pv(data);
    }


    function onItersecting(target, currentIndex) {
        let date = target.querySelector('span.article-date').dataset.date.split(' ');
        let positionPage = currentIndex + 1;
        let authorName = target.querySelector('span.article-date').dataset.authors;
        target.setAttribute('data-position', currentIndex + 1)

        let data = {
            screenview_path: window.location.href + "?screen=" + positionPage,
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
        window.kly.gtm.type = "feed";
        window.kly.gtm.contentTitle = data.articleTitle;
        window.kly.gtm.articleId = data.articleId;
        window.kly.gtm.authors = data.author;
        window.kly.gtm.publicationDate = data.publicationDate;
        window.kly.gtm.publicationTime = data.publicationTime;
        window.kly.gtm.templateId = data.template_id;
        window.kly.gtm.position = currentIndex + 1;
        window.kly.gtm.templateName = data.template_name;
        window.kly.gtm.is_virtual = data.is_virtual;

        virtual_sv(data);

    }

    const getNews = (page) => {
        let slug = url => new URL(url).pathname.match(/[^\/]+/g)
        let url = window.location.href.split('?')[0]
        url = url.split('/page-')[0]

        // newUrl.pop();
        // console.log(slug(url));
        // console.log(page);
        // console.log("url", url);

        if (slug(url) == null) {
            url = url + 'index-berita'
            let btn_next = document.getElementById('btn-next')
            btn_next.setAttribute('href', url + '/page-' + (parseInt(page) + parseInt(1)))
        }

        // console.log(url)
        window.axios.get(url + '/page-' + page + `?api_component=true`)
            .then(function(response) {
                if (response.status == 200) {
                    document.getElementById('feed-paging')
                        .insertAdjacentHTML('beforebegin', response.data)
                    startIO()
                    setIndicator();
                }
            })
            .catch(function(error) {
                console.log(error)
            })

    }

    var elementIndices = {};

    function startIO() {
        const sections = document.querySelectorAll("[data-section]");
        // console.log("sections", sections);
        // console.log("sections.length", sections.length);

        for (var i = 0; i < sections.length; i++) {
            if (i == (sections.length - 5)) {
                // console.log('test', i);
                io.unobserve(sections[i])
                sections[i].classList.add("paginate")
            }

            elementIndices[sections[i].dataset.section] = i;
            io.observe(sections[i]);
        }
    }

    document.addEventListener('DOMContentLoaded', function(event) {
        startIO()
        if(window.localStorage.getItem('darkmode') == 'on') {
            let html = document.getElementsByTagName('html')[0]
            html.classList.toggle('dark')
        }
    })



    const btnMore = document.querySelectorAll('.btn-baca');
    btnMore.forEach(el => el.addEventListener('click', function(e) {
        const target = e.target.closest('section[data-section]')
        // console.log(target);
        btnBaca(target)
        // return false;
    }))


    function btnBaca(target) {
        let date = target.querySelector('span.article-date').dataset.date.split(' ');


        dataLayer.push({
            'event': 'click',
            'feature_name': 'select_item',
            'feature_location': 'feed',
            'feature_position': window.kly.gtm.position,
            'articleId': target.dataset.id,
            'articleTitle': target.querySelector('h1.article-title').textContent.trim(),
            'type': window.kly.gtm.type, //feed
            'subCategory': subCategory, //sesuai nama category-nya (home=root, index tag=tag, index category= nama kategorinya
            'authors': window.kly.gtm.authors,
            'publicationDate': target.querySelector('span.article-date').dataset.date, //2022-10-26
            'publicationTime': target.querySelector('span.article-date').dataset.hour, //07:34:37
            'templateId': target.dataset.template, //1|2|3|4
            'templateName': target.dataset.template, //Headline 1|Headline 2|etc..
        });

    }
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
        mainNav.style.transition = 'transform 0.4s ease';
        mainNav.style.transform = 'translateX(0)';
    }

    function close() {
        mainNav.style.transform = 'translateX(-450%)';
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
