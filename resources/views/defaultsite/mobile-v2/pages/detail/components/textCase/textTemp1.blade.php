<section data-section="section3"
    class="section snap-always snap-start w-full h-full flex flex-col shrink-0 transition  dark:bg-dark-3 dark:text-white pt-16"
    data-theme="highlight2">
    <div class="section-body mt-5 relative overflow-hidden flex-1 container max-w-full">
        <article class="article relative overflow-hidden flex flex-col h-full px-6">
            <div class="article-main relative flex-1 " style="z-index:-1">
                <div class="article-desc-highlight relative">
                    <p class="article-title   vh-text-md font-semibold mb-6 animate animate--fadeInUp mb-5"
                        style="--delay: 0ms">Trstdly - Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                        1500s, when an unknown printer took a galley of type and scrambled it to make a type
                        specimen book. It has survived not only five centuries, but also the leap into electronic
                        typesetting, remaining essentially unchanged.
                    </p>
                    <p class="article-title   vh-text-md font-semibold mb-6 animate animate--fadeInUp"
                        style="--delay: 0ms"> It was popularised in the 1960s with the release of Letraset sheets
                        containing Lorem Ipsum passages, and more recently with desktop publishing software like
                        Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
            </div>

            {{-- button-share --}}
            @include('defaultsite.mobile-v2.pages.detail.components.buttonShare.buttonShare')
            {{-- end button-share --}}

            <div class="article-footer flex justify-center items-center py-6">
                <span
                    class="article-swipeup font-bold vh-text-md animate-swipe animate-swipe-up text-base text-primary">
                    SWIPE UP</span>
            </div>
        </article>
    </div>
</section>
