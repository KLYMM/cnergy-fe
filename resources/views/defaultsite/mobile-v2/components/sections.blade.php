@if (count($latest['data']) > 0 ?? null)
    @foreach ($latest['data'] as $item)
        @if ($loop->iteration % 5 == 1)
            <!-- theme.1 -->
            <section data-section="section{{ ($page - 1) * 25 + $loop->iteration }}"
                class="section snap-always snap-start w-full h-full flex flex-col shrink-0 pt-16 pb-6 transition bg-white dark:bg-black dark:text-white-20"
                data-theme="default">
                @include('defaultsite.mobile-v2.components.section-list-news', [
                    'newsItem' => $item,
                ])
            </section>
        @elseif($loop->iteration % 5 == 2)
            <!-- theme.2 -->
            <section data-section="section{{ ($page - 1) * 25 + $loop->iteration }}"
                class="section snap-always snap-start w-full h-full flex flex-col shrink-0 pt-16 pb-6 transition bg-white dark:bg-black dark:text-white-20"
                data-theme="default">
                @include('defaultsite.mobile-v2.components.section-list-news2', [
                    'newsItem' => $item,
                ])
            </section>
        @elseif($loop->iteration % 5 == 3)
            <!-- theme3 -->
            <section data-section="section{{ ($page - 1) * 25 + $loop->iteration }}"
                class="section snap-always snap-start w-full h-full flex flex-col shrink-0 pt-16 pb-6 transition bg-yellow dark:bg-black dark:text-white-20"
                data-theme="yellow">
                @include('defaultsite.mobile-v2.components.section-list-news3', [
                    'newsItem' => $item,
                ])
            </section>
        @elseif($loop->iteration % 5 == 4)
            <!-- theme.4 -->
            <section data-section="section{{ ($page - 1) * 25 + $loop->iteration }}"
                class="section snap-always snap-start w-full h-full flex flex-col shrink-0 pt-16 pb-6 transition bg-white dark:bg-black dark:text-white-20"
                data-theme="default">
                @include('defaultsite.mobile-v2.components.section-list-news4', [
                    'newsItem' => $item,
                ])
            </section>
        @elseif($loop->iteration % 5 == 0)
            <!--theme.5-->
            <section data-section="section{{ ($page - 1) * 25 + $loop->iteration }}"
                class="section snap-always snap-start w-full h-full flex flex-col shrink-0 pt-16 pb-6 transition bg-white dark:bg-black dark:text-white-20"
                data-theme="default">
                @include('defaultsite.mobile-v2.components.section-list-news5', [
                    'newsItem' => $item,
                ])
            </section>
        @endif
    @endforeach
@endif