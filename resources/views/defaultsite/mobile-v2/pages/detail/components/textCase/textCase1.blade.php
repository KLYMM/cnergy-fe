<section data-section="sectionSatu" class="section snap-always snap-start w-full h-full shrink-0 transition bg-light-0 text-black dark:bg-dark-0 dark:text-white" data-theme="dt-text-1">
    <div class="section-body relative flex flex-col h-full">
        <div class="dt relative overflow-hidden flex-1">
            <div class="dt-para {{ $chunk['template']['fontSize_class'] }} relative z-10  leading-relaxed pt-12 px-6 animate animate--fadeInUp" style="--delay: 0ms">
                {!! $chunk['rawContent'] !!}
            </div>
            <span class="absolute bottom-0 left-0 px-2 animate animate--fadeIn" style="--delay: 0ms">
                <svg class="dark:svg-logo-black" width="235" height="234" viewBox="0 0 235 234" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity=".3" d="M-10.9282 111.54V166.265C-10.9282 204.987 10.0504 223.038 49.0383 223.038C65.054 223.038 80.7727 219.542 91.2499 214.016V163.072C84.2631 166.277 77.2763 168.023 71.1621 168.023C60.685 168.023 55.1525 163.654 55.1525 151.722V111.54H108.149L108.169 219.541H174.22V179.081C174.22 143.856 189.066 128.422 217.013 128.422H224V58.263C197.804 57.0996 183.249 71.0732 174.22 92.6153V60.596L55.1525 60.5967V0H-10.9282V60.5967H-29.5617L-56 111.54H-10.9282Z" fill="#FCAD97"></path>
                    <path d="M-0.928197 121.54V176.265C-0.928197 214.987 20.0504 233.038 59.0383 233.038C75.054 233.038 90.7727 229.542 101.25 224.016V173.072C94.2631 176.277 87.2763 178.023 81.1621 178.023C70.685 178.023 65.1525 173.654 65.1525 161.722V121.54H118.149L118.169 229.541H184.22V189.081C184.22 153.856 199.066 138.422 227.013 138.422H234V68.263C207.804 67.0996 193.249 81.0732 184.22 102.615V70.596L65.1525 70.5967V10H-0.928197V70.5967H-19.5617L-46 121.54H-0.928197Z" stroke="#FCAD97"></path>
                </svg>
            </span>
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
