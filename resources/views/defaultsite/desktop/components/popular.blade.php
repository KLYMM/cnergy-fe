@if ( $popular=\Data::popular()??null)
@push('styles')
    <style>
        .section--popular-list{counter-reset:popular}.section--popular-list-item{border-top:1px solid var(--color-border)}.section--popular-list-item:first-of-type{background-color:var(--bg-gray);border-top:0}.section--popular-list-item .item-desc{padding-left:80px;min-height:108px;display:flex;justify-content:center;flex-flow:column}.section--popular-list-item .item-desc::before{counter-increment:popular;content:counter(popular);font-family:var(--font-prompt);color:var(--color-border);font-style:italic;font-weight:700;font-size:42px;position:absolute;width:80px;height:50px;display:flex;align-items:center;justify-content:center;top:50%;left:0;margin-top:-25px}
    </style>
@endpush
    @if (count($popular)>0)
        <div class="section section--popular">
            <h1 class="section-title flex items-center justify-between text-16 mb-4">POPULER 
                {{-- <a href="#" class="section-title-linkall text-12">Lihat Semua <i class="icon icon--chevronright"></i></a> --}}
            </h1>
            <ul class="section--popular-list rounded-border list-none">
                @foreach ($popular as $r)
                    <li class="section--popular-list-item">
                        <figure class="item">
                            @if ($loop->index==0)
                                <a href="{{ Src::detail($r) }}" class="item-img aspect-[300/172]" aria-label="{{ $r['news_title']??'untitled' }}">
                                    @include('image', ['source'=>$r, 'size'=>'375x208', $r['news_title']??null])
                                </a>
                            @endif
                            <figcaption class="item-desc py-3 px-4">
                                <span class="item-desc-tag mb-1">{{ $r['category_name'] ?? null }}</span>
                                <h2 class="item-desc-title"><a href="{{ Src::detail($r) }}">{{htmlspecialchars_decode($r['news_title']??null)}}</a></h2>
                            </figcaption>
                        </figure>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@endif