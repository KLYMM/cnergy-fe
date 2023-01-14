<section data-section="sectionTitleImg1{{ $loop->iteration }}" class="section section--dt snap-always snap-start w-full h-full flex flex-col shrink-0 transition dark:bg-dark-3 dark:text-white {{ ($loop->last) ? 'last' : '' }}" data-theme="highlight2" data-template="readpage-TitleImageCase1">
    <div class="section-body section--dt relative overflow-hidden flex-1 container max-w-full">
        <span class="dt-number absolute animate animate--fadeIn" style="--delay: 100ms"></span>
        <article class="article relative overflow-hidden flex flex-col h-full ">
            <div class="article-main relative  " style="z-index:-1">
                <div class="article-desc relative z-20">
                    <div class="article-asset relative   animate animate--fadeInUp" style="--delay: 200ms">
                        <figure class="image-news article-asset  w-full bg-cover bg-no-repeat bg-center overflow-hidden" style=" height: 313px;">
                            <img src="{!! $chunk['attributes']['src'] !!} " alt="{!! $chunk['attributes']['alt'] !!} " title="{!! $chunk['attributes']['title'] !!} ">
                        </figure>

                    </div>
                </div>
            </div>

            <div class="dt-para flex-1 mt-5 relative z-10 text-lg leading-relaxed font-karla  font-normal px-6 animate animate--fadeInUp" style="--delay: 0ms">
                <p><strong>{!! $chunk['content'] !!}</strong></p>
            </div>


            <div class="article-footer flex justify-center items-center py-6">
                <span class="article-swipeup font-normal vh-text-md animate-swipe animate-swipe-up text-base ">
                    <svg class="transform rotate-180 inline-block -mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor">
                        <path d="m12 15.586-4.293-4.293-1.414 1.414L12 18.414l5.707-5.707-1.414-1.414z"></path>
                        <path d="m17.707 7.707-1.414-1.414L12 10.586 7.707 6.293 6.293 7.707 12 13.414z"></path>
                    </svg>
                    SWIPE UP</span>
            </div>
        </article>
    </div>
</section>
