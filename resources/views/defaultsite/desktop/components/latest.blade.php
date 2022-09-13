@if( $rows )
<div class="section--infscroll-list-item" id="infscroll-{{ Str::uuid() }}">

    @foreach( $rows as $r )

        @if( $r['news_type'] == 'news'  )
            
            @include('defaultsite.desktop.components._list_text')

        @elseif( $r['news_type'] == 'photonews'  )
            
            @include('defaultsite.desktop.components._list_gallery')

        @elseif( $r['news_type'] == 'video'  )
            
            @include('defaultsite.desktop.components._list_video')

        @endif

    @endforeach

</div>
@endif