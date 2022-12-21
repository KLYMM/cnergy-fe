{{-- @dd($latest['data']) --}}
@if (count($latest['data']) > 0 ?? null)
    @foreach ($latest['data'] as $item)
        @php
            // $loop->iteration++;
            
            $newPage = ($page - 1) * 25 + $loop->iteration;
            
        @endphp
        @if ($loop->iteration % 5 == 1)
            <!-- theme.1 -->
            <section data-section="section{{ $newPage }}" data-template="news-headline-v1"
                data-id="{{ $item['news_id'] }}" data-list="{{ $newPage }}"
                class="section snap-always snap-start w-full h-full flex flex-col shrink-0 pt-16 pb-6 transition bg-white dark:bg-black dark:text-white-20"
                data-theme="default" data-page="{{ $page }}">
                @include('defaultsite.mobile-v2.components.section-list-news', [
                    'newsItem' => $item,
                ])
            </section>
        @elseif($loop->iteration % 5 == 2)
            <!-- theme.2 -->
            <section data-section="section{{ $newPage }}" data-template="news-headline-v2"
                data-id="{{ $item['news_id'] }}"" data-list="{{ $newPage }}"
                class="section snap-always snap-start w-full h-full flex flex-col shrink-0 pt-16 pb-6 transition bg-white dark:bg-black dark:text-white-20"
                data-theme="default" data-page="{{ $page }}">
                @include('defaultsite.mobile-v2.components.section-list-news2', [
                    'newsItem' => $item,
                ])
            </section>
        @elseif($loop->iteration % 5 == 3)
            <!-- theme3 -->
            <section data-section="section{{ $newPage }}" data-template="news-headline-v3"
                data-id="{{ $item['news_id'] }}" data-list="{{ $newPage }}"
                class="section snap-always snap-start w-full h-full flex flex-col shrink-0 pt-16 pb-6 transition bg-yellow dark:bg-black dark:text-white-20"
                data-theme="yellow" data-page="{{ $page }}">
                @include('defaultsite.mobile-v2.components.section-list-news3', [
                    'newsItem' => $item,
                ])
            </section>
        @elseif($loop->iteration % 5 == 4)
            <!-- theme.4 -->
            <section data-section="section{{ $newPage }}" data-template="news-headline-v4"
                data-id="{{ $item['news_id'] }}" data-list="{{ $newPage }}"
                class="section snap-always snap-start w-full h-full flex flex-col shrink-0 pt-16 pb-6 transition bg-white dark:bg-black dark:text-white-20"
                data-theme="default" data-page="{{ $page }}">
                @include('defaultsite.mobile-v2.components.section-list-news4', [
                    'newsItem' => $item,
                ])
            </section>
        @elseif($loop->iteration % 5 == 0)
            <!--theme.5-->
            <section data-section="section{{ $newPage }}" data-template="news-headline-v5"
                data-id="{{ $item['news_id'] }}" data-list="{{ $newPage }}"
                class="section snap-always snap-start w-full h-full flex flex-col shrink-0 pt-16 pb-6 transition bg-white dark:bg-black dark:text-white-20"
                data-theme="default" data-page="{{ $page }}">
                @include('defaultsite.mobile-v2.components.section-list-news5', [
                    'newsItem' => $item,
                ])
            </section>
        @endif
    @endforeach
@endif
