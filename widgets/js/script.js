jQuery(document).ready(function ($) {
  if (typeof galleryData !== "undefined") {
    var ghogSwiper = new Swiper(".ghog-swiper", {
      direction: "horizontal",
      slidesPerView: 1,
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".ghog-swiper-pagination",
        clickable: true,
        renderBullet: function (index, className) {
          return (
            '<img src="' +
            galleryData[index].url +
            '" class="' +
            className +
            ' ghog-pagination-bullet" alt="' +
            galleryData[index].alt +
            '">'
          );
        },
      },
      navigation: {
        nextEl: ".ghog-swiper-button-next",
        prevEl: ".ghog-swiper-button-prev",
      },
    });
  }
});
