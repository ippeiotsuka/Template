<?php get_header(); ?>
<div class="l-wrapper">
  <?php get_template_part('template-parts/t-breadcrumb') ;?>
  <main class="l-main">
    <div class="p-contact">
      <div class="l-inner">
        <div class="c-form">
          <div class="c-form__ttl-desc">
            <h1 class="c-form__ttl"><?php the_title(); ?></h1>
            <p class="c-form__desc"><span class="u-br">下記の送信フォームより</span><span class="u-br">送信して下さい。</span></p>
          </div>
          <div class="c-form__item-group">
            <div class="c-form__item c-form-item">
              <div class="c-form-item__name-box">
                <div class="c-form-item__name">名前</div>
                <div class="c-form-item__required">必須</div>
              </div>
              <div class="c-form-item__data c-form-item__data--txt">
                <input type="text" name="name" require>
              </div>
            </div>
            <div class="c-form__item c-form-item">
              <div class="c-form-item__name-box">
                <div class="c-form-item__name">フリガナ</div>
                <div class="c-form-item__required">必須</div>
              </div>
              <div class="c-form-item__data c-form-item__data--txt">
                <input type="text" name="kana" require>
              </div>
            </div>
            <div class="c-form__item c-form-item">
              <div class="c-form-item__name-box">
                <div class="c-form-item__name">メールアドレス</div>
                <div class="c-form-item__required">必須</div>
              </div>
              <div class="c-form-item__data c-form-item__data--txt">
                <input type="email" name="mail" require>
              </div>
            </div>
            <div class="c-form__item c-form-item">
              <div class="c-form-item__name-box">
                <div class="c-form-item__name">電話番号</div>
                <div class="c-form-item__required">必須</div>
              </div>
              <div class="c-form-item__data c-form-item__data--txt">
                <input type="tel" name="tel" require>
              </div>
            </div>
            <div class="c-form__item c-form-item">
              <div class="c-form-item__name-box">
                <div class="c-form-item__name">ラジオボタン項目</div>
                <div class="c-form-item__required">必須</div>
              </div>
              <span class="c-form-item__data c-form-item__data--radio">
                <span class="wpcf7-list-item">
                  <label for="radio1">
                    <input type="radio" name="radio" id="radio1" checked>
                    <span class="wpcf7-list-item-label">ラジオ1</span>
                  </label>
                </span>
                <span class="wpcf7-list-item">
                  <label for="radio2">
                    <input type="radio" name="radio" id="radio2">
                    <span class="wpcf7-list-item-label">ラジオ2</span>
                  </label>
                </span>
                <span class="wpcf7-list-item">
                  <label for="radio3">
                    <input type="radio" name="radio" id="radio3">
                    <span class="wpcf7-list-item-label">ラジオ3</span>
                  </label>
                </span>
                <span class="wpcf7-list-item">
                  <label for="radio4">
                    <input type="radio" name="radio" id="radio4">
                    <span class="wpcf7-list-item-label">ラジオ4</span>
                  </label>
                </span>
              </span>
            </div>
            <div class="c-form__item c-form-item">
              <div class="c-form-item__name-box">
                <div class="c-form-item__name">チェックボックス項目</div>
              </div>
              <span class="c-form-item__data c-form-item__data--check">
                <span class="wpcf7-list-item">
                  <label for="check1">
                    <input type="checkbox" name="check" id="check1">
                    <span class="wpcf7-list-item-label">チェックボックス1</span>
                  </label>
                </span>
                <span class="wpcf7-list-item">
                  <label for="check2">
                    <input type="checkbox" name="check" id="check2">
                    <span class="wpcf7-list-item-label">チェックボックス2</span>
                  </label>
                </span>
                <span class="wpcf7-list-item">
                  <label for="check3">
                    <input type="checkbox" name="check" id="check3">
                    <span class="wpcf7-list-item-label">チェックボックス3</span>
                  </label>
                </span>
                <span class="wpcf7-list-item">
                  <label for="check4">
                    <input type="checkbox" name="check" id="check4">
                    <span class="wpcf7-list-item-label">チェックボックス4</span>
                  </label>
                </span>
              </span>
            </div>
            <div class="c-form__item c-form-item">
              <div class="c-form-item__name-box">
                <div class="c-form-item__name">お問い合わせ詳細</div>
              </div>
              <div class="c-form-item__data c-form-item__data--textarea">
                <textarea name="area" id="" cols="30" rows="10"></textarea>
              </div>
            </div>
            <div class="c-form__privacy c-form-privacy">
              <p class="c-form-privacy__desc"><span class="u-br"><a class="c-form-privacy__link" href="">プライバシーポリシー</a>に同意の上、</span><span class="u-br">送信ください。</span></p>
              <span class="c-form-privacy__check">
                <span class="wpcf7-list-item">
                  <label for="privacy">
                    <input type="checkbox" name="privacy" id="privacy">
                    <span class="wpcf7-list-item-label">プライバシーポリシーに同意する</span>
                  </label>
                </span>
              </span>
            </div>
            <div class="c-form__submit-wrap">
              <input type="submit" value="送信する">
            </div>


            <!-- contactform7のショートコード -->
            <!-- <?php echo apply_shortcodes('[contact-form-7 id="877616c" title="コンタクトフォーム 1"]'); ?> -->
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
<?php get_footer(); ?>