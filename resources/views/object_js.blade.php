<script type="text/javascript">
    window.kly = {};
    window.kly.env = '{{ config('app.env') }}'; // production or devel
    window.kly.baseAssetsUrl = ''; // kosongkan
    window.kly.gtm = {
        "adblockExists": "no", // deteksi user pakai adblock atau tidak (yes or no, default no)
        "articleId": {!! config('site.attributes.object.article.news_id', '""') !!}, // id news
        // "articleTitle": "{{ config('site.attributes.object.article.news_title') }}", // news title
        "category": "{{ config('site.attributes.object.pageType') }}", // tipe halaman (article, ChannelPage, TagPage, BrandPage, Homepage)
        "editors": "{{ implode(',',collect(config('site.attributes.object.article.news_editor'))->pluck('name')->sort()->toArray()) }}", // nama editor, jika > 1, maka pisahkan dengan koma. Urut abjad ASC
        "editorialType": "{!! !config('site.attributes.object.article')
            ? ''
            : (config('site.attributes.object.article.news_top_headtorial')
                ? 'advertorial'
                : 'editorial') !!}", // editorial editorial or advertorial or reportorial (default: editorial)
        "embedVideo": "", // kosongkan
        "pageTitle": "{{ config('site.attributes.object.article.news_title', config('site.attributes.meta.title')) }}", // page title
        "publicationDate": "{{ config('site.attributes.object.article.news_date_publish') ? date('Y-m-d', strtotime(config('site.attributes.object.article.news_date_publish'))) : '' }}", // tanggal publish YYYY-MM-DD
        "publicationTime": "{{ config('site.attributes.object.article.news_date_publish') ? date('H:i:s', strtotime(config('site.attributes.object.article.news_date_publish'))) : '' }}", // jam publish hh:mm:ss
        "position": 1,
        "templateId": null,
        "templateName": null,
        "subCategory": "{{ explode('.', config('site.attributes.reldomain.domain_name'))[0] ?? 'feed' }}", // nama kategori (level 1)
        "subSubCategory": "{{ config('site.attributes.object.article.news_category.0.name') }}", // nama sub kategori (level 2)
        "subsubSubCategory": "", // sub sub kategori (level 3)
        "tag": "{{ implode('|',collect(config('site.attributes.object.article.news_tag'))->pluck('tag_name')->sort()->toArray()) }}", // tag
        "authors": {
            "type": "{{ config('site.attributes.object.article.news_reporter.0.id') ? 'author' : (config('site.attributes.object.article.news_photographer.0.id') ? 'photographer' : 'editor') }}", // author|editor|photographer -> jika reporter maka di isi author, jika reporter kosong maka editor, jika photo news maka photographer 
            "names": "{{ config('site.attributes.object.article.news_reporter.0.id')
                ? implode(
                    ',',
                    collect(config('site.attributes.object.article.news_reporter'))->pluck('name')->sort()->toArray(),
                )
                : (config('site.attributes.object.article.news_photographer.0.id')
                    ? implode(
                        ',',
                        collect(config('site.attributes.object.article.news_photographer'))->pluck('name')->sort()->toArray(),
                    )
                    : implode(
                        ',',
                        collect(config('site.attributes.object.article.news_editor'))->pluck('name')->sort()->toArray(),
                    )) }}" // Nama sesuai type, jika > 1, maka pisahkan dengan koma. Urut abjad ASC
        },
        "numberOfWords": {{ str_word_count(strip_tags(config('site.attributes.object.article.news_content'))) }}, // jumlah kata
        "enabled": true, // default true
        "log": false, // default false
        "imageCreation": false, // default false
        "type": "{{ ['news' => 'text', 'photonews' => 'PhotoGallery', 'video' => 'VideoGallery'][config('site.attributes.object.article.news_type')] ?? 'feed' }}", // tipe news (TextTypeArticle, PhotoGallery, VideoGallery)
        "videos": "", // kosongkan
        "partner": "", // kosongkan
        "isSEO": false, // SEO news true or false, default false
        "contibutors": "", // nama kontributor, jika > 1, maka pisahkan dengan koma. Urut abjad ASC
        "reporters": "{{ implode(',',collect(config('site.attributes.object.article.news_reporter'))->pluck('name')->sort()->toArray()) }}", // Nama reporter, jika > 1, maka pisahkan dengan koma. Urut abjad ASC
        "photographers": "{{ implode(',',collect(config('site.attributes.object.article.news_photographer'))->pluck('name')->sort()->toArray()) }}", // Nama fotografer
        "brand": "",
        "is_virtual": 0,
    };
    window.kly.platform = '{{ ucfirst(config('site.device')) }}'; // Desktop atau Mobile
    window.kly.pageType =
        '{{ config('site.attributes.object.pageType') }}'; // (Homepage, ChannelPage, TagPage, BrandPage, Readpage)
    window.kly.channel = {
        "id": "", // id category (level 1)
        "name": "trstd.ly", // nama category ie: 'Lifestyle'. channel, misal 'Hijab'
        "full_slug": "" // sesuai nama kategori ie: community, jika subdomain maka nama subdomain, ie: "hijab"
    };
    window.kly.category = {
        "id": {!! config('site.attributes.object.category.id', 'null') !!}, // id sub category (level 2)
        "name": "{{ config('site.attributes.object.category.name') }}", // nama sub category
        "full_slug": "{{ config('site.attributes.object.category.slug') }}" // sesuai nama sub kategori ie: fashion-update, slug fashion-update
    };
    window.kly.multiplePageCount = 1;
    window.kly.article = {
        "id": {!! config('site.attributes.object.article.news_id', '""') !!}, // id news
        "title": "{{ config('site.attributes.object.article.news_title') }}", // news title
        "type": "{{ ['news' => 'TextTypeArticle', 'photonews' => 'PhotoGallery', 'video' => 'VideoGallery'][config('site.attributes.object.article.news_type')] ?? '' }}", // tipe news (TextTypeArticle, PhotoGallery, VideoGallery)
        "shortDescription": "{{ str_replace(["\n", "\r"], '', config('site.attributes.object.article.news_synopsis')) }}", // Synopsis 
        "keywords": "{{ implode(',',collect(config('site.attributes.object.article.news_keywords'))->pluck('keyword_name')->sort()->toArray()) }}", // keywords
        "isAdvertorial": {!! !config('site.attributes.object.article')
            ? '""'
            : (config('site.attributes.object.article.news_top_headtorial')
                ? 'true'
                : 'false') !!}, // advertorial true or false
        "isMultipage": {!! !config('site.attributes.object.article')
            ? '""'
            : (config('site.attributes.object.article.has_paging') == '1'
                ? 'true'
                : 'false') !!}, // paging news true or false
        "isAdultContent": {!! !config('site.attributes.object.article')
            ? '""'
            : (config('site.attributes.object.article.news_mature')
                ? 'true'
                : 'false') !!}, // mature content true or false
        "verifyAge": false, // default false
        "publishDate": "{{ config('site.attributes.object.article.news_date_publish') }}" // publish date YYYY-MM-DD hh:mm:ss
    };
    window.kly.site = '{{ Util::getDomain(request()->root()) }}'; // Dream
    window.kly.related_system = 'tag'; // default tag
    window.kly.gtm.audience = "";
    window.kly.visitor = {
        "age": "",
        "audience": "",
        "gaid": "",
        "gender": "",
        "gender": "",
        "klyLoginStatus": "not_logged_in",
        "isAdultContent": {!! !config('site.attributes.object.article')
            ? '""'
            : (config('site.attributes.object.article.news_mature')
                ? 'true'
                : 'false') !!}, // mature content true or false
        "pageType": "{{ config('site.attributes.object.pageType') }}", // tipe news (Homepage, ChannelPage, TagPage, BrandPage, Readpage)
        "type": "{{ ['news' => 'TextTypeArticle', 'photonews' => 'PhotoGallery', 'video' => 'VideoGallery'][config('site.attributes.object.article.news_type')] ?? '' }}", // tipe news (TextTypeArticle, PhotoGallery, VideoGallery)
        "platform": "{{ ucfirst(config('site.device')) }}",
        "publicationDate": "{{ config('site.attributes.object.article.news_date_publish') ? date('Y-m-d', strtotime(config('site.attributes.object.article.news_date_publish'))) : '' }}", // tanggal publish YYYY-MM-DD
        "publicationTime": "{{ config('site.attributes.object.article.news_date_publish') ? date('H:i:s', strtotime(config('site.attributes.object.article.news_date_publish'))) : '' }}", // jam publish hh:mm:ss
        "subCategory": "{{ explode('.', config('site.attributes.reldomain.domain_name'))[0] }}", // nama kategori (level 1)
        "subSubCategory": "{{ config('site.attributes.object.article.news_category.0.name') }}", // nama sub kategori (level 2)
        "site": "{{ Util::getDomain(request()->root()) }}",
        "pageTitle": "{{ config('site.attributes.object.article.news_title', config('site.attributes.meta.title')) }}", // page title
        "tag": "{{ implode('|',collect(config('site.attributes.object.article.news_tag'))->pluck('tag_name')->sort()->toArray()) }}", // tag
    };
</script>

@if (config('app.enabled_tracking'))



    @if (in_array(config('app.env'), ['production', 'staging']))
        <script>
            (function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', {{ $isMaverick ?? null ? 'GTM-KH4RTMT' : 'GTM-W4BFXJK' }});
        </script>
    @else
        <script>
            window.dataLayer = window.dataLayer || [];
        </script>
    @endif

@endif

@if (config('app.enabled_ads'))
    {!! Util::getAds('gpt') !!}
@endif

<!-- KLY TRACE LOG -->

@if (config('app.enabled_tracelog'))
    <script type="text/javascript">
        (function(doc, id) {
            if (doc.getElementById(id)) {
                return;
            }
            var kly_trace_log___scripts = doc.createElement('script');
            kly_trace_log___scripts.src = 'https://trace-log.kl-youniverse.com/js/embed.js';
            kly_trace_log___scripts.type = 'text/javascript';
            kly_trace_log___scripts.async = true;
            kly_trace_log___scripts.defer = true;
            kly_trace_log___scripts.id = id;
            var s = doc.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(kly_trace_log___scripts, s);
        })(document, 'klytracelog');
    </script>
@endif

<!-- END OF KLY TRACE LOG -->
