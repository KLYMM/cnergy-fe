{{-- <picture>
    <source class="lazyload blur-up" srcset="{{ Src::imgNewsCdn($source, '25x', 'webp') }}" data-srcset="{{ Src::imgNewsCdn($source, $size, 'webp') }}" type="image/webp">
    <source class="lazyload blur-up" srcset="{{ Src::imgNewsCdn($source, '25x', 'jpeg') }}" data-srcset="{{ Src::imgNewsCdn($source, $size, 'jpeg') }}" type="image/jpeg">
    <img class="lazyload blur-up" src="{{ Src::imgNewsCdn($source, '25x', 'webp') }}" data-src="{{ Src::imgNewsCdn($source, $size, 'webp') }}" width="{{ trim(explode('x', $size)[0]??'') }}" height="{{ trim(explode('x', $size)[1]??'') }}" alt="{{htmlspecialchars_decode($title??'untitled')}}">
</picture> --}}

@if(Src::imgNewsCdn($source, $sizeW.'x'.$sizeH, 'jpeg'))
<amp-img src="{{ Src::imgNewsCdn($source, $sizeW.'x'.$sizeH, 'jpeg') }}" width="{{$sizeW}}" height="{{$sizeH}}" layout="responsive"  alt="{{htmlspecialchars_decode($title??'untitled')}}"></amp-img>
@endif