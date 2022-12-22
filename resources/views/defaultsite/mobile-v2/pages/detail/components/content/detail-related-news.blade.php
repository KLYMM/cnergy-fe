{{-- @dd($news) --}}
<section data-section="section16" class="section snap-always snap-start w-full h-full shrink-0 transition bg-light-3 text-black dark:bg-dark-0 dark:text-white" data-theme="dt-box-news">
    <div class="section-body relative flex flex-col h-full">
        <div class="box relative overflow-hidden flex-1 pt-12 px-6">
            <h1 class="box-title font-bold vh-text-lg relative mb-6 pb-1 animate animate--fadeInUp">Related News <span class="absolute border-b border-current bottom-0 left-0 w-10"></span></h1>
            <ul class="box-list box-list--news flex flex-col vh-text-lg font-bold leading-normal space-y-12">
                @foreach ($news as $related)
                <li class="box-list-item">
                    <a href="{{ Src::detail($related) }}" aria-label="{{ $related[0]['news_title'] ?? null }}" class="item flex items-start animate animate--fadeInUp">
                        <figure class="item-image aspect-square w-20 relative">
                            <div class="related-img-news">
                                @include('image', [
                                  'source' => $related,
                                  'size' => '120x120',
                                  $related['news_title'] ?? null,
                              ])
                            </div>
                            {{-- <img class="object-cover w-full h-full" src="assets/images/news2.png" alt="image" width="100" height="100"> --}}
                            <span class="item-image-border border border-white absolute w-full h-full top-2 left-2"></span>
                        </figure>
                        <div class="item-desc flex-1 pl-4">
                            <svg class="mb-2" width="37" height="22" viewBox="0 0 37 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M36.8333 9.98031L0 9.98031L0 11.397L36.8333 11.397V9.98031Z" fill="currentColor"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M28.0358 13.3654C26.4227 15.1563 25.7633 17.5312 25.3021 20.2806L26.6992 20.515C27.1538 17.8052 27.7644 15.7835 29.0884 14.3135C30.3967 12.861 32.5048 11.8393 36.2097 11.3919L36.0399 9.98541C32.1606 10.4539 29.6645 11.5571 28.0358 13.3654Z" fill="currentColor"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M28.1237 7.92461C26.5106 6.13375 25.8512 3.75881 25.39 1.00943L26.7871 0.775049C27.2417 3.48482 27.8523 5.50653 29.1763 6.9765C30.4846 8.42902 32.5927 9.45078 36.2976 9.89818L36.1278 11.3046C32.2485 10.8362 29.7524 9.73293 28.1237 7.92461Z" fill="currentColor"/>
                            </svg>
                            <p class="line-clamp-5">{{$related['news_title']??null}}</p> 
                        </div>
                    </a>
                </li>
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
        <span class="absolute bottom-0 left-0 animate animate--fadeIn" style="--delay: 100ms">
            <svg class="dark:svg-logo-black" width="235" height="196" viewBox="0 0 235 196" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity=".3" d="M-10.9282 111.54V166.265C-10.9282 204.987 10.0504 223.038 49.0383 223.038C65.054 223.038 80.7727 219.542 91.2499 214.016V163.072C84.2631 166.277 77.2763 168.023 71.1621 168.023C60.685 168.023 55.1525 163.654 55.1525 151.722V111.54H108.149L108.169 219.541H174.22V179.081C174.22 143.856 189.066 128.422 217.013 128.422H224V58.263C197.804 57.0996 183.249 71.0732 174.22 92.6153V60.596L55.1525 60.5967V0H-10.9282V60.5967H-29.5617L-56 111.54H-10.9282Z" fill="#FCAD97"/>
                <path d="M-0.928197 121.54V176.265C-0.928197 214.987 20.0504 233.038 59.0383 233.038C75.054 233.038 90.7727 229.542 101.25 224.016V173.072C94.2631 176.277 87.2763 178.023 81.1621 178.023C70.685 178.023 65.1525 173.654 65.1525 161.722V121.54H118.149L118.169 229.541H184.22V189.081C184.22 153.856 199.066 138.422 227.013 138.422H234V68.263C207.804 67.0996 193.249 81.0732 184.22 102.615V70.596L65.1525 70.5967V10H-0.928197V70.5967H-19.5617L-46 121.54H-0.928197Z" stroke="#FCAD97"/>
            </svg>
        </span>
    </div>
</section>