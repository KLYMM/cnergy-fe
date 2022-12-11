<!-- story.1 -->
<section data-section="section1" class="section snap-always snap-start w-full h-full flex flex-col shrink-0 transition bg-light-1 text-white dark:bg-dark-1" data-theme="story1">
    <div class="section-body relative overflow-hidden flex-1 container max-w-full">
        <article class="article relative overflow-hidden flex flex-col h-full px-6">
            <div class="article-header absolute top-0 inset-x-0 flex justify-between p-6 bg-gradient-to-b from-black to-transparent items-center z-20">
                <h1 class="article-header-left font-medium animate animate--fadeInUp" style="--delay: 0ms">HOROR HALLOWEEN KOREA</h1>
                <span class="article-header-right animate animate--fadeInUp" style="--delay: 100ms">
                    <svg width="41" height="28" viewBox="0 0 41 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 1.53798H1V10.0253L6.7839 13.5201L1 17.5141V27H7V11.0238C7 11.0238 6.63931 6.63091 12 6.53053C17.3607 6.43015 17.5 11.0238 17.5 11.0238V27C17.5 27 23.5 25.9628 23.5 21.9687V11.0238C23.5 11.0238 23.268 6.03128 28.5 6.03128C33.732 6.03128 34 11.0238 34 11.0238V27H40V8.52755C40 8.52755 39.463 1.53798 32 1.03872C24.537 0.539465 22.5 5.03277 22.5 5.03277C22.5 5.03277 20.5 1.03872 14.5 1.03872C8.5 1.03872 7 5.53202 7 5.53202V1.53798Z" fill="currentColor" stroke="currentColor" />
                    </svg>
                </span>
            </div>
            <div class="article-main relative flex-1">
                <span class="w-96 h-96 absolute top-32 -left-28 pointer-events-none rounded-full bg-gradient-blur z-10 animate animate--fadeIn" style="--delay: 100ms"></span>
                <div class="article-asset relative -mx-6 mb-6 animate animate--fadeInUp" style="--delay: 200ms">
                    <figure class="article-asset w-full vh-h-potrait aspect-375 bg-cover bg-no-repeat bg-center overflow-hidden" style="background-image: url('{{ $row['news_image']['real'] }}');"></figure>
                </div>
                <div class="article-desc relative z-20">
                    <h1 class="article-title vh-text-2xl font-semibold mb-6 pr-12 -mt-20 animate animate--fadeInUp" style="--delay: 300ms">{{ $row['news_title'] }}</h1>
                    <div class="article-desc-body relative pl-16">
                        <span class="absolute top-3 left-0 w-12 border-t border-current animate animate--fadeInUp" style="--delay: 400ms"></span>
                        <div class="article-paragraph font-primary-2 animate animate--fadeInUp" style="--delay: 500ms">
                            <p>{{ $row['news_synopsis'] }}</p>
                        </div>
                    </div>
                </div>
                @include('defaultsite.mobile-v2.components-ui.dt-share')
            </div>
            <div class="article-footer flex relative  justify-center items-center py-6 text-red-600 font-bold">
                <span class="article-swipeup  font-primary-2 vh-text-md animate-swipe animate-swipe-up"><svg
                        class="transform rotate-180   absolute bottom-0 left-2/4   inline-block -mt-1"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor">
                        <i class="fa-solid fa-angles-up"></i>
                    </svg> SWIPE UP
                </span>
            </div>
        </article>
    </div>
</section>
