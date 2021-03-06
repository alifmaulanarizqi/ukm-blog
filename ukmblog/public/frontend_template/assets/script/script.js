$(document).ready(function() {

  // sandwich icon
  $('.nav-button').click(function() {
    $('.nav-button').toggleClass('change');
  });

  // custom navbar
  $(window).scroll(function(){
    let position = $(this).scrollTop();
    if(position >= 80) {
      $('.nav-menu').addClass('custom-navbar');
    } else {
      $('.nav-menu').removeClass('custom-navbar');
    }
  });

  // carousel bottom
  var heroCarousel = $("#heroCarousel");
  var heroCarouselIndicators = $("#hero-carousel-indicators");
  heroCarousel.find(".carousel-inner").children(".carousel-item").each(function(index) {
    (index === 0) ?
    heroCarouselIndicators.append("<li data-target='#heroCarousel' data-slide-to='" + index + "' class='active'></li>"):
      heroCarouselIndicators.append("<li data-target='#heroCarousel' data-slide-to='" + index + "'></li>");
  });

  // Init AOS
  function aos_init() {
    AOS.init({
      duration: 1000,
      once: true
    });
  }
  
  $(window).on('load', function() {
    aos_init();
  });

});
