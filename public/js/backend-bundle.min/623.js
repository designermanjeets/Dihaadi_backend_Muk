"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[623],{1623:(e,t,n)=>{n.r(t);var c=n(9755),a=n.n(c);window.$=window.jQuery=a(),function(){var e,t=document.getElementById("back-to-top");function n(e){1==e?null!==document.querySelector(".screen-darken")&&document.querySelector(".screen-darken").classList.add("active"):0==e&&null!==document.querySelector(".screen-darken")&&document.querySelector(".screen-darken").classList.remove("active")}function c(){n(!1),null!==document.querySelector(".mobile-offcanvas.show")&&(document.querySelector(".mobile-offcanvas.show").classList.remove("show"),document.body.classList.remove("offcanvas-active"))}t&&(t.classList.add("animate__animated","animate__fadeOut"),window.addEventListener("scroll",(function(){document.documentElement.scrollTop>250?(t.classList.remove("animate__fadeOut"),t.classList.add("animate__fadeIn")):(t.classList.remove("animate__fadeIn"),t.classList.add("animate__fadeOut"))})),document.querySelector("#top").addEventListener("click",(function(e){e.preventDefault(),window.scrollTo({top:0,behavior:"smooth"})}))),document.querySelectorAll("[data-trigger]").forEach((function(e){var t=e.getAttribute("data-trigger");e.addEventListener("click",(function(e){e.preventDefault(),function(e){n(!0),null!==document.getElementById(e)&&(document.getElementById(e).classList.add("show"),document.body.classList.add("offcanvas-active"))}(t)}))})),document.querySelectorAll(".btn-close")&&document.querySelectorAll(".btn-close").forEach((function(e){e.addEventListener("click",(function(){c()}))})),document.querySelector(".screen-darken")&&document.querySelector(".screen-darken").addEventListener("click",(function(){c()})),document.querySelector("#navbarSideCollapse")&&document.querySelector("#navbarSideCollapse").addEventListener("click",(function(){document.querySelector(".offcanvas-collapse").classList.toggle("open")})),e=document.querySelectorAll(".readmore-btn"),document.querySelectorAll(".readmore-text"),e.forEach((function(e){e.addEventListener("click",(function(){var t=e.previousElementSibling;t.classList.contains("active")?(t.classList.remove("active"),e.innerHTML="Read More"):(t.classList.add("active"),e.innerHTML="Read less")}))})),a()(window).scroll((function(){var e=a()("header .iq-navbar");a()(window).scrollTop()>=100?e.addClass("fixed"):e.removeClass("fixed")})),a()(document).ready((function(){a()(".change-mode").on("click",(function(){var e=a()(this).data("change-mode");a()(this).data("change-mode","dark"===e?"light":"dark"),"dark"===e?a()("body").removeClass("dark"):a()("body").addClass("dark")}))}))}()}}]);