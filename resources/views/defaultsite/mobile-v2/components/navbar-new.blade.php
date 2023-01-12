<header class="header fixed bottom-16 right-4 z-40 text-white transition dark:text-white" data-header="">
    <div class="flex flex-col items-center space-y-2">
        <a href="#" class="flex items-center justify-center rounded-full h-10 w-10 bg-black/40 dark:bg-white/40 btn-share" id="btnShareNews">
            <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.8 16.2458V12.3038C6.796 12.3038 3.502 13.8338 1 17.1998C2.008 12.3938 4.798 7.60581 11.8 6.63381V2.7998L19 9.5138L11.8 16.2458Z" stroke="currentColor" stroke-width="2"></path>
            </svg>
        </a>
        <a href="#" data-toggle="menu" class="flex items-center justify-center rounded-full h-10 w-10 bg-black/40 dark:bg-white/40">
            <svg width="18" height="16" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M18 0.586914H0V2.83691H18V0.586914ZM18 13.1631H0V15.4131H18V13.1631ZM4.5 6.875H18V9.125H4.5V6.875Z" fill="white" fill-opacity="0.9"></path>
            </svg>
        </a>
    </div>

    {{-- Input ini bersifat hidden untuk menerima value title dan sinopsis berita agar dapat dipassing ke dalam script javascript --}}
    <input type="hidden" id="titleNews" value="{{ $row['news_title'] }}">
    <input type="hidden" id="synopsisNews" value="{{ $row['news_synopsis'] }}">


    <div data-toggle-open="menu" class="header-menu fixed inset-0 bg-light-1 text-white pointer-events-none transform translate-x-full dark:bg-dark-0">
        <div class="header-menu-inner w-full h-full flex flex-col justify-between">
            <div class="header-menu-top flex items-center justify-between h-16">
                <div class="header-menu-top-switch switchTheme relative h-full px-6 flex items-center justify-center animate animate--fadeIn z-10">
                    <a href="#" class="switchTheme-click -mx-3">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M22.25 13H19.75V10H22.25V13ZM31 21.25L28 21.25V18.75L31 18.75V21.25ZM19.75 27L19.75 30H22.25L22.25 27H19.75ZM14 21.25V18.75H11V21.25H14ZM26.8336 15.9341L28.9549 13.8128L27.1872 12.045L25.0658 14.1664L26.8336 15.9341ZM27.1872 27.955L25.0658 25.8336L26.8336 24.0659L28.9549 26.1872L27.1872 27.955ZM16.9341 14.1664L15.1664 15.9341L13.045 13.8128L14.8128 12.045L16.9341 14.1664ZM21 22.5C22.3807 22.5 23.5 21.3807 23.5 20C23.5 18.6193 22.3807 17.5 21 17.5V22.5ZM21 25C23.7614 25 26 22.7614 26 20C26 17.2386 23.7614 15 21 15C18.2386 15 16 17.2386 16 20C16 22.7614 18.2386 25 21 25ZM12.1912 28.7635H14.789L15.2054 30H17L14.4816 23H12.5184L10 30H11.7748L12.1912 28.7635ZM13.4901 24.8846L14.3527 27.4473H12.6374L13.4901 24.8846Z" fill="currentColor"></path>
                        </svg>
                    </a>
                    <ul class="switchTheme-option absolute top-14 left-2 w-44 bg-white rounded-xl py-2 text-black dark:bg-dark-1 dark:text-white z-10">
                        <li class="switchTheme-option-item active">
                            <a href="#" data-value="automode" class="flex items-center px-2">
                                <i class="icon-theme">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22.25 13H19.75V10H22.25V13ZM31 21.25L28 21.25V18.75L31 18.75V21.25ZM19.75 27L19.75 30H22.25L22.25 27H19.75ZM14 21.25V18.75H11V21.25H14ZM26.8336 15.9341L28.9549 13.8128L27.1872 12.045L25.0658 14.1664L26.8336 15.9341ZM27.1872 27.955L25.0658 25.8336L26.8336 24.0659L28.9549 26.1872L27.1872 27.955ZM16.9341 14.1664L15.1664 15.9341L13.045 13.8128L14.8128 12.045L16.9341 14.1664ZM21 22.5C22.3807 22.5 23.5 21.3807 23.5 20C23.5 18.6193 22.3807 17.5 21 17.5V22.5ZM21 25C23.7614 25 26 22.7614 26 20C26 17.2386 23.7614 15 21 15C18.2386 15 16 17.2386 16 20C16 22.7614 18.2386 25 21 25ZM12.1912 28.7635H14.789L15.2054 30H17L14.4816 23H12.5184L10 30H11.7748L12.1912 28.7635ZM13.4901 24.8846L14.3527 27.4473H12.6374L13.4901 24.8846Z" fill="currentColor"></path>
                                    </svg>
                                </i> Auto
                            </a>
                        </li>
                        <li class="switchTheme-option-item">
                            <a href="#" data-value="darkmode" class="flex items-center px-2">
                                <i class="icon-theme">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.9673 11.5C15.9338 13.1576 16.2336 14.8051 16.849 16.3457C17.4644 17.8862 18.383 19.2886 19.5507 20.4704C20.7185 21.6522 22.1118 22.5895 23.6487 23.2271C25.1856 23.8648 26.835 24.1899 28.5 24.1833C27.8468 25.2246 26.9901 26.1246 25.9808 26.8298C24.9716 27.535 23.8304 28.0312 22.6249 28.2888C22.5131 28.3125 22.4005 28.3406 22.2862 28.3606C20.1711 28.7325 17.9919 28.3547 16.1274 27.293C14.2628 26.2313 12.8307 24.5527 12.0798 22.5488C11.3289 20.545 11.3067 18.3425 12.017 16.324C12.7273 14.3055 14.1245 12.5988 15.9673 11.5Z" stroke="currentColor" stroke-width="2"></path>
                                    </svg>
                                </i> Dark Mode
                            </a>
                        </li>
                        <li class="switchTheme-option-item">
                            <a href="#" data-value="lightmode" class="flex items-center px-2">
                                <i class="icon-theme">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.75 13H21.25V10H18.75V13ZM27 21.25L30 21.25V18.75L27 18.75V21.25ZM18.75 30L18.75 27H21.25L21.25 30H18.75ZM13 18.75V21.25H10V18.75H13ZM25.8336 15.9341L27.9549 13.8128L26.1872 12.045L24.0658 14.1664L25.8336 15.9341ZM26.1872 27.955L24.0658 25.8336L25.8336 24.0659L27.9549 26.1872L26.1872 27.955ZM14.1664 24.0659L15.9341 25.8336L13.8128 27.955L12.045 26.1872L14.1664 24.0659ZM14.1664 15.9341L15.9341 14.1664L13.8128 12.045L12.045 13.8128L14.1664 15.9341ZM22.5 20C22.5 21.3807 21.3807 22.5 20 22.5C18.6193 22.5 17.5 21.3807 17.5 20C17.5 18.6193 18.6193 17.5 20 17.5C21.3807 17.5 22.5 18.6193 22.5 20ZM25 20C25 22.7614 22.7614 25 20 25C17.2386 25 15 22.7614 15 20C15 17.2386 17.2386 15 20 15C22.7614 15 25 17.2386 25 20Z" fill="currentColor"></path>
                                    </svg>
                                </i> Light Mode
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="#" data-toggle-close="menu" class="header-menu-top-close h-full px-6 flex items-center justify-center">
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 3.69174L8.69082 -1.94964e-08L10 1.30918L6.30826 5L10 8.69082L8.69082 10L5 6.30826L1.30918 10L-1.94964e-08 8.69082L3.69174 5L0 1.30918L1.30918 0L5 3.69174Z" fill="currentColor"></path>
                    </svg>
                </a>
            </div>


            <div class="header-menu-body overflow-x-hidden overflow-y-auto flex-1">
                <ul class="nav flex flex-col font-primary-3 font-bold vh-text-xl">
                    @if ($menu = Data::menu())
                    @php
                    //get category tree
                    $category_tree = \Src::menu_tree(config('site.attributes.object.category.slug'));
                    if ($row['news_category'] ?? null) {
                    if (count($row['news_category']) > 0) {
                    $category_tree = \Src::menu_tree(end($row['news_category'])['url']);
                    }
                    }
                    if (count($category_tree) == 1) {
                    //list subdomain 1 level
                    $parent_slug = trim(end($category_tree)['url'], '/');
                    $subdomain = collect($menu)
                    ->filter(function ($row) use ($parent_slug) {
                    $arr_slug = explode('/', trim($row['url'], '/'));
                    $arr_parent_slug = explode('/', $parent_slug);
                    return strpos(end($arr_slug), end($arr_parent_slug)) > '' ? 1 : 0;
                    })
                    ->first();
                    } elseif (count($category_tree) >= 2) {
                    $parent_slug = trim(end($category_tree)['url'], '/');
                    //get curent slug base on tree level
                    if (count($category_tree) == 2) {
                    $curent_slug = trim($category_tree[0]['url'], '/');
                    } elseif (count($category_tree) == 3) {
                    $curent_slug = trim($category_tree[1]['url'], '/');
                    }
                    //list subdomain 1 level
                    $subdomain = collect($menu)
                    ->filter(function ($row) use ($parent_slug) {
                    $arr_slug = explode('/', trim($row['url'], '/'));
                    $arr_parent_slug = explode('/', $parent_slug);
                    return strpos(end($arr_slug), end($arr_parent_slug)) > '' ? 1 : 0;
                    })
                    ->first();
                    //list subdomain 2 level
                    $second_subdomain = collect($subdomain['children'])
                    ->filter(function ($row) use ($curent_slug) {
                    $arr_slug = explode('/', trim($row['url'], '/'));
                    $arr_curent_slug = explode('/', $curent_slug);
                    return strpos(end($arr_slug), end($arr_curent_slug)) > '' ? 1 : 0;
                    })
                    ->first();

                    if (count($second_subdomain['children'] ?? []) > 0) {
                    $subdomain = $second_subdomain;
                    }
                    }
                    @endphp

                    @foreach (array_slice($menu, 0, 9) as $m)
                    @if (!filter_var($m['url'], FILTER_VALIDATE_URL))
                    <li class="header-nav-item {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }} block py-2 px-6">
                        <a href="{{ '/' . trim($m['url'], '/') }}">{{ $m['title'] }}</a>
                    </li>
                    @else
                    <li class="header-nav-item {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }} block py-2 px-6">
                        <a href="{{ $m['url'] }}">{{ $m['title'] }}</a>
                    </li>
                    @endif
                    @endforeach
                    @if (count($menu) > 9)
                    <li class="header-nav-item-mobile" style="padding:0">
                        <div class="header-nav-item-menu" style="padding-right:0">
                            <ul class="header-nav-item-menu-list">
                                @foreach (array_slice($menu, 9) as $m)
                                @if (!filter_var($m['url'], FILTER_VALIDATE_URL))
                                <li class="header-nav-item {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }} block py-2 px-6">
                                    <a href="{{ '/' . trim($m['url'], '/') }}">{{ $m['title'] }}</a>
                                </li>
                                @else
                                <li class="header-nav-item {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }} block py-2 px-6 ">
                                    <a href="{{ $m['url'] }}">{{ $m['title'] }}</a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                            <span class="header-extra-nav header-nav-item-menu-back"><i class="icon icon--arrowright rotate-180"></i></span>
                        </div>
                    </li>
                    @endif
                    @endif

                    @include('defaultsite.mobile-v2.components-ui.trending-menu')
                </ul>

                @if (count($category_tree) > 0)
                @if ($subdomain)
                @if (count($subdomain['children']) > 0)
                <div class="header-submenu">
                    <ul class="header-submenu-item">
                        <li class="header-submenu-item-title">{{ strtoupper($subdomain['title']) }}</li>
                        {{-- list subdomain level 1 or check list subdomain 2 level > 0 --}}
                        @if (count($category_tree) > 0 || count($second_subdomain['children'] ?? []) > 0)
                        @foreach ($subdomain['children'] as $m)
                        @if (!filter_var($m['url'], FILTER_VALIDATE_URL))
                        <li class="subkanal__list_item {{ trim($category_tree[0]['url'], '/') == trim($m['url'], '/') ? 'active' : '' }}">
                            <a href="{{ '/' . trim($m['url'], '/') }}">{{ $m['title'] }}</a>
                        </li>
                        @else
                        <li class="subkanal__list_item {{ trim($category_tree[0]['url'], '/') == trim($m['url'], '/') ? 'active' : '' }}">
                            <a href="{{ $m['url'] }}">{{ $m['title'] }}</a>
                        </li>
                        @endif
                        @endforeach
                        @endif
                    </ul>
                </div>
                @endif
                @endif
                @endif
                </ul>
            </div>
            <div class="search-container">
                <div class="all-search-box">

                    <style>
                        .gsc-search-button-v2 {
                            display: none;
                        }

                        .all-search-box {
                            position: absolute;
                            width: 100%;
                            bottom: 0;
                            background-color: white;
                            left: 0;
                            color: black;
                        }

                        .dark .all-search-box {
                            color: white;
                        }

                        .dark .gsc-search-box-tools .gsc-search-box .gsc-input {
                            background: #751900 !important;
                        }

                        .dark .gsc-search-box-tools .gsc-search-box .gsc-input ::placeholder {
                            color: white;
                        }

                        .dark .all-search-box {
                            background-color: #751900 !important;
                        }

                        form.gsc-search-box,
                        table.gsc-search-box {
                            margin-bottom: 0;
                        }


                        form.gsc-search-box {
                            display: table;
                            position: relative;
                        }

                        table.gssb_c {
                            bottom: 68px !important;
                            top: initial !important;
                        }

                        .gsst_b {
                            padding: 0;
                        }

                        .gsib_a {
                            padding: 10px;
                            padding-right: 0px;
                            padding-left: 1.5rem;
                        }

                        .gsc-input-box {
                            padding: 0;
                        }

                        .gsst_a {
                            padding: 0;
                            vertical-align: middle;
                            line-height: 1em;
                            margin-top: -3px;
                        }

                        .gsst_a .gscb_a,
                        .gsst_a:hover .gscb_a,
                        .gsst_a:focus .gscb_a {
                            font-family: 'Open Sans', sans-serif;
                            color: #999;
                            display: block;
                            font-size: 32px;
                            font-weight: 300;
                        }

                        .gsc-input,
                        .gsc-input-box,
                        .gsc-input-box-hover,
                        .gsc-input-box-focus {
                            border: none;
                            box-shadow: none;
                            height: 100%;
                            background-color: transparent !important;
                            margin: 0 !important;
                            width: 100%;

                        }

                        input.gsc-search-button,
                        input.gsc-search-button:hover,
                        input.gsc-search-button:focus {
                            padding: 0;
                            margin: 0;
                            border: 0;
                            border-radius: 0;
                            background-color: transparent;
                            cursor: pointer;
                            text-indent: -9999px;
                            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
                            filter: alpha(opacity=50);
                            -moz-opacity: 0.5;
                            -khtml-opacity: 0.5;
                            opacity: 0;
                            position: absolute;
                            left: 0;
                            top: 0;
                            width: 100%;
                            height: 100%;
                        }

                        td.gsc-search-button {

                            float: right;
                            margin: 10px;
                            margin-right: 1.5rem;
                            background-image: url(https://cdns.klimg.com/kapanlagi.com/v5/i/channel/entertainment/h2-search.png);
                            background-repeat: no-repeat;
                            background-position: center;
                            filter: invert(1) grayscale(2) brightness(0);
                            width: 40px;
                            height: 40px;
                            background-size: 20px;
                        }

                        .dark td.gsc-search-button {
                            filter: invert(1) grayscale(2) brightness(100);
                        }

                        .gsc-search-box-tools .gsc-search-box .gsc-input {
                            font-family: 'Inter';
                            font-weight: 400;
                            padding-right: 10px;
                            height: 40px !important;
                            line-height: normal;
                            font-size: 14px;
                            background: #fff !important;
                            text-indent: 0 !important;
                        }

                        .gsc-input::placeholder {
                            color: #333;
                        }

                        .gsc-search-box-tools .gsc-search-box .gsc-input::-webkit-input-placeholder {
                            opacity: 1;
                        }

                        .gsc-search-box-tools .gsc-search-box .gsc-input::-moz-placeholder {
                            opacity: 1;
                        }

                        .gsc-search-box-tools .gsc-search-box .gsc-input:-ms-input-placeholder {
                            opacity: 1;
                        }

                        .gsc-search-box-tools .gsc-search-box .gsc-input:-moz-placeholder {
                            opacity: 1;

                        }

                        td.gsc-search-button {
                            margin-left: 0;
                        }

                        td.gsc-search-button .gsc-search-button-v2,
                        td.gsc-search-button .gsc-search-button-v2:hover,
                        td.gsc-search-button .gsc-search-button-v2:focus {
                            background-color: transparent;
                            border: 0;
                            margin: 0;
                            padding: 0;
                            border-radius: 0;
                            cursor: pointer;
                            width: 40px;
                            height: 40px;
                        }

                        td.gsc-search-button .gsc-search-button-v2 svg {
                            display: none;
                        }
                    </style>

                    <gcse:searchbox-only style="border-radius: 8px;" resultsUrl="{{ url('search') }}">
                    </gcse:searchbox-only>

                </div>
            </div>
        </div>
    </div>
</header>

<script>
    // script untuk share berita
    var titleNews = document.getElementById("titleNews").value;
    var synopsisNews = document.getElementById("synopsisNews").value;
    var urlLink = window.location.href;

    const btnShareNews = document.getElementById("btnShareNews");

    function menuShare(header, description, link) {
        navigator
            .share({
                title: header,
                text: description,
                url: link,
            })
            .then(() => console.log("Success to share news"))
            .catch((error) => console.log("Error share news", error));
    }

    if (navigator.share) {
        btnShareNews.addEventListener("click", () => {
            menuShare(titleNews, synopsisNews, urlLink)
            btnShare()
        });
    } else {
        console.error("Your Browser doesn't support Web Share API");
    }
</script>
