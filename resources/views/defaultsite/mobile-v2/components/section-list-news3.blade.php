<div class="section-body flex-1 container max-w-full">
    <article class="article flex flex-col h-full px-6 mt-5">
        <div class="article-main relative flex-1">
            <div class="article-asset mb-4">
                <figure class="article-asset w-full vh-h-landscape aspect-375 overflow-hidden">
                    <div class="flex justify-center object-cover w-full h-full animate animate--fadeIn "
                        style="--delay: 300ms" width="375" height="208">
                        @include('image ', [
                            'source' => $newsItem,
                            'size' => '375x208',
                            $newsItem['news_title'] ?? null,
                        ])
                    </div>
                </figure>
            </div>
            <div class="article-background">
                <h1 class="article-title vh-text-2xl font-outfit font-bold mb-2 animate animate--fadeInRight"
                    style="--delay: 100ms">
                    {{ $newsItem['news_title'] }}
                </h1>
                <span
                    class="article-date vh-text-xs color-primary-41 dark:text-white-20 mb-4 inline-block animate animate--fadeInLeft"
                    data-date="{{ Util::date($newsItem['news_date_publish'], 'ago') }}"
                    style="--delay: 200ms">{{ Util::date($newsItem['news_date_publish'], 'ago') }}
                </span>
                <div class="article-paragraph line-clamp-5 text-primary-42 dark:text-white-20 mb-4 animate animate--fadeInUp"
                    style="--delay: 300ms">
                    <p class="vh-text-md">
                        {{ $newsItem['news_synopsis'] }}
                    </p>
                </div>
                @if (count($newsItem['news_tag']) > 0 ?? null)
                    <span
                        class="article-tag block capitalize font-inter font-bold text-primary  border-primary pt-2 mb-2 animate animate--fadeInLeft dark:text-white-20 dark:border-white-20"
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
            </div>
        </div>
        <div class="article-footer flex justify-between items-center mb-6 animate animate--fadeInUp "
            style="--delay: 500ms">
            <div class="article-footer-left flex-1 ">
                <a class="btn btn--outline  flex items-center justify-center vh-h-btn rounded-lg  font-outfit font-medium bg-primary-41 dark:bg-primary-41 dark:text-white"
                    href="{{ Src::detail($newsItem) }}">
                    <span class="text-white ">READ MORE</span>
                    <svg class="dark:svg-stroke-white ml-3" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 12H22" stroke="var(--color-white)" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M15 5L22 12L15 19" stroke="var(--color-white)" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            {{-- <div class="article-footer-right">
            <div class="article-footer-group flex items-center">
                <div class="article-footer-group-item ml-4">
                    <a class="article-footer-group-item-btn flex flex-col items-center vh-text-xs"
                        href="">
                        <svg class="dark:svg-stroke-white" width="23" height="22" viewBox="0 0 23 22"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.34 3.60999C19.8292 3.099 19.2228 2.69364 18.5554 2.41708C17.8879 2.14052 17.1725 1.99817 16.45 1.99817C15.7275 1.99817 15.0121 2.14052 14.3446 2.41708C13.6772 2.69364 13.0708 3.099 12.56 3.60999L11.5 4.66999L10.44 3.60999C9.4083 2.5783 8.00903 1.9987 6.55 1.9987C5.09096 1.9987 3.69169 2.5783 2.66 3.60999C1.6283 4.64169 1.04871 6.04096 1.04871 7.49999C1.04871 8.95903 1.6283 10.3583 2.66 11.39L3.72 12.45L11.5 20.23L19.28 12.45L20.34 11.39C20.851 10.8792 21.2563 10.2728 21.5329 9.60535C21.8095 8.93789 21.9518 8.22248 21.9518 7.49999C21.9518 6.77751 21.8095 6.0621 21.5329 5.39464C21.2563 4.72718 20.851 4.12075 20.34 3.60999Z"
                                stroke="var(--color-primary)" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
                <div class="article-footer-group-item ml-4">
                    <a class="article-footer-group-item-btn flex flex-col items-center vh-text-xs"
                        href="">
                        <svg class="dark:svg-fill-white" width="22" height="24" viewBox="0 0 22 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.0318 16.5533C17.1779 16.5533 16.3899 16.8529 15.7726 17.3533L9.56436 12.8618C9.66832 12.2913 9.66832 11.7066 9.56436 11.136L15.7726 6.64459C16.3899 7.14496 17.1779 7.44459 18.0318 7.44459C20.0154 7.44459 21.6274 5.8326 21.6274 3.84907C21.6274 1.86553 20.0154 0.25354 18.0318 0.25354C16.0483 0.25354 14.4363 1.86553 14.4363 3.84907C14.4363 4.19663 14.4842 4.52922 14.5771 4.84682L8.68046 9.11651C7.80555 7.95695 6.41528 7.20489 4.84823 7.20489C2.19953 7.20489 0.0541992 9.35022 0.0541992 11.9989C0.0541992 14.6476 2.19953 16.793 4.84823 16.793C6.41528 16.793 7.80555 16.0409 8.68046 14.8813L14.5771 19.151C14.4842 19.4686 14.4363 19.8042 14.4363 20.1488C14.4363 22.1323 16.0483 23.7443 18.0318 23.7443C20.0154 23.7443 21.6274 22.1323 21.6274 20.1488C21.6274 18.1652 20.0154 16.5533 18.0318 16.5533ZM18.0318 2.291C18.8918 2.291 19.5899 2.98914 19.5899 3.84907C19.5899 4.709 18.8918 5.40713 18.0318 5.40713C17.1719 5.40713 16.4738 4.709 16.4738 3.84907C16.4738 2.98914 17.1719 2.291 18.0318 2.291ZM4.84823 14.6356C3.39504 14.6356 2.21151 13.4521 2.21151 11.9989C2.21151 10.5457 3.39504 9.3622 4.84823 9.3622C6.30142 9.3622 7.48495 10.5457 7.48495 11.9989C7.48495 13.4521 6.30142 14.6356 4.84823 14.6356ZM18.0318 21.7068C17.1719 21.7068 16.4738 21.0087 16.4738 20.1488C16.4738 19.2889 17.1719 18.5907 18.0318 18.5907C18.8918 18.5907 19.5899 19.2889 19.5899 20.1488C19.5899 21.0087 18.8918 21.7068 18.0318 21.7068Z"
                                fill="var(--color-primary)" />
                        </svg>
                    </a>
                </div>
            </div>
        </div> --}}
        </div>
        {{-- <div class="article-footer flex justify-between items-center animate animate--fadeInUp"
            style="--delay: 500ms">
            <div class="article-footer-left flex-1">
                <a class="btn btn--outline flex items-center justify-center vh-h-btn rounded-full font-nunito font-medium bg-yellow-40 dark:bg-black-40 dark:text-white-20"
                    href="{{ Src::detail($newsItem) }}">
                    <span>Selengkapnya</span>
                    <svg class="dark:svg-stroke-white ml-2" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 12H22" stroke="var(--color-black)" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M15 5L22 12L15 19" stroke="var(--color-black)" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            <div class="article-footer-right">
                <div class="article-footer-group flex items-center">
                    <div class="article-footer-group-item ml-4">
                        <a class="article-footer-group-item-btn flex flex-col items-center vh-text-xs"
                            href="">
                            <svg class="dark:svg-stroke-white" width="23" height="22" viewBox="0 0 23 22"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20.34 3.60999C19.8292 3.099 19.2228 2.69364 18.5554 2.41708C17.8879 2.14052 17.1725 1.99817 16.45 1.99817C15.7275 1.99817 15.0121 2.14052 14.3446 2.41708C13.6772 2.69364 13.0708 3.099 12.56 3.60999L11.5 4.66999L10.44 3.60999C9.4083 2.5783 8.00903 1.9987 6.55 1.9987C5.09096 1.9987 3.69169 2.5783 2.66 3.60999C1.6283 4.64169 1.04871 6.04096 1.04871 7.49999C1.04871 8.95903 1.6283 10.3583 2.66 11.39L3.72 12.45L11.5 20.23L19.28 12.45L20.34 11.39C20.851 10.8792 21.2563 10.2728 21.5329 9.60535C21.8095 8.93789 21.9518 8.22248 21.9518 7.49999C21.9518 6.77751 21.8095 6.0621 21.5329 5.39464C21.2563 4.72718 20.851 4.12075 20.34 3.60999Z"
                                    stroke="var(--color-black)" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                    <div class="article-footer-group-item ml-4">
                        <a class="article-footer-group-item-btn flex flex-col items-center vh-text-xs"
                            href="">
                            <svg class="dark:svg-fill-white" width="22" height="24" viewBox="0 0 22 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18.0318 16.5533C17.1779 16.5533 16.3899 16.8529 15.7726 17.3533L9.56436 12.8618C9.66832 12.2913 9.66832 11.7066 9.56436 11.136L15.7726 6.64459C16.3899 7.14496 17.1779 7.44459 18.0318 7.44459C20.0154 7.44459 21.6274 5.8326 21.6274 3.84907C21.6274 1.86553 20.0154 0.25354 18.0318 0.25354C16.0483 0.25354 14.4363 1.86553 14.4363 3.84907C14.4363 4.19663 14.4842 4.52922 14.5771 4.84682L8.68046 9.11651C7.80555 7.95695 6.41528 7.20489 4.84823 7.20489C2.19953 7.20489 0.0541992 9.35022 0.0541992 11.9989C0.0541992 14.6476 2.19953 16.793 4.84823 16.793C6.41528 16.793 7.80555 16.0409 8.68046 14.8813L14.5771 19.151C14.4842 19.4686 14.4363 19.8042 14.4363 20.1488C14.4363 22.1323 16.0483 23.7443 18.0318 23.7443C20.0154 23.7443 21.6274 22.1323 21.6274 20.1488C21.6274 18.1652 20.0154 16.5533 18.0318 16.5533ZM18.0318 2.291C18.8918 2.291 19.5899 2.98914 19.5899 3.84907C19.5899 4.709 18.8918 5.40713 18.0318 5.40713C17.1719 5.40713 16.4738 4.709 16.4738 3.84907C16.4738 2.98914 17.1719 2.291 18.0318 2.291ZM4.84823 14.6356C3.39504 14.6356 2.21151 13.4521 2.21151 11.9989C2.21151 10.5457 3.39504 9.3622 4.84823 9.3622C6.30142 9.3622 7.48495 10.5457 7.48495 11.9989C7.48495 13.4521 6.30142 14.6356 4.84823 14.6356ZM18.0318 21.7068C17.1719 21.7068 16.4738 21.0087 16.4738 20.1488C16.4738 19.2889 17.1719 18.5907 18.0318 18.5907C18.8918 18.5907 19.5899 19.2889 19.5899 20.1488C19.5899 21.0087 18.8918 21.7068 18.0318 21.7068Z"
                                    fill="var(--color-black)" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}
    </article>
</div>
