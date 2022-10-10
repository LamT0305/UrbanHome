$(document).ready(function () {
  $(".img-slider").slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    prevArrow: `<button type='button' class='slick-prev slick-arrow'><ion-icon name="arrow-back-outline"></ion-icon></i></button>`,
    nextArrow: `<button type='button' class='slick-next slick-arrow'><ion-icon name="arrow-forward-outline"></ion-icon></i></button>`,
  });
});
