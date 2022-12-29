<div class="section-body flex-1 container max-w-full">
    <article class="article flex flex-col h-full px-6 mt-5">
        <a class="header-body-logo-link animate animate--fadeIn" href="/">
            <span class="header-body-logo-link-icon">
                @if ($logo = \Site::api('fe-setting') ?? null)
                <img class="logo-section-3 icon-lg object-contain dark:img-white" alt="logo" width="140" height="48" src="{{ $logo['data']['site_logo'] ?? null }}" />
                @endif
            </span>
        </a>
        <div class="article-main relative flex-1">
            <div class="article-asset mb-4">
                <a href="{{ Src::detail($newsItem) }}" title="{{ $newsItem['news_title'] }}">
                    <figure class="article-asset w-full vh-h-landscape aspect-375 overflow-hidden">
                        <div class="flex justify-center object-cover w-full  animate animate--fadeIn " style="--delay: 300ms" width="375" height="208">
                            @include('image ', [
                            'title' => $newsItem['news_title'],
                            'source' => $newsItem,
                            'size' => '375x208',
                            $newsItem['news_title'] ?? null,
                            ])
                        </div>
                    </figure>
                </a>
            </div>
            <div class="article-background">
                <a href="{{ Src::detail($newsItem) }}" title="{{ $newsItem['news_title'] }}">
                    <h1 class="article-title vh-text-2xl font-outfit font-bold mb-2 animate animate--fadeInRight" style="--delay: 100ms">{{ $newsItem['news_title'] }}
                    </h1>
                </a>
                <span class="article-date vh-text-xs color-primary-41 dark:text-white-20 mb-4 inline-block animate animate--fadeInLeft" data-date="{{ Util::date($newsItem['news_date_publish'], 'default_date') }}" data-hour="{{ Util::date($newsItem['news_date_publish'], 'default_hour') }}" data-authors="{{ $newsItem['news_editor'][0]['name'] ?? '' }}" style="--delay: 200ms">{{ Util::date($newsItem['news_date_publish'], 'ago') }}
                </span>
                <div class="article-paragraph line-clamp-5 text-primary-42 dark:text-white-20 mb-4 animate animate--fadeInUp" style="--delay: 300ms">
                    <p class="vh-text-md">
                        {{ $newsItem['news_synopsis'] }}
                    </p>
                </div>
                @if (count($newsItem['news_tag']) > 0 ?? null)
                <span class="article-tag block capitalize font-inter font-bold text-primary-2  border-primary pt-2 mb-2 animate animate--fadeInLeft dark:text-white-20 dark:border-white-20" style="--delay: 0ms">
                    @if (Request::is('photo'))
                    {{ $tagPhoto }}
                    @elseif (Request::is('video'))
                    {{ $tagVideo }}
                    @elseif(Request::is('/'))
                    {{ '' }}
                    @elseif(Request::is('tag/*'))
                    <a href="{{ Src::detailTag($newsItem['news_tag'][0]) }}">
                        #{{ $newsItem['news_tag'][0]['tag_name'] }}
                    </a>
                    @elseif(Request::is('*'))
                    <a href="{{ Src::detailTag($newsItem['news_tag'][0]) }}">
                        {{ $newsItem['news_tag'][0]['tag_name'] }}
                    </a>
                    @endif
                </span>
                @endif
            </div>
        </div>
        <div class="article-footer flex justify-between items-center mb-6 animate animate--fadeInUp " style="--delay: 500ms">
            <div class="article-footer-left flex-1 ">
                <a rel="nofollow" class="btn-baca btn btn--outline  flex items-center justify-center vh-h-btn rounded-full  font-outfit font-medium bg-pink dark:bg-primary-41 dark:text-white" href="{{ Src::detail($newsItem) }}">
                    <span class="text-red ">READ MORE</span>
                    <svg class="dark:svg-stroke-white ml-3" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 12H22" stroke="var(--color-primary-2)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M15 5L22 12L15 19" stroke="var(--color-primary-2)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
        </div>
    </article>
</div>
