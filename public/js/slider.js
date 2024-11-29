/*
Template: Datum - Responsive Bootstrap 4 Admin Dashboard Template
Author: iqonic.design
Design and Developed by: http://iqonic.design/
NOTE: This file contains the styling for Slider in Template.
*/


jQuery(document).ready(function() {
  if(typeof $.fn.slick !== typeof undefined){
    /*---------------------------------------------------------------------
      slick
      -----------------------------------------------------------------------*/
      jQuery('.slick-slider').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 9,
        slidesToScroll: 1,
        focusOnSelect: true,
        responsive: [{
            breakpoint: 992,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '30',
                slidesToShow: 3
            }
        }, {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '15',
                slidesToShow: 1
            }
        }],
        nextArrow: '<a href="#" class="ri-arrow-left-s-line left"></a>',
        prevArrow: '<a href="#" class="ri-arrow-right-s-line right"></a>',
    });

    jQuery('.top-rated-item').slick({
        slidesToShow: 4,
        speed: 300,
        slidesToScroll: 1,
        focusOnSelect: true,
         appendArrows: jQuery('#top-rated-item-slick-arrow'),
        responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 3
            }
        },{
            breakpoint: 798,
            settings: {
                slidesToShow: 2
            }
        },{
            breakpoint: 480,
            settings: {
                arrows: false,
                autoplay:true,
                slidesToShow: 1
            }
        }],
    });

    jQuery('#newrealease-slider').slick({
      dots: false,
      arrows: false,
      infinite: true,
      speed: 300,
      centerMode: true,
      centerPadding: false,
      variableWidth: true ,
      infinite: true,
      focusOnSelect: true,
      autoplay: false,
      slidesToShow: 7,
      slidesToScroll: 1,


    });

   jQuery("#newrealease-slider .slick-active.slick-center").prev('.slick-active').addClass('temp');
    jQuery("#newrealease-slider .slick-active.temp").prev().addClass('temp-1');
    jQuery("#newrealease-slider .slick-active.temp-1").prev().addClass('temp-2');

     jQuery("#newrealease-slider .slick-active.slick-center").next('.slick-active').addClass('temp-next');
    jQuery("#newrealease-slider .slick-active.temp-next").next().addClass('temp-next-1');
    jQuery("#newrealease-slider .slick-active.temp-next-1").next().addClass('temp-next-2');

     jQuery("#newrealease-slider").on("afterChange", function (){
      var slick_index = jQuery(".slick-active.slick-center").data('slick-index');

      jQuery('#newrealease-slider .slick-active[data-slick-index="'+(slick_index-1)+'"]').addClass('temp');
      jQuery('#newrealease-slider .slick-active[data-slick-index="'+(slick_index-2)+'"]').addClass('temp-1');
      jQuery('#newrealease-slider .slick-active[data-slick-index="'+(slick_index-3)+'"]').addClass('temp-2');

      jQuery('#newrealease-slider .slick-active[data-slick-index="'+(parseInt(slick_index+1))+'"]').addClass('temp-next');
      jQuery('#newrealease-slider .slick-active[data-slick-index="'+(parseInt(slick_index+2))+'"]').addClass('temp-next-1');
      jQuery('#newrealease-slider .slick-active[data-slick-index="'+(parseInt(slick_index+3))+'"]').addClass('temp-next-2');


    });

    jQuery("#newrealease-slider").on("beforeChange", function (){
      var slick_index = jQuery(".slick-active.slick-center").data('slick-index');

      jQuery('#newrealease-slider .slick-active[data-slick-index="'+(slick_index-1)+'"]').removeClass('temp');
      jQuery('#newrealease-slider .slick-active[data-slick-index="'+(slick_index-2)+'"]').removeClass('temp-1');
      jQuery('#newrealease-slider .slick-active[data-slick-index="'+(slick_index-3)+'"]').removeClass('temp-2');

      jQuery('#newrealease-slider .slick-active[data-slick-index="'+(parseInt(slick_index+1))+'"]').removeClass('temp-next');
      jQuery('#newrealease-slider .slick-active[data-slick-index="'+(parseInt(slick_index+2))+'"]').removeClass('temp-next-1');
      jQuery('#newrealease-slider .slick-active[data-slick-index="'+(parseInt(slick_index+3))+'"]').removeClass('temp-next-2');

    });

    jQuery('#favorites-slider').slick({
      dots: false,
      arrows: false,
      infinite: true,
      speed: 300,
      centerMode: false,
      autoplay: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
          }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    jQuery('#similar-slider').slick({
      dots: false,
      arrows: false,
      infinite: true,
      speed: 300,
      centerMode: false,
      autoplay: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    jQuery('#single-similar-slider').slick({
      dots: false,
      arrows: false,
      infinite: true,
      speed: 300,
      centerMode: false,
      autoplay: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    jQuery('#trendy-slider').slick({
      dots: false,
      arrows: false,
      infinite: true,
      speed: 300,
      centerMode: false,
      autoplay: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    jQuery('#description-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '#description-slider-nav'
    });

    jQuery('#description-slider-nav').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '#description-slider',
      dots: false,
      arrows: false,
      infinite: true,
      vertical: true,
      centerMode: false,
      focusOnSelect: true
    });

    jQuery('.realeases-banner').slick({
      slidesToShow: 5,
      speed: 300,
      arrows:false,
      slidesToScroll: 1,
      vertical: true,
      verticalSwiping: true,
      focusOnSelect: true,
      responsive: [{
          breakpoint: 992,
          settings: {
              arrows: false,
              slidesToShow: 3
          }
      }, {
          breakpoint: 480,
          settings: {
              arrows: false,
              verticalSwiping:false,
              slidesToShow:4
          }
      }],
  });

  jQuery('.feature-album').slick({
      slidesToShow: 6,
      speed: 300,
      slidesToScroll: 1,
      focusOnSelect: true,
       appendArrows: jQuery('#feature-album-slick-arrow'),
      responsive: [{
          breakpoint: 1200,
          settings: {
              slidesToShow: 4
          }
      },{
          breakpoint: 992,
          settings: {
              slidesToShow: 3
          }
      }, {
          breakpoint: 480,
          settings: {
              arrows: false,
              autoplay:true,
              slidesToShow: 1
          }
      }],
  });

 jQuery('.feature-album-artist').slick({
      slidesToShow: 6,
      speed: 300,
      slidesToScroll: 1,
      appendArrows: jQuery('#feature-album-artist-slick-arrow'),
      focusOnSelect: true,
      responsive: [{
          breakpoint: 1200,
          settings: {
              slidesToShow: 4
          }
      },{
          breakpoint: 992,
          settings: {
              arrows:true,
              slidesToShow: 3
          }
      }, {
          breakpoint: 480,
          settings: {
              arrows:false,
              autoplay:true,
              slidesToShow: 1
          }
      }],
  });

  jQuery('.hot-songs').slick({
      slidesToShow: 2,
      speed: 300,
      appendArrows: jQuery('#hot-song-slick-arrow'),
      slidesToScroll: 1,
      rows:3,
      focusOnSelect: true,
      responsive: [{
          breakpoint: 992,
          settings: {
              arrows: true,
              slidesToShow: 2
          }
      }, {
          breakpoint: 480,
          settings: {
              arrows: false,
              autoplay:true,
              slidesToShow: 1
          }
      }],
  });

    /*---slider salon----*/
      jQuery('.salone-styles').slick({
        dots: false,
        arrows: true,
        infinite: true,
        speed: 200,
        autoplay: false,
        slidesToShow: 2,
        slidesToScroll: 1,
        appendArrows: jQuery('#trending-order-slick-arrow'),
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 1
            }
          },
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 1
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1
            }
          }
        ]
      });

   jQuery('.hot-video').slick({
      slidesToShow: 2,
      speed: 300,
      appendArrows: jQuery('#hot-video-slick-arrow'),
      slidesToScroll: 1,
      focusOnSelect: true,
      responsive: [{
          breakpoint: 992,
          settings: {
              arrows: true,
              slidesToShow: 2
          }
      }, {
          breakpoint: 480,
          settings: {
              arrows: false,
              autoplay:true,
              slidesToShow: 1
          }
      }],
  });

/*---------------------------------------------------------------------
active music
-----------------------------------------------------------------------*/
  jQuery( 'ul.iq-song-slide li').on('click', function(){
      jQuery('ul.iq-song-slide li').removeClass('active');
      jQuery(this).addClass('active');
  });


/*---------------------------------------------------------------------
social media post
-----------------------------------------------------------------------*/
    jQuery('.post-social').slick({
      dots: false,
      arrows: false,
      infinite: true,
      speed: 200,
      autoplay: true,
      slidesToShow: 1,
      slidesToScroll: 1,
    });

      jQuery('.trending-order').slick({
        dots: false,
        arrows: true,
        infinite: true,
        speed: 200,
        autoplay: false,
        slidesToShow: 2,
        slidesToScroll: 1,
        appendArrows: jQuery('#trending-order-slick-arrow'),
        responsive: [
          {
            breakpoint: 1300,
            settings: {
              slidesToShow: 2
            }
          },
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1
            }
          }
        ]
      });

      jQuery('.resto-blog').slick({
        dots: false,
        arrows: false,
        infinite: true,
        speed: 200,
        autoplay: false,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1
            }
          }
        ]
      });

    jQuery('.image-slide-1').slick({
      dots: false,
      arrows: false,
      infinite: true,
      speed: 200,
      autoplay: true,
      slidesToShow: 1,
      slidesToScroll: 1,
    });

    jQuery('.stylist-salon').slick({
      slidesToShow: 4,
      speed: 300,
      slidesToScroll: 1,
      focusOnSelect: true,
      autoplay: true,
      arrows: false,
      responsive: [{
        breakpoint: 992,
        settings: {
          arrows: false,
          slidesToShow: 2
        }
      }, {
        breakpoint: 480,
        settings: {
          arrows: false,
          autoplay: true,
          slidesToShow: 1
        }
      }],
    });

    jQuery('.stylist-salon1').slick({
      slidesToShow: 4,
      speed: 300,
      slidesToScroll: 1,
      focusOnSelect: true,
      autoplay: true,
      responsive: [{
        breakpoint: 992,
        settings: {
          arrows: true,
          slidesToShow: 2
        }
      }, {
        breakpoint: 480,
        settings: {
          arrows: false,
          autoplay: true,
          slidesToShow: 1
        }
      }],
    });


  }
});

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
