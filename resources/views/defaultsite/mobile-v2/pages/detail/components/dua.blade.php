<!-- story.1 -->
<section data-section="section1"
    class="section snap-always snap-start w-full h-full flex flex-col shrink-0 transition bg-light-7 text-white dark:bg-dark-1"
    data-theme="story1">
    <div class="section-body relative overflow-hidden flex-1 container max-w-full">
        <article class="article relative overflow-hidden flex flex-col h-full ">
            <div class="main-news-container article-main relative flex-1 pt-20">
                <ul class="main-breadcrumb animate animate--fadeInUp" style="--delay: 0ms">
                    <li class="main-breadcrumb-item"><a class="font-bold" href="/">Home</a></li>
                    @foreach ($row['news_category'] as $r)
                        @if ($loop->iteration == 1)
                            <li class="main-breadcrumb-item {{ $loop->count == 1 ? 'active' : '' }}"><a
                                    href="{{ url($row['news_category'][0]['url'] ?? '') }}">{{ $r['name'] ?? null }}</a>
                            </li>
                        @elseif($loop->iteration == 2)
                            <li class="main-breadcrumb-item {{ $loop->count == 2 ? 'active' : '' }}"><a
                                    href="{{ url(($row['news_category'][0]['url'] ?? '') . '/' . ($row['news_category'][1]['url'] ?? '')) }}">{{ $r['name'] ?? null }}</a>
                            </li>
                        @elseif($loop->iteration == 3)
                            <li class="main-breadcrumb-item {{ $loop->count == 3 ? 'active' : '' }}"><a
                                    href="{{ url(($row['news_category'][0]['url'] ?? '') . '/' . ($row['news_category'][1]['url'] ?? '') . '/' . ($row['news_category'][2]['url'] ?? '')) }}">{{ $r['name'] ?? null }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <div class="main-news-deskripsi animate animate--fadeInUp" style="--delay: 0ms">
                    <figure>
                        <div class="image-news">
                            @include('image', [
                                'title' => $row['news_title'],
                                'source' => $row,
                                'size' => '380x214',
                                $row['news_title'] ?? null,
                            ])
                        </div>
                        <div class="frame-bottom"></div>
                        {{-- <p>{{ $row['news_imageinfo'] ?? null }}</p> --}}
                    </figure>
                    <h3 class="author-title">{{ $row['news_title'] ?? null }}</h3>
                    <div class="header-photo">
                        {{-- <h2 class="dt-title text-24 font-bold mb-6">{{ $row['news_sub_title'] ?? null }}</h2> --}}
                        <div class="flex  my-2 items-center gap-2">
                            <img class="rounded-full " src="{{ URL::asset('assets/images/author.PNG') }}"
                                alt="author" width="40" height="40px">
                            <div class="flex flex-col justify-center gap-1">
                                <p class="photo-author ">
                                    trstdly
                                </p>
                                <span class="author_publish">
                                    {{ Util::date($row['news_date_publish'] ?? null, 'short_time') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="article-desc relative z-20">
                    <h1 class="article-title vh-text-2xl font-semibold mb-6 pr-12 -mt-20 animate animate--fadeInUp"
                        style="--delay: 300ms">{{ $row['news_title'] }}</h1>
                    <div class="article-desc-body relative pl-16">
                        <span class="absolute top-3 left-0 w-12 border-t border-current animate animate--fadeInUp"
                            style="--delay: 400ms"></span>
                        <div class="article-paragraph font-primary-2 animate animate--fadeInUp" style="--delay: 500ms">
                            <p>{{ $row['news_synopsis'] }}</p>
                        </div>
                    </div>
                </div> --}}
                @include('defaultsite.mobile-v2.components-ui.dt-share')
            </div>
            <div class="article-footer flex relative  justify-center items-center py-6 text-red-600 font-bold">
                <span class="article-swipeup  font-primary-2 vh-text-md animate-swipe animate-swipe-up"><svg
                        class="transform rotate-180   absolute bottom-0 left-2/4   inline-block -mt-1"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor">
                        <i class="fa-solid fa-angles-up"></i>
                    </svg> SWIPE UP
                </span>
            </div>
        </article>
    </div>
</section>
<!-- story.1 -->
{{-- <section data-section="section1"
    class="section snap-always snap-start w-full h-full flex flex-col shrink-0 transition bg-light-7 text-white dark:bg-dark-1"
    data-theme="story1">
    <div class="section-body relative overflow-hidden flex-1 container max-w-full">
        <article class="article relative overflow-hidden flex flex-col h-full px-6">
            <div class="article-main relative flex-1">
                <span
                    class="w-96 h-96 absolute top-32 -left-28 pointer-events-none rounded-full text-black  z-10 animate animate--fadeIn"
                    style="--delay: 100ms"></span>
                <div class="article-asset relative -mx-6 mb-6 animate animate--fadeInUp" style="--delay: 200ms">
                    <figure
                        class="article-asset w-full vh-h-potrait aspect-375 bg-cover bg-no-repeat bg-center overflow-hidden"
                        style="background-image: url('{{ $row['news_image']['real'] }}');"></figure>
                </div>
                <div class="article-desc relative z-20">
                    <h1 class="article-title vh-text-2xl font-semibold mb-6 pr-12 -mt-20 animate animate--fadeInUp"
                        style="--delay: 300ms">{{ $row['news_title'] }}</h1>
                    <div class="article-desc-body relative pl-16">
                        <span class="absolute top-3 left-0 w-12 border-t border-current animate animate--fadeInUp"
                            style="--delay: 400ms"></span>
                        <div class="article-paragraph font-primary-2 animate animate--fadeInUp" style="--delay: 500ms">
                            <p>{{ $row['news_synopsis'] }}</p>
                        </div>
                    </div>
                </div>
                @include('defaultsite.mobile-v2.components-ui.dt-share')
            </div>
            <div class="article-footer flex relative  justify-center items-center py-6 text-red-600 font-bold">
                <span class="article-swipeup  font-primary-2 vh-text-md animate-swipe animate-swipe-up"><svg
                        class="transform rotate-180   absolute bottom-0 left-2/4   inline-block -mt-1"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor">
                        <i class="fa-solid fa-angles-up"></i>
                    </svg> SWIPE UP
                </span>
            </div>
        </article>
    </div>
</section> --}}
