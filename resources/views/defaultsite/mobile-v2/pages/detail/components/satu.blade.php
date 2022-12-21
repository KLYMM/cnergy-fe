<!-- story.1 -->
{{-- <section data-section="section1"
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
                    </figure>
                    <h3 class="author-title">{{ $row['news_title'] ?? null }}</h3>
                    <div class="header-photo">
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

                @include('defaultsite.mobile-v2.components.tailwind-dt-share')
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
{{-- @dd($row) --}}
<section data-section="section1" class="section snap-always snap-start w-full h-full shrink-0 transition bg-light-4 text-white dark:bg-dark-0" data-theme="dt-headline">
    <div class="section-body relative flex flex-col h-full">
        <span class="absolute w-96 h-96 top-1/2 -left-48 transform -translate-y-1/2 rounded-full bg-light-3 dark:bg-dark-1 z-10" style="filter: blur(120px);"></span>
        <div class="dt relative overflow-hidden flex-1">
            <figure class="image-news dt-asset animate animate--fadeIn">
                    @include('image', [
                        'title' => $row['news_title'],
                        'source' => $row,
                        'size' => '380x214',
                        $row['news_title'] ?? null,
                    ])
            </figure>
            <div class="dt-desc relative z-10 px-6">
                <h1 class="dt-desc-title vh-text-2xl leading-relaxed font-bold -mt-12 mb-6 font-primary-1 animate animate--fadeInUp" style="--delay: 200ms">{{ $row['news_title'] ?? null }}</h1>
                <p class="dt-desc-clone animate animate--fadeInUp" style="--delay: 300ms"><span class="rounded-full px-3 py-1 bg-light-4 dark:bg-dark-1 font-medium font-primary-1">{{ $row['news_tag'][0]['tag_name'] ?? null }}</span></p>
                <div class="dt-desc-row flex items-center mt-6 vh-text-sm animate animate--fadeInUp" style="--delay: 400ms">
                    <span class="dt-desc-row-logo rounded-full w-10 h-10 border border-white bg-light-4 dark:bg-dark-1 flex items-center justify-center">
                        <svg width="26" height="21" viewBox="0 0 26 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.18524 10.502V15.6546C4.18524 19.3004 6.13325 21 9.75355 21C11.2407 21 12.7003 20.6708 13.6732 20.1505V15.3539C13.0244 15.6557 12.3757 15.82 11.8079 15.82C10.835 15.82 10.3213 15.4087 10.3213 14.2853V10.502H15.2424L15.2443 20.6707H21.3776V16.8612C21.3776 13.5446 22.7561 12.0915 25.3512 12.0915H26V5.48571C23.5675 5.37616 22.216 6.69184 21.3776 8.72012V5.70537L10.3213 5.70544V0H4.18524V5.70544H2.45499L0 10.502H4.18524Z" fill="white"/>
                        </svg>
                    </span>
                    <span class="dt-desc-row-pub pl-2">
                        <span class="dt-desc-row-pub-name font-primary-1 font-bold">trstdly</span>
                        <span class="dt-desc-row-pub-date font-primary-2 block">{{ Util::date($row['news_date_publish'] ?? null, 'short_time') }}</span>
                    </span>
                </div>
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