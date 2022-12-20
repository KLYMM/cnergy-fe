<section data-section="section3"
    class="section snap-always snap-start w-full h-full flex flex-col shrink-0 transition  dark:bg-dark-3 dark:text-white pt-16"
    data-theme="highlight2">
    <div class="section-body mt-5 relative overflow-hidden flex-1 container max-w-full">
        <article class="article relative overflow-hidden flex flex-col h-full ">
            <div class="article-main relative  " style="z-index:-1">
                <div class="article-desc relative z-20">
                    <div class="article-asset relative  mb-6 animate animate--fadeInUp" style="--delay: 200ms">
                        <figure class="article-asset  w-full bg-cover bg-no-repeat bg-center overflow-hidden"
                            style="background-image: url('{{ $row['news_image']['real'] }}'); height: 313px;">
                            <span class="bg-white w-full absolute opacity-70 bottom-0">
                                <p class="my-1 ml-2.5 text-xs">Copyright © 2022 trstdly</p>
                            </span>
                        </figure>
                        {{-- {!! $chunk['content'] !!}  --}}
                    </div>
                </div>
            </div>
            
            <div class="dt-para flex-1 mt-10 relative z-10 text-lg leading-relaxed font-normal px-6 animate animate--fadeInUp" style="--delay: 0ms">
                <p>Starting an activity becomes more fun after reading this list of funny black good morning quotes.</p>
           </div>
            {{-- <div class="dt-paragraph flex-1 px-6 article-paragraph font-inter text-dark7  text-xs leading-7 mx-1.5 font-normal  line-clamp-2 animate animate--fadeInUp"
                style="--delay: 100ms; ">
                <p>Funny black good morning quotes can be references and ideas to convey your feelings of love to loved
                    ones. Welcoming the morning with joy and enthusiasm will make a person happier to welcome the day.
                    Starting an activity becomes more fun after reading this list of funny black good morning quotes.
                    The love phrases in funny black good morning quotes are perfect both to dedicate to that special
                    person and to share.</p>
            </div> --}}
            {{-- <label for="btn-read" class="btn-inner btn-inner-photo mx-1.5 animate animate--fadeInUp"
                style="--delay: 200ms"></label> --}}
            {{-- button-share --}}
            {{-- @include('defaultsite.mobile-v2.pages.detail.components.buttonShare.buttonShare') --}}
            {{-- end button-share --}}

            <div class="article-footer flex justify-center items-center py-6">
                <span
                    class="article-swipeup font-normal vh-text-md animate-swipe animate-swipe-up text-base ">
                    SWIPE UP</span>
            </div>
        </article>
    </div>
</section>
