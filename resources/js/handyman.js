
import $ from 'jquery'
window.$ = window.jQuery = $;

(function () {
    "use strict";

const backToTop = document.getElementById("back-to-top");

if (backToTop) {
  backToTop.classList.add("animate__animated", "animate__fadeOut");

  window.addEventListener('scroll', () => {
    if (document.documentElement.scrollTop > 250) {
      backToTop.classList.remove("animate__fadeOut");
      backToTop.classList.add("animate__fadeIn");
    } else {
      backToTop.classList.remove("animate__fadeIn");
      backToTop.classList.add("animate__fadeOut");
    }
  });

  // scroll body to 0px on click
  document.querySelector('#top').addEventListener('click', (event) => {
    event.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}




function darken_screen(yesno) {
    if (yesno == true) {
      if (document.querySelector('.screen-darken') !== null) {
        document.querySelector('.screen-darken').classList.add('active');
      }
    }
    else if (yesno == false) {
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
      let offcanvas_id = everyelement.getAttribute('data-trigger');
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
      document.querySelector('.offcanvas-collapse').classList.toggle('open')
    })
  }

function readMoreBtn() {
  let readMoreBtns = document.querySelectorAll(".readmore-btn");
  let readMoreTexts = document.querySelectorAll(".readmore-text");

  readMoreBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
          let container = btn.previousElementSibling; // Assuming the <p> is the previous sibling
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
$(window).scroll(function () {
    var sticky = $('header .iq-navbar'),
      scroll = $(window).scrollTop();

    if (scroll >= 100) sticky.addClass('fixed');
    else sticky.removeClass('fixed');
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

  $(document).ready(function () {
    const savedTheme = localStorage.getItem('data-bs-theme');
    if (savedTheme === 'dark') {
      $('html').attr('data-bs-theme', 'dark');
    } else {
      $('html').attr('data-bs-theme', 'light');
    }

    $('.change-mode').on('click', function () {
      const currentValue = $(this).data('change-mode');
      const newMode = currentValue === 'dark' ? 'light' : 'dark';

      $('html').attr('data-bs-theme', newMode);
      localStorage.setItem('data-bs-theme', newMode);

      $(this).data('change-mode', newMode);
    });
  });

  // select2
  $(".select2").select2({
    width: '100%'
  });

  $('.select2-container').addClass('wide');

})();