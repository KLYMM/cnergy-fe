var $header=$(".header").offset().top,$footer=$(".footer").height(),itemstoshow=1;$(".section--infscroll-list-item:nth-of-type(n+2)").filter((function(e){return $(this).offset().top>$(window).height()-$footer})).hide(),$(window).scroll((function(){$(".backtop").toggleClass("show",$(this).scrollTop()>200),$(".header").toggleClass("sticky",$(this).scrollTop()>$header),$(".section--infscroll").length&&($(window).scrollTop()>=$(".section--infscroll").offset().top+$(".section--infscroll").outerHeight()-$(window).height()-200&&$(".section--infscroll-list-item:hidden:lt("+itemstoshow+")").delay(1e3).fadeIn(500),$(".section--infscroll-list-item:last-of-type").is(":visible")&&$(".section--infscroll-next").addClass("finished"))})),$(".backtop").on("click",(function(){$("html, body").animate({scrollTop:0},1e3)}));let swiperInstances=[];$(".section-swiper .swiper").each((function(e,t){$(this).addClass("instance-"+e),$(this).parent().find(".swiper-button-prev").addClass("btn-prev-"+e),$(this).parent().find(".swiper-button-next").addClass("btn-next-"+e),swiperInstances[e]=new Swiper(".instance-"+e,{slidesPerView:"auto",loop:!0,navigation:{nextEl:".btn-next-"+e,prevEl:".btn-prev-"+e}})}));var swiperTop=new Swiper(".main-photo-swiper-top .swiper",{loop:!0,loopedSlides:5,pagination:{el:".swiper-desc-pagination",type:"fraction"},navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"}}),swiperThumbs=new Swiper(".main-photo-swiper-thumbs .swiper",{slidesPerView:"auto",loop:!0,centeredSlides:!0,loopedSlides:5,touchRatio:.2,slideToClickedSlide:!0});if(swiperTop.controller.control=swiperThumbs,swiperThumbs.controller.control=swiperTop,$(".main-photo-header-fullscreen").on("click",(function(e){$(this).closest("body").toggleClass("fullscreen"),e.preventDefault()})),$(".topic-side-anchor-list a").on("click",(function(e){e.preventDefault();var t=$(this).attr("href");$("html, body").animate({scrollTop:$(t).offset().top},1e3)})),"1"==$("body").attr("turbolink")){var Turbolinks=require("turbolinks");Turbolinks.start(),Turbolinks.setProgressBarDelay(2e3)}
