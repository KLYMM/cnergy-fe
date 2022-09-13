//scroll
var $header = $('.header').offset().top;
var $footer = $('.footer').height();
var itemstoshow = 1;

$('.section--infscroll-list-item:nth-of-type(n+2)').filter(function (index) {
    return (($(this).offset().top) > $(window).height() - $footer);
}).hide();

$(window).scroll(function () {

    $('.backtop').toggleClass('show', $(this).scrollTop() > 200);
    $('.header').toggleClass('sticky', $(this).scrollTop() > $header);

    if( $('.section--infscroll').length){
        if ($(window).scrollTop() >= $(".section--infscroll").offset().top + $(".section--infscroll").outerHeight() - $(window).height() - 200){
            $('.section--infscroll-list-item:hidden:lt(' + itemstoshow + ')').delay(1000).fadeIn(500)
        }
        if ($('.section--infscroll-list-item:last-of-type').is(":visible")) {
            $('.section--infscroll-next').addClass('finished');
        }
    }

});

//backtop
$(document).on('click', ".backtop", function() {
    $("html, body").animate({scrollTop: 0}, 1000);
});

//extra-nav
$(document).on('click', ".header-extra-nav", function() {
    if ($(".header-nav-item-menu.open").length>0) {
        $(".header-nav-item-menu").removeClass('open');
    } else {
        $(".header-nav-item-menu").addClass('open');
    }
});

// flatpickr('.flatpickr', {
//     // Put configs here
//     maxDate: "today",
//     minDate: "01.01.2000"
// });
//swiper
initSwiper();
function initSwiper()
{
    let swiperInstances = [];
    $(".section-swiper .swiper").each(function (index, element) {
        $(this).addClass("instance-" + index);
        $(this).parent().find(".swiper-button-prev").addClass("btn-prev-" + index);
        $(this).parent().find(".swiper-button-next").addClass("btn-next-" + index);
        swiperInstances[index] = new Swiper(".instance-" + index, {
            slidesPerView: 'auto',
            loop: true,
            navigation: {
                nextEl: ".btn-next-" + index,
                prevEl: ".btn-prev-" + index,
            },
        });
    });

    var swiperTop = new Swiper(".main-photo-swiper-top .swiper", {
        loop: true,
        loopedSlides: 1,
        pagination: {
        el: ".swiper-desc-pagination",
        type: "fraction",
        },
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
        },
    });

    var swiperThumbs = new Swiper('.main-photo-swiper-thumbs .swiper', {
        slidesPerView: 'auto',
        loop: true,
        centeredSlides: true,
        loopedSlides: 1,
        touchRatio: 0.2,
        slideToClickedSlide: true,
    });

    swiperTop.controller.control = swiperThumbs;
    swiperThumbs.controller.control = swiperTop;

    //get current page
    if( $('#photonews-data').data('page') )
    {
        var currentPage = parseInt($('#photonews-data').data('page'));
        swiperThumbs.slideTo(currentPage, 1000, false);
    }

    swiperTop.on('slideChange', function () {
        var url = $('#photonews-data').data('url')
            url+= '/page-' + (swiperTop.realIndex+1)

        if( window.location.search )
        {
            url+= window.location.search;
        }
        
        //push url
        window.history.pushState({}, '', url);
    });
}

$(document).on('click', '.main-photo-header-fullscreen', function(e){
    $(this).closest('body').toggleClass('fullscreen')
    e.preventDefault();
})

document.addEventListener("turbolinks:load", function() {
    initSwiper();
    document.dispatchEvent(new Event("hyperlocal:loaded"));
})
  


$(document).on('click', ".topic-side-anchor-list a", function(e) {
     e.preventDefault();
     var target = $(this).attr('href');
     $('html, body').animate({
       scrollTop: ($(target).offset().top)
     }, 1000);
});

$(document).on('click', ".copy-text", function(e) {
    e.preventDefault();

    if( $(this).data('text') ) 
        copyToClipboard($(this).data('text'));
    else
        copyToClipboard(window.location.href);
});

function copyToClipboard(text) 
{
    var textArea = document.createElement("textarea");

    // Place in the top-left corner of screen regardless of scroll position.
    textArea.style.position = 'fixed';
    textArea.style.top = 0;
    textArea.style.left = 0;

    // Ensure it has a small width and height. Setting to 1px / 1em
    // doesn't work as this gives a negative w/h on some browsers.
    textArea.style.width = '2em';
    textArea.style.height = '2em';

    // We don't need padding, reducing the size if it does flash render.
    textArea.style.padding = 0;

    // Clean up any borders.
    textArea.style.border = 'none';
    textArea.style.outline = 'none';
    textArea.style.boxShadow = 'none';

    // Avoid flash of the white box if rendered for any reason.
    textArea.style.background = 'transparent';

    textArea.value = text;

    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();

    try 
    {
        document.execCommand('copy');
    } 
    catch (err) 
    {
        console.log('Oops, unable to copy');
    }

    document.body.removeChild(textArea);
}