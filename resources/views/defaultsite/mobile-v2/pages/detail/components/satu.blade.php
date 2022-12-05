<section data-section="section2" class="section snap-always snap-start w-full h-full flex flex-col shrink-0 transition bg-light-0 text-black dark:bg-dark-0 dark:text-white" data-theme="media3">
    <div class="section-body relative overflow-hidden flex-1 container max-w-full">
        <article class="article relative overflow-hidden flex flex-col h-full px-6">
            <div class="article-main relative pt-12 flex-1">
                <!-- <div class="article-asset relative animate animate--fadeInUp mb-6" style="--delay: 300ms">
                    <figure class="article-asset w-full vh-h-landscape aspect-375 bg-cover rounded-xl bg-no-repeat bg-center overflow-hidden" style="background-image: url('');"></figure>
                </div> -->

                <div class="article-desc relative z-20">
                    @foreach ($chunk as $content)
                    @if($loop->odd)
                    <h1 class="article-title vh-text-md font-semibold mb-6 pr-12  animate animate--fadeInUp" style="--delay: 0ms">
                        {{ $content->textContent }}
                    </h1>
                    @else
                    <div class="article-desc-body relative pl-16">
                        <span class="absolute top-3 left-0 w-12 border-t border-current animate animate--fadeInUp" style="--delay: 100ms"></span>
                        <div class="article-paragraph font-primary-2 line-clamp-6 animate animate--fadeInUp" style="--delay: 200ms">
                            <p>{{ $content->textContent }}</p>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>

            </div>
            <div class="article-footer flex justify-center items-center py-6">
                @if($loop->last)
                <a href="#" class="backtop article-swipeup font-primary-2 vh-text-md animate-swipe animate-swipe-up">
                    <svg class="transform rotate-180 inline-block -mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor">
                        <path d="m12 15.586-4.293-4.293-1.414 1.414L12 18.414l5.707-5.707-1.414-1.414z"></path>
                        <path d="m17.707 7.707-1.414-1.414L12 10.586 7.707 6.293 6.293 7.707 12 13.414z"></path>
                    </svg> BACK TO TOP
                </a>
                @else
                <span class="article-swipeup font-primary-2 vh-text-md animate-swipe animate-swipe-up"><svg class="transform rotate-180 inline-block -mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor">
                        <path d="m12 15.586-4.293-4.293-1.414 1.414L12 18.414l5.707-5.707-1.414-1.414z"></path>
                        <path d="m17.707 7.707-1.414-1.414L12 10.586 7.707 6.293 6.293 7.707 12 13.414z"></path>
                    </svg> SWIPE UP</span>
                @endif
            </div>
        </article>
    </div>
</section>
