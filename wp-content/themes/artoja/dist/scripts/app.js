(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/scripts/app"],{

/***/ "./resources/assets/scripts/app.js":
/*!*****************************************!*\
  !*** ./resources/assets/scripts/app.js ***!
  \*****************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony import */ var slick_carousel__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! slick-carousel */ "./node_modules/slick-carousel/slick/slick.js");
/* harmony import */ var slick_carousel__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(slick_carousel__WEBPACK_IMPORTED_MODULE_0__);

$(document).ready(function () {
  $('.meanmenu-reveal').click(function () {
    $('.mobile-menu nav.mean-nav > ul').slideToggle();
  });
  $('.mobile-menu nav.mean-nav .mean-expand').click(function () {
    $(this).prev().slideToggle();
  });
  $('#main-mobile-nav .menu-item-has-children').on('click', '> .mean-expand', function (e) {
    e.preventDefault();
    $(this).prev().slideToggle();
  });
  $('#main-mobile-nav .menu-item-has-children').append('<a class="mean-expand" href="#" style="font-size: 0">+</a>');
  $('.ht-slick-slider').slick({
    dots: true
  });
  var backButton = '<button class="slick-prev slick-arrow" style=""></button>';
  var nextButton = '<button class="slick-next slick-arrow" style=""></button>';
  $('.two-col-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    // autoplay:true,
    infinite: true,
    autoplaySpeed: 5000,
    speed: 1000,
    arrows: true,
    rows: 2,
    // appendArrows:$('.slider-nav'),
    prevArrow: backButton,
    nextArrow: nextButton,
    responsive: [{
      breakpoint: 1501,
      settings: {
        slidesToShow: 4
      }
    }, {
      breakpoint: 1199,
      settings: {
        slidesToShow: 4
      }
    }, {
      breakpoint: 991,
      settings: {
        slidesToShow: 3
      }
    }, {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
        arrows: false
      }
    }, {
      breakpoint: 575,
      settings: {
        slidesToShow: 2,
        arrows: false
      }
    }, {
      breakpoint: 479,
      settings: {
        slidesToShow: 2,
        arrows: false
      }
    }]
  });
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "jquery")))

/***/ }),

/***/ "./resources/assets/styles/scss/app.scss":
/*!***********************************************!*\
  !*** ./resources/assets/styles/scss/app.scss ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/styles/scss/helper.scss":
/*!**************************************************!*\
  !*** ./resources/assets/styles/scss/helper.scss ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!**********************************************************************************************************************************!*\
  !*** multi ./resources/assets/scripts/app.js ./resources/assets/styles/scss/app.scss ./resources/assets/styles/scss/helper.scss ***!
  \**********************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/mone/Sites/artoja/wp-content/themes/artoja/resources/assets/scripts/app.js */"./resources/assets/scripts/app.js");
__webpack_require__(/*! /Users/mone/Sites/artoja/wp-content/themes/artoja/resources/assets/styles/scss/app.scss */"./resources/assets/styles/scss/app.scss");
module.exports = __webpack_require__(/*! /Users/mone/Sites/artoja/wp-content/themes/artoja/resources/assets/styles/scss/helper.scss */"./resources/assets/styles/scss/helper.scss");


/***/ }),

/***/ "jquery":
/*!**********************************!*\
  !*** external {"this":"jQuery"} ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["jQuery"]; }());

/***/ })

},[[0,"/scripts/manifest","/scripts/vendor"]]]);
//# sourceMappingURL=app.js.map