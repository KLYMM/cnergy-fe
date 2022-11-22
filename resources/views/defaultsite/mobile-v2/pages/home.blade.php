@extends('defaultsite.mobile-v2.layouts.main-maverick')

@section('content')
    <main class="main relative max-w-screen-md mx-auto h-full bg-white text-black dark:bg-black dark:text-white">
        <!-- snap -->
        <div class="main-body relative overflow-y-auto flex flex-col w-full h-full snap-y snap-mandatory scroll-smooth"
            data-scroller>
            @if (count($latest) > 0 ?? null)
                @foreach ($latest as $item)
                    @if ($loop->iteration % 5 == 1)
                        <!-- theme.1 -->
                        <section data-section="section{{ $loop->iteration }}" data-template="news-headline-v1" data-id="1"
                            class="section snap-always snap-start w-full h-full flex flex-col shrink-0 pt-16 pb-6 transition bg-white dark:bg-black dark:text-white-20"
                            data-theme="default">
                            @include('defaultsite.mobile-v2.components.section-list-news', [
                                'newsItem' => $item,
                            ])
                        </section>
                    @elseif($loop->iteration % 5 == 2)
                        <!-- theme.2 -->
                        <section data-section="section{{ $loop->iteration }}" data-template="news-headline-v2" data-id="2"
                            class="section snap-always snap-start w-full h-full flex flex-col shrink-0 pt-16 pb-6 transition bg-white dark:bg-black dark:text-white-20"
                            data-theme="default">
                            @include('defaultsite.mobile-v2.components.section-list-news2', [
                                'newsItem' => $item,
                            ])
                        </section>
                    @elseif($loop->iteration % 5 == 3)
                        <!-- theme3 -->
                        <section data-section="section{{ $loop->iteration }}" data-template="news-headline-v3"
                            data-id="3"
                            class="section snap-always snap-start w-full h-full flex flex-col shrink-0 pt-16 pb-6 transition bg-yellow dark:bg-black dark:text-white-20"
                            data-theme="yellow">
                            @include('defaultsite.mobile-v2.components.section-list-news3', [
                                'newsItem' => $item,
                            ])
                        </section>
                    @elseif($loop->iteration % 5 == 4)
                        <!-- theme.4 -->
                        <section data-section="section{{ $loop->iteration }}" data-template="news-headline-v4"
                            data-id="4"
                            class="section snap-always snap-start w-full h-full flex flex-col shrink-0 pt-16 pb-6 transition bg-white dark:bg-black dark:text-white-20"
                            data-theme="default">
                            @include('defaultsite.mobile-v2.components.section-list-news4', [
                                'newsItem' => $item,
                            ])
                        </section>
                    @elseif($loop->iteration % 5 == 0)
                        <!--theme.5-->
                        <section data-section="section{{ $loop->iteration }}" data-template="news-headline-v5"
                            data-id="5"
                            class="section snap-always snap-start w-full h-full flex flex-col shrink-0 pt-16 pb-6 transition bg-white dark:bg-black dark:text-white-20"
                            data-theme="default">
                            @include('defaultsite.mobile-v2.components.section-list-news5', [
                                'newsItem' => $item,
                            ])
                        </section>
                    @endif
                @endforeach
            @endif
            {{-- ?? END OF SECTION !! --}}
            <div id="feed-paging"></div>
        </div>
        <!-- end.snap -->

        <!-- snap.indicator -->
        <div class="indicator absolute right-2 bottom-24 flex flex-col snap-y snap-mandatory scroll-smooth overflow-hidden dark:indicator-white"
            data-indicator>
        </div>
    </main>

@endsection
