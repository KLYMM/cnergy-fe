@if( $rows )
@push('styles')
    <style>
        .channel-ad_ad-sc,.channel-ad_ad-sc-2,.channel-ad_ad-exposer{
            margin-top:15px;
            margin-bottom:15px;
        }
        .section--infscroll-list-item{
            display: unset!important;
        }
    </style>
@endpush
<div class="section--infscroll-list-item" id="infscroll-{{ Str::uuid() }}">

    @foreach( $rows as $r )

        @if( ($r['news_type']??null) == 'news'  )
            
            @include('defaultsite.mobile.components._list_text')

        @elseif(($r['news_type']??null) == 'photonews'  )

            @include('defaultsite.mobile.components._list_gallery')

        @elseif( ($r['news_type']??null) == 'video'  )
            
            @include('defaultsite.mobile.components._list_video')

        @endif
        @if ($loop->index==3)
            @if (($page??null)=='homepage'||($page??null)=='category')
                @if (($data??null)=='headline')
                    <div class="channel-ad channel-ad_ad-exposer">
                        {!! Util::getAds('exposer') !!}
                    </div>
                @elseif (($data??null)=='latest')
                    <div class="channel-ad channel-ad_ad-sc">
                        {!! Util::getAds('showcase-1') !!}
                    </div>
                @endif
            @endif
        @elseif ($loop->index==13)
            @if (($page??null)=='homepage'||($page??null)=='category')
                @if (($data??null)=='latest')
                    <div class="channel-ad channel-ad_ad-sc-2">
                        {!! Util::getAds('showcase-2') !!}
                    </div>
                @endif
            @endif
        @elseif ($loop->index==4)
            @if (($page??null)=='tag')
                <div class="channel-ad channel-ad_ad-exposer">
                    {!! Util::getAds('exposer') !!}
                </div>
            @endif
        @elseif ($loop->index==9)
            @if (($page??null)=='tag')
                <div class="channel-ad channel-ad_ad-sc">
                    {!! Util::getAds('showcase-1') !!}
                </div>
            @endif
        @elseif ($loop->index==19)
            @if (($page??null)=='tag')
                <div class="channel-ad channel-ad_ad-sc-2">
                    {!! Util::getAds('showcase-2') !!}
                </div>
            @endif
        @endif
    @endforeach

</div>
@endif