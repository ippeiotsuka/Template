export function functionName() {
  // ----------------------------------------------------------------------------------------------
  // ハンバーガーメニュー
  // ----------------------------------------------------------------------------------------------
  const header = document.querySelector(".l-header");
  const hamburger = document.querySelector(".l-header-hamburger");
  const hamburgerWindow = document.querySelector(".l-header-window");
  hamburger.addEventListener("click", () => {
    header.classList.toggle("is-active");
    $("body").toggleClass("is-active");
  });

  function checkWidth() {
    if (window.innerWidth >= 1080) {
      hamburgerWindow.style.display = "none";
      header.classList.remove("is-active");
      $("body").removeClass("is-active");
    } else {
      hamburgerWindow.style.display = "block";
    }
  }
  window.addEventListener("load", checkWidth);
  window.addEventListener("resize", checkWidth);
}
