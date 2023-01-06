<section data-section="section15" class="section snap-always snap-start w-full h-full shrink-0 transition bg-light-1 text-white dark:bg-dark-0 " data-theme="dt-box-topic" data-template="Info-Reco-Topics-Orange-V1">
    <div class="section-body relative flex flex-col h-full">
        <span class="relative flex justify-end animate animate--fadeIn -mb-20" style="--delay: 0ms">
            <svg class="dark:svg-logo-black" width="239" height="211" viewBox="0 0 239 211" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity=".3" d="M45.0718 88.5404V143.265C45.0718 181.987 66.0504 200.038 105.038 200.038C121.054 200.038 136.773 196.542 147.25 191.016V140.072C140.263 143.277 133.276 145.023 127.162 145.023C116.685 145.023 111.152 140.654 111.152 128.722V88.5404H164.149L164.169 196.541H230.22V156.081C230.22 120.856 245.066 105.422 273.013 105.422H280V35.263C253.804 34.0996 239.249 48.0732 230.22 69.6153V37.596L111.152 37.5967V-23H45.0718V37.5967H26.4383L0 88.5404H45.0718Z" fill="#FCAD97" />
                <path d="M55.0718 98.5404V153.265C55.0718 191.987 76.0504 210.038 115.038 210.038C131.054 210.038 146.773 206.542 157.25 201.016V150.072C150.263 153.277 143.276 155.023 137.162 155.023C126.685 155.023 121.152 150.654 121.152 138.722V98.5404H174.149L174.169 206.541H240.22V166.081C240.22 130.856 255.066 115.422 283.013 115.422H290V45.263C263.804 44.0996 249.249 58.0732 240.22 79.6153V47.596L121.152 47.5967V-13H55.0718V47.5967H36.4383L10 98.5404H55.0718Z" stroke="#FCAD97" />
            </svg>
        </span>
        <div class="box relative overflow-hidden flex-1 pt-12 px-6">
            <h1 class="box-title font-bold vh-text-lg relative mb-6 pb-1 animate animate--fadeInUp">Topics <span class="absolute border-b border-current bottom-0 left-0 w-10"></span></h1>
            <ul class="box-list box-list--topic flex flex-col text-lg font-bold leading-normal space-y-6">
                @foreach ($trendingTag as $tag)
                <li class="box-list-item"><a href="{{ Src::detailTag($tag) }}" aria-label="{{ $tag['title'] }}" class="flex items-center justify-between animate animate--fadeInUp">{{ $tag['title'] }}
                        <svg class="ml-2" width="37" height="22" viewBox="0 0 37 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M36.8333 9.98031L0 9.98031L0 11.397L36.8333 11.397V9.98031Z" fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M28.036 13.3654C26.423 15.1563 25.7636 17.5312 25.3023 20.2806L26.6995 20.515C27.1541 17.8052 27.7646 15.7835 29.0886 14.3135C30.3969 12.861 32.505 11.8393 36.21 11.3919L36.0401 9.98541C32.1608 10.4539 29.6648 11.5571 28.036 13.3654Z" fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M28.1239 7.92461C26.5109 6.13375 25.8515 3.75881 25.3902 1.00943L26.7874 0.775049C27.242 3.48482 27.8525 5.50653 29.1765 6.9765C30.4848 8.42902 32.5929 9.45078 36.2978 9.89818L36.128 11.3046C32.2487 10.8362 29.7527 9.73293 28.1239 7.92461Z" fill="white" />
                        </svg>
                    </a></li>
                @endforeach
            </ul>
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
