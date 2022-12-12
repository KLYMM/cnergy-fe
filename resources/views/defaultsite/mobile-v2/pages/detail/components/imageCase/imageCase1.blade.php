<section data-section="section1"
class="section snap-always snap-start w-full h-full flex flex-col shrink-0 transition bg-light-1 text-white dark:bg-dark-1 "
    data-theme="story1">
    <div class="section-body relative overflow-hidden flex-1 container max-w-full">
        <article class="article relative overflow-hidden flex flex-col h-full px-6">
        <div class="article-main relative flex-1">
                <span
                    class="w-96 h-96 absolute top-32 -left-28 pointer-events-none rounded-full bg-gradient-blur z-10 animate animate--fadeIn"
                    style="--delay: 100ms"></span>
                <div class="article-asset relative -mx-6 mb-6 animate animate--fadeInUp" style="--delay: 200ms">
                    <figure
                        class="article-asset w-full vh-h-potrait aspect-375 bg-cover bg-no-repeat bg-center overflow-hidden"
                        style="background-image: url('{{ $row['news_image']['real'] }}');"></figure>
                </div>
                <div class="article-desc relative z-20">
                    <h1 class="article-title vh-text-2xl font-semibold mb-6 pr-12 -mt-20 animate animate--fadeInUp"
                        style="--delay: 300ms">{{ $row['news_title'] }}</h1>
                    <div class="article-desc-body relative pl-16">
                        <span class="absolute top-3 left-0 w-12 border-t border-current animate animate--fadeInUp"
                            style="--delay: 400ms"></span>
                        <div class="article-paragraph font-primary-2 line-clamp-6 animate animate--fadeInUp"
                            style="--delay: 500ms">
                            <p>{{ $row['news_synopsis'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="article-footer flex justify-center items-center py-6">
                <span class="article-swipeup font-primary-2 vh-text-md animate-swipe animate-swipe-up"><svg
                        class="transform rotate-180 inline-block -mt-1" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="currentColor">
                        <path d="m12 15.586-4.293-4.293-1.414 1.414L12 18.414l5.707-5.707-1.414-1.414z"></path>
                        <path d="m17.707 7.707-1.414-1.414L12 10.586 7.707 6.293 6.293 7.707 12 13.414z"></path>
                    </svg> SWIPE UP</span>
            </div>
        </article>
    </div>
</section>
