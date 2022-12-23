<section data-section="section18" class="section snap-always snap-start w-full h-full shrink-0 transition bg-light-0 text-black dark:bg-dark-0 dark:text-white" data-theme="dt-box-latest">
    <div class="section-body relative flex flex-col h-full">
        <div class="box relative overflow-hidden flex-1 pt-12 px-6">
            <h1 class="box-title font-bold vh-text-lg relative mb-6 pb-1 animate animate--fadeInUp">Latest News <span class="absolute border-b border-current bottom-0 left-0 w-10"></span></h1>
            <ul class="box-list box-list--latest flex flex-col vh-text-lg font-bold leading-normal -my-8">
                @foreach ($news as $latest)
                <li class="box-list-item">
                    <a href="{{ Src::detail($latest) }}" aria-label="{{ $latest[0]['news_title'] ?? null }}" class="item py-8 flex items-start animate animate--fadeInUp">
                        <figure class="item-image aspect-square w-28 relative -ml-6">
                            <div class="related-img-news">
                                @include('image', [
                                  'source' => $latest,
                                  'size' => '120x120',
                                  $latest['news_title'] ?? null,
                              ])
                            </div>
                            {{-- <img class="object-cover w-full h-full" src="assets/images/news1.png" alt="image" width="100" height="100"> --}}
                        </figure>
                        <div class="item-desc flex-1 pl-4">
                            <i class="icon-flash rounded-full w-6 h-6 flex items-center justify-center bg-light-1 mb-2">
                                <svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.59306 5.0098C7.55822 4.93499 7.48318 4.88697 7.40051 4.88697H4.88196L7.36756 0.962482C7.409 0.897027 7.41154 0.814138 7.37416 0.746343C7.33675 0.678323 7.26532 0.63623 7.18796 0.63623H3.78739C3.70684 0.63623 3.63329 0.68171 3.59717 0.753765L0.40913 7.12985C0.376178 7.19553 0.37979 7.27374 0.41847 7.33643C0.457374 7.39912 0.525593 7.43738 0.599342 7.43738H2.78485L0.403377 13.0934C0.362779 13.1901 0.398918 13.3023 0.488383 13.3572C0.522804 13.3782 0.56106 13.3884 0.599117 13.3884C0.660114 13.3884 0.720263 13.3622 0.761932 13.3129L7.5631 5.23655C7.61643 5.17324 7.62791 5.08482 7.59306 5.0098Z" fill="white"/>
                                </svg>
                            </i>
                            <p class="line-clamp-5">{{$latest['news_title']??null}}</p> 
                        </div>
                    </a>
                </li>
                 @endforeach
            </ul>
        </div>
        <div class="article-footer flex justify-center items-center py-6">
            <span class="article-swipeup font-primary-2 vh-text-md animate-swipe animate-swipe-up">
                <svg class="transform rotate-180 inline-block -mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor">
                    <path d="m12 15.586-4.293-4.293-1.414 1.414L12 18.414l5.707-5.707-1.414-1.414z"></path>
                    <path d="m17.707 7.707-1.414-1.414L12 10.586 7.707 6.293 6.293 7.707 12 13.414z"></path>
                </svg> 
                SWIPE UP
            </span>
        </div>
        <span class="absolute bottom-0 left-0 animate animate--fadeIn" style="--delay: 100ms">
            <svg class="dark:svg-logo-black" width="235" height="196" viewBox="0 0 235 196" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity=".3" d="M-10.9282 111.54V166.265C-10.9282 204.987 10.0504 223.038 49.0383 223.038C65.054 223.038 80.7727 219.542 91.2499 214.016V163.072C84.2631 166.277 77.2763 168.023 71.1621 168.023C60.685 168.023 55.1525 163.654 55.1525 151.722V111.54H108.149L108.169 219.541H174.22V179.081C174.22 143.856 189.066 128.422 217.013 128.422H224V58.263C197.804 57.0996 183.249 71.0732 174.22 92.6153V60.596L55.1525 60.5967V0H-10.9282V60.5967H-29.5617L-56 111.54H-10.9282Z" fill="#FCAD97"/>
                <path d="M-0.928197 121.54V176.265C-0.928197 214.987 20.0504 233.038 59.0383 233.038C75.054 233.038 90.7727 229.542 101.25 224.016V173.072C94.2631 176.277 87.2763 178.023 81.1621 178.023C70.685 178.023 65.1525 173.654 65.1525 161.722V121.54H118.149L118.169 229.541H184.22V189.081C184.22 153.856 199.066 138.422 227.013 138.422H234V68.263C207.804 67.0996 193.249 81.0732 184.22 102.615V70.596L65.1525 70.5967V10H-0.928197V70.5967H-19.5617L-46 121.54H-0.928197Z" stroke="#FCAD97"/>
            </svg>
        </span>
    </div>
</section>