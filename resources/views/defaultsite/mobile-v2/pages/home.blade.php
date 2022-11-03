@extends('defaultsite.mobile-v2.layouts.main')

@section('content')
<section>
    <div class="container-section">
        @include('defaultsite.mobile-v2.components.section-list-news')
        @include('defaultsite.mobile-v2.components.section-list-news2')
        @include('defaultsite.mobile-v2.components.section-list-news3')
        @include('defaultsite.mobile-v2.components.section-list-news4')
        @include('defaultsite.mobile-v2.components.section-list-news5')
    </div>

</section>

    {{-- @include('defaultsite.mobile-v2.components.section-list-news') --}}
@endsection
