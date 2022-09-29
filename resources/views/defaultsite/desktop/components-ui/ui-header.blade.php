<nav>
    <div class="nav-first_section d-flex justify-content-between">
        <a href="/">
            <img src="{{ URL::asset('assets/images/logo.webp') }}" alt="logo" width="168px" height="34px">
        </a>
        {{-- ?? GCSE ??  --}}

        <div class="search-container">
            <div style="width: 100%;">
                {{-- ??   ?? --}}
                <style>
                    .gsc-search-button-v2 {
                        display: none;
                    }

                    form.gsc-search-box,
                    table.gsc-search-box {
                        margin-bottom: 0;
                    }


                    form.gsc-search-box {
                        display: table;
                        background: #EBEBEB;
                        -webkit-border-radius: 5px;
                        border-radius: 5px;
                        position: relative;
                        border: 2px solid #E5E5E5;
                    }

                    .gsst_b {
                        padding: 0;
                    }

                    .gsib_a {
                        padding: 0 10px;
                        padding-left: 40px;
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
                        width: 200px;
                        background-color: yellow;
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
                        position: absolute;
                        left: 0;
                        top: 0;
                        bottom: 0;
                        background-image: url(https://cdns.klimg.com/kapanlagi.com/v5/i/channel/entertainment/h2-search.png);
                        background-repeat: no-repeat;
                        background-position: center;
                        width: 40px;
                        height: 40px;
                        background-size: 16px;
                    }

                    .gsc-search-box-tools .gsc-search-box .gsc-input {
                        font-family: 'Noto Sans', sans-serif;
                        padding-right: 10px;
                        height: 40px !important;
                        line-height: normal;
                        color: var(--color-gray);
                        font-size: 14px;
                        background: #fff !important;
                        text-indent: 0 !important;
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


                {{-- ??   ?? --}}
            </div>
            <gcse:searchbox-only style="border-radius: 8px;" resultsUrl="{{ url('search') }}"></gcse:searchbox-only>
        </div>

        {{-- ?? END OF GCSE ??  --}}
    </div>


    <div class="nav-second_section">
        @if ($menu = Data::menu())

            <ul>
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

                <div id="listItemNav">
                    @foreach (array_slice($menu, 0, 9) as $m)
                        @if (!filter_var($m['url'], FILTER_VALIDATE_URL))
                            <li
                                {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }}">
                                <a href="{{ '/' . trim($m['url'], '/') }}">{{ $m['title'] }}</a>
                            </li>
                        @else
                            <li
                                {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }}">
                                <a href="{{ $m['url'] }}">{{ $m['title'] }}</a>
                            </li>
                        @endif
                    @endforeach
                </div>

                @if (count($menu) > 9)
                    <li>
                        <button id="btnLainnya" style="border: none; background: none; margin-left: 15px"
                            onclick="collapseLainnya()">
                            <span>{{ __('Lainnya') }}</span> <i class="fa-sharp fa-solid fa-chevron-right"></i></i>
                        </button>
                        <div id="list-nav-open" style="padding-right:0">
                            <ul>
                                @foreach (array_slice($menu, 9) as $m)
                                    @if (!filter_var($m['url'], FILTER_VALIDATE_URL))
                                        <li
                                            {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }}">
                                            <a href="{{ '/' . trim($m['url'], '/') }}">{{ $m['title'] }}</a>
                                        </li>
                                    @else
                                        <li
                                            {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }}">
                                            <a href="{{ $m['url'] }}">{{ $m['title'] }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            <span><i onclick="removeCollapse()" class="fa-sharp fa-solid fa-chevron-left"
                                    style="cursor: pointer"></i></span>
                        </div>
                    </li>
                @endif
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

        @endif
        {{-- <div class="route_login">
      <a href="#">masuk</a>
    </div> --}}
    </div>
</nav>

<script>
    function collapseLainnya() {
        document.getElementById('listItemNav').style.display = "none";
        document.getElementById('btnLainnya').style.display = "none";
        document.getElementById('list-nav-open').classList.add("open-nav");
    }

    function removeCollapse() {
        document.getElementById('listItemNav').style.display = "flex";
        document.getElementById('btnLainnya').style.display = "block";
        document.getElementById('list-nav-open').classList.remove("open-nav");
    }
</script>
