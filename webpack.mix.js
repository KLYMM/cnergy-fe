const mix = require("laravel-mix");
const path = "resources/assets/";

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 */

//DEFAULTSITE - MOBILE
var sitePath = "defaultsite/mobile-v2/";
//css global
mix.postCss(path + sitePath + "css/font.css", sitePath + "css");
mix.postCss(path + sitePath + "css/vendor.css", sitePath + "css");
mix.postCss(path + sitePath + "css/utilities.css", sitePath + "css");
mix.postCss(path + sitePath + "css/icons.css", sitePath + "css");
mix.postCss(path + sitePath + "css/header.css", sitePath + "css");
mix.postCss(path + sitePath + "css/footer.css", sitePath + "css");
mix.postCss(path + sitePath + "css/components.css", sitePath + "css");
mix.postCss(path + sitePath + "css/paging.css", sitePath + "css");
mix.postCss(path + sitePath + "css/styles-maverick.css", sitePath + "css");
mix.postCss(path + sitePath + "css/detail-maverick.css", sitePath + "css");
mix.postCss(path + sitePath + "css/styles-mobile.css", sitePath + "css");
mix.postCss(path + sitePath + "css/styles.css", sitePath + "css");

//css page
mix.postCss(path + sitePath + "css/detail.css", sitePath + "css");
mix.postCss(path + sitePath + "css/tag.css", sitePath + "css");

//js global
//mix.js( [path + sitePath + "js/main.js"], 'public/static/'+ sitePath +'js/main.js');
mix.copyDirectory(path + sitePath + "js", "public/static/" + sitePath + "js");

//img
mix.copyDirectory(path + sitePath + "img", "public/static/" + sitePath + "img");

// detail tes
mix.postCss(path + sitePath + "detail/css/color.css", sitePath + "detail/css");
mix.postCss(path + sitePath + "detail/css/main.css", sitePath + "detail/css");
mix.postCss(
    path + sitePath + "detail/css/trstdly.css",
    sitePath + "detail/css"
);

// //DEFAULTSITE - DESKTOP
// var sitePath = "defaultsite/desktop/";
// //css global

// mix.postCss(path + sitePath + "css/font.css", sitePath + "css");
// mix.postCss(path + sitePath + "css/vendor.css", sitePath + "css");
// mix.postCss(path + sitePath + "css/utilities.css", sitePath + "css");
// mix.postCss(path + sitePath + "css/icons.css", sitePath + "css");
// mix.postCss(path + sitePath + "css/header.css", sitePath + "css");
// mix.postCss(path + sitePath + "css/footer.css", sitePath + "css");
// mix.postCss(path + sitePath + "css/components.css", sitePath + "css");
// mix.postCss(path + sitePath + "css/paging.css", sitePath + "css");

// //css page
// mix.postCss(path + sitePath + "css/detail.css", sitePath + "css");
// mix.postCss(path + sitePath + "css/tag.css", sitePath + "css");

// //js global
// //mix.js( [path + sitePath + "js/main.js"], 'public/static/'+ sitePath +'js/main.js');
// mix.copyDirectory(path + sitePath + "js", "public/static/" + sitePath + "js");

// //img
// mix.copyDirectory(path + sitePath + "img", "public/static/" + sitePath + "img");

mix.options({
    postCss: [
        require("postcss-discard-comments")({
            removeAll: true,
        }),
    ],
    uglify: {
        comments: false,
    },
});

mix.setPublicPath("public/static");

if (mix.inProduction()) {
    mix.version();
    mix.then(() => {
        const convertToFileHash = require("laravel-mix-make-file-hash");
        convertToFileHash({
            publicPath: "public/static",
            manifestFilePath: "public/static/mix-manifest.json",
            blacklist: ["gif"],
        });
    });
}
