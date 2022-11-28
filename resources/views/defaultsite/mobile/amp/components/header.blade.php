<header class="header ">
        <div class=" header-main ">
            <div class="header-item">
                <button type="button" class="header-btn header-btn--menu px-4" name="btn-menubar" aria-label="btn-menubar" on="tap:AMP.setState({menu: true, searchbar: false})">
                    <i class="icon icon--menu"></i>
                    {{-- <img class="icon icon--image" src="data:image/svg+xml,%3Csvg width='17' height='15' viewBox='0 0 17 15' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M16.7458 2.52959L0 2.52959V0H16.7458V2.52959Z' fill='%23333333'/%3E%3Cpath d='M16.7458 8.58877H0V6.05918H16.7458V8.58877Z' fill='%23333333'/%3E%3Cpath d='M16.7458 14.6479L0 14.6479V12.1184H16.7458V14.6479Z' fill='%23333333'/%3E%3C/svg%3E%0A" alt="icon" width="18" height="18"> --}}
                </button>
                <div class="header-collapse header-collapse--menu" [class]="menu ? 'header-collapse header-collapse--menu open' : 'header-collapse header-collapse--menu'">
                    <div class="header-collapse-inner flex flex-col justify-between">
                        <div class="header-collapse-header flex items-center justify-between px-4">
                            <span class="header-collapse-nav-item">

                                <a href="{{ url('') }}" class="header-logo" style="background-image: url({{ Src::imgNewsCdn(config('site.attributes'), '320x', 'webp', 'file_logo') }});">Logo</a>
                            </span>
                            <button type="button" class="header-btn header-btn--close px-4 -mr-4" name="btn-closemenubar" aria-label="btn-closemenubar" on="tap:AMP.setState({menu: false})">
                                <i class="icon icon--close"></i>
                             
                            </button>
                        </div>
                        <div class="header-collapse-body overflow-y-auto flex-1">
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
                                <ul class="header-collapse-nav list-none p-4">
                                    @foreach ($menu as $m)
                                        <li class="header-collapse-nav-item {{ trim(end($category_tree)['url'] ?? null, '/') == trim($m['url'], '/') || config('site.attributes.object.category.slug') == trim($m['url'], '/') ? 'active' : '' }}"><a href="{{ '/' . trim($m['url'], '/') }}">{{ $m['title'] }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-item"><a href="{{ url('') }}" class="header-logo" style="background-image: url({{ Src::imgNewsCdn(config('site.attributes'), '320x', 'webp', 'file_logo') }});"></a></div>
            <div class="header-item">
                <button>
                    <i class="icon icon--mode"></i>
                </button>
                {{-- <button type="button" class="header-btn header-btn--searchbar px-4" name="btn-searchbar" aria-label="btn-searchbar" on="tap:AMP.setState({searchbar: !searchbar})">
                    <i class="icon icon--search"></i>
                </button>
                <div class="header-collapse header-collapse--searchbar" [class]="searchbar ? 'header-collapse header-collapse--searchbar open' : 'header-collapse header-collapse--searchbar'">
                    <div class="header-collapse-inner">
                        <div class="header-collapse-body p-4">
                            <div class="form-group">
                                <input type="text" placeholder="Berita apa yang ingin anda cari hari ini?" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button class="header-collapse-overlay" on=" "></button>
                </div> --}}
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
