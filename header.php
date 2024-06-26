<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="format-detection" content="telephone=no" /> <!-- 電話番号の自動リンク機能の指定 -->
  <link rel="apple-touch-icon" href="webclip.png" /> <!-- Webページのショートカットを作成したとき、Webページをスマートフォンのホーム画面に追加したときに表示されるアイコン -->
  <meta property="og:site_name" content="ページタイトル" />
  <meta property="og:url" content="<?php the_permalink(); ?>" />
  <meta property="og:type" content="website or article" />
  <meta property="og:title" content="<?php the_title(); ?>" />
  <meta property="og:description" content="ページの説明" />
  <meta property="og:image" content="URL" />
  <meta property="og:locale" content="ja_JP" />
  <meta property="fb:app_id" content="AppID"> <!-- ※FacebookのアプリケーションID（App ID）を指定する必要がある Facebook専用の設定で、これを設定するとFacebook版Google Analyticsのようなサービスを使用することができる -->
  <meta name="twitter:card" content="summary_large_image or summary" /> <!-- どちらか選択 -->
  <meta name="twitter:site" content="@twitter_id" />
  <meta name="twitter:description" content="ページの説明" />
  <meta name="twitter:image:src" content="URL" /> <!-- Twitter専用の設定で、Twitterでシェアされた時に表示したい画像を絶対パスで設定 -->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>><?php wp_body_open(); ?>
  <header class="l-header">
    <div class="l-header__content">
      <?php
      if (!is_front_page()) {
        echo '<div class="l-header__logo">';
      } else {
        echo '<h1 class="l-header__logo">';
      }

      echo '<a href="' . esc_url(home_url('/')) . '">';
      echo '<svg xmlns="http://www.w3.org/2000/svg" width="124" height="48" viewBox="0 0 124 48">';
      echo '<g id="logo" transform="translate(0 -16)">';
      echo '<rect id="長方形_20" data-name="長方形 20" width="124" height="48" transform="translate(0 16)" fill="none"/>';
      echo '<path id="パス_7" data-name="パス 7" d="M2.394-28.272h6.46V-5.548H21.888V0H2.394ZM41.192.684a14.685,14.685,0,0,1-5.814-1.1A12.691,12.691,0,0,1,30.97-3.5,13.558,13.558,0,0,1,28.177-8.17a17.191,17.191,0,0,1-.969-5.852,17.307,17.307,0,0,1,.969-5.89,13.357,13.357,0,0,1,2.793-4.655,13.035,13.035,0,0,1,4.408-3.078,14.468,14.468,0,0,1,5.814-1.121,14.368,14.368,0,0,1,5.776,1.121,13.035,13.035,0,0,1,4.408,3.078,13.357,13.357,0,0,1,2.793,4.655,17.308,17.308,0,0,1,.969,5.89,17.191,17.191,0,0,1-.969,5.852A13.558,13.558,0,0,1,51.376-3.5,12.691,12.691,0,0,1,46.968-.418,14.584,14.584,0,0,1,41.192.684Zm.038-5.32a6.742,6.742,0,0,0,3.192-.722A6.583,6.583,0,0,0,46.7-7.334,8.871,8.871,0,0,0,48.07-10.3a14.422,14.422,0,0,0,.456-3.724,14.642,14.642,0,0,0-.456-3.743A9.3,9.3,0,0,0,46.7-20.786a6.438,6.438,0,0,0-2.28-2.014,6.742,6.742,0,0,0-3.192-.722,6.857,6.857,0,0,0-3.211.722A6.555,6.555,0,0,0,35.7-20.786a9.353,9.353,0,0,0-1.406,3.021,14.088,14.088,0,0,0-.475,3.743,13.877,13.877,0,0,0,.475,3.724A8.925,8.925,0,0,0,35.7-7.334a6.708,6.708,0,0,0,2.318,1.976A6.857,6.857,0,0,0,41.23-4.636ZM83.068-3.8h-.114A7.634,7.634,0,0,1,79.572-.4,10.631,10.631,0,0,1,74.822.646,13.594,13.594,0,0,1,69.369-.4a12.393,12.393,0,0,1-4.161-2.907A13.389,13.389,0,0,1,62.4-8.037a18.029,18.029,0,0,1-.95-5.985A17.232,17.232,0,0,1,62.7-20.691a12.955,12.955,0,0,1,3.648-5.035,12.719,12.719,0,0,1,3.914-2.242,14.677,14.677,0,0,1,5.016-.8,15.61,15.61,0,0,1,4.788.684,11.794,11.794,0,0,1,3.686,1.9,9.9,9.9,0,0,1,2.527,2.907,11.789,11.789,0,0,1,1.349,3.7h-6.46a5.86,5.86,0,0,0-1.9-2.717,5.832,5.832,0,0,0-3.8-1.121,7.03,7.03,0,0,0-3.287.722,6.708,6.708,0,0,0-2.318,1.976,8.644,8.644,0,0,0-1.387,2.983,14.484,14.484,0,0,0-.456,3.705,12.617,12.617,0,0,0,.532,3.762,9.328,9.328,0,0,0,1.5,2.964,6.875,6.875,0,0,0,2.356,1.957,6.836,6.836,0,0,0,3.135.7,7.208,7.208,0,0,0,2.679-.475,6.366,6.366,0,0,0,2.014-1.235A5.478,5.478,0,0,0,81.51-8.113a4.97,4.97,0,0,0,.456-2.071V-10.3h-5.7v-4.826H88.084V0H83.6ZM108.946.684a14.685,14.685,0,0,1-5.814-1.1A12.691,12.691,0,0,1,98.724-3.5,13.558,13.558,0,0,1,95.931-8.17a17.191,17.191,0,0,1-.969-5.852,17.308,17.308,0,0,1,.969-5.89,13.358,13.358,0,0,1,2.793-4.655,13.035,13.035,0,0,1,4.408-3.078,14.468,14.468,0,0,1,5.814-1.121,14.368,14.368,0,0,1,5.776,1.121,13.035,13.035,0,0,1,4.408,3.078,13.358,13.358,0,0,1,2.793,4.655,17.308,17.308,0,0,1,.969,5.89,17.191,17.191,0,0,1-.969,5.852A13.558,13.558,0,0,1,119.13-3.5a12.691,12.691,0,0,1-4.408,3.078A14.584,14.584,0,0,1,108.946.684Zm.038-5.32a6.742,6.742,0,0,0,3.192-.722,6.583,6.583,0,0,0,2.28-1.976,8.871,8.871,0,0,0,1.368-2.964,14.422,14.422,0,0,0,.456-3.724,14.642,14.642,0,0,0-.456-3.743,9.3,9.3,0,0,0-1.368-3.021,6.438,6.438,0,0,0-2.28-2.014,6.742,6.742,0,0,0-3.192-.722,6.857,6.857,0,0,0-3.211.722,6.555,6.555,0,0,0-2.318,2.014,9.353,9.353,0,0,0-1.406,3.021,14.088,14.088,0,0,0-.475,3.743,13.877,13.877,0,0,0,.475,3.724,8.925,8.925,0,0,0,1.406,2.964,6.708,6.708,0,0,0,2.318,1.976A6.857,6.857,0,0,0,108.984-4.636Z" transform="translate(0 54)" fill="#0c162c"/>';
      echo '/g>';
      echo '</svg>';
      echo '</a>';

      if (!is_front_page()) {
        echo '</div>';
      } else {
        echo '</h1>';
      }
      ?>
      <div class="l-header__right">
        <nav class="l-header__nav l-header-nav">
          <ul class="l-header-nav__list">
            <li class="l-header-nav__item"><a href="<?php echo esc_url(home_url('/')); ?>">トップ</a></li>
            <li class="l-header-nav__item"><a href="<?php echo esc_url(home_url('/')); ?>">サービス</a></li>
            <li class="l-header-nav__item"><a href="<?php echo esc_url(home_url('/')); ?>">事例</a></li>
            <li class="l-header-nav__item"><a href="<?php echo esc_url(home_url('/archive')); ?>">ブログ</a></li>
            <li class="l-header-nav__item"><a href="<?php echo esc_url(home_url('/custom-post')); ?>">カスタム投稿</a></li>
          </ul>
        </nav>
        <div class="l-header__cta-btn-wrap"><a href="<?php echo esc_url(home_url('/contact')); ?>" class="l-header__cta-btn c-cta-btn">お問い合わせ</a></div>
        <button class="l-header__hamburger l-header-hamburger">
          <span class="l-header-hamburger__bar"></span>
          <span class="l-header-hamburger__bar"></span>
          <span class="l-header-hamburger__bar"></span>
        </button>
      </div>
    </div>
    <div class="l-header__window l-header-window">
      <nav class="l-header-window__nav l-header-window-nav">
        <ul class="l-header-window-nav__list">
          <li class="l-header-window-nav__item"><a href="<?php echo esc_url(home_url('/')); ?>">トップ</a></li>
          <li class="l-header-window-nav__item"><a href="<?php echo esc_url(home_url('/')); ?>">サービス</a></li>
          <li class="l-header-window-nav__item"><a href="<?php echo esc_url(home_url('/')); ?>">事例</a></li>
          <li class="l-header-window-nav__item"><a href="<?php echo esc_url(home_url('/')); ?>">会社概要</a></li>
          <li class="l-header-window-nav__item"><a href="<?php echo esc_url(home_url('/archive')); ?>">ブログ</a></li>
          <li class="l-header-window-nav__item"><a href="<?php echo esc_url(home_url('/archive')); ?>">ブログ</a><a href="<?php echo esc_url(home_url('/custom-post')); ?>">カスタム投稿</a>
      </nav>
    </div>
  </header>
  <?php get_template_part('template-parts/t-top-scroll-btn'); ?>