 <script src="{{ asset('js/landing-app.min.js') }}"></script>
 <script src="{{ asset('js/bootstrap.bundle.js')}}"></script> 
 <script src="{{ asset('js/backend-bundle.min/resources_js_handyman_js.js')}}"></script>


{{-- <script>
     console.log('Blade file loaded first');
      const currencyFormat = (amount) => {
        const DEFAULT_CURRENCY = JSON.parse(@json(json_encode(Currency::getDefaultCurrency(true))))
        console.log(DEFAULT_CURRENCY)
         const noOfDecimal = DEFAULT_CURRENCY.no_of_decimal
         const decimalSeparator = DEFAULT_CURRENCY.decimal_separator
         const thousandSeparator = DEFAULT_CURRENCY.thousand_separator
         const currencyPosition = DEFAULT_CURRENCY.currency_position
         const currencySymbol = DEFAULT_CURRENCY.currency_symbol
        return formatCurrency(amount, noOfDecimal, currencyPosition, currencySymbol)
      }
      window.currencyFormat = currencyFormat
      window.defaultCurrencySymbol = @json(Currency::defaultSymbol())

    </script>   --}}



{{-- <script>
    (function (jQuery) {
  "use strict";

  callGeneralSwiper();
  callTeamSwiper();
  Tabslider();
})(jQuery);

// Swiper General
function callGeneralSwiper() {
  jQuery(document)
    .find(".swiper.swiper-general")
    .each(function () {
      let slider = jQuery(this);

      var sliderAutoplay = slider.data("autoplay");

      var breakpoint = {
        // when window width is >= 0px
        0: {
          slidesPerView: slider.data("mobile-sm"),
          spaceBetween: 30,
        },
        576: {
          slidesPerView: slider.data("mobile"),
          spaceBetween: 30,
        },
        // when window width is >= 768px
        768: {
          slidesPerView: slider.data("tab"),
          spaceBetween: 30,
        },
        // when window width is >= 1025px
        1025: {
          slidesPerView: slider.data("laptop"),
          spaceBetween: 30,
        },
        // when window width is >= 1500px
        1500: {
          slidesPerView: slider.data("slide"),
          spaceBetween: 30,
        },
      };

      if (slider.data("navigation")) {
        var navigationVal = {
          nextEl: slider.find(".swiper-button-next")[0],
          prevEl: slider.find(".swiper-button-prev")[0],
        };
      } else {
        var navigationVal = false;
      }

      if (slider.data("pagination")) {
        var paginationVal = {
          el: slider.find(".swiper-pagination")[0],
          dynamicBullets: true,
          clickable: true,
        };
      } else {
        var paginationVal = false;
      }
      var sw_config = {
        loop: slider.data("loop"),
        speed: 1000,
        spaceBetween: 30,
        slidesPerView: slider.data("slide"),
        centeredSlides: slider.data("center"),
        mousewheel: slider.data("mousewheel"),
        autoplay: sliderAutoplay,
        effect: slider.data("effect"),
        navigation: navigationVal,
        pagination: paginationVal,
        breakpoints: breakpoint,
      };
      var swiper = new Swiper(slider[0], sw_config);
    });
}

// Team Swiper
function callTeamSwiper() {
  var $sliders = jQuery(document).find('.iq-team-slider');
  if ($sliders.length > 0) {
    $sliders.each(function () {
      let slider = jQuery(this);
      var navNext = (slider.data('navnext')) ? "#" + slider.data('navnext') : "";
      var navPrev = (slider.data('navprev')) ? "#" + slider.data('navprev') : "";
      var pagination = (slider.data('pagination')) ? "#" + slider.data('pagination') : "";
      var sliderAutoplay = slider.data('autoplay');
      if (sliderAutoplay) {
        sliderAutoplay = {
          delay: slider.data('autoplay')
        };
      } else {
        sliderAutoplay = false;
      }
      var iqonicPagination = {
        el: pagination,
        clickable: true,
        dynamicBullets: true,
      };
      var swSpace = {
        1200: 30,
        1500: 30
      };
      var breakpoint = {
        0: {
          slidesPerView: 1,
          centeredSlides: false,
          virtualTranslate: false
        },
        576: {
          slidesPerView: 1,
          centeredSlides: false,
          virtualTranslate: false
        },
        768: {
          slidesPerView: 2,
          centeredSlides: false,
          virtualTranslate: false
        },
        1200: {
          slidesPerView: 3,
          spaceBetween: swSpace["1200"],
        },
        1500: {
          slidesPerView: 3,
          spaceBetween: swSpace["1500"],
        },
      };
      var sw_config = {
        loop: true,
        speed: 1000,
        loopedSlides: 3,
        spaceBetween: 30,
        slidesPerView: 3,
        centeredSlides: true,
        autoplay: true,
        virtualTranslate: true,
        navigation: {
          nextEl: navNext,
          prevEl: navPrev
        },
        on: {
          slideChangeTransitionStart: function () {
            var currentElement = jQuery(this.el);
            var lastBullet = currentElement.find(".swiper-pagination-bullet:last");
            if (this.slides.length - (this.loopedSlides + 1) === this.activeIndex) {
              lastBullet.addClass("js_prefix-disable-bullate");
            } else {
              lastBullet.removeClass("js_prefix-disable-bullate");
            }
            if (jQuery(window).width() > 1199) {
              var innerTranslate = -(160 + swSpace[this.currentBreakpoint]) * (this.activeIndex);
              currentElement.find(".swiper-wrapper").css({
                "transform": "translate3d(" + innerTranslate + "px, 0, 0)"
              });
              currentElement.find('.swiper-slide:not(.swiper-slide-active)').css({
                width: "160px"
              });
              currentElement.find('.swiper-slide.swiper-slide-active').css({
                width: "476px"
              });
            }
          },
          resize: function () {
            var currentElement = jQuery(this.el);
            if (jQuery(window).width() > 1199) {
              if (currentElement.data("loop")) {
                var innerTranslate = -(160 + swSpace[this.currentBreakpoint]) * this.loopedSlides;
                currentElement.find(".swiper-wrapper").css({
                  "transform": "translate3d(" + innerTranslate + "px, 0, 0)"
                });
              }
              currentElement.find('.swiper-slide:not(.swiper-slide-active)').css({
                width: "160px"
              });
              currentElement.find('.swiper-slide.swiper-slide-active').css({
                width: "476px"
              });
            }
          },
          init: function () {
            var currentElement = jQuery(this.el);
            currentElement.find('.swiper-slide').css({
              'max-width': 'auto'
            });
          }
        },
        pagination: (slider.data('pagination')) ? iqonicPagination : "",
        breakpoints: breakpoint,
      };
      var swiper = new Swiper(slider[0], sw_config);
    });
    jQuery(document).trigger('after_slider_init');
  }
}

// Tab Swiper
function Tabslider() {
  if (typeof Swiper !== "undefined") {
    var thumb_swiper = new Swiper(".swiper-thumb", {
      spaceBetween: 16,
      slidesPerView: "auto",
      freeMode: true,
      watchSlidesProgress: true,
    });

    var content_swiper = new Swiper(".swiper-content", {
      spaceBetween: 16,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: thumb_swiper,
      },
    });
  }
}
</script> --}}
