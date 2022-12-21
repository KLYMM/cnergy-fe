<section data-section="section3"
    class="section snap-always snap-start w-full h-full flex flex-col shrink-0 transition  dark:bg-dark-3 dark:text-white "
    data-theme="highlight2">
    <div class="section-body  relative overflow-hidden flex-1 container max-w-full">
        <article class="article relative overflow-hidden flex flex-col h-full ">
            <div class="article-main relative  " style="z-index:-1">
                <div class="article-desc relative z-20">
                    <div class="article-asset relative   animate animate--fadeInUp" style="--delay: 200ms">
                        <figure class="article-asset  w-full bg-cover bg-no-repeat bg-center overflow-hidden"
                           style=" height: 313px;">
                           {!! $chunk['rawContent'] !!} 
                        </figure>
                     
                    </div>
                </div>
            </div>
            
            <div class="dt-paras flex-1 mt-10 relative z-10 text-lg leading-relaxed font-karla font-normal px-6 animate animate--fadeInUp" style="--delay: 0ms">
                <p>{!! $chunk['attributes']['title'] !!} </p>
           </div>
         

            <div class="article-footer flex justify-center items-center py-6">
                <span
                    class="article-swipeup font-normal vh-text-md animate-swipe animate-swipe-up text-base ">
                    SWIPE UP</span>
            </div>
        </article>
    </div>
</section>
