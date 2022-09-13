<aside class="main-aside">
    @push('styles')
    <style>
        .channel-ad_ad-sc,.channel-ad_ad-sc2,.channel-ad_ad-hl{
            margin-top:15px;
            margin-bottom:15px;
        }
        .main-aside{
            position: unset
        }
    </style>
    @endpush
               
    @include('defaultsite/desktop/components/trendingtag')
        

    {{-- <div class="section section--promotion">
        <h1 class="section-title text-16 mb-4">LIVE STREAMING</h1>
        <ul class="section--promotion-list list-none" x-data="{
            popular: [
                {
                    type: 'big',
                    title: 'Pekan Ini Yamaha Luncurkan Matic Baru, Lexy Connected?',
                    img: 'https://placehold.co/300x172'
                },
            ],
        }">
            <template x-for="list in popular" :key="list.type">
                <li class="section--promotion-list-item">
                    <template x-if="list.type == 'big'">
                        <figure class="item">
                            <a href="#" class="item-img aspect-[300/172] rounded-lg"><img class="lazyload" :data-src="list.img" width="300" height="172" alt="image"></a>
                            <figcaption class="item-desc pt-2">
                                <h2 class="item-desc-title font-bold"><a href="#" x-text="list.title"></a></h2>
                            </figcaption>
                        </figure>
                    </template>
                    
                    <template x-if="list.id == 'small'">
                        <figure class="item item--text flex items-start justify-between">
                            <span class="item--text-img"><a href="#" class="item-img aspect-square rounded-lg"><img class="lazyload" :data-src="list.img" width="60" height="60" alt="image"></a></span>
                            <figcaption class="item-desc flex-1 pl-4">
                                <h2 class="item-desc-title font-bold"><a href="#" x-text="list.title"></a></h2>
                            </figcaption>
                        </figure>
                    </template>
                </li>
            </template>
        </ul>
    </div> --}}

    @if ($reference??null)
        @include('defaultsite/desktop/components/recommendation',['reference'=>$reference])
    @endif
    
    <div class="channel-ad channel-ad_ad-sc"> 
        {!! Util::getAds('showcase-1') !!}
    </div>
    <div class="channel-ad channel-ad_ad-hl">
        {!! Util::getAds('half-page') !!}
    </div>

    @include('defaultsite/desktop/components/popular')

    <div class="channel-ad channel-ad_ad-sc2">
        {!! Util::getAds('showcase-2') !!}
    </div>
</aside>