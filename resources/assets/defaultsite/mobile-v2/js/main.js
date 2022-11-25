//scroll
var $header = $('.header').offset().top;
var $footer = $('.footer').height();
var itemstoshow = 1;

$('.section--infscroll-list-item:nth-of-type(n+2)').filter(function (index) {
    return (($(this).offset().top) > $(window).height() - $footer);
}).hide();

$(window).scroll(function () {

    $('.backtop').toggleClass('show', $(this).scrollTop() > 200);
    // $('.header').toggleClass('sticky', $(this).scrollTop() > $header);

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
function initSwiper()
{
    var swipernavbar = new Swiper('.main-nav .swiper', {
        slidesPerView: 'auto',
        freeMode: true,
        freeModeMomentumRatio: 0.5,
        freeModeMomentumBounce: false,
        on:{
        init: function(){
            if($('.main-nav .active').length > 0){
            this.slideTo( $('.active').index() - 2, 500, false);
            }
        }
        },
    });

    var swiperbreaking = new Swiper('.main-breaking-swiper .swiper', {
        slidesPerView: 'auto',
        loop: true,
        allowTouchMove: false,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
        speed: 30000,
    });

    var swiperdetail = new Swiper('.dt-photo .swiper', {
        slidesPerView: 'auto',
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            type: "fraction",
        },
    });

    //get current page
    if( $('#photonews-data').data('page') )
    {
        var currentPage = parseInt($('#photonews-data').data('page'));
            swiperdetail.slideTo(currentPage, 1000, false);    
    }

    swiperdetail.on('slideChange', function () {
        var url = $('#photonews-data').data('url')
            url+= '/page-' + (swiperdetail.realIndex+1)

        if( window.location.search )
        {
            url+= window.location.search;
        }
        
        //push url
        window.history.pushState({}, '', url);
    });
}

initSwiper();
document.addEventListener("turbolinks:load", function() {
    initSwiper();
    document.dispatchEvent(new Event("hyperlocal:loaded"));
})
