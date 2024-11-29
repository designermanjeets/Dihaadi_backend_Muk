"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_handyman_js"],{

/***/ "./resources/js/handyman.js":
/*!**********************************!*\
  !*** ./resources/js/handyman.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

window.$ = window.jQuery = (jquery__WEBPACK_IMPORTED_MODULE_0___default());
(function () {
  "use strict";

  var backToTop = document.getElementById("back-to-top");
  if (backToTop) {
    backToTop.classList.add("animate__animated", "animate__fadeOut");
    window.addEventListener('scroll', function () {
      if (document.documentElement.scrollTop > 250) {
        backToTop.classList.remove("animate__fadeOut");
        backToTop.classList.add("animate__fadeIn");
      } else {
        backToTop.classList.remove("animate__fadeIn");
        backToTop.classList.add("animate__fadeOut");
      }
    });

    // scroll body to 0px on click
    document.querySelector('#top').addEventListener('click', function (event) {
      event.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  }
  function darken_screen(yesno) {
    if (yesno == true) {
      if (document.querySelector('.screen-darken') !== null) {
        document.querySelector('.screen-darken').classList.add('active');
      }
    } else if (yesno == false) {
      if (document.querySelector('.screen-darken') !== null) {
        document.querySelector('.screen-darken').classList.remove('active');
      }
    }
  }
  function close_offcanvas() {
    darken_screen(false);
    if (document.querySelector('.mobile-offcanvas.show') !== null) {
      document.querySelector('.mobile-offcanvas.show').classList.remove('show');
      document.body.classList.remove('offcanvas-active');
    }
  }
  function show_offcanvas(offcanvas_id) {
    darken_screen(true);
    if (document.getElementById(offcanvas_id) !== null) {
      document.getElementById(offcanvas_id).classList.add('show');
      document.body.classList.add('offcanvas-active');
    }
  }
  document.querySelectorAll('[data-trigger]').forEach(function (everyelement) {
    var offcanvas_id = everyelement.getAttribute('data-trigger');
    everyelement.addEventListener('click', function (e) {
      e.preventDefault();
      show_offcanvas(offcanvas_id);
    });
  });
  if (document.querySelectorAll('.btn-close')) {
    document.querySelectorAll('.btn-close').forEach(function (everybutton) {
      everybutton.addEventListener('click', function () {
        close_offcanvas();
      });
    });
  }
  if (document.querySelector('.screen-darken')) {
    document.querySelector('.screen-darken').addEventListener('click', function () {
      close_offcanvas();
    });
  }
  if (document.querySelector('#navbarSideCollapse')) {
    document.querySelector('#navbarSideCollapse').addEventListener('click', function () {
      document.querySelector('.offcanvas-collapse').classList.toggle('open');
    });
  }
  function readMoreBtn() {
    var readMoreBtns = document.querySelectorAll(".readmore-btn");
    var readMoreTexts = document.querySelectorAll(".readmore-text");
    readMoreBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var container = btn.previousElementSibling; // Assuming the <p> is the previous sibling
        if (container.classList.contains('active')) {
          container.classList.remove('active');
          btn.innerHTML = "Read More";
        } else {
          container.classList.add("active");
          btn.innerHTML = "Read less";
        }
      });
    });
  }
  readMoreBtn();

  /*----------Sticky-Header-----------*/
  jquery__WEBPACK_IMPORTED_MODULE_0___default()(window).scroll(function () {
    var sticky = jquery__WEBPACK_IMPORTED_MODULE_0___default()('header .iq-navbar'),
      scroll = jquery__WEBPACK_IMPORTED_MODULE_0___default()(window).scrollTop();
    if (scroll >= 100) sticky.addClass('fixed');else sticky.removeClass('fixed');
  });

  //   const res_sidebar = document.getElementById("navbar_main");

  // if (res_sidebar) {
  //   // scroll body to 0px on click
  //   document.querySelector('#res_sidebar').addEventListener('click', (event) => {
  //     event.preventDefault();
  //     res_sidebar.classList.add('show')
  //   });
  //   document.querySelector('.btn-close').addEventListener('click', (event) => {
  //     event.preventDefault();
  //     res_sidebar.classList.remove('show')
  //   });
  // }
  /*------------Popover--------------*/

  jquery__WEBPACK_IMPORTED_MODULE_0___default()(document).ready(function () {
    var savedTheme = localStorage.getItem('data-bs-theme');
    if (savedTheme === 'dark') {
      jquery__WEBPACK_IMPORTED_MODULE_0___default()('html').attr('data-bs-theme', 'dark');
    } else {
      jquery__WEBPACK_IMPORTED_MODULE_0___default()('html').attr('data-bs-theme', 'light');
    }
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('.change-mode').on('click', function () {
      var currentValue = jquery__WEBPACK_IMPORTED_MODULE_0___default()(this).data('change-mode');
      var newMode = currentValue === 'dark' ? 'light' : 'dark';
      jquery__WEBPACK_IMPORTED_MODULE_0___default()('html').attr('data-bs-theme', newMode);
      localStorage.setItem('data-bs-theme', newMode);
      jquery__WEBPACK_IMPORTED_MODULE_0___default()(this).data('change-mode', newMode);
    });
  });

  // select2
  jquery__WEBPACK_IMPORTED_MODULE_0___default()(".select2").select2({
    width: '100%'
  });
  jquery__WEBPACK_IMPORTED_MODULE_0___default()('.select2-container').addClass('wide');
})();

/***/ })

}]);