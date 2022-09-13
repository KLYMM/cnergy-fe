@if( config('app.enabled_tracking') )

    @if( in_array(config('app.env'), ['development', 'staging']) )
    <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ config('site.attributes.reldomain.gtm_id') ?? 'GTM-WVGDCD4' }}"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @endif


    @if( in_array(config('app.env'), ['production']) )
    <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ config('site.attributes.reldomain.gtm_id') ?? 'GTM-K5DTWRM' }}"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @endif

@endif