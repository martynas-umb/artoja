import 'slick-carousel';

$(document).ready(() => {
  $('.meanmenu-reveal').click(function () {
    $('.mobile-menu nav.mean-nav > ul').slideToggle();
  })
  $('.mobile-menu nav.mean-nav .mean-expand').click(function () {
    $(this).prev().slideToggle();
  })
  $('#main-mobile-nav .menu-item-has-children').on('click','> .mean-expand',function (e) {
    e.preventDefault();
    $(this).prev().slideToggle();
  })
  $('#main-mobile-nav .menu-item-has-children').append('<a class="mean-expand" href="#" style="font-size: 0">+</a>')

  $('.ht-slick-slider').slick({
    dots:true
  });
  var backButton = '<button class="slick-prev slick-arrow" style=""></button>';
  var nextButton = '<button class="slick-next slick-arrow" style=""></button>'
  $('.two-col-slider').slick({
    slidesToShow:4,
    slidesToScroll:1,
    dots:false,
    // autoplay:true,
    infinite:true,
    autoplaySpeed:5000,
    speed:1000,
    arrows:true,
    rows:2,
    // appendArrows:$('.slider-nav'),
    prevArrow: backButton,
    nextArrow: nextButton,
    responsive:[
      {
        breakpoint: 1501,
        settings: {
          slidesToShow: 4,
        }
      },
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 4,
        }
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
          arrows:false,
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 2,
          arrows:false,
        }
      },
      {
        breakpoint: 479,
        settings: {
          slidesToShow: 2,
          arrows:false,
        }
      },
    ]
  });
});
