jQuery(document).ready(function ($) {
  if (typeof galleryData !== "undefined") {
    var thumbSwiper = new Swiper(".ghog-thumb-swiper", {
      loop: true,
      spaceBetween: 10,
      freeMode: true,
      watchSlidesProgress: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      centeredSlides: true,
      centeredSlidesBounds: true,
      breakpoints: {
        340: {
          slidesPerView: 4,
        },
        1024: {
          slidesPerView: 5,
        },
        1140: {
          slidesPerView: 9,
        },
      },
    });

    var ghogSwiper = new Swiper(".ghog-swiper", {
      direction: "horizontal",
      slidesPerView: 1,
      loop: true,
      thumbs: {
        swiper: thumbSwiper,
      },
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".ghog-swiper-button-next",
        prevEl: ".ghog-swiper-button-prev",
      },
    });
  }
});
