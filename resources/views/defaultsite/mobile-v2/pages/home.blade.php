@extends('defaultsite.mobile-v2.layouts.main')

@section('content')
    <section>
        <div class="section-tag">
            <a href="#">
                <img class="logo-img dark-img-white" src="{{ URL::asset('assets/images/logo-lg.png') }}" width="132"
                    height="41" />
            </a>
            <input class="switchTheme-control" type="checkbox" name="checkbox" id="switchTheme" autocomplete="off">
            <label class="switchTheme-icon" for="switchTheme">
                <svg class=" switchTheme-icon-dark" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M21 12.79C20.8427 14.4922 20.2039 16.1144 19.1582 17.4668C18.1126 18.8192 16.7035 19.8458 15.0957 20.4265C13.4879 21.0073 11.748 21.1181 10.0795 20.7461C8.41102 20.3741 6.88299 19.5345 5.67423 18.3258C4.46546 17.117 3.62594 15.589 3.25391 13.9205C2.88188 12.252 2.99272 10.5121 3.57346 8.9043C4.1542 7.29651 5.18083 5.88737 6.53321 4.84175C7.88559 3.79614 9.5078 3.15731 11.21 3C10.2134 4.34827 9.73385 6.00945 9.85853 7.68141C9.98321 9.35338 10.7039 10.9251 11.8894 12.1106C13.0749 13.2961 14.6466 14.0168 16.3186 14.1415C17.9906 14.2662 19.6517 13.7866 21 12.79V12.79Z"
                        fill="white" />
                </svg>
                <svg class="svg-stroke-white switchTheme-icon-light" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_1_6)">
                        <path
                            d="M12 17C14.7614 17 17 14.7614 17 12C17 9.23858 14.7614 7 12 7C9.23858 7 7 9.23858 7 12C7 14.7614 9.23858 17 12 17Z"
                            fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 1V3" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M12 21V23" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M4.22 4.22L5.64 5.64" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M18.36 18.36L19.78 19.78" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M1 12H3" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M21 12H23" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M4.22 19.78L5.64 18.36" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M18.36 5.64L19.78 4.22" stroke="black" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </g>
                    <defs>
                        <clipPath id="clip0_1_6">
                            <rect width="24" height="24" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </label>
        </div>
        <div class="container-section">
            @if (count($headline) > 0 ?? null)
                @foreach ($headline as $item)
                    @if ($loop->iteration == 1 || $loop->iteration % 5 == 1)
                        <div data-columns="1">
                            @include('defaultsite.mobile-v2.components.section-list-news', [
                                'newsItem' => $item,
                            ])
                        </div>
                    @elseif($loop->iteration == 2 || $loop->iteration % 5 == 2)
                        <div data-columns="2">
                            @include('defaultsite.mobile-v2.components.section-list-news2', [
                                'newsItem' => $item,
                            ])
                        </div>
                    @elseif($loop->iteration == 3 || $loop->iteration % 5 == 3)
                        <div data-columns="3">
                            @include('defaultsite.mobile-v2.components.section-list-news3', [
                                'newsItem' => $item,
                            ])
                        </div>
                    @elseif($loop->iteration == 4 || $loop->iteration % 5 == 4)
                        <div data-columns="4">
                            @include('defaultsite.mobile-v2.components.section-list-news4', [
                                'newsItem' => $item,
                            ])
                        </div>
                    @elseif($loop->iteration == 5 || $loop->iteration % 5 == 0)
                        <div data-columns="5">
                            @include('defaultsite.mobile-v2.components.section-list-news5', [
                                'newsItem' => $item,
                            ])
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </section>
@endsection
