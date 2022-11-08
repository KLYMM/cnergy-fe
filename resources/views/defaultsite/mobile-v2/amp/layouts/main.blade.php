

<!doctype html>
<html amp lang="en">
  <head>
    <meta charset="utf-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
    <title>{{config('site.attributes.meta.title') }}</title>
    <link rel="{{ config('site.attributes.meta.rel_to_non_amp') ?? 'amphtml' }}" href="{{ config('site.attributes.meta.nonAmpUrl') ?? request()->url() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ config('site.attributes.favicon') }}">

    <meta name="title" content="{{config('site.attributes.meta.title')??null }}">
    <meta name="description" content="{{config('site.attributes.meta.site_description')??null }}">
    <meta name="keywords" content="{{config('site.attributes.meta.article_keyword')??null }}">
    <meta property="og:site_name" content="{{config('site.attributes.reldomain.domain_name')??null }}">
    <meta property="og:url" content="{{config('site.attributes.meta.article_url')??null }}">
    <meta property="og:title" content="{{config('site.attributes.meta.article_title')??null }}">
    <meta property="og:description" content="{{config('site.attributes.meta.article_short_desc')??null }}">
    <meta property="article:modified_time" content="{{config('site.attributes.meta.article_last_update')??null }}">
    <meta property="og:updated_time" content="{{config('site.attributes.meta.article_last_update')??null }}">
    <meta property="fb:app_id" content="{{config('site.attributes.fb_app_id')??null }}">
    <meta property="og:type" content="{{config('site.attributes.meta.type')??null }}">
    <meta property="og:image" content="{{config('site.attributes.meta.article_url_image')??null }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{config('site.attributes.twitter_username')??null }}">
    <meta name="twitter:creator" content="{{config('site.attributes.twitter_username')??null }}">

    <meta name="adx:sections" content="{{config('site.attributes.meta.type')??null }}">
    <meta name="adx:keywords" content="{{config('site.attributes.meta.article_keyword')??null }}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato">
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    
    <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
    <script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
    
    @if( config('app.enabled_ads') )
        {!! Util::getAds('gpt') !!}
    @endif
    <style amp-custom>
        /*! tailwindcss v2.2.19 | MIT License | https://tailwindcss.com *//*! modern-normalize v1.1.0 | MIT License | https://github.com/sindresorhus/modern-normalize */*,::after,::before{box-sizing:border-box}html{-moz-tab-size:4;tab-size:4}html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}body{font-family:system-ui,-apple-system,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji'}hr{height:0;color:inherit}abbr[title]{-webkit-text-decoration:underline dotted;text-decoration:underline dotted}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace,SFMono-Regular,Consolas,'Liberation Mono',Menlo,monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;line-height:1.15;margin:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button}::-moz-focus-inner{border-style:none;padding:0}:-moz-focusring{outline:1px dotted ButtonText}:-moz-ui-invalid{box-shadow:none}legend{padding:0}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}button{background-color:transparent;background-image:none}fieldset{margin:0;padding:0}ol,ul{list-style:none;margin:0;padding:0}html{font-family:ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";line-height:1.5}body{font-family:inherit;line-height:inherit}*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:currentColor}hr{border-top-width:1px}img{border-style:solid}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:-moz-focusring{outline:auto}table{border-collapse:collapse}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}button,input,optgroup,select,textarea{padding:0;line-height:inherit;color:inherit}code,kbd,pre,samp{font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*,::after,::before{--tw-border-opacity:1;border-color:rgba(229,231,235,var(--tw-border-opacity))}
        /*! UI/UX Designer -- Alfaroni -- Copyright 2022 */
        /*! utilities */:root{--color-white:#FFFFFF;--color-black:#333333;--color-primary:#E50000;--color-border:#ECECEC;--color-gray:#999999;--bg-gray:#F5F5F5;--bg-gray-900:#E9E9E9;--bg-black-opacity:rgba(0,0,0,0.2);--breakpoint-xs:0;--breakpoint-sm:576px;--breakpoint-md:768px;--breakpoint-lg:992px;--breakpoint-xl:1200px;--font-primary:'Lato', sans-serif;--font-prompt:'Prompt', sans-serif}body{position:relative;font-size:14px;background-color:var(--color-white);color:var(--color-black);font-family:var(--font-primary);font-weight:normal;overflow-x:hidden}img{color:transparent}a:hover{color:var(--color-primary)}.font-prompt{font-family:var(--font-prompt)}.text-shadow{text-shadow:2px 2px 5px rgba(0,0,0,0.2)}.text-white{color:var(--color-white)}.text-black{color:var(--color-black)}.text-primary{color:var(--color-primary)}.text-gray{color:var(--color-gray)}.text-gray-900{color:var(--color-gray-900)}.bg-white{background-color:var(--color-white)}.bg-black{background-color:var(--color-black)}.bg-black-opacity{background-color:var(--bg-black-opacity)}.bg-primary{background-color:var(--color-primary)}.bg-gray{background-color:var(--bg-gray)}.bg-gray-900{background-color:var(--bg-gray-900)}.border,.rounded-border{border-width:1px}.border-b{border-bottom-width:1px}.border-t{border-top-width:1px}.border-l{border-left-width:1px}.border-r{border-right-width:1px}.border-primary,.rounded-border{border-color:var(--color-border)}.rounded-lg,.rounded-border{-webkit-transform:translateZ(0);border-radius:.5rem;overflow:hidden}.font-light{font-weight:300}.font-medium{font-weight:500}.font-semibold{font-weight:600}.font-bold{font-weight:700}.font-black{font-weight:900}.list-none{margin:0;padding:0;list-style-type:none}.overflow-hidden{overflow:hidden}.overflow-y-auto{overflow-y:auto}.overflow-x-auto{overflow-x:auto}.flex{display:flex}.flex-1{flex:1 1 0%}.flex-auto{flex:1 1 auto}.flex-initial{flex:0 1 auto}.flex-none{flex:none}.flex-shrink{flex-shrink:1}.flex-shrink-0{flex-shrink:0}.flex-grow{flex-grow:1}.flex-grow-0{flex-grow:0}.flex-row{flex-direction:row}.flex-row-reverse{flex-direction:row-reverse}.flex-col{flex-direction:column}.flex-col-reverse{flex-direction:column-reverse}.flex-wrap{flex-wrap:wrap}.flex-wrap-reverse{flex-wrap:wrap-reverse}.flex-nowrap{flex-wrap:nowrap}.items-start{align-items:flex-start}.items-end{align-items:flex-end}.items-center{align-items:center}.items-baseline{align-items:baseline}.items-stretch{align-items:stretch}.justify-start{justify-content:flex-start}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.justify-between{justify-content:space-between}.justify-around{justify-content:space-around}.justify-evenly{justify-content:space-evenly}.justify-items-start{justify-items:start}.justify-items-end{justify-items:end}.justify-items-center{justify-items:center}.justify-items-stretch{justify-items:stretch}small{display:block}.text-2{font-size:2px}.text-4{font-size:4px}.text-6{font-size:6px}.text-8{font-size:8px}.text-10{font-size:10px}.text-12{font-size:12px}.text-14{font-size:14px}.text-16{font-size:16px}.text-18{font-size:18px}.text-20{font-size:20px}.text-22{font-size:22px}.text-24{font-size:24px}.text-26{font-size:26px}.text-28{font-size:28px}.text-30{font-size:30px}.text-32{font-size:32px}.p-1{padding:.25rem}.pl-1{padding-left:.25rem}.pr-1{padding-right:.25rem}.pt-1{padding-top:.25rem}.pb-1{padding-bottom:.25rem}.px-1{padding-left:.25rem;padding-right:.25rem}.py-1{padding-top:.25rem;padding-bottom:.25rem}.m-1{margin:.25rem}.ml-1{margin-left:.25rem}.mr-1{margin-right:.25rem}.mt-1{margin-top:.25rem}.mb-1{margin-bottom:.25rem}.mx-1{margin-left:.25rem;margin-right:.25rem}.my-1{margin-top:.25rem;margin-bottom:.25rem}.-m-1{margin:-.25rem}.-ml-1{margin-left:-.25rem}.-mr-1{margin-right:-.25rem}.-mt-1{margin-top:-.25rem}.-mb-1{margin-bottom:-.25rem}.-mx-1{margin-left:-.25rem;margin-right:-.25rem}.-my-1{margin-top:-.25rem;margin-bottom:-.25rem}.p-2{padding:.5rem}.pl-2{padding-left:.5rem}.pr-2{padding-right:.5rem}.pt-2{padding-top:.5rem}.pb-2{padding-bottom:.5rem}.px-2{padding-left:.5rem;padding-right:.5rem}.py-2{padding-top:.5rem;padding-bottom:.5rem}.m-2{margin:.5rem}.ml-2{margin-left:.5rem}.mr-2{margin-right:.5rem}.mt-2{margin-top:.5rem}.mb-2{margin-bottom:.5rem}.mx-2{margin-left:.5rem;margin-right:.5rem}.my-2{margin-top:.5rem;margin-bottom:.5rem}.-m-2{margin:-.5rem}.-ml-2{margin-left:-.5rem}.-mr-2{margin-right:-.5rem}.-mt-2{margin-top:-.5rem}.-mb-2{margin-bottom:-.5rem}.-mx-2{margin-left:-.5rem;margin-right:-.5rem}.-my-2{margin-top:-.5rem;margin-bottom:-.5rem}.p-3{padding:.75rem}.pl-3{padding-left:.75rem}.pr-3{padding-right:.75rem}.pt-3{padding-top:.75rem}.pb-3{padding-bottom:.75rem}.px-3{padding-left:.75rem;padding-right:.75rem}.py-3{padding-top:.75rem;padding-bottom:.75rem}.m-3{margin:.75rem}.ml-3{margin-left:.75rem}.mr-3{margin-right:.75rem}.mt-3{margin-top:.75rem}.mb-3{margin-bottom:.75rem}.mx-3{margin-left:.75rem;margin-right:.75rem}.my-3{margin-top:.75rem;margin-bottom:.75rem}.-m-3{margin:-.75rem}.-ml-3{margin-left:-.75rem}.-mr-3{margin-right:-.75rem}.-mt-3{margin-top:-.75rem}.-mb-3{margin-bottom:-.75rem}.-mx-3{margin-left:-.75rem;margin-right:-.75rem}.-my-3{margin-top:-.75rem;margin-bottom:-.75rem}.p-4{padding:1rem}.pl-4{padding-left:1rem}.pr-4{padding-right:1rem}.pt-4{padding-top:1rem}.pb-4{padding-bottom:1rem}.px-4{padding-left:1rem;padding-right:1rem}.py-4{padding-top:1rem;padding-bottom:1rem}.m-4{margin:1rem}.ml-4{margin-left:1rem}.mr-4{margin-right:1rem}.mt-4{margin-top:1rem}.mb-4{margin-bottom:1rem}.mx-4{margin-left:1rem;margin-right:1rem}.my-4{margin-top:1rem;margin-bottom:1rem}.-m-4{margin:-1rem}.-ml-4{margin-left:-1rem}.-mr-4{margin-right:-1rem}.-mt-4{margin-top:-1rem}.-mb-4{margin-bottom:-1rem}.-mx-4{margin-left:-1rem;margin-right:-1rem}.-my-4{margin-top:-1rem;margin-bottom:-1rem}.p-5{padding:1.25rem}.pl-5{padding-left:1.25rem}.pr-5{padding-right:1.25rem}.pt-5{padding-top:1.25rem}.pb-5{padding-bottom:1.25rem}.px-5{padding-left:1.25rem;padding-right:1.25rem}.py-5{padding-top:1.25rem;padding-bottom:1.25rem}.m-5{margin:1.25rem}.ml-5{margin-left:1.25rem}.mr-5{margin-right:1.25rem}.mt-5{margin-top:1.25rem}.mb-5{margin-bottom:1.25rem}.mx-5{margin-left:1.25rem;margin-right:1.25rem}.my-5{margin-top:1.25rem;margin-bottom:1.25rem}.-m-5{margin:-1.25rem}.-ml-5{margin-left:-1.25rem}.-mr-5{margin-right:-1.25rem}.-mt-5{margin-top:-1.25rem}.-mb-5{margin-bottom:-1.25rem}.-mx-5{margin-left:-1.25rem;margin-right:-1.25rem}.-my-5{margin-top:-1.25rem;margin-bottom:-1.25rem}.p-6{padding:1.5rem}.pl-6{padding-left:1.5rem}.pr-6{padding-right:1.5rem}.pt-6{padding-top:1.5rem}.pb-6{padding-bottom:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-6{padding-top:1.5rem;padding-bottom:1.5rem}.m-6{margin:1.5rem}.ml-6{margin-left:1.5rem}.mr-6{margin-right:1.5rem}.mt-6{margin-top:1.5rem}.mb-6{margin-bottom:1.5rem}.mx-6{margin-left:1.5rem;margin-right:1.5rem}.my-6{margin-top:1.5rem;margin-bottom:1.5rem}.-m-6{margin:-1.5rem}.-ml-6{margin-left:-1.5rem}.-mr-6{margin-right:-1.5rem}.-mt-6{margin-top:-1.5rem}.-mb-6{margin-bottom:-1.5rem}.-mx-6{margin-left:-1.5rem;margin-right:-1.5rem}.-my-6{margin-top:-1.5rem;margin-bottom:-1.5rem}.p-7{padding:1.75rem}.pl-7{padding-left:1.75rem}.pr-7{padding-right:1.75rem}.pt-7{padding-top:1.75rem}.pb-7{padding-bottom:1.75rem}.px-7{padding-left:1.75rem;padding-right:1.75rem}.py-7{padding-top:1.75rem;padding-bottom:1.75rem}.m-7{margin:1.75rem}.ml-7{margin-left:1.75rem}.mr-7{margin-right:1.75rem}.mt-7{margin-top:1.75rem}.mb-7{margin-bottom:1.75rem}.mx-7{margin-left:1.75rem;margin-right:1.75rem}.my-7{margin-top:1.75rem;margin-bottom:1.75rem}.-m-7{margin:-1.75rem}.-ml-7{margin-left:-1.75rem}.-mr-7{margin-right:-1.75rem}.-mt-7{margin-top:-1.75rem}.-mb-7{margin-bottom:-1.75rem}.-mx-7{margin-left:-1.75rem;margin-right:-1.75rem}.-my-7{margin-top:-1.75rem;margin-bottom:-1.75rem}.p-8{padding:2rem}.pl-8{padding-left:2rem}.pr-8{padding-right:2rem}.pt-8{padding-top:2rem}.pb-8{padding-bottom:2rem}.px-8{padding-left:2rem;padding-right:2rem}.py-8{padding-top:2rem;padding-bottom:2rem}.m-8{margin:2rem}.ml-8{margin-left:2rem}.mr-8{margin-right:2rem}.mt-8{margin-top:2rem}.mb-8{margin-bottom:2rem}.mx-8{margin-left:2rem;margin-right:2rem}.my-8{margin-top:2rem;margin-bottom:2rem}.-m-8{margin:-2rem}.-ml-8{margin-left:-2rem}.-mr-8{margin-right:-2rem}.-mt-8{margin-top:-2rem}.-mb-8{margin-bottom:-2rem}.-mx-8{margin-left:-2rem;margin-right:-2rem}.-my-8{margin-top:-2rem;margin-bottom:-2rem}.p-9{padding:2.25rem}.pl-9{padding-left:2.25rem}.pr-9{padding-right:2.25rem}.pt-9{padding-top:2.25rem}.pb-9{padding-bottom:2.25rem}.px-9{padding-left:2.25rem;padding-right:2.25rem}.py-9{padding-top:2.25rem;padding-bottom:2.25rem}.m-9{margin:2.25rem}.ml-9{margin-left:2.25rem}.mr-9{margin-right:2.25rem}.mt-9{margin-top:2.25rem}.mb-9{margin-bottom:2.25rem}.mx-9{margin-left:2.25rem;margin-right:2.25rem}.my-9{margin-top:2.25rem;margin-bottom:2.25rem}.-m-9{margin:-2.25rem}.-ml-9{margin-left:-2.25rem}.-mr-9{margin-right:-2.25rem}.-mt-9{margin-top:-2.25rem}.-mb-9{margin-bottom:-2.25rem}.-mx-9{margin-left:-2.25rem;margin-right:-2.25rem}.-my-9{margin-top:-2.25rem;margin-bottom:-2.25rem}.p-10{padding:2.5rem}.pl-10{padding-left:2.5rem}.pr-10{padding-right:2.5rem}.pt-10{padding-top:2.5rem}.pb-10{padding-bottom:2.5rem}.px-10{padding-left:2.5rem;padding-right:2.5rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.m-10{margin:2.5rem}.ml-10{margin-left:2.5rem}.mr-10{margin-right:2.5rem}.mt-10{margin-top:2.5rem}.mb-10{margin-bottom:2.5rem}.mx-10{margin-left:2.5rem;margin-right:2.5rem}.my-10{margin-top:2.5rem;margin-bottom:2.5rem}.-m-10{margin:-2.5rem}.-ml-10{margin-left:-2.5rem}.-mr-10{margin-right:-2.5rem}.-mt-10{margin-top:-2.5rem}.-mb-10{margin-bottom:-2.5rem}.-mx-10{margin-left:-2.5rem;margin-right:-2.5rem}.-my-10{margin-top:-2.5rem;margin-bottom:-2.5rem}.p-11{padding:2.75rem}.pl-11{padding-left:2.75rem}.pr-11{padding-right:2.75rem}.pt-11{padding-top:2.75rem}.pb-11{padding-bottom:2.75rem}.px-11{padding-left:2.75rem;padding-right:2.75rem}.py-11{padding-top:2.75rem;padding-bottom:2.75rem}.m-11{margin:2.75rem}.ml-11{margin-left:2.75rem}.mr-11{margin-right:2.75rem}.mt-11{margin-top:2.75rem}.mb-11{margin-bottom:2.75rem}.mx-11{margin-left:2.75rem;margin-right:2.75rem}.my-11{margin-top:2.75rem;margin-bottom:2.75rem}.-m-11{margin:-2.75rem}.-ml-11{margin-left:-2.75rem}.-mr-11{margin-right:-2.75rem}.-mt-11{margin-top:-2.75rem}.-mb-11{margin-bottom:-2.75rem}.-mx-11{margin-left:-2.75rem;margin-right:-2.75rem}.-my-11{margin-top:-2.75rem;margin-bottom:-2.75rem}.p-12{padding:3rem}.pl-12{padding-left:3rem}.pr-12{padding-right:3rem}.pt-12{padding-top:3rem}.pb-12{padding-bottom:3rem}.px-12{padding-left:3rem;padding-right:3rem}.py-12{padding-top:3rem;padding-bottom:3rem}.m-12{margin:3rem}.ml-12{margin-left:3rem}.mr-12{margin-right:3rem}.mt-12{margin-top:3rem}.mb-12{margin-bottom:3rem}.mx-12{margin-left:3rem;margin-right:3rem}.my-12{margin-top:3rem;margin-bottom:3rem}.-m-12{margin:-3rem}.-ml-12{margin-left:-3rem}.-mr-12{margin-right:-3rem}.-mt-12{margin-top:-3rem}.-mb-12{margin-bottom:-3rem}.-mx-12{margin-left:-3rem;margin-right:-3rem}.-my-12{margin-top:-3rem;margin-bottom:-3rem}.p-13{padding:3.25rem}.pl-13{padding-left:3.25rem}.pr-13{padding-right:3.25rem}.pt-13{padding-top:3.25rem}.pb-13{padding-bottom:3.25rem}.px-13{padding-left:3.25rem;padding-right:3.25rem}.py-13{padding-top:3.25rem;padding-bottom:3.25rem}.m-13{margin:3.25rem}.ml-13{margin-left:3.25rem}.mr-13{margin-right:3.25rem}.mt-13{margin-top:3.25rem}.mb-13{margin-bottom:3.25rem}.mx-13{margin-left:3.25rem;margin-right:3.25rem}.my-13{margin-top:3.25rem;margin-bottom:3.25rem}.-m-13{margin:-3.25rem}.-ml-13{margin-left:-3.25rem}.-mr-13{margin-right:-3.25rem}.-mt-13{margin-top:-3.25rem}.-mb-13{margin-bottom:-3.25rem}.-mx-13{margin-left:-3.25rem;margin-right:-3.25rem}.-my-13{margin-top:-3.25rem;margin-bottom:-3.25rem}.p-14{padding:3.5rem}.pl-14{padding-left:3.5rem}.pr-14{padding-right:3.5rem}.pt-14{padding-top:3.5rem}.pb-14{padding-bottom:3.5rem}.px-14{padding-left:3.5rem;padding-right:3.5rem}.py-14{padding-top:3.5rem;padding-bottom:3.5rem}.m-14{margin:3.5rem}.ml-14{margin-left:3.5rem}.mr-14{margin-right:3.5rem}.mt-14{margin-top:3.5rem}.mb-14{margin-bottom:3.5rem}.mx-14{margin-left:3.5rem;margin-right:3.5rem}.my-14{margin-top:3.5rem;margin-bottom:3.5rem}.-m-14{margin:-3.5rem}.-ml-14{margin-left:-3.5rem}.-mr-14{margin-right:-3.5rem}.-mt-14{margin-top:-3.5rem}.-mb-14{margin-bottom:-3.5rem}.-mx-14{margin-left:-3.5rem;margin-right:-3.5rem}.-my-14{margin-top:-3.5rem;margin-bottom:-3.5rem}.p-15{padding:3.75rem}.pl-15{padding-left:3.75rem}.pr-15{padding-right:3.75rem}.pt-15{padding-top:3.75rem}.pb-15{padding-bottom:3.75rem}.px-15{padding-left:3.75rem;padding-right:3.75rem}.py-15{padding-top:3.75rem;padding-bottom:3.75rem}.m-15{margin:3.75rem}.ml-15{margin-left:3.75rem}.mr-15{margin-right:3.75rem}.mt-15{margin-top:3.75rem}.mb-15{margin-bottom:3.75rem}.mx-15{margin-left:3.75rem;margin-right:3.75rem}.my-15{margin-top:3.75rem;margin-bottom:3.75rem}.-m-15{margin:-3.75rem}.-ml-15{margin-left:-3.75rem}.-mr-15{margin-right:-3.75rem}.-mt-15{margin-top:-3.75rem}.-mb-15{margin-bottom:-3.75rem}.-mx-15{margin-left:-3.75rem;margin-right:-3.75rem}.-my-15{margin-top:-3.75rem;margin-bottom:-3.75rem}.p-16{padding:4rem}.pl-16{padding-left:4rem}.pr-16{padding-right:4rem}.pt-16{padding-top:4rem}.pb-16{padding-bottom:4rem}.px-16{padding-left:4rem;padding-right:4rem}.py-16{padding-top:4rem;padding-bottom:4rem}.m-16{margin:4rem}.ml-16{margin-left:4rem}.mr-16{margin-right:4rem}.mt-16{margin-top:4rem}.mb-16{margin-bottom:4rem}.mx-16{margin-left:4rem;margin-right:4rem}.my-16{margin-top:4rem;margin-bottom:4rem}.-m-16{margin:-4rem}.-ml-16{margin-left:-4rem}.-mr-16{margin-right:-4rem}.-mt-16{margin-top:-4rem}.-mb-16{margin-bottom:-4rem}.-mx-16{margin-left:-4rem;margin-right:-4rem}.-my-16{margin-top:-4rem;margin-bottom:-4rem}.p-17{padding:4.25rem}.pl-17{padding-left:4.25rem}.pr-17{padding-right:4.25rem}.pt-17{padding-top:4.25rem}.pb-17{padding-bottom:4.25rem}.px-17{padding-left:4.25rem;padding-right:4.25rem}.py-17{padding-top:4.25rem;padding-bottom:4.25rem}.m-17{margin:4.25rem}.ml-17{margin-left:4.25rem}.mr-17{margin-right:4.25rem}.mt-17{margin-top:4.25rem}.mb-17{margin-bottom:4.25rem}.mx-17{margin-left:4.25rem;margin-right:4.25rem}.my-17{margin-top:4.25rem;margin-bottom:4.25rem}.-m-17{margin:-4.25rem}.-ml-17{margin-left:-4.25rem}.-mr-17{margin-right:-4.25rem}.-mt-17{margin-top:-4.25rem}.-mb-17{margin-bottom:-4.25rem}.-mx-17{margin-left:-4.25rem;margin-right:-4.25rem}.-my-17{margin-top:-4.25rem;margin-bottom:-4.25rem}.p-18{padding:4.5rem}.pl-18{padding-left:4.5rem}.pr-18{padding-right:4.5rem}.pt-18{padding-top:4.5rem}.pb-18{padding-bottom:4.5rem}.px-18{padding-left:4.5rem;padding-right:4.5rem}.py-18{padding-top:4.5rem;padding-bottom:4.5rem}.m-18{margin:4.5rem}.ml-18{margin-left:4.5rem}.mr-18{margin-right:4.5rem}.mt-18{margin-top:4.5rem}.mb-18{margin-bottom:4.5rem}.mx-18{margin-left:4.5rem;margin-right:4.5rem}.my-18{margin-top:4.5rem;margin-bottom:4.5rem}.-m-18{margin:-4.5rem}.-ml-18{margin-left:-4.5rem}.-mr-18{margin-right:-4.5rem}.-mt-18{margin-top:-4.5rem}.-mb-18{margin-bottom:-4.5rem}.-mx-18{margin-left:-4.5rem;margin-right:-4.5rem}.-my-18{margin-top:-4.5rem;margin-bottom:-4.5rem}.p-19{padding:4.75rem}.pl-19{padding-left:4.75rem}.pr-19{padding-right:4.75rem}.pt-19{padding-top:4.75rem}.pb-19{padding-bottom:4.75rem}.px-19{padding-left:4.75rem;padding-right:4.75rem}.py-19{padding-top:4.75rem;padding-bottom:4.75rem}.m-19{margin:4.75rem}.ml-19{margin-left:4.75rem}.mr-19{margin-right:4.75rem}.mt-19{margin-top:4.75rem}.mb-19{margin-bottom:4.75rem}.mx-19{margin-left:4.75rem;margin-right:4.75rem}.my-19{margin-top:4.75rem;margin-bottom:4.75rem}.-m-19{margin:-4.75rem}.-ml-19{margin-left:-4.75rem}.-mr-19{margin-right:-4.75rem}.-mt-19{margin-top:-4.75rem}.-mb-19{margin-bottom:-4.75rem}.-mx-19{margin-left:-4.75rem;margin-right:-4.75rem}.-my-19{margin-top:-4.75rem;margin-bottom:-4.75rem}.p-20{padding:5rem}.pl-20{padding-left:5rem}.pr-20{padding-right:5rem}.pt-20{padding-top:5rem}.pb-20{padding-bottom:5rem}.px-20{padding-left:5rem;padding-right:5rem}.py-20{padding-top:5rem;padding-bottom:5rem}.m-20{margin:5rem}.ml-20{margin-left:5rem}.mr-20{margin-right:5rem}.mt-20{margin-top:5rem}.mb-20{margin-bottom:5rem}.mx-20{margin-left:5rem;margin-right:5rem}.my-20{margin-top:5rem;margin-bottom:5rem}.-m-20{margin:-5rem}.-ml-20{margin-left:-5rem}.-mr-20{margin-right:-5rem}.-mt-20{margin-top:-5rem}.-mb-20{margin-bottom:-5rem}.-mx-20{margin-left:-5rem;margin-right:-5rem}.-my-20{margin-top:-5rem;margin-bottom:-5rem}.w-1\/1{width:100%}.w-1\/2{width:50%}.w-1\/3{width:33.33333%}.w-1\/4{width:25%}.w-1\/5{width:20%}.w-1\/6{width:16.66667%}.w-1\/7{width:14.28571%}.w-1\/8{width:12.5%}.w-1\/9{width:11.11111%}.w-1\/10{width:10%}.w-1\/11{width:9.09091%}.w-1\/12{width:8.33333%}.swiper-button-prev{left:-18px;background-image:url(data:image/svg+xml;charset%3DUS-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2240%22%20height%3D%2240%22%20fill%3D%22none%22%20viewBox%3D%220%200%2040%2040%22%3E%3Cpath%20fill%3D%22%23fff%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2037c9.389%200%2017-7.611%2017-17S29.389%203%2020%203%203%2010.611%203%2020s7.611%2017%2017%2017z%22%20clip-rule%3D%22evenodd%22%2F%3E%3Cpath%20fill%3D%22%23E50000%22%20fill-rule%3D%22evenodd%22%20d%3D%22M19.202%2019.999l5.13-4.267a.255.255%200%200%200%20.089-.171.248.248%200%200%200-.061-.182l-1.13-1.291a.253.253%200%200%200-.174-.087.263.263%200%200%200-.186.06l-2.502%202.12-4.28%203.629a.248.248%200%200%200%200%20.378l6.782%205.751c.047.04.106.061.167.061a.272.272%200%200%200%20.194-.087l1.129-1.291a.244.244%200%200%200%20.06-.183.242.242%200%200%200-.089-.17l-5.13-4.27z%22%20clip-rule%3D%22evenodd%22%2F%3E%3C%2Fsvg%3E)}.swiper-button-next{right:-18px;background-image:url(data:image/svg+xml;charset%3DUS-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2240%22%20height%3D%2240%22%20fill%3D%22none%22%20viewBox%3D%220%200%2040%2040%22%3E%3Cpath%20fill%3D%22%23fff%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%203C10.611%203%203%2010.611%203%2020s7.611%2017%2017%2017%2017-7.611%2017-17S29.389%203%2020%203z%22%20clip-rule%3D%22evenodd%22%2F%3E%3Cpath%20fill%3D%22%23E50000%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20.798%2020.001l-5.13%204.267a.255.255%200%200%200-.089.171.248.248%200%200%200%20.061.182l1.13%201.291a.253.253%200%200%200%20.174.087.263.263%200%200%200%20.186-.06l2.502-2.12%204.28-3.629a.248.248%200%200%200%200-.378l-6.782-5.751a.257.257%200%200%200-.167-.061.27.27%200%200%200-.194.088l-1.129%201.29a.244.244%200%200%200-.06.182.245.245%200%200%200%20.089.171l5.13%204.27z%22%20clip-rule%3D%22evenodd%22%2F%3E%3C%2Fsvg%3E)}.swiper-button-prev,.swiper-button-next{width:36px;height:36px;background-size:contain;background-repeat:no-repeat;top:0;margin-top:37px}.swiper-button-prev::after,.swiper-button-next::after{display:none }.container{position:relative;max-width:none;margin-left:auto;margin-right:auto}.w-kly{width:1056px ;max-width:none }.max-w-full{max-width:100%}.form-group{display:flex;align-items:center;min-width:280px;min-height:34px;border-radius:8px;overflow:hidden;border:1px solid var(--color-border)}.form-control{outline:none ;flex:1;width:100%;min-height:36px;padding-left:.75rem;padding-right:.75rem;background-color:transparent;font-size:12px}.form-btn .btn{outline:none ;min-height:100%;padding-left:.75rem;padding-right:.75rem}
        
        /*! icons */
        .icon::after,
        .icon--image {
            width: 18px;
            height: 18px;
        }
        .icon {
            display: inline-block;
            vertical-align: middle;
            margin-top: -3px;
        }
        .icon::after {
            content: "";
            display: block;
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
        }
        .icon--sm::after {
            width: 14px;
            height: 14px;
        }
        .icon--image {
            object-fit: contain;
            object-position: center;
        }
        .icon--search::after {
            background-image: url("{{ Src::asset('img/amp/1.png') }}");
        }
        .icon--caretdown::after {
            border-left: 4px solid transparent;
            border-right: 4px solid transparent;
            border-top: 4px solid;
            width: 0;
            height: 0;
        }
        .icon--chevronright::after {
            background-image: url("{{ Src::asset('img/amp/2.png') }}");
            width: 8px;
            height: 8px;
        }
        .icon--backtop::after {
            background-image: url("{{ Src::asset('img/amp/3.png') }}");
        }
        .icon--lip6::after {
            background-image: url("{{ Src::asset('img/amp/4.png') }}");
        }
        .icon--brilio::after {
            background-image: url("{{ Src::asset('img/amp/5.png') }}");
        }
        .icon--kl::after {
            background-image: url("{{ Src::asset('img/amp/6.png') }}");
        }
        .icon--drm::after {
            background-image: url("{{ Src::asset('img/amp/7.png') }}");
        }
        .icon--bolacom::after {
            background-image: url("{{ Src::asset('img/amp/8.png') }}");
            background-size: auto 12px;
        }
        .icon--famous::after {
            background-image: url("{{ Src::asset('img/amp/9.png') }}");
        }
        .icon--mdk::after {
            background-image: url("{{ Src::asset('img/amp/10.png') }}");
        }
        .icon--bolanet::after {
            background-image: url("{{ Src::asset('img/amp/11.png') }}");
        }
        .icon--fimela::after {
            background-image: url("{{ Src::asset('img/amp/12.png') }}");
        }
        .icon--otosia::after {
            background-image: url("{{ Src::asset('img/amp/13.png') }}");
        }
        .icon--facebook::after {
            background-image: url("{{ Src::asset('img/amp/14.png') }}");
        }
        .icon--twitter::after {
            background-image: url("{{ Src::asset('img/amp/15.png') }}");
        }
        .icon--vidio::after {
            background-image: url("{{ Src::asset('img/amp/16.png') }}");
        }
        .icon--menu::after {
            background-image: url("{{ Src::asset('img/amp/17.png') }}");
        }
        .icon--close::after {
            background-image: url("{{ Src::asset('img/amp/18.png') }}");
        }
        .icon--nav {
            margin-right: 1rem;
        }
        .icon--nav-avatar::after {
            background-image: url("{{ Src::asset('img/amp/19.png') }}");
        }
        .icon--nav-utama::after {
            background-image: url("{{ Src::asset('img/amp/20.png') }}");
        }
        .icon--nav-terkini::after {
            background-image: url("{{ Src::asset('img/amp/21.png') }}");
        }
        .icon--nav-populer::after {
            background-image: url("{{ Src::asset('img/amp/22.png') }}");
        }
        .icon--nav-rekomendasi::after {
            background-image: url("{{ Src::asset('img/amp/23.png') }}");
        }
        .icon--nav-berita::after {
            background-image: url("{{ Src::asset('img/amp/24.png') }}");
        }
        .icon--nav-review::after {
            background-image: url("{{ Src::asset('img/amp/25.png') }}");
        }
        .icon--nav-brand::after {
            background-image: url("{{ Src::asset('img/amp/26.png') }}");
        }
        .icon--nav-tips::after {
            background-image: url("{{ Src::asset('img/amp/27.png') }}");
        }
        .icon--nav-etalase::after {
            background-image: url("{{ Src::asset('img/amp/28.png') }}");
        }
        .icon--nav-galeri::after {
            background-image: url("{{ Src::asset('img/amp/29.png') }}");
        }
        .icon--nav-photo::after {
            background-image: url("{{ Src::asset('img/amp/30.png') }}");
        }
        .icon--nav-video::after {
            background-image: url("{{ Src::asset('img/amp/31.png') }}");
        }
        .icon--maxphoto::after {
            background-image: url("{{ Src::asset('img/amp/32.png') }}");
        }
        .icon--photo::after {
            background-image: url("{{ Src::asset('img/amp/33.png') }}");
        }
        .icon--video::after {
            background-image: url("{{ Src::asset('img/amp/34.png') }}");
        }
        .icon--share-fb::after {
            background-image: url("{{ Src::asset('img/amp/35.png') }}");
        }
        .icon--share-wa::after {
            background-image: url("{{ Src::asset('img/amp/36.png') }}");
        }
        .icon--share-line::after {
            background-image: url("{{ Src::asset('img/amp/37.png') }}");
        }
        .icon--share-tweet::after {
            background-image: url("{{ Src::asset('img/amp/38.png') }}");
        }
        .icon--share-pin::after {
            background-image: url("{{ Src::asset('img/amp/39.png') }}");
        }
        .icon--share-gplus::after {
            background-image: url("{{ Src::asset('img/amp/40.png') }}");
        }
        .icon--share-mail::after {
            background-image: url("{{ Src::asset('img/amp/41.png') }}");
        }
        .icon--notFound::after {
            width: 90px;
            height: 68px;
            background-image: url("{{ Src::asset('img/amp/42.png') }}");
        }
        .icon--youtube::after {
            background-image: url("{{ Src::asset('img/amp/icon-yt.jpeg') }}");
        }
        .icon--instagram::after {
            background-image: url("{{ Src::asset('img/amp/icon-ig.jpeg') }}");
        }

        /*! header */.header{background-color:var(--color-white);box-shadow:0 3px 4px 0 rgba(52,52,52,0.18);z-index:20}.header-btn{min-height:50px}.header-logo{background-size:contain;background-repeat:no-repeat;background-position:center;display:inline-block;text-indent:-999px}.header-collapse{position:fixed;top:0;left:0;right:0;bottom:0;z-index:20;overflow-y:auto;background-color:var(--color-white)}.header-collapse-overlay{position:absolute;top:0;left:0;width:100%;height:100%;background-color:var(--bg-black-opacity);z-index:-1}.header-collapse-inner{background-color:var(--color-white);position:relative;z-index:1}.header-collapse-title{font-size:13px;font-weight:700;text-transform:uppercase}.header-collapse-item:not(:first-child){border-top:1px solid var(--color-border)}.header-collapse-nav-item a{display:block;padding-top:.5rem;padding-bottom:.5rem;font-size:16px}.header-collapse--menu{transition:transform .5s ease;transform:translateX(-100%)}.header-collapse--menu.open{transform:translateX(0)}.header-collapse--menu .header-collapse-inner{height:100%}.header-collapse--menu .header-collapse-header,.header-collapse--menu .header-collapse-footer{min-height:50px}.header-collapse--menu .header-collapse-header{border-bottom:1px solid var(--color-border)}.header-collapse--menu .header-collapse-footer{background-color:var(--bg-gray)}.header-collapse--searchbar{top:50px;opacity:0;pointer-events:none;transition:opacity .5s ease}.header-collapse--searchbar.open{opacity:1;pointer-events:auto}.header-collapse--searchbar .header-collapse-body .form-group{background-color:var(--bg-gray)}
        /*! footer */.footer{font-size: 12px;background-color: var(--color-black);color: var(--color-white);border-top: 4px solid var(--color-primary);}.footer .header-logo{filter: brightness(0) invert(1);}.footer-item:not(:first-child){border-top:0px solid var(--color-border)}.footer-title{font-size:14px;font-weight:700;color:var(--color-black);text-transform:uppercase}.footer-nav,.footer-channels{margin:-.25rem}.footer-nav-item,.footer-channels-item{padding:.25rem}.footer-nav-item .icon,.footer-channels-item .icon{margin-right:.25rem;margin-left:-.25rem}.footer-nav{color:var(--color-black)}.footer-socmed{margin-top:1rem}.footer-socmed-item{margin-right:.5rem}.footer-copyright{display:block;text-align:center;background-color: var(--color-black);color: var(--color-white)}
        /*! components */@keyframes marquee{0%{transform:translate(100%, 0);transform:translate(20%, 0)}100%{transform:translate(-100%, 0)}}.aspect-\[19\/11\]{aspect-ratio:19 / 11}.aspect-\[16\/9\]{aspect-ratio:16 / 9}.aspect-\[300\/172\]{aspect-ratio:300 / 172}.aspect-\[212\/115\]{aspect-ratio:212 / 115}.aspect-square{aspect-ratio:1 / 1}.item{position:relative;overflow:hidden}.item-vidio,.item-img{background-color:var(--color-border);position:relative;display:block;overflow:hidden}.item-vidio{border-radius:8px}.item-vidio-inner{margin:-5px}.item-vidio-inner iframe{aspect-ratio:16 / 9;width:100%;height:auto}.item-img{width:100%}.item-img-info{position:absolute;right:0;bottom:0;font-family:var(--font-prompt);background-color:var(--bg-black-opacity);color:var(--color-white);padding:.25rem .5rem;font-size:12px;z-index:2}.item-img a,.item-img img{display:block;width:100%;height:100%}.item-img img{object-fit:cover}.item-img[data-duration]:hover .icon--play{opacity:1}.item-img[data-duration] .icon--play{position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);opacity:0;transition:opacity .5s ease;z-index:2}.item-img[data-duration]::after{content:attr(data-duration);position:absolute;right:0;bottom:0;font-family:var(--font-prompt);background-color:var(--bg-black-opacity);color:var(--color-white);padding:.25rem .5rem;font-size:12px;z-index:2}.item-desc{position:relative;line-height:1.4}.item-desc-tag,.item-desc-time{color:var(--color-gray);display:inline-block;vertical-align:top}.item-desc-tag{font-weight:700;text-transform:uppercase;color:var(--color-primary)}.item-desc-title,.item-desc-text{overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical}.backtop{background-color:var(--bg-black-opacity);border-radius:4px;position:fixed;bottom:6.25rem;right:2rem;width:36px;height:36px;display:flex;align-items:center;justify-content:center;opacity:0;pointer-events:none;transition:opacity .5s ease}.backtop.show{opacity:1;pointer-events:auto}.articles{padding-top:1.6rem;padding-bottom:1.6rem}.articles:not(:first-of-type){border-top:1px solid var(--color-border)}.section--infscroll{min-height:1000px;border-top:1px solid var(--color-border)}.section--infscroll-list-item:not(:first-of-type){border-top:1px solid var(--color-border)}.section--infscroll-list-item:first-of-type ~ div{display:none}.section--infscroll-next{min-height:60px}.section--infscroll-next.finished .section--infscroll-next-loading{display:none}.section--infscroll-next.finished .section--infscroll-next-btn{display:block}.section--infscroll-next-btn{display:none}.section--infscroll-next-btn-link{border:1px solid var(--color-primary);color:var(--color-primary);padding:.5rem 1rem;display:block}.main-nav .swiper-slide a,.main-breaking-title,.main-breaking-main{display:flex;align-items:center;padding-left:1rem;padding-right:1rem}.main-nav .swiper-slide{width:auto}.main-nav .swiper-slide a{min-height:40px;color:var(--color-gray);border-bottom:2px solid transparent}.main-nav .swiper-slide.active a{color:var(--color-black);border-bottom-color:var(--color-primary)}.main-breaking{position:relative;background-color:var(--color-primary);margin-top:-2px;z-index:10}.main-breaking-title,.main-breaking-main{min-height:35px}.main-breaking-title{font-style:italic;text-transform:uppercase;background-color:var(--color-black);color:var(--color-white);white-space:nowrap;padding-right:.25rem;position:relative;z-index:10}.main-breaking-title::after{content:"";border-right:20px solid transparent;border-top:35px solid var(--color-black);position:absolute;top:0;right:-20px}.main-breaking-main{overflow:hidden}.main-breaking-text{white-space:nowrap;color:var(--color-white) ;animation:marquee 15s linear infinite}.main-breaking-text:hover{animation-play-state:paused}.section:not(:first-of-type){margin-top:2rem}.section-title{font-family:var(--font-prompt);font-weight:700;font-style:italic}.section-title-linkall{font-weight:400;font-style:normal;color:var(--color-gray)}.section-title-linkall .icon::after{margin-top:0}.section--trending-list{margin-top:-1rem;min-height:152px}.section--trending-list-item a{display:flex;align-items:center;text-transform:uppercase;padding-top:1rem;font-weight:700}.section--trending-list-item a::before{content:"#";display:inline-block;color:var(--color-primary);margin-right:.5rem}.section--promotion-list{-ms-overflow-style:none;scrollbar-width:none}.section--promotion-list-item{min-width:212px;max-width:212px}

        /*! detail */.rounded-full{border-radius:50%}.block{display:block}.inline-block{display:inline-block}.share{gap:10px}.share-item a{display:flex;align-items:center;justify-content:center;border-radius:15px;width:60px;height:35px}.share-item a .icon{margin-top:0}.share-item--fb a{background-color:#4A6DB4}.share-item--wa a{background-color:#86C747}.share-item--line a{background-color:#54D057}.share-item--tweet a{background-color:#1DADEB}.share-item--pin a{background-color:#CE0F19}.share-item--gplus a{background-color:#9D2B24}.share-item--mail a{background-color:#FF5722}.dt-info-detail{display:block;color:var(--color-gray)}.dt-info-link{color:var(--color-primary)}.dt-paragraph p{margin-bottom:1.5rem;font-size:18px;line-height:1.8}.dt-paragraph p a{color:var(--color-primary)}.dt-box:not(:last-child){margin-bottom:2rem}.dt-box--crosslink{background-color:var(--bg-gray)}.dt-box--crosslink-list-item{position:relative;line-height:1.8}.dt-box--crosslink-list-item::before{content:"";position:absolute;width:6px;height:6px;background-color:var(--color-primary);top:22px;left:-20px;margin:auto}.dt-box--crosslink-list-item:not(:first-of-type){border-top:1px solid var(--color-border)}.section--trending-bredcrumb-item{margin-right:10px;margin-bottom:10px}.section--trending-bredcrumb-item:nth-child(1n+4){display:none}.section--trending-bredcrumb-item#more_tag{display:block}.section--trending-bredcrumb-item#more_tag span{display:block;padding:4px 12px;border:1px solid var(--color-border);border-color:var(--color-primary);color:var(--color-primary)}.section--trending-bredcrumb-item a{display:block;padding:4px 12px;border:1px solid var(--color-border)}.section--trending-bredcrumb.show .section--trending-bredcrumb-item:nth-child(1n+4){display:block}.section--topik .topik{gap:10px}.section--topik .topik-item{display:block;border:1px solid #FF9F87;border-radius:30px;padding:10px 14px;background-color:#FFF3EB;color:var(--color-primary);position:relative}.section--topik .topik-item::before{content:"#"}.tabs-btn{background-color:var(--bg-gray);text-align:center}.tabs-btn-item{box-shadow:inset 0 -1px 0 0 var(--color-gray)}.tabs-btn-item.active{box-shadow:inset 0 -3px 0 0 var(--color-primary)}.tabs-btn-item-info{width:20px;height:20px;background-color:var(--color-primary);border-radius:50%;color:var(--color-white);display:inline-block;transform:translateY(-5px);font-size:11px;padding:1px 6px;text-align:left}.tabs-content-item{display:none}.tabs-content-item.show{display:block}.paginationlist-item:not(:first-child){margin-left:8px}.paginationlist-item a{display:flex;align-items:center;justify-content:center;border-radius:8px;min-width:36px;min-height:36px;padding-left:.75rem;padding-right:.75rem;background-color:#E5E5E5;font-weight:700}.paginationlist-item a .iconSVG{width:12px;height:12px}.paginationlist-item.active a,.paginationlist-item a:hover{background-color:var(--color-primary);color:var(--color-white)}.paginationlist-item.active a .iconSVG,.paginationlist-item a:hover .iconSVG{fill:var(--color-white)}.section--index .item,.tabs-recommend .item{box-shadow:0 4px 8px 0 rgba(0,0,0,0.08),0 6px 20px 0 rgba(0,0,0,0.08);margin-bottom:20px}

        /*! amp */.main-nav .swiper{overflow-x:auto;-webkit-overflow-scrolling:touch}.main-nav .swiper-wrapper{display:flex;min-width:385px;padding-bottom:2px}.main-breadcrumb-item{color:var(--color-gray)}.main-breadcrumb-item:not(:last-of-type)::after{content:">";margin-right:.5rem;margin-left:.5rem}.main-breadcrumb-item.active{color:var(--color-primary)}.section--popular-list{counter-reset:popular}.section--popular-list-item{border-top:1px solid var(--color-border)}.section--popular-list-item .item-desc{padding-left:80px;min-height:108px;display:flex;justify-content:center;flex-flow:column}.section--popular-list-item .item-desc::before{counter-increment:popular;content:counter(popular);font-family:var(--font-prompt);color:var(--color-border);font-style:italic;font-weight:700;font-size:42px;position:absolute;width:80px;height:50px;display:flex;align-items:center;justify-content:center;top:50%;left:0;margin-top:-25px}.section--popular-list-item .item-number{display:inline-block;letter-spacing:-4.3px;text-align:center;color:#DDD;font-size:50px;font-weight:600;width:45px;margin:10px 15px 0}.icon--chevronright::after{background-image:url("data:image/svg+xml;charset%3DUS-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%224%22%20height%3D%228%22%20fill%3D%22none%22%20viewBox%3D%220%200%204%208%22%3E%3Cpath%20fill%3D%22%23E50000%22%20fill-rule%3D%22evenodd%22%20d%3D%22M.667%200C.51%200%200%20.778%200%20.778%200%20.715%202.667%203.89%202.667%203.89L0%207.003c0%20.198.667.778.667.778C.63%207.78%204%203.89%204%203.89%204%203.822.667%200%20.667%200z%22%20clip-rule%3D%22evenodd%22%2F%3E%3C%2Fsvg%3E");width:8px;height:8px}
        
        /*! header subkanal */.subkanal__title,.subkanal__list_item a{font-family:"Open Sans",sans-serif;font-size:14px;padding:2px 10px;color:#999;font-weight:normal}.subkanal-header__title,.subkanal-header__lead{font-family:"Noto Sans",sans-serif;color:#333;font-size:12px}.subkanal{display:flex;justify-content:space-between;padding:10px 0;background-color:#f9f9f9}.subkanal__title{padding-left:15px;padding-right:15px;border-right:1px solid #ececec;font-weight:700}.subkanal__list{flex:1;display:flex;white-space:nowrap;flex-flow:nowrap;overflow-x:auto}.subkanal__list::-webkit-scrollbar{display:none}.subkanal__list_item:first-child{padding-left:5px}.subkanal__list_item:last-child{padding-right:5px}.subkanal__list_item a{display:block}.subkanal__list_item.active a{color:#CD2027}.subkanal-header{margin-top:15px}.subkanal-header__title{font-size:20px;font-weight:700;margin-bottom:5px;text-transform:uppercase}

        iframe {
            max-width: 100%;
            margin: auto;
        }
        .header-item .header-collapse-nav-item.active a{
            color: #CD2027;
        }
        .text-center {
            text-align: center;
        }
        .footer-nav {
            display: inline-flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 8px 14px;
        }
        .footer-nav-item {
            color: var(--color-white);
            font-size: 15px;
            font-weight:900
        }
        /*! custom(footer) */
        .body{
                max-width: 720px;
                margin: 0 auto;
            }
        .channel-ad_ad-sc,.channel-ad_ad-sc2,.channel-ad_ad-headline{
            margin:15px 0;
        }
        .header-collapse {
            background-color: unset;
        }
        .header-logo {
            width: 200px;
            height: 40px;
        }
    </style>
    @stack('preload')
    <!-- <link rel="stylesheet" href="sass/style.min.css"> -->
  </head>
  <body [class]="menu || searchbar ? 'overflow-hidden' : ''">
    <div class="body">
        <!--header-->
        @include('defaultsite/mobile/amp/components/header')
    
        <!--main-->
        <main class="main pb-8" role="main">
          <div class="container max-w-full">
            @yield('content')
          </div>
        </main>
        <!--footer-->
        @include('defaultsite/mobile/amp/components/footer')
    </div>
    @stack('script')

    @if( config('app.enabled_ads') )
    {!! Util::getAds('after-body') !!}
    @endif
  </body>
</html>
