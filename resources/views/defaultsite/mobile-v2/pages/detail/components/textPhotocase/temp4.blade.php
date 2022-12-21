<section data-section="sectionDua" class="section px-6 snap-always snap-start w-full h-full shrink-0 transition bg-light-8 text-white dark:bg-dark-0" data-theme="dt-text-2">
    <div class="section-body relative flex flex-col h-full">
       
        <div class="dt relative overflow-hidden flex-1">
            <div class="dt-para relative z-10 vh-text-lg leading-relaxed pt-20 px-6 animate animate--fadeInUp" style="--delay: 100ms">
                {!! $chunk['content'] !!} 
            </div>
        </div>
        <div class="article-desc relative pr-8 z-20">
            <div class="article-asset relative -mx-4 mb-6 animate animate--fadeInUp" style="--delay: 200ms">
                <figure
                    class="article-asset mx-4 w-full aspect-375 bg-cover bg-no-repeat bg-center overflow-hidden"
                    style="background-image: url('{{ $row['news_image']['real'] }}');">
                    <span class="bg-light-8  w-full absolute opacity-70 bottom-0">
                        <p class="my-1 ml-2.5 text-xs text-black ">Copyright © 2022 trstdly</p>
                    </span>
                </figure>

            </div>
        </div>
        @include('defaultsite.mobile-v2.pages.detail.components.buttonShare.buttonShare')
        
        <div class="article-footer flex justify-center items-center py-6">
            <span class="article-swipeup text-black vh-text-md animate-swipe animate-swipe-up">
               
                SWIPE UP
            </span>
        </div>
    </div>
</section>
{{-- <section data-section="section4"
    class="section snap-always snap-start w-full h-full flex flex-col shrink-0 transition bg-light-8 dark:bg-dark-3 dark:text-white pt-16"
    data-theme="highlight2">
    <div class="section-body mt-5 relative overflow-hidden flex-1 container max-w-full">
        <article class="article relative overflow-hidden flex flex-col h-full px-6">
            <div class="article-main relative flex-1 ">
                <div class="article-desc relative pr-12 z-20">
                    <div class="article-asset relative -mx-4 mb-6 animate animate--fadeInUp" style="--delay: 200ms">
                        <figure
                            class="article-asset mx-4 w-full aspect-375 bg-cover bg-no-repeat bg-center overflow-hidden"
                            style="background-image: url('{{ $row['news_image']['real'] }}');">
                            <span class="bg-white h-8 w-full absolute opacity-70 bottom-0">
                                <p class="my-1 ml-2.5">Copyright © 2022 trstdly</p>
                            </span>
                        </figure>

                    </div>
                </div>
                <div class="article-title article-paragraph font-inter text-dark7  text-xs leading-7 mx-1.5 font-normal  line-clamp-2 animate animate--fadeInUp"
                    style="--delay: 100ms">
                    <p>Funny black good morning quotes can be references and ideas to convey your feelings of love to
                        loved ones. Welcoming the morning with joy and enthusiasm will make a person happier to welcome
                        the day.
                        Starting an activity becomes more fun after reading this list of funny black good morning
                        quotes. The love phrases in funny black good morning quotes are perfect both to dedicate to that
                        special person and to share.</p>
                </div>
            </div>
          
            @include('defaultsite.mobile-v2.pages.detail.components.buttonShare.buttonShare')
          

            <div class="article-footer flex justify-center items-center py-6">
                <span
                    class="article-swipeup font-bold vh-text-md animate-swipe animate-swipe-up text-base text-primary">
                    SWIPE UP</span>
            </div>
        </article>
    </div>
</section> --}}
