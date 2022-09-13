$('.owl-carousel').owlCarousel({
  loop: true,
  margin: 10,
  navText: [
    '<img src="assets/icons/prev.svg" alt="prev" width="40px" height="40px"/>',
    '<img src="assets/icons/next.svg" alt="next"  width="40px" height="40px"/>',
  ],

  responsiveClass: true,
  responsive: {
    0: {
      items: 3,
      nav: true,
      loop: true,
    },
  },
});