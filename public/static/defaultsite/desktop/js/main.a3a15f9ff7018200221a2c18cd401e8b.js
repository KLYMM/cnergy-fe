var $header=$(".header").offset().top,$footer=$(".footer").height(),itemstoshow=1;function initSwiper(){let e=[];$(".section-swiper .swiper").each((function(t,o){$(this).addClass("instance-"+t),$(this).parent().find(".swiper-button-prev").addClass("btn-prev-"+t),$(this).parent().find(".swiper-button-next").addClass("btn-next-"+t),e[t]=new Swiper(".instance-"+t,{slidesPerView:"auto",loop:!0,navigation:{nextEl:".btn-next-"+t,prevEl:".btn-prev-"+t}})}));var t=new Swiper(".main-photo-swiper-top .swiper",{loop:!0,loopedSlides:1,pagination:{el:".swiper-desc-pagination",type:"fraction"},navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"}}),o=new Swiper(".main-photo-swiper-thumbs .swiper",{slidesPerView:"auto",loop:!0,centeredSlides:!0,loopedSlides:1,touchRatio:.2,slideToClickedSlide:!0});if(t.controller.control=o,o.controller.control=t,$("#photonews-data").data("page")){var n=parseInt($("#photonews-data").data("page"));o.slideTo(n,1e3,!1)}t.on("slideChange",(function(){var e=$("#photonews-data").data("url");e+="/page-"+(t.realIndex+1),window.location.search&&(e+=window.location.search),window.history.pushState({},"",e)}))}function copyToClipboard(e){var t=document.createElement("textarea");t.style.position="fixed",t.style.top=0,t.style.left=0,t.style.width="2em",t.style.height="2em",t.style.padding=0,t.style.border="none",t.style.outline="none",t.style.boxShadow="none",t.style.background="transparent",t.value=e,document.body.appendChild(t),t.focus(),t.select();try{document.execCommand("copy")}catch(e){console.log("Oops, unable to copy")}document.body.removeChild(t)}$(".section--infscroll-list-item:nth-of-type(n+2)").filter((function(e){return $(this).offset().top>$(window).height()-$footer})).hide(),$(window).scroll((function(){$(".backtop").toggleClass("show",$(this).scrollTop()>200),$(".header").toggleClass("sticky",$(this).scrollTop()>$header),$(".section--infscroll").length&&($(window).scrollTop()>=$(".section--infscroll").offset().top+$(".section--infscroll").outerHeight()-$(window).height()-200&&$(".section--infscroll-list-item:hidden:lt("+itemstoshow+")").delay(1e3).fadeIn(500),$(".section--infscroll-list-item:last-of-type").is(":visible")&&$(".section--infscroll-next").addClass("finished"))})),$(document).on("click",".backtop",(function(){$("html, body").animate({scrollTop:0},1e3)})),initSwiper(),$(document).on("click",".main-photo-header-fullscreen",(function(e){$(this).closest("body").toggleClass("fullscreen"),e.preventDefault()})),document.addEventListener("turbolinks:load",(function(){initSwiper()})),$(document).on("click",".topic-side-anchor-list a",(function(e){e.preventDefault();var t=$(this).attr("href");$("html, body").animate({scrollTop:$(t).offset().top},1e3)})),$(document).on("click",".copy-text",(function(e){e.preventDefault(),$(this).data("text")?copyToClipboard($(this).data("text")):copyToClipboard(window.location.href)}));
