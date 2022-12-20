<section data-section="section4" class="section snap-always snap-start w-full h-full flex flex-col shrink-0 transition {{ $chunk['template']['bg_theme'] }} text-black dark:bg-dark-3 dark:text-white pt-16" data-theme="highlight2">
    <div class="section-body mt-5 relative overflow-hidden flex-1 container max-w-full">
        <article class="article relative overflow-hidden flex flex-col h-full px-6">
            <div class="article-main relative flex-1">
                <div class="article-desc flex relative pr-12 z-20">
                    <div class="article-desc-highlight relative">
                        <!-- <h1 class="article-title vh-text-xl font-semibold mb-6 animate animate--fadeInUp" style="--delay: 0ms">{!! $chunk['content'] !!}</h1> -->
                        <div class="article-desc relative">
                            <div class="article-paragraph font-primary-2 line-clamp-2 animate animate--fadeInUp" style="--delay: 100ms">
                                {!! $chunk['content'] !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="article-footer flex justify-center items-center py-6">
                <span class="article-swipeup font-primary-2 vh-text-md animate-swipe animate-swipe-up"><svg class="transform rotate-180 inline-block -mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor">
                        <path d="m12 15.586-4.293-4.293-1.414 1.414L12 18.414l5.707-5.707-1.414-1.414z"></path>
                        <path d="m17.707 7.707-1.414-1.414L12 10.586 7.707 6.293 6.293 7.707 12 13.414z"></path>
                    </svg> SWIPE UP</span>
            </div>
        </article>
    </div>
</section>
