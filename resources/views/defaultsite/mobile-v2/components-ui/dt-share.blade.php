{{-- !! BOOTSRAP !! --}}
{{-- <div class="dt-share-container">
    <div class="icons d-flex align-items-center justify-content-center mt-2 gap-4">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=facebook&utm_campaign=Share_Bottom') }}"
            target="_blank"><i class="icon icons--share  "><i
                    class="fa-brands fa-fb fa-facebook-f  "></i></i></a>
        <a href="https://wa.me/?text={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=whatsapp&utm_campaign=Share_Bottom') }}"
            target="_blank"><i class="icon icons--share  "><i
                    class="fa-brands fa-wa fa-whatsapp "></i></i></a>
        <a href="https://twitter.com/intent/tweet?text={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=twitter&utm_campaign=Share_Bottom') }}"
            target="_blank"><i class="icon icons--share  "><i
                    class="fa-brands fa-twitter fa-twitter "></i></i></a>
        <a href="https://t.me/share/url?url={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=telegram&utm_campaign=Share_Bottom') }}"
            target="_blank"><i class="fa-brands fa-telegram  "></i> </a>
        <a class="icons-share-link" value="copy" onclick="copyToClipboard()"> <i
                class="fa-solid fa-link  "></i></a>
    </div>
</div> --}}


{{-- ?? TAILWIND ?? --}}
<div class="dt-share-container">
    <div class="icons flex align-center justify-content-center mt-2 gap-8">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=facebook&utm_campaign=Share_Bottom') }}"
            target="_blank"><i class="icon icons--share  "><i class="fa-brands fa-fb fa-facebook-f fa-xl"></i></i></a>
        <a href="https://wa.me/?text={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=whatsapp&utm_campaign=Share_Bottom') }}"
            target="_blank"><i class="icon icons--share  "><i class="fa-brands fa-wa fa-whatsapp fa-xl"></i></i></a>
        <a href="https://twitter.com/intent/tweet?text={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=twitter&utm_campaign=Share_Bottom') }}"
            target="_blank"><i class="icon icons--share  "><i class="fa-brands fa-twitter fa-twitter fa-xl"></i></i></a>
        <a href="https://t.me/share/url?url={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=telegram&utm_campaign=Share_Bottom') }}"
            target="_blank"><i class="fa-brands fa-telegram  fa-xl"></i> </a>
        <a class="icons-share-link" value="copy" onclick="copyToClipboard()"> <i
                class="fa-solid fa-link fa-xl "></i></a>
    </div>
</div>
