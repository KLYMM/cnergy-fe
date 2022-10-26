@extends('defaultsite.desktop.layouts.ui-main')

@section('title', $row['news_title'])

@section('content')
    <div class="mt-4">
        <div class="row gx-5">
            <div class="col-8">
                <div class="main-content-news-container">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <span class="text-dark mx-1"> ></span>
                        @foreach ($row['news_category'] as $r)
                            @if ($loop->iteration == 1)
                                <li class="top-bar-item {{ $loop->count == 1 ? 'active' : '' }}"><a
                                        href="{{ url($row['news_category'][0]['url'] ?? '') }}">{{ $r['name'] ?? null }}</a>
                                </li>
                            @elseif($loop->iteration == 2)
                                <li class="top-bar-item {{ $loop->count == 2 ? 'active' : '' }}"><a
                                        href="{{ url(($row['news_category'][0]['url'] ?? '') . '/' . ($row['news_category'][1]['url'] ?? '')) }}">{{ $r['name'] ?? null }}</a>
                                </li>
                            @elseif($loop->iteration == 3)
                                <li class="top-bar-item {{ $loop->count == 3 ? 'active' : '' }}"><a
                                        href="{{ url(($row['news_category'][0]['url'] ?? '') . '/' . ($row['news_category'][1]['url'] ?? '') . '/' . ($row['news_category'][2]['url'] ?? '')) }}">{{ $r['name'] ?? null }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>

                    <h4 class="my-3">{{ $row['news_title'] ?? null }}</h4>
                    <div class="account-shared-content my-4">
                        <div class="account">
                            <a href="{{ Src::author($row) }}">
                                <img class="aspect-square"
                                    src="{{ $row['news_editor'][0]['image'] ??'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAYAAACOEfKtAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4AgJCiccVLvelQAABVVJREFUeNrtnG1v0zwUhm87WdqsCUm00nWgMgZMQrSbxJ/nZ6xSpexTAakbhdFutDSN17yZD6jTxsN49mKnHviW8jknl2/7HMcnIaenpxxadxbVCDTAlcpUKRhCyJXrsjjnVy4N8BdxzvHt2zdMJhPMZjMwxpBl2c8gTRO2bcN1Xfi+D9/3/wN4ZYO+qiRiGAYYYxiPxzg9PcV0OkWe5zdyoGEY8DwPGxsbqNfrsG0beZ7/OwA553j//j1OTk7uPR0JIdjc3MTLly9X4srSAY7HY3z48AHn5+egVEwOK4oC1WoVL168QL1e/zsBGoaBMAwxHo+l3qder6Pdbpc2pUsBmGUZer0eoigS5ro/udFxHOzv78M05edI6XUg5xy9Xg9xHEuHBwCUUsRxjF6vV0q5I/2Jut0u5vN56Yv7fD5Ht9t92AD7/T7m8/lqsiMhmM/n6Pf7Dw8gIQRRFGE4HK604CWEYDgcIooiaXFIAVgUBcIwLGXNu8maGIYhiqJ4GAAJIRgMBkiSRJn9apIkGAwGUlwoHGCaphiNRsrsVZeDOhqNkKap+gAZY2CMQTXJiksoQEopjo+PoaqOj4+Fr8vCHTgej5WavpensYxtJBUZ4GQykZbtRFUHk8lE6AALdeBsNlPSfZcHeTabqevAVe06VhmjUAcuFgvlAS4WC3WTyPIMQ2WJjpGKHmHVJTpGoQDX1taUByg6RqEAK5WKUme2v4pzjkqloiZAzjlqtZryAEXHKNSBrusqD9B1XXUd6Hme8mWM53nqOpBzjo2NDSVdKCs24QCbzaayAGXEJhyg4ziwLEs5gJZlwXEctQEuA63VasoBrNVqUgZWOEBKKba2tpSaxpxzbG1tSTnkojKCbTQaqFarSkDknKNaraLRaEiJh8oK+vXr18oAlBmLNICO4yAIgpUDDIJASvKQCnBZtG5vb6/0FX9RFNje3pZa3FPZo99qtVYCsSgKtFot6bNAKsA8z/H8+fOVTOUgCLCzsyO90VJ68wohBLu7uzAMozR4hmFgd3e3lHuV0v2zvr6Ovb290hos9/b2sL6+/vcAXLbddjodqRAppeh0OnAcp7R1t9T+M9/30W63YVmW0LKCcw7LstBut+H7fqlrbWkACSHgnCMIAnQ6HaH7Usuy0Ol0EAQBOOelvpOU0qW//NIoSRIwxnB+fo7v378jiiJEUYQ0TYV30GdZhrW1NTiOA8dx8OjRI1SrVdi2feF4GcW0UICUUhRFga9fv+LLly9gjCHPcxRFUaozlveilMIwDNi2jWaziUajcRGjEgCXQBaLBeI4xufPnzEaja64UJW3MUv3PX78GM1mE7Va7eKE7j7OvDNA0zQxmUxwdHSE2Wx20TKh+uH6ElalUoHrumi1WvB9/84dC7cGWBQFGGPo9/uYTqdKNJLft8TyPA+vXr2Cbdu3fp4bAzRNEycnJ/j06ROm0+mDcNttXel5Hp4+fYrNzc0bO/JGAJMkweHhofL9f6Jguq6LN2/e3KjUuhYgIQRZlmEwGGA4HKIoir8e3mWIlFI8efIEz549g2ma1yaa3wJcNiL2er0H0bImU6ZpYn9//9qWkN8CPDo6wsePHx98ghCZaHZ2dtBqtf4MkHOObreLOI41tWveKr19+/bKUkaXU5YxhoODAw3vD4rjGAcHB2CMXUAkZ2dnfDqdIgxDZFn2zySK+yQY0zTRbrfheR5oFEUIw/DilyNa/799zfMcYRj+/Iz23bt3PEkSDe8OTrQsCzRNUw3vjk5M01T/fOy+0gA1QA1QA9QAtTRADVAD1AC1NEANUAPUALU0QA1QA/x39AMzx8A5MRN2GAAAAABJRU5ErkJggg==' }}"
                                    width="40" height="40" alt="user">
                            </a>
                            <div class="account-detail">
                                <p href="{{ Src::author($row) }}">
                                    <a href="{{ Src::author($row) }}">{{ $row['news_editor'][0]['name'] ?? null }}</a>
                                </p>
                                <span>{{ Util::date($row['news_date_publish'] ?? null, 'ago') }}</span>
                            </div>
                        </div>

                        <div class="shared">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current() . '?utm_source=Desktop&utm_medium=facebook&utm_campaign=Share_Top') }}"
                                target="_blank"><i class="icon icons--share icon--share-fb"></i></a>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode(url()->current() . '?utm_source=Desktop&utm_medium=twitter&utm_campaign=Share_Top') }}"
                                target="_blank"><i class="icon icons--share icon--share-tweet"></i></a>
                        </div>
                    </div>

                    <div class="content-news mt-3">
                        <figure>
                            @include('image', [
                                'source' => $row,
                                'size' => '640x360',
                                $row['news_title'] ?? null,
                            ])
                        </figure>
                        <figcaption>{{ $row['news_imageinfo'] ?? null }}</figcaption>

                        <div class="dt-paragraph mt-3 ">
                            {!! str_replace(
                                ['mce-mce-mce-mce-no/type', 'mce-no/type'],
                                '',
                                htmlspecialchars_decode($row['news_content'] ?? null),
                            ) !!}

                            @push('script')
                                <script>
                                    if (document.getElementsByClassName('dt-paragraph')) {
                                        //change tag br to tag p
                                        if (document.getElementsByClassName('dt-paragraph')[0].getElementsByTagName('br')[0] != null) {
                                            document.getElementsByClassName('dt-paragraph')[0].innerHTML = document.getElementsByClassName(
                                                'dt-paragraph')[0].innerHTML.replace(/<br>\\*/g, '</p><p>')
                                        }
                                        //add ads
                                        if (document.getElementsByClassName('dt-paragraph')[0].getElementsByTagName('p')[0] != null) {
                                            //get 2 paragraf before add ads
                                            var lis = document.getElementsByClassName('dt-paragraph')[0].getElementsByTagName('p')
                                            var counter = 0

                                            for (var i = 0; i < lis.length - 1; i++) {
                                                if (lis[i].innerHTML !== "") {
                                                    counter++
                                                    if (counter == 2) {
                                                        document.getElementsByClassName('dt-paragraph')[0].getElementsByTagName('p')[i]
                                                            .insertAdjacentHTML('afterend',
                                                                '<div class="channel-ad channel-ad_ad-exposer">  {!! Util::getAds('exposer') !!} </div>');
                                                        break
                                                    }
                                                }
                                            }
                                        }
                                    }
                                </script>
                            @endpush
                        </div>
                    </div>

                    {{-- !! PRELOAD !! --}}

                    @if (count($row['photonews']) > 0 ?? null)
                        <div class="photo-detail-container mt-5">
                            @foreach ($row['photonews'] as $photo)
                                <div class="my-5">
                                    <figure>
                                        @include('image', [
                                            'source' => $photo,
                                            'size' => '640x360',
                                            $photo['news_title'] ?? null,
                                        ])
                                    </figure>
                                    <figcaption>{{ $photo['description'] }}</figcaption>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                {{-- RELATED TAG --}}
                @include('defaultsite.desktop.components-ui.ui-related-tag')

                {{-- credit --}}
                @include('defaultsite.desktop.components-ui.ui-credit')

                {{-- SHARE NEWS --}}
                @include('defaultsite.desktop.components-ui.ui-share-news')

                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-light report-btn"><i
                        class="fa-solid fa-triangle-exclamation" style="color: #ca0000"></i> Report Article </button>

                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body">
                                {{-- FORM REPORT --}}
                                @include('defaultsite.desktop.components-ui.ui-form-report')
                            </div>
                        </div>

                    </div>
                </div>

                @include('defaultsite.desktop.components-ui.ui-related-news', [
                    'latest' => $row['latest'],
                    'title' => 'Latest Photo',
                ])
            </div>

            <div class="col-4">
                @include('defaultsite.desktop.components-ui.ui-aside', [
                    'reference' => $row ?? null,
                ])
            </div>
        </div>

    @endsection
