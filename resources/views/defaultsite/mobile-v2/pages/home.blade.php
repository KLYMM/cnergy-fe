@extends('defaultsite.mobile-v2.layouts.main')

@section('content')
    <header class="new-header px-4">
        <div class="d-flex align-items-center justify-content-between py-2">
            <a href="#">
                <img src="{{ URL::asset('assets/images/logo-lg.png') }}" id="logo-mobile" alt="logo"
                    width="140"height="48">
            </a>
            <i>*</i>
        </div>
    </header>
    <section>
        <div class="container-section">
            @if (count($headline) > 0 ?? null)
                @foreach ($headline as $item)
                    @if ($loop->iteration == 1 || $loop->iteration % 5 == 1)
                        <div class="item-section px-4 d-flex flex-column justify-content-between" data-columns="1">
                            @include('defaultsite.mobile-v2.components.firstTheme', ['newsItem' => $item])
                        </div>
                    @elseif($loop->iteration == 2 || $loop->iteration % 5 == 2)
                        <div class="item-section px-4 d-flex flex-column justify-content-between" data-columns="2">
                            @include('defaultsite.mobile-v2.components.secondTheme', ['newsItem' => $item])
                        </div>
                    @elseif($loop->iteration == 3 || $loop->iteration % 5 == 3)
                        <div class="item-section px-4 d-flex flex-column justify-content-between" data-columns="3">
                            @include('defaultsite.mobile-v2.components.thirdTheme', ['newsItem' => $item])
                        </div>
                    @elseif($loop->iteration == 4 || $loop->iteration % 5 == 4)
                        <div class="item-section px-4 d-flex flex-column justify-content-between" data-columns="4">
                            @include('defaultsite.mobile-v2.components.fourthTheme', ['newsItem' => $item])
                        </div>
                    @elseif($loop->iteration == 5 || $loop->iteration % 5 == 0)
                        <div class="item-section px-4 d-flex flex-column justify-content-between" data-columns="5">
                            @include('defaultsite.mobile-v2.components.fifthTheme', ['newsItem' => $item])
                        </div>
                    @endif
                @endforeach
            @endif


        </div>
    </section>
    {{-- @include('defaultsite.mobile-v2.components.section-list-news') --}}
@endsection
