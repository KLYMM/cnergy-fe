<div class="section-body flex-1 container max-w-full">
    <article class="article flex flex-col h-full px-6 mt-6">
        <div class="article-main relative flex-1">
            <div class="article-background border-tag mb-4">
                @if (count($newsItem['news_tag']) > 0 ?? null)
                    <span
                        class="article-tag block capitalize font-inter font-bold text-primary  border-primary pt-2 mb-2 animate animate--fadeInUp dark:text-white-20 dark:border-white-20"
                        style="--delay: 0ms">
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

                <a href="{{ Src::detail($newsItem) }}">
                    <h1 class="article-title mt-1 vh-text-2xl font-outfit font-bold mb-2 animate animate--fadeInUp mt-6"
                        style="--delay: 100ms">
                        {{ $newsItem['news_title'] }}
                    </h1>
                </a>

                <span
                    class="article-date vh-text-xs text-primary dark:text-white-20 inline-block animate animate--fadeInLeft"
                    data-date="{{ Util::date($newsItem['news_date_publish'], 'default_date') }}"
                    data-hour="{{ Util::date($newsItem['news_date_publish'], 'default_hour') }}"
                    data-author="{{ $newsItem['news_editor'][0]['name'] ?? '' }}"
                    style="--delay: 200ms">{{ Util::date($newsItem['news_date_publish'], 'ago') }}
                </span>
            </div>
            <div class="article-asset mb-4">
                <a href="{{ Src::detail($newsItem) }}">
                    {{-- @if (count($newsItem['news_image']['real']) > 0 ?? null) --}}
                    <figure class="article-asset w-full vh-h-landscape aspect-375 overflow-hidden justify">
                        <div class="flex justify-center object-contain w-full  animate animate--fadeIn"
                            style="--delay: 300ms" width="375" height="208">
                            @include('image ', [
                                'title' => $newsItem['news_title'],
                                'source' => $newsItem,
                                'size' => '375x208',
                                $newsItem['news_title'] ?? null,
                            ])
                        </div>
                    </figure>
                </a>
                {{-- @endif --}}
            </div>
            <div class="article-paragraph line-clamp-5 text-gray font-inter dark:text-white-20 animate animate--fadeInUp"
                style="--delay: 400ms">
                <p class="vh-text-md">
                    {{ $newsItem['news_synopsis'] }}
                </p>
            </div>
        </div>
        <div class="article-footer flex justify-between items-center animate animate--fadeInUp mb-6 "
            style="--delay: 500ms">
            <div class="article-footer-left flex-1 ">
                <a rel="nofollow"
                    class="btn-baca btn btn--outline rounded-lg flex items-center justify-center vh-h-btn  font-outfit font-medium bg-primary-40  dark:bg-primary-41 dark:text-white"
                    href="{{ Src::detail($newsItem) }}" title="{{ $newsItem['news_title'] }}">
                    <span>READ MORE</span>
                    <svg class="dark:svg-stroke-white ml-3" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 12H22" stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M15 5L22 12L15 19" stroke="var(--color-primary)" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
        </div>
    </article>
</div>
