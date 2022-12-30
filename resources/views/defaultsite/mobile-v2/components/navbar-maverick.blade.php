<header class="header fixed bottom-20 right-4 z-40 text-white transition dark:text-white" data-header="">
    <div class="flex flex-col items-center space-y-2">
        <a href="#" class="flex items-center justify-center rounded-full h-10 w-10 bg-black/40 dark:bg-white/40"
            id="btnShareNews">
            <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11.8 16.2458V12.3038C6.796 12.3038 3.502 13.8338 1 17.1998C2.008 12.3938 4.798 7.60581 11.8 6.63381V2.7998L19 9.5138L11.8 16.2458Z"
                    stroke="currentColor" stroke-width="2"></path>
            </svg>
        </a>
        <a href="#" data-toggle="menu"
            class="flex items-center justify-center rounded-full h-10 w-10 bg-black/40 dark:bg-white/40">
            <svg width="18" height="16" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M18 0.586914H0V2.83691H18V0.586914ZM18 13.1631H0V15.4131H18V13.1631ZM4.5 6.875H18V9.125H4.5V6.875Z"
                    fill="white" fill-opacity="0.9"></path>
            </svg>
        </a>
    </div>

    {{-- Input ini bersifat hidden untuk menerima value title dan sinopsis berita agar dapat dipassing ke dalam script javascript --}}
    <input type="hidden" id="titleNews" value="{{ $headline['news_title'] ?? null }}">
     <input type="hidden" id="synopsisNews" value="{{ $headline['news_synopsis'] ?? null }}"> 


    <div data-toggle-open="menu"
        class="header-menu fixed inset-0 bg-light-1 text-white pointer-events-none transform translate-x-full dark:bg-dark-0">
        <div class="header-menu-inner w-full h-full flex flex-col justify-between">
            <div class="header-menu-top flex items-center justify-between h-16">
                <div
                    class="header-menu-top-switch switchTheme relative h-full px-6 flex items-center justify-center animate animate--fadeIn">
                    <input class="switchTheme-control" type="checkbox" name="checkbox" id="switchTheme"
                        autocomplete="off">
                    <label class="switchTheme-icon" for="switchTheme">
                        <svg class="switchTheme-icon-dark" width="21" height="21" viewBox="0 0 20 20"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.96726 2.5C5.93378 4.15761 6.23356 5.80515 6.84896 7.34568C7.46437 8.88621 8.38297 10.2886 9.55072 11.4704C10.7185 12.6522 12.1118 13.5895 13.6487 14.2271C15.1856 14.8648 16.835 15.1899 18.5 15.1833C17.8468 16.2246 16.9901 17.1246 15.9808 17.8298C14.9716 18.535 13.8304 19.0312 12.6249 19.2888C12.5131 19.3125 12.4005 19.3406 12.2862 19.3606C10.1711 19.7325 7.99194 19.3547 6.12739 18.293C4.26284 17.2313 2.83071 15.5527 2.07982 13.5488C1.32892 11.545 1.3067 9.34249 2.01702 7.32402C2.72734 5.30554 4.12451 3.59881 5.96726 2.5Z"
                                animationData=" animationData.default"
                                stroke="currentColor" stroke-width="2"></path>
                            </svg>
                        <svg class="switchTheme-icon-light" width="20" height="20" viewBox="0 0 20 20"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.75 3H11.25V0H8.75V3ZM17 11.25L20 11.25V8.75L17 8.75V11.25ZM8.75 20L8.75 17H11.25L11.25 20H8.75ZM3 8.75V11.25H0V8.75H3ZM15.8336 5.93414L17.9549 3.81282L16.1872 2.04505L14.0658 4.16637L15.8336 5.93414ZM16.1872 17.955L14.0658 15.8336L15.8336 14.0659L17.9549 16.1872L16.1872 17.955ZM4.16635 14.0659L5.93412 15.8336L3.8128 17.955L2.04503 16.1872L4.16635 14.0659ZM4.16635 5.93414L5.93412 4.16637L3.8128 2.04505L2.04503 3.81282L4.16635 5.93414ZM12.5 10C12.5 11.3807 11.3807 12.5 10 12.5C8.61929 12.5 7.5 11.3807 7.5 10C7.5 8.61929 8.61929 7.5 10 7.5C11.3807 7.5 12.5 8.61929 12.5 10ZM15 10C15 12.7614 12.7614 15 10 15C7.23858 15 5 12.7614 5 10C5 7.23858 7.23858 5 10 5C12.7614 5 15 7.23858 15 10Z"
                                fill="currentColor"></path>
                        </svg>
                    </label>
                </div>
                <a href="#" data-toggle-close="menu"
                    class="header-menu-top-close h-full px-6 flex items-center justify-center">
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 3.69174L8.69082 -1.94964e-08L10 1.30918L6.30826 5L10 8.69082L8.69082 10L5 6.30826L1.30918 10L-1.94964e-08 8.69082L3.69174 5L0 1.30918L1.30918 0L5 3.69174Z"
                            fill="currentColor"></path>
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
                                <li
                                    class="header-nav-item {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }} block py-2 px-6">
                                    <a href="{{ '/' . trim($m['url'], '/') }}">{{ $m['title'] }}</a>
                                </li>
                            @else
                                <li
                                    class="header-nav-item {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }} block py-2 px-6">
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
                                                <li
                                                    class="header-nav-item {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }} block py-2 px-6">
                                                    <a href="{{ '/' . trim($m['url'], '/') }}">{{ $m['title'] }}</a>
                                                </li>
                                            @else
                                                <li
                                                    class="header-nav-item {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }} block py-2 px-6 ">
                                                    <a href="{{ $m['url'] }}">{{ $m['title'] }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <span class="header-extra-nav header-nav-item-menu-back"><i
                                            class="icon icon--arrowright rotate-180"></i></span>
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
                                                <li
                                                    class="subkanal__list_item {{ trim($category_tree[0]['url'], '/') == trim($m['url'], '/') ? 'active' : '' }}">
                                                    <a href="{{ '/' . trim($m['url'], '/') }}">{{ $m['title'] }}</a>
                                                </li>
                                            @else
                                                <li
                                                    class="subkanal__list_item {{ trim($category_tree[0]['url'], '/') == trim($m['url'], '/') ? 'active' : '' }}">
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
        btnShareNews.addEventListener("click", () =>
            menuShare(titleNews, synopsisNews, urlLink)
        );
    } else {
        console.error("Your Browser doesn't support Web Share API");
        console.log = function(){};
    }
</script>
