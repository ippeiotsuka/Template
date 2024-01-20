export function functionName() {
  // ----------------------------------------------------------------------------------------------
  // ハンバーガーメニュー
  // ----------------------------------------------------------------------------------------------
  const hamburger = document.querySelector(".l-header-hamburger");
  const hamburgerMenu = document.querySelector(".l-header-hamburger-menu");
  hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("is-active");
    hamburgerMenu.classList.toggle("is-active");
  });
}
