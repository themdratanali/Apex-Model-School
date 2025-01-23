$(document).ready(function(){
    $('.slider').slick({
      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: true,
      autoplay:true,
    });
  
    $('.menu nav').meanmenu({
      meanScreenWidth: "480",
      meanMenuContainer: '.menu',
      meanMenuOpen: '<i class="fa-solid fa-bars"></i>',
    });
});
