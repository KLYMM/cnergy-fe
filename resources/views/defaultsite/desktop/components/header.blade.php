<header class="header">
    <div class="container w-kly px-8">
        <div class="channel-ad channel-ad_ad-topfrm">
            {!! Util::getAds('billboardmasthead') !!}
        </div>
    </div>
    {{-- header-lama --}}
    {{-- <div class="header-main py-4">
        <div class="container w-kly px-8">
            <div class="header-body flex items-center justify-between">
                <div class="header-item flex items-center">
                    <a href="/" class="header-logo" style="background-image: url({{ Src::imgNewsCdn(config('site.attributes'), '320x', 'webp', 'file_logo') }});">Logo</a>
                    @if ($menu = Data::menu())
                    <ul class="header-nav list-none flex items-center flex-1 pl-4">
                        @foreach (array_slice($menu, 0, 5) as $m)
                        <li class="header-nav-item"><a href="{{ $m['url'] }}">{{ $m['title'] }}</a></li>
                        @endforeach
                        @if (count($menu) > 5)
                        <li class="header-nav-item">
                            <a href="#" data-turbolinks="false">{{__('Lainnya')}} <i class="icon icon--caretdown ml-2"></i></a>
                            <ul class="header-nav-item-submenu">
                                @foreach (array_slice($menu, 5) as $m)
                                <li class="header-nav-item-submenu-item"><a href="{{ $m['url'] }}">{{ $m['title'] }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endif
                    </ul>
                    @endif
                </div>
                <div class="header-item">
                    <div class="header-searchbar">
                        <div class="form-group">
                            <!--TECHBARNEW-->
                            <div class="all-search-box pull-right clearfix" style="width: 100%;">

                                <style>
                                    .gsc-search-button-v2{display: none;}
                                    form.gsc-search-box,
                                    table.gsc-search-box{
                                        margin-bottom:0;
                                    }
                                    form.gsc-search-box{
                                        display: table;
                                        background: #EBEBEB;
                                        -webkit-border-radius: 5px;
                                        border-radius: 5px;
                                        position: relative;
                                    }
                                    .gsst_b{
                                        padding:0;
                                    }
                                    .gsib_a{
                                        padding:0 10px;
                                        padding-left:40px;
                                    }
                                    .gsst_a{
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
                                        font-weight:300;
                                    }
                                    .gsc-input, 
                                    .gsc-input-box, 
                                    .gsc-input-box-hover, 
                                    .gsc-input-box-focus {
                                        border:none;
                                        box-shadow:none;
                                        height:100%;
                                        background-color:transparent !important;
                                        margin:0 !important;
                                    }
                                    input.gsc-search-button,
                                    input.gsc-search-button:hover, 
                                    input.gsc-search-button:focus{
                                        padding:0;
                                        margin:0;
                                        border:0;
                                        border-radius:0;
                                        background-color:transparent;
                                        cursor: pointer;
                                        text-indent: -9999px;
                                        -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
                                        filter: alpha(opacity=50);
                                        -moz-opacity:0.5;
                                        -khtml-opacity: 0.5;
                                        opacity:0;
                                        position:absolute;
                                        left:0; 
                                        top:0;
                                        width: 100%;
                                        height: 100%
                                    }
                                    td.gsc-search-button {
                                        position: absolute;
                                        left: 0;
                                        top: 0;
                                        bottom: 0;
                                        background-image: url(https://cdns.klimg.com/kapanlagi.com/v5/i/channel/entertainment/h2-search.png);
                                        background-repeat:no-repeat;
                                        background-position:center;
                                        width:40px;
                                        height:40px;
                                        background-size:16px;
                                    }
                                    .gsc-search-box-tools .gsc-search-box .gsc-input{
                                        font-family: 'Noto Sans', sans-serif;
                                        padding-right:10px;
                                        height:40px !important;
                                        line-height: normal;
                                        color: var(--color-gray);
                                        font-size: 14px;
                                        background:#fff !important;
                                        text-indent:0 !important;
                                    }
                                    .gsc-search-box-tools .gsc-search-box .gsc-input::-webkit-input-placeholder {
                                        opacity:1;
                                    }
                                    .gsc-search-box-tools .gsc-search-box .gsc-input::-moz-placeholder {
                                        opacity:1;
                                    }
                                    .gsc-search-box-tools .gsc-search-box .gsc-input:-ms-input-placeholder {
                                        opacity:1;
                                    }
                                    .gsc-search-box-tools .gsc-search-box .gsc-input:-moz-placeholder {
                                        opacity:1;
                                    }
                                    td.gsc-search-button{
                                        margin-left:0;
                                    }
                                    td.gsc-search-button .gsc-search-button-v2,
                                    td.gsc-search-button .gsc-search-button-v2:hover, 
                                    td.gsc-search-button .gsc-search-button-v2:focus{
                                        background-color: transparent;
                                        border: 0;
                                        margin: 0;
                                        padding: 0;
                                        border-radius:0;
                                        cursor: pointer;
                                        width: 40px;
                                        height: 40px;
                                    }
                                    td.gsc-search-button .gsc-search-button-v2 svg{
                                        display:none;
                                    }
                                </style>

                                @push('script_lazy')
                                initCSE(false);
                                @endpush
                                
                                @push('script')
                                <script>
                                    var startGCS = false;

                                    @if (request()->segment(1) == 'search')
                                    window.addEventListener('load', function(){

                                    initCSE(false)

                                    });
                                    @endif

                                    document.getElementsByClassName("header-searchbar")[0].addEventListener("click", function(){
                                        initCSE(true)
                                    });
                                    document.addEventListener("turbolinks:load", function() {
                                        initCSE(false)
                                    })


                                    function initCSE(focus)
                                    {
                                        if( startGCS ) return false;

                                        startGCS = true;
                                        
                                        (function() {
                                            var cx = "{{ config('site.attributes.reldomain.cse_id')??null }}";
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

                                                if( focus )
                                                {
                                                    document.getElementsByClassName("gsc-input")[2].focus()
                                                }
                                            }
                                        };
                                    }
                                </script>
                                @endpush
                                <gcse:searchbox-only resultsUrl="{{url('search')}}"></gcse:searchbox-only>
                                
                            </div>
                            <!--ENDOFTECHBARNEW-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="header-main pt-4">
        <div class="container w-kly px-8">
            <div class="header-body flex items-center justify-between">
                <div class="header-item flex items-center">
                    <a href="/" class="header-logo" style="background-image: url({{ Src::imgNewsCdn(config('site.attributes'), '320x', 'webp', 'file_logo') }});">Logo</a>
                </div>
                <div class="header-item">
                    <div class="header-searchbar">
                        <div class="form-group">
                            <!--TECHBARNEW-->
                            <div class="all-search-box pull-right clearfix" style="width: 100%;">

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

                                        document.getElementsByClassName("header-searchbar")[0].addEventListener("click", function() {
                                            initCSE(true)
                                        });
                                        document.addEventListener("turbolinks:load", function() {
                                            initCSE(false)
                                        })


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
                </div>
            </div>
            @if ($menu = Data::menu())
                <div class="header-menu">
                    <ul class="header-nav list-none flex items-center flex-1 justify-between">
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
                                <li class="header-nav-item {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }}"><a href="{{ '/' . trim($m['url'], '/') }}">{{ $m['title'] }}</a></li>
                            @else
                                <li class="header-nav-item {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }}"><a href="{{ $m['url'] }}">{{ $m['title'] }}</a></li>
                            @endif
                        @endforeach
                        @if (count($menu) > 9)
                            <li class="header-nav-item">
                                <button name="btn-avatar" aria-label="btn-avatar" class="header-nav-item flex items-center header-extra-nav">
                                    <span>{{ __('Lainnya') }}</span> <i class="icon icon--arrowright"></i>
                                </button>
                                <div class="header-nav-item-menu" style="padding-right:0">
                                    <ul class="header-nav-item-menu-list">
                                        @foreach (array_slice($menu, 9) as $m)
                                            @if (!filter_var($m['url'], FILTER_VALIDATE_URL))
                                                <li class="header-nav-item {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }}"><a href="{{ '/' . trim($m['url'], '/') }}">{{ $m['title'] }}</a></li>
                                            @else
                                                <li class="header-nav-item {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }}"><a href="{{ $m['url'] }}">{{ $m['title'] }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <span class="header-extra-nav header-nav-item-menu-back"><i class="icon icon--arrowright rotate-180"></i></span>
                                </div>
                            </li>
                        @endif
                        {{-- <li class="header-nav-item ml-auto"><a href="/" class="btn-sign">MASUK</a></li> --}}
                    </ul>

                </div>
                {{-- search key from parameter category to list menu --}}
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
        </div>
    </div>

    {{-- @include('defaultsite/desktop/components/breakingnews') --}}
</header>
<div class="container w-kly px-8 pt-5">
    <div class="channel-ad channel-ad_ad-lb">
        {!! Util::getAds('leaderboard') !!}
    </div>
</div>
