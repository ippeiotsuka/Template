!function(){"use strict";!function(){var e=document.querySelector(".l-header"),t=document.querySelector(".l-header-hamburger"),i=document.querySelector(".l-header-window");function n(){window.innerWidth>=1080?(i.style.display="none",e.classList.remove("is-active"),$("body").removeClass("is-active")):i.style.display="block"}t.addEventListener("click",(function(){e.classList.toggle("is-active"),$("body").toggleClass("is-active")})),window.addEventListener("load",n),window.addEventListener("resize",n)}()}();