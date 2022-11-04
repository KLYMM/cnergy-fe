@if( $rows )

<div class="section--infscroll-list-item" id="infscroll-{{ Str::uuid() }}">

    @foreach( $rows as $r )

        @if( ($r['news_type']??null) == 'news'  )

            @include('defaultsite.mobile.components-ui.list_text')

        @elseif(($r['news_type']??null) == 'photonews'  )

            @include('defaultsite.mobile.components-ui.list_gallery')

        @elseif( ($r['news_type']??null) == 'video'  )
            
            @include('defaultsite.mobile.components-ui.list_video')

        @endif
        
    @endforeach

</div>
@endif