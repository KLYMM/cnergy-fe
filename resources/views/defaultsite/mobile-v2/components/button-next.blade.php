@isset($current_page, $last_page)
    @if ($pagination = Util::pagination($current_page, $last_page) ?? null)
        @if ($pagination['last_page'] != $pagination['current_page'])
            <a rel="nofollow"
                class="btn btn--outline flex items-center justify-center rounded-lg vh-h-btn  font-outfit font-medium   dark:bg-primary-41 dark:text-white"
                href="/{{ $slug }}/page-{{ $pagination['current_page'] + 1 }}"
                style="border:2px solid #ff3903; margin:-12px 20px;">
                <span class="text-primary">NEXT PAGE</span>
            </a>
        @endif
    @endif
@endisset

@empty($current_page)
    <a id="btn-next"
        class="btn btn--outline flex items-center justify-center rounded-lg vh-h-btn  font-outfit font-medium   dark:bg-primary-41 dark:text-white"
        href="{{ route('indexberita.index-berita', ['page' => 'page-' . 2]) }}"
        style="border:2px solid #ff3903; margin:-12px 20px;">
        <span class="text-primary">NEXT PAGE</span>
    </a>
@endempty
