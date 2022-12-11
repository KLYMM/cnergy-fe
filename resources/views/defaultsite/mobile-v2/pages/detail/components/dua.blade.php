<!-- story.1 -->
<section data-section="section1"
    class="section snap-always snap-start w-full h-full flex flex-col shrink-0 transition  text-white  pt-16"
    data-theme="story1">
    <div class="section-body mt-5 relative overflow-hidden flex-1 container max-w-full">
        <article class="article relative overflow-hidden flex flex-col h-full ">
            <ul class="main-breadcrumb">
                <li class="main-breadcrumb-item "><a href="/">Home</a>
                </li>
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
            <div class="main-news-deskripsi animate animate--fadeInUp" style="--delay: 0.5ms">
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
                <h3 class="author-title leading-8">{{ $row['news_title'] ?? null }}</h3>
                <div class="header-photo">
                    <div class="flex my-2 items-center gap-2">
                        <img class="rounded-full" src="{{ URL::asset('assets/images/author.PNG') }}" alt="author"
                            width="40" height="40px">
                        <div class="flex flex-col items-start gap-1">
                            <p class="photo-author">
                                trstdly
                            </p>
                            <span class="author_publish">
                                {{ Util::date($row['news_date_publish'] ?? null, 'short_time') }}</span>
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
</section>
