

@isset($current_page,$last_page)
    @if ($last_page>1)
        @if ($pagination=Util::pagination($current_page,$last_page)??null)
            <div class="pagination-container">
                <div>
                    <div class="pagination-pages">Pages</div>
                    <ul class="paginationlist list-none flex items-center flex-1">
                        @foreach ($pagination['list'] as $p)
                        @if ($pagination['current_page']==$p['page'])
                            <li class="paginationlist-item active"><a href="/{{$slug}}/page-{{$p['page']}}">{{$p['page']}}</a></li>
                        @else
                            <li class="paginationlist-item"><a href="/{{$slug}}/page-{{$p['page']}}">{{$p['page']}}</a></li>
                        @endif
                        @endforeach
                        {{-- @if ($pagination['last_page']!=$pagination['current_page'])
                            <li class="paginationlist-item"><a href="/{{$slug}}/page-{{$pagination['current_page']+1}}">LANJUT<svg class="iconSVG ml-1" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                            </svg></a></li>
                        @endif
                        @if ($pagination['last_page']!=$pagination['current_page'])
                            @if ($pagination['last_page']!=null)
                                <li class="paginationlist-item"><a href="/{{$slug}}/page-{{$pagination['last_page']}}">
                                    <svg class="iconSVG" width="10" height="9" fill="currentColor" viewBox="0 0 10 9" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.959644L3.54038 4.50002L0 8.04041L0.919237 8.95964L4.91924 4.95964L5.37886 4.50002L4.91924 4.04041L0.919237 0.0404053L0 0.959644ZM4 0.959644L7.54038 4.50002L4 8.04041L4.91924 8.95964L8.91924 4.95964L9.37886 4.50002L8.91924 4.04041L4.91924 0.0404053L4 0.959644Z"></path></svg>
                                </a></li>
                            @endif
                        @endif --}}
                    </ul>
                </div>
            </div>
        @endif
    @endif
@endisset
