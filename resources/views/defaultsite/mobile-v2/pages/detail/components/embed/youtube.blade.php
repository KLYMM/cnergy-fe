<section data-section="sectionSatu{{ $loop->iteration }}" class="section section--dt snap-always snap-start w-full h-full shrink-0 transition bg-light-0 text-black dark:bg-dark-0 dark:text-white {{ ($loop->last) ? 'last' : '' }}" data-theme="dt-text-1" data-template="Info-Story-Text-Plain-V1">
    <div class="section-body relative flex flex-col h-full">
        <span class="dt-number absolute animate animate--fadeIn" style="--delay: 100ms"></span>
        <div class="dt relative overflow-hidden flex-1">
            <div class="dt-para {{ $chunk['template']['fontSize_class'] }} relative z-10  leading-relaxed pt-12 animate animate--fadeInUp" style="--delay: 0ms">
                <iframe title="YouTube video player" src="{{ $chunk['attributes']['src'] }}" class="w-full" style="aspect-ratio: 16/9;" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
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
