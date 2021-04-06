$(".slider").slick({
  // normal options...
  infinite: true,
  autoplay: true,
  nav: true,
  autoplayHoverPause: true,
  arrows: false,
  slidesToScroll: 3,
  slidesToShow: 3,
  loop: true,
  // the magic
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        infinite: true,
        loop: true,
      },
    },
    {
      breakpoint: 600,
      settings: {
        infinite: true,
        slidesToShow: 1,
        loop: true,
      },
    },
    {
      breakpoint: 300,
      settings: {
        infinite: true,
        slidesToShow: 1,
        loop: true,
      }, // destroys slick
    },
  ],
});
