<div class="main-news-container">

    <ul class="main-breadcrumb">
        <li class="main-breadcrumb-item"><a href="/">Home</a></li>
        @foreach ($row['news_category'] as $r)
            @if ($loop->iteration==1)
                <li class="main-breadcrumb-item {{$loop->count==1?'active':''}}"><a href="{{ url(( $row['news_category'][0]['url']??'' )) }}">{{$r['name']??null}}</a></li>
            @elseif($loop->iteration==2)
                <li class="main-breadcrumb-item {{$loop->count==2?'active':''}}"><a href="{{ url(( $row['news_category'][0]['url']??'' ).'/'.( $row['news_category'][1]['url']??'' )) }}">{{$r['name']??null}}</a></li>
            @elseif($loop->iteration==3)
                <li class="main-breadcrumb-item {{$loop->count==3?'active':''}}"><a href="{{ url(( $row['news_category'][0]['url']??'' ).'/'.( $row['news_category'][1]['url']??'' ).'/'.( $row['news_category'][2]['url']??'' )) }}">{{$r['name']??null}}</a></li>
            @endif
        @endforeach
    </ul>



{{-- main --}}
@include('defaultsite.mobile.components-ui.slider-kumpulan-foto')

{{-- st-share --}}
<div class="pt-5"> 
    @include('defaultsite.mobile.components-ui.dt-share')
</div>


{{-- report --}}
<div style="margin:20px;">
<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-light report-btn"><i
    class="fa-solid fa-triangle-exclamation" style="color: #ca0000; margin-right: 10px;"></i>REPORT ARTICLE</button>

    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                {{-- FORM REPORT --}}
                @include('defaultsite.mobile.components-ui.form-report')
            </div>
        </div>

    </div>
    </div>
</div>
</div>