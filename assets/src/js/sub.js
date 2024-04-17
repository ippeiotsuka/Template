export function functionName() {

  // ----------------------------------------------------------------------------------------------
  // サンクスページへの遷移
  // ----------------------------------------------------------------------------------------------
  $(function () {
    document.addEventListener(
      "wpcf7mailsent",
      function (event) {
        location = "http://localhost:8081/thanks/";
      },
      false
    );
  });

  // ----------------------------------------------------------------------------------------------
  // 360px以下は等倍縮小
  // ----------------------------------------------------------------------------------------------
  !(function () {
    const viewport = document.querySelector('meta[name="viewport"]');
    function switchViewport() {
      const value =
        window.outerWidth > 360
          ? "width=device-width,initial-scale=1"
          : "width=360";
      if (viewport.getAttribute("content") !== value) {
        viewport.setAttribute("content", value);
      }
    }
    addEventListener("resize", switchViewport, false);
    switchViewport();
  })();

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
