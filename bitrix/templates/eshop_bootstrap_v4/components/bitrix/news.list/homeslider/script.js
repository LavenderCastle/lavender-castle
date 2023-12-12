document.addEventListener("DOMContentLoaded", function(event) {

  $('.homeslider').slick({
    lazyLoad: 'ondemand',
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    autoplay: true,
    autoplaySpeed: 4000
  });

});
