<section data-section="section3"
    class="section snap-always snap-start w-full h-full flex flex-col shrink-0 transition  dark:bg-dark-3 dark:text-white pt-16"
    data-theme="highlight2">
    <div class="section-body mt-5 relative overflow-hidden flex-1 container max-w-full">
        <article class="article relative overflow-hidden flex flex-col h-full px-6">
            <div class="article-main relative flex-1 " style="z-index:-1">
                <div class="article-desc relative z-20">
                    <div class="article-asset relative -mx-4 mb-6 animate animate--fadeInUp" style="--delay: 200ms">
                        <figure
                            class="article-asset mx-4 w-full bg-cover bg-no-repeat bg-center overflow-hidden"
                            style="background-image: url('{{ $row['news_image']['real'] }}'); height: 380px; width:300px; margin:auto;">
                            <span class="bg-white h-8 w-full absolute opacity-70 bottom-0" ><p class="my-1 ml-2.5">Copyright © 2022 trstdly</p></span>
                        </figure>
                    </div>
                </div>
            </div>
            <input type="checkbox" checked id="btn-read">
                <div class="dt-paragraph article-paragraph font-inter text-dark7  text-xs leading-7 mx-1.5 font-normal  line-clamp-2 animate animate--fadeInUp"
                    style="--delay: 100ms; ">
                    <p>Funny black good morning quotes can be references and ideas to convey your feelings of love to loved ones. Welcoming the morning with joy and enthusiasm will make a person happier to welcome the day.
                        Starting an activity becomes more fun after reading this list of funny black good morning quotes. The love phrases in funny black good morning quotes are perfect both to dedicate to that special person and to share.</p>
                </div>
                <label for="btn-read" class="btn-inner btn-inner-photo mx-1.5"></label>
            {{-- button-share --}}
            @include('defaultsite.mobile-v2.pages.detail.components.buttonShare.buttonShare') 
            {{-- end button-share --}}
           
            <div class="article-footer flex justify-center items-center py-6">
                <span class="article-swipeup font-bold vh-text-md animate-swipe animate-swipe-up text-base text-primary"> SWIPE UP</span>
            </div>
        </article>
    </div>
</section>
