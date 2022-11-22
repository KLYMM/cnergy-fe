@extends('defaultsite.mobile-v2.layouts.main-maverick')

@section('content')
    <main class="main relative max-w-screen-md mx-auto h-full bg-white text-black dark:bg-black dark:text-white">
        <!-- snap -->
        <div class="main-body relative overflow-y-auto flex flex-col w-full h-full snap-y snap-mandatory scroll-smooth"
            data-scroller>
            @include('defaultsite.mobile-v2.components.sections', ['page' => 1])
            <div id="feed-paging"></div>
        </div>
        <!-- end.snap -->

        <!-- snap.indicator -->
        <div class="indicator absolute right-2 bottom-24 flex flex-col snap-y snap-mandatory scroll-smooth overflow-hidden dark:indicator-white"
            data-indicator>
        </div>
    </main>
@endsection
