<header class="header fixed top-0 inset-x-0 max-w-screen-md mx-auto z-20 h-16" data-header>

    <div class="header-top flex justify-between items-center " style="padding: 20px 26px 0px 26px">
        <img class="nav-open " src="{{ URL::asset('assets/icons/burger.svg') }}" width="18px" height="18px" alt="bar-icon"
            style="cursor: pointer;" onclick="show()">
        <h1 class="header-body-logo text-3xl flex items-center font-bold">
            <a class="header-body-logo-link" href="/">
                <span class="header-body-logo-link-icon">
                    @if ($logo = \Site::api('fe-setting') ?? null)
                        <img class="logo-section-3 icon-lg object-contain dark:img-white" alt="logo" width="140"
                            height="48" src="{{ $logo['data']['site_logo'] ?? null }}" />
                    @endif
                </span>
            </a>
        </h1>
        <div class="header-body-right">
            <div class="switchTheme relative flex items-center justify-center w-8 h-8">
                <input class="switchTheme-control" type="checkbox" name="checkbox" id="switchTheme"
                    autocomplete="off" />
                <label class="switchTheme-icon" for="switchTheme">
                    <svg class="dark:svg-both-white switchTheme-icon-dark" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21 12.79C20.8427 14.4922 20.2039 16.1144 19.1582 17.4668C18.1126 18.8192 16.7035 19.8458 15.0957 20.4265C13.4879 21.0073 11.748 21.1181 10.0795 20.7461C8.41102 20.3741 6.88299 19.5345 5.67423 18.3258C4.46546 17.117 3.62594 15.589 3.25391 13.9205C2.88188 12.252 2.99272 10.5121 3.57346 8.9043C4.1542 7.29651 5.18083 5.88737 6.53321 4.84175C7.88559 3.79614 9.5078 3.15731 11.21 3C10.2134 4.34827 9.73385 6.00945 9.85853 7.68141C9.98321 9.35338 10.7039 10.9251 11.8894 12.1106C13.0749 13.2961 14.6466 14.0168 16.3186 14.1415C17.9906 14.2662 19.6517 13.7866 21 12.79V12.79Z"
                            fill="black" />
                    </svg>
                    <svg class="dark:svg-stroke-white switchTheme-icon-light" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
        </div>
    </div>
</header>

<div class="nav-main" style="transform: translateX(-1000%);">
    <div class="nav-content">
        <div class="nav-header">
            @if ($logo = \Site::api('fe-setting') ?? null)
                <a href="/"> <img class=" dark:img-white" src="{{ $logo['data']['site_logo'] ?? null }}"
                        alt="logo" width="140" height="48" /></a>
            @endif
            <img class="nav-close object-contain dark:img-white" src="{{ URL::asset('assets/icons/icon-close.svg') }}"
                alt="search-icon" width="25px" height="25px">
        </div>

        <ul class="nav-menus">
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
                        //check list subdomain 2 level > 0
                        if (count($second_subdomain['children'] ?? []) > 0) {
                            $subdomain = $second_subdomain;
                        }
                    }
                @endphp

                @foreach (array_slice($menu, 0, 9) as $m)
                    @if (!filter_var($m['url'], FILTER_VALIDATE_URL))
                        <li
                            class="header-nav-item {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }}">
                            <a href="{{ '/' . trim($m['url'], '/') }}">{{ $m['title'] }}</a>
                        </li>
                    @else
                        <li
                            class="header-nav-item {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }}">
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
                                            class="header-nav-item {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }}">
                                            <a href="{{ '/' . trim($m['url'], '/') }}">{{ $m['title'] }}</a>
                                        </li>
                                    @else
                                        <li
                                            class="header-nav-item {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }}">
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
                    }

                    .dark .all-search-box {
                        background-color: #fff0ec !important;
                    }

                    form.gsc-search-box,
                    table.gsc-search-box {
                        margin-bottom: 0;
                    }


                    form.gsc-search-box {
                        display: table;
                        position: relative;
                    }

                    .gsst_b {
                        padding: 0;
                    }

                    .gsib_a {
                        padding: 10px;
                        padding-right: 0px;
                        padding-left: 40px
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
                        background-color: yellow;
                    }

                    .gsc-input-box {
                        padding: 0;
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
                        margin-right: 40px;
                        background-image: url(https://cdns.klimg.com/kapanlagi.com/v5/i/channel/entertainment/h2-search.png);
                        background-repeat: no-repeat;
                        background-position: center;
                        filter: invert(1) grayscale(2) brightness(0);
                        width: 40px;
                        height: 40px;
                        background-size: 20px;
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

                    .dark .gsc-search-box-tools .gsc-search-box .gsc-input {
                        background: #fff0ec !important;
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
