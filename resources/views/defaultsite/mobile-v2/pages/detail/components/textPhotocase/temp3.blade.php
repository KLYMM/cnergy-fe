<section data-section="sectionImg2{{ $loop->iteration }}" class="section section--dt px-6 snap-always snap-start w-full h-full shrink-0 transition bg-light-0 text-black dark:text-white dark:bg-dark-0" data-theme="dt-text-2" data-template="Info-Media-Photo-Plain-V2">
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
{{-- <section data-section="section3"
    class="section snap-always snap-start bg-light-4 w-full h-full flex flex-col shrink-0 transition  dark:bg-dark-3 dark:text-white pt-16"
    data-theme="highlight2">
    <div class="section-body mt-5 relative overflow-hidden flex-1 container max-w-full">
        <article class="article relative overflow-hidden flex flex-col h-full px-6">


            <div class="article-title article-paragraph font-inter text-dark7  text-xs leading-7 mx-1.5 font-normal  line-clamp-2 animate animate--fadeInUp"
                style="--delay: 100ms; ">
                <p>Funny black good morning quotes can be references and ideas to convey your feelings of love to loved
                    ones. Welcoming the morning with joy and enthusiasm will make a person happier to welcome the day.
                </p>
            </div>
            <label for="btn-read" class="btn-inner btn-inner-photo mx-1.5 animate animate--fadeInUp"
                style="--delay: 200ms"></label>
            <div class="article-main relative flex-1 " style="z-index:-1">
                <div class="article-desc relative z-20">
                    <div class="article-asset relative -mx-4 mb-6 animate animate--fadeInUp" style="--delay: 200ms">
                        <figure class="article-asset mx-4 w-full bg-cover bg-no-repeat bg-center overflow-hidden"
                            style="background-image: url('{{ $row['news_image']['real'] }}'); height: 380px; width:300px; margin:auto;">
<span class="bg-white h-8 w-full absolute opacity-70 bottom-0">
    <p class="my-1 ml-2.5">Copyright © 2022 trstdly</p>
</span>
</figure>
</div>
</div>
</div>
<input type="checkbox" checked id="btn-read">

@include('defaultsite.mobile-v2.pages.detail.components.buttonShare.buttonShare')


<div class="article-footer flex justify-center items-center py-6">
    <span class="article-swipeup font-bold vh-text-md animate-swipe animate-swipe-up text-base text-primary">
        SWIPE UP</span>
</div>
</article>
</div>
</section> --}}
