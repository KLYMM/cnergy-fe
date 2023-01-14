<section data-section="sectionImg2{{ $loop->iteration }}" class="section section--dt px-6 snap-always snap-start w-full h-full shrink-0 transition bg-light-0 text-black dark:text-white dark:bg-dark-0 {{ ($loop->last) ? 'last' : '' }}" data-theme="dt-text-2" data-template="Info-Media-Photo-Plain-V2">
    <div class="section-body relative flex flex-col h-full">
        <span class="dt-number absolute animate animate--fadeIn" style="--delay: 100ms"></span>
        <div class="dt relative overflow-hidden ">
            <div class="dt-para relative z-10  leading-relaxed pt-20 font-karla font-normal px-6 animate animate--fadeInUp" style="--delay: 100ms">
                {!! $chunk['attributes']['caption']['rawContent'] ?? '' !!}
            </div>
        </div>
        <div class="article-desc relative flex-1 pr-8 z-20">
            <div class="article-asset relative -mx-4 mt-24 animate animate--fadeInUp" style="--delay: 200ms">
                <figure class="article-asset mx-4 w-full aspect-375 bg-cover bg-no-repeat bg-center overflow-hidden">
                    {!! $chunk['rawContent'] !!}
                </figure>

            </div>
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
    </div>
</section>
