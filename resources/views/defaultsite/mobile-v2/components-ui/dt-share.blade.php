<div class="dt-share-container">
    <div class="icons d-flex align-items-center justify-content-center mt-2 gap-4">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=facebook&utm_campaign=Share_Bottom') }}"
            target="_blank"><i class="icon icons--share icon--share-fb fs-5"><i
                    class="fa-brands fa-fb fa-facebook-f  "></i></i></a>
        <a href="https://wa.me/?text={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=whatsapp&utm_campaign=Share_Bottom') }}"
            target="_blank"><i class="icon icons--share icon--share-fb fs-5"><i
                    class="fa-brands fa-wa fa-whatsapp"></i></i></a>
        <a href="https://twitter.com/intent/tweet?u={{ urlencode(url()->current() . '?utm_source=Mobile&utm_medium=twitter&utm_campaign=Share_Bottom') }}"
            target="_blank"><i class="icon icons--share icon--share-fb "><i
                    class="fa-brands fa-twitter fa-twitter fs-5"></i></i></a>
        <a class="icons-share-link" value="copy" onclick="copyToClipboard()"> <i
                class="fa-solid fa-link fs-5"></i></a>
    </div>
</div>
