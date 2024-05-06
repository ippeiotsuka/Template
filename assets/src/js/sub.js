export function functionName() {
  // ----------------------------------------------------------------------------------------------
  // サンクスページへの遷移
  // ----------------------------------------------------------------------------------------------
  $(function () {
    document.addEventListener(
      "wpcf7mailsent",
      function (event) {
        location = "http://localhost:8080/thanks/"; //urlがあっているか要確認
      },
      false
    );
  });

  // ----------------------------------------------------------------------------------------------
  // バリデーション対策
  // ----------------------------------------------------------------------------------------------
  //formタグにクラス追加
  $(".wpcf7-form").addClass("hide_error_message");

  //送信または確認ボタンをクリックしたとき
  $(".wpcf7-confirm, .wpcf7-submit").click(function () {
    //formからクラスを削除
    $(".wpcf7-form").removeClass("hide_error_message");
  });

  // ----------------------------------------------------------------------------------------------
  // セレクトボックスのカラー変更
  // ----------------------------------------------------------------------------------------------
  $("select option:first-child").addClass("c-form__select--default");

  $("select").on("change", function () {
    var itemSelect = $(this)
      .find("option:selected")
      .hasClass("c-form__select--default");
    $(this)
      .parents(".wpcf7-form-control-wrap")
      .toggleClass("c-form__select--selected", !itemSelect);
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

  // ----------------------------------------------------------------------------------------------
  // トップスクロールボタンの設定
  // ----------------------------------------------------------------------------------------------
  const topScrollBtn = document.querySelector(".t-top-scroll-btn");

  // 100px以上スクロールしたらボタンを表示させ、それ以下の場合は非表示にする
  $(".t-top-scroll-btn").hide();
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $(".t-top-scroll-btn").fadeIn();
    } else {
      $(".t-top-scroll-btn").fadeOut();
    }
  });

  //クリックイベントを追加
  topScrollBtn.addEventListener("click", scroll_to_top);

  function scroll_to_top() {
    window.scroll({ top: 0, behavior: "smooth" });
  }
}
