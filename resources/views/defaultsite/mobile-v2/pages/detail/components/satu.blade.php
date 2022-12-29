<!-- story.1 -->
<section data-section="section1"
    class="section snap-always snap-start w-full h-full shrink-0 transition bg-light-1 text-white dark:bg-dark-0"
    data-theme="dt-headline" data-id="{{ $row['news_id'] }}" data-author="{{ $row['news_editor'][0]['name'] ?? '' }}"
    data-date="{{ Util::date($row['news_date_publish'], 'default_date') }}"
    data-hour="{{ Util::date($row['news_date_publish'], 'default_hour') }}" data-template="readpage-satu">
    <div class="section-body relative flex flex-col h-full">
        <span
            class="absolute w-96 h-96 top-1/2 -left-48 transform -translate-y-1/2 rounded-full bg-light-2 dark:bg-dark-1 z-10"
            style="filter: blur(120px);"></span>
        <div
            class="article-header absolute top-0 inset-x-0 flex justify-between p-6 bg-gradient-to-b from-black to-transparent items-center z-20">
            <h1 class="article-header-left font-medium animate animate--fadeInUp" style="--delay: 0ms">
                <svg width="111" height="30" viewBox="0 0 111 30" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M60.5401 16.4944V16.5592C60.5401 21.7551 63.7446 25.3332 67.8518 25.3332C70.4307 25.3332 71.7408 24.0885 72.8916 22.8444V24.9285H79.9547V0H72.8916V9.8653C71.8043 8.65424 70.3717 7.53384 67.789 7.53384C63.7783 7.53384 60.5401 11.112 60.5401 16.4944ZM73.0477 16.4012V16.4659C73.0477 18.1769 71.8341 19.5149 70.2163 19.5149C68.5985 19.5149 67.3849 18.1769 67.3849 16.4659V16.4012C67.3849 14.6901 68.5985 13.3521 70.2163 13.3521C71.8341 13.3521 73.0477 14.7212 73.0477 16.4012ZM4.81704 19.2345V13.3858H0L2.82559 7.94117H4.81704V1.4649H11.8794V7.94117H17.5418V7.94071H24.6041V11.3628C25.5691 9.06046 27.1247 7.56703 29.9244 7.69138V15.1896H29.1777C26.1908 15.1896 24.6041 16.8391 24.6041 20.6038V24.928H17.545L17.5428 13.3858H11.8794V17.6802C11.8794 18.9554 12.4707 19.4223 13.5904 19.4223C14.2439 19.4223 14.9906 19.2358 15.7373 18.8932V24.3378C14.6176 24.9284 12.9376 25.3021 11.226 25.3021C7.05913 25.3021 4.81704 23.3728 4.81704 19.2345ZM32.4769 18.86L30.0807 22.8752C32.5106 24.493 35.4942 25.333 38.7919 25.3388C43.3972 25.3388 46.1658 23.1919 46.1658 19.4895V19.4247C46.1658 15.9398 43.5837 14.7579 39.2899 13.6997C37.5789 13.2645 37.2052 13.0469 37.2052 12.7043V12.6395C37.2052 12.2969 37.5167 12.1104 38.2013 12.1104C39.6345 12.1104 41.8098 12.701 43.6141 13.6938L45.8543 9.49398C43.8013 8.246 41.0314 7.53361 38.2317 7.53361C33.8136 7.53361 30.8267 9.61832 30.8267 13.3519V13.4167C30.8267 16.9326 33.4716 18.0835 37.7635 19.1378C39.4745 19.573 39.786 19.7912 39.786 20.1332V20.198C39.786 20.6027 39.4434 20.7582 38.7589 20.7582C36.8328 20.7582 34.5305 20.1358 32.4769 18.86ZM48.7799 19.2345V13.3858H46.7884V7.94117H48.7799V1.4649H55.839V7.94117H60.5375L57.712 13.3858H55.8423V17.6802C55.8423 18.9554 56.4335 19.4223 57.5539 19.4223C58.2067 19.4223 58.9535 19.2358 59.7002 18.8932V24.3378C58.5804 24.9284 56.9005 25.3021 55.1888 25.3021C51.02 25.3021 48.7799 23.3728 48.7799 19.2345ZM81.5237 0H88.5867V24.9285H81.5237V0ZM110.118 7.94106H102.93L100.223 16.9029L97.267 7.94106H89.9553L96.6109 24.2755C96.2528 24.4495 95.8581 24.5348 95.4601 24.5242C94.8124 24.5242 93.6266 24.1194 92.3515 23.4038L90.2998 28.2267C92.1973 29.2842 94.4038 29.9999 96.8648 29.9999C100.785 29.9999 102.589 28.1956 104.238 23.7464L110.118 7.94106Z"
                        fill="currentColor" />
                </svg>
            </h1>
        </div>
        <div class="dt relative overflow-hidden flex-1">

            <figure class="image-news dt-asset animate animate--fadeIn">
                @include('image', [
                    'title' => $row['news_title'],
                    'source' => $row,
                    'size' => '380x214',
                    $row['news_title'] ?? null,
                ])
            </figure>
            <div class="dt-desc relative z-10 px-6">

                <h1 class="dt-desc-title vh-text-2xl leading-relaxed font-bold -mt-12 mb-6 font-primary-1 animate animate--fadeInUp"
                    style="--delay: 200ms">{{ $row['news_title'] ?? null }}</h1>
                    @if (count($row['news_tag']) !== 0)
                    <p class="dt-desc-clone animate animate--fadeInUp" style="--delay: 300ms">
                        <span
                            class="rounded-full bg-light-1 dark:bg-dark-1 font-medium">{{ $row['news_tag'][0]['tag_name'] ?? null }}
                        </span>
                    </p>
                @endif
                <div class="dt-desc-row flex items-center mt-6 vh-text-sm animate animate--fadeInUp"
                    style="--delay: 400ms">
                    <span
                        class="dt-desc-row-logo rounded-full w-10 h-10 border border-white bg-light-1 dark:bg-dark-1 flex items-center justify-center">
                        <svg width="26" height="21" viewBox="0 0 26 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.18524 10.502V15.6546C4.18524 19.3004 6.13325 21 9.75355 21C11.2407 21 12.7003 20.6708 13.6732 20.1505V15.3539C13.0244 15.6557 12.3757 15.82 11.8079 15.82C10.835 15.82 10.3213 15.4087 10.3213 14.2853V10.502H15.2424L15.2443 20.6707H21.3776V16.8612C21.3776 13.5446 22.7561 12.0915 25.3512 12.0915H26V5.48571C23.5675 5.37616 22.216 6.69184 21.3776 8.72012V5.70537L10.3213 5.70544V0H4.18524V5.70544H2.45499L0 10.502H4.18524Z"
                                fill="white" />
                        </svg>
                    </span>
                    <span class="dt-desc-row-pub pl-2">
                        <span class="dt-desc-row-pub-name font-primary-1 font-bold">trstdly</span>
                        <span
                            class="dt-desc-row-pub-date font-primary-2 block">{{ Util::date($row['news_date_publish'] ?? null, 'short_time') }}</span>
                    </span>
                </div>
            </div>
        </div>
        <div class="article-footer flex justify-center items-center py-6">
            <span class="article-swipeup font-primary-2 vh-text-md animate-swipe animate-swipe-up">
                <svg class="transform rotate-180 inline-block -mt-1" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="currentColor">
                    <path d="m12 15.586-4.293-4.293-1.414 1.414L12 18.414l5.707-5.707-1.414-1.414z"></path>
                    <path d="m17.707 7.707-1.414-1.414L12 10.586 7.707 6.293 6.293 7.707 12 13.414z"></path>
                </svg>
                SWIPE UP
            </span>
        </div>
    </div>
</section>
