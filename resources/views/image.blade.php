{{-- <picture>
    <source class="lazyload blur-up"
        srcset="{{ Src::imgNewsCdn($source, '25x', 'webp') ?? Src::mix('img/320x180_no_image.jpg') }}"
data-srcset="{{ Src::imgNewsCdn($source, $size, 'webp') ?? Src::mix('img/320x180_no_image.jpg') }}"
type="image/webp">
<source class="lazyload blur-up" srcset="{{ Src::imgNewsCdn($source, '25x', 'jpeg') ?? Src::mix('img/320x180_no_image.jpg') }}" data-srcset="{{ Src::imgNewsCdn($source, $size, 'jpeg') ?? Src::mix('img/320x180_no_image.jpg') }}" type="image/jpg">
<img class="lazyload blur-up" src="{{ Src::imgNewsCdn($source, '25x', 'webp') ?? Src::mix('img/320x180_no_image.jpg') }}" data-src="{{ Src::imgNewsCdn($source, $size, 'webp') ?? Src::mix('img/320x180_no_image.jpg') }}" width="{{ trim(explode('x', $size)[0] ?? '') }}" height="{{ trim(explode('x', $size)[1] ?? '') }}" alt="{{ htmlspecialchars_decode($title ?? 'untitled') }}">
</picture> --}}

<img src="{{ Src::imgNewsCdn($source, $size, 'webp') ?? Src::mix('img/320x180_no_image.jpg') }}" width="{{ trim(explode('x', $size)[0] ?? '') }}" height="{{ trim(explode('x', $size)[1] ?? '') }}" alt="{{ htmlspecialchars_decode($title ?? 'untitled') }}" loading="lazy">
