<div class="channel-ad channel-ad_ad-topfrm">
    {!! Util::getAds('billboardmasthead') !!}
</div>

<header class="header">
    <div class="container max-w-full">
        <div class="header-body flex items-center justify-between">
            <div class="header-item">
                <button type="button" class="header-btn header-btn--menu px-4" @click="menu = true, searchbar = false" name="btn-menubar" aria-label="btn-menubar"><i class="icon icon--menu"></i></button>
                <div class="header-collapse header-collapse--menu" :class="[menu ? 'open' : '']">
                    <div class="header-collapse-inner flex flex-col justify-between">
                        <div class="header-collapse-header flex items-center justify-between px-4">
                            <span class="header-collapse-nav-item">
                                <!--<a href="/">
                                    <i class="icon icon--nav icon--nav-avatar"></i> Masuk
                                </a> -->
                                <a href="{{ url('') }}" class="header-logo" style="background-image: url({{ Src::imgNewsCdn(config('site.attributes'), '320x', 'webp', 'file_logo') }});">Logo</a>
                            </span>
                            <button type="button" class="header-btn header-btn--close px-4 -mr-4" @click="menu = false" name="btn-closemenubar" aria-label="btn-closemenubar"><i class="icon icon--close"></i></button>
                        </div>
                        <div class="header-collapse-body overflow-y-auto flex-1">

                            <div class="header-collapse-item p-4">
                                <!--<h1 class="header-collapse-title mb-2">Kanal</h1>-->
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
                                    <ul class="header-collapse-nav list-none">
                                        @foreach ($menu as $m)
                                            <li class="header-collapse-nav-item {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }}"><a href="{{ '/' . trim($m['url'], '/') }}">{{ $m['title'] }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <!--<div class="header-collapse-footer flex items-center justify-between px-4">
                            <a href="#">Kontak</a>
                            <a href="#">Kebijakan Privasi</a>
                        </div>-->
                    </div>
                </div>
            </div>
            <div class="header-item"><a href="{{ url('') }}" class="header-logo" style="background-image: url({{ Src::imgNewsCdn(config('site.attributes'), '320x', 'webp', 'file_logo') }});"></a></div>
            <div class="header-item">
                <button type="button" class="header-btn header-btn--searchbar  px-4" @click="searchbar = !searchbar" name="btn-searchbar" aria-label="btn-searchbar"><i class="icon icon--search"></i></button>
                <div class="header-collapse header-collapse--searchbar" :class="[searchbar ? 'open' : '']">
                    <div class="header-collapse-inner">
                        <div class="header-collapse-body p-4">

                            <!--TECHBARNEW-->
                            <div class="all-search-box pull-right clearfix">

                                <style>
                                    .gsc-search-button-v2 {
                                        display: none;
                                    }

                                    .all-search-box {
                                        background-color: var(--bg-gray);
                                        min-width: 280px;
                                        min-height: 34px;
                                        border-radius: 8px;
                                        overflow: hidden;
                                        border: 1px solid var(--color-border);
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
                                        height: 100%
                                    }

                                    td.gsc-search-button {
                                        position: absolute;
                                        left: 0;
                                        top: 5px;
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

                                @push('script_lazy')
                                    initCSE(false);
                                @endpush

                                @push('script')
                                    <script>
                                        var startGCS = false;

                                        @if (request()->segment(1) == 'search')
                                            window.addEventListener('load', function() {

                                                initCSE(false)

                                            });
                                        @endif

                                        document.getElementsByClassName("header-btn--searchbar")[0].addEventListener("click", function() {
                                            initCSE(true)
                                        });


                                        function initCSE(focus) {
                                            if (startGCS) return false;

                                            startGCS = true;

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
                                                    document.getElementsByClassName("gsc-input")[2].setAttribute("placeholder", "Berita apa yang ingin Anda cari?");

                                                    if (focus) {
                                                        document.getElementsByClassName("gsc-input")[2].focus()
                                                    }
                                                }
                                            };
                                        }
                                    </script>
                                @endpush
                                <gcse:searchbox-only resultsUrl="{{ url('search') }}"></gcse:searchbox-only>

                            </div>
                            <!--ENDOFTECHBARNEW-->
                        </div>
                    </div>
                    <div class="header-collapse-overlay" @click="searchbar = false"></div>
                </div>
            </div>
        </div>
    </div>
    @if ($menu)
        {{-- search key from parameter category to list menu --}}
        @if (count($category_tree) > 0)
            @if ($subdomain)
                @if (count($subdomain['children']) > 0)
                    <div class="subkanal">
                        <h2 class="subkanal__title">{{ strtoupper($subdomain['title']) }}</h2>
                        <ul class="subkanal__list">
                            {{-- list subdomain level 1 or check list subdomain 2 level > 0 --}}
                            @if (count($category_tree) > 0 || count($second_subdomain['children'] ?? []) > 0)
                                @foreach ($subdomain['children'] as $m)
                                    @if (!filter_var($m['url'], FILTER_VALIDATE_URL))
                                        <li class="subkanal__list_item {{ trim($category_tree[0]['url'], '/') == trim($m['url'], '/') ? 'active' : '' }}"><a href="{{ '/' . trim($m['url'], '/') }}">{{ $m['title'] }}</a></li>
                                    @else
                                        <li class="subkanal__list_item {{ trim($category_tree[0]['url'], '/') == trim($m['url'], '/') ? 'active' : '' }}"><a href="{{ $m['url'] }}">{{ $m['title'] }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                @endif
            @endif
        @endif
    @endif
</header>
