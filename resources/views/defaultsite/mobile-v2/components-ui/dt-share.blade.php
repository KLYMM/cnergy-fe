<div class="dt-share-container">
    <div class="icons mt-2 " style="display: flex; ">
        <div>
            <a class="icons-share-a" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current() .'?utm_source=Mobile&utm_medium=facebook&utm_campaign=Share_Bottom' )}}" target="_blank"><i class="icon icons--share icon--share-fb"><i class="fa-brands fa-fb fa-facebook-f  "></i></i></a>
        </div>
        <div>
            <a class="icons-share-a" href="https://wa.me/?text={{ urlencode(url()->current() .'?utm_source=Mobile&utm_medium=whatsapp&utm_campaign=Share_Bottom' )}}" target="_blank"><i class="icon icons--share icon--share-fb"><i class="fa-brands fa-wa fa-whatsapp" style="margin-left: 10px"></i></i></a>
        </div>
        <div>
            <a class="icons-share-a" href="https://twitter.com/intent/tweet?u={{ urlencode(url()->current() .'?utm_source=Mobile&utm_medium=twitter&utm_campaign=Share_Bottom' )}}" target="_blank"><i class="icon icons--share icon--share-fb"><i class="fa-brands fa-twitter fa-twitter" style="margin-left: 10px"></i></i></a>
        </div>  
        <div class="ms-3">
            {{-- <input type="text" id="copy-link" value={{ url()->current() }}> --}}
            <button class="icons-share-link px-2" value="copy" onclick="copyToClipboard()">  <i class="fa-solid fa-link mx-1"></i> Copy Link</button>
        </div>
    </div>
</div>