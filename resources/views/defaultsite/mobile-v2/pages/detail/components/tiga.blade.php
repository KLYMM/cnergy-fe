<section data-section="section3"
    class="section snap-always snap-start w-full h-full flex flex-col shrink-0 transition bg-light-1 text-white dark:bg-dark-4 pt-16"
    data-theme="highlight1">
    {{-- <div class="section-body relative overflow-hidden flex-1 container max-w-full">
        <article class="article relative overflow-hidden flex flex-col h-full px-6">
            <div class="article-main relative pt-12 flex-1">
                <div class="article-desc flex relative pr-12 z-20">
                    <div class="article-desc-highlight relative">
                        @foreach ($chunk as $item)
                        @if ($item->firstChild->nodeName === 'img')
                        <div class="article-asset relative -mx-6 mb-6  animate animate--fadeInUp" style="--delay: 0ms">
                            <figure class="article-asset w-full  bg-center overflow-hidden" style="background-image: url('');">
                                {!! $item->ownerDocument->saveHtml($item->firstChild) !!}
                            </figure>
                        </div>
                        @endif
                        @if ($loop->odd)
                        <h1 class="article-title vh-text-md font-semibold mb-6 animate animate--fadeInUp" style="--delay: 0ms">{{ $item->textContent }}</h1>
                        @else
                        <div class="article-desc relative">
                            <div class="article-paragraph font-primary-2 line-clamp-6 animate animate--fadeInUp" style="--delay: 100ms">
                                <p>{{    $item->textContent }}</p>
                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="article-header flex justify-end relative -top-6 -mr-6 animate animate--fadeInUp" style="--delay: 200ms">
                <svg width="221" height="167" viewBox="0 0 221 167" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.25" d="M38.6923 5.01944H1V58.4169L37.3348 80.404L1 105.532V165.212H38.6923V64.6989C38.6923 64.6989 36.4264 37.0612 70.1026 36.4297C103.779 35.7982 104.654 64.6989 104.654 64.6989V165.212C104.654 165.212 142.346 158.686 142.346 133.558V64.6989C142.346 64.6989 140.889 33.2886 173.756 33.2886C206.624 33.2886 208.308 64.6989 208.308 64.6989V165.212H246V48.9938C246 48.9938 242.626 5.01944 195.744 1.87839C148.861 -1.26265 136.064 27.0066 136.064 27.0066C136.064 27.0066 123.5 1.87839 85.8077 1.87839C48.1154 1.87839 38.6923 30.1476 38.6923 30.1476V5.01944Z" stroke="currentColor" stroke-width="1.45339" />
                </svg>
            </div>
            <div class="article-footer flex justify-center items-center py-6">
                <span class="article-swipeup font-primary-2 vh-text-md animate-swipe animate-swipe-up"><svg class="transform rotate-180 inline-block -mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor">
                        <path d="m12 15.586-4.293-4.293-1.414 1.414L12 18.414l5.707-5.707-1.414-1.414z"></path>
                        <path d="m17.707 7.707-1.414-1.414L12 10.586 7.707 6.293 6.293 7.707 12 13.414z"></path>
                    </svg> SWIPE UP</span>
            </div>
        </article>
    </div> --}}
    <div class="section-body mt-5 relative overflow-hidden flex-1 container max-w-full">
        <article class="article relative overflow-hidden flex flex-col h-full px-6">
            <div class="article-main relative flex-1">
                @foreach ($chunk as $item)
                    @if ($item->firstChild->nodeName === 'img')
                        <div class="article-asset relative mb-6 mt-5  animate animate--fadeInUp" style="--delay: 0ms">
                            <figure
                                class="article-asset w-full rounded-2xl	  bg-center bg-cover overflow-hidden vh-h-potrait w-full"
                                style="background-image: url('');">
                                {!! $item->ownerDocument->saveHtml($item->firstChild) !!}
                            </figure>
                        </div>
                    @endif
                    @if ($loop->odd)
                        <div class="article-desc relative z-20">
                            <div class="article-desc-body relative pl-16">
                                <h1 class="article-title vh-text-md font-semibold mb-6 animate animate--fadeInUp"
                                    style="--delay: 0ms">{{ $item->textContent }}</h1>
                            @else
                                <span
                                    class="absolute top-3 left-0 w-12 border-t border-current  animate animate--fadeInUp"
                                    style="--delay: 100ms"></span>
                                <div class="article-paragraph font-primary-2 line-clamp-9 animate animate--fadeInUp"
                                    style="--delay: 200ms">
                                    <p>{{ $item->textContent }}</p>
                                </div>
                            </div>

                        </div>
                    @endif
                @endforeach
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
