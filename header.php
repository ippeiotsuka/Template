<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <title>ページタイトル</title>
    <meta name="description" content="ページの説明" />
    <link rel="icon" href="favicon.png" type="image/png" />
    <link rel="icon" href="favicon.svg" type="image/svg+xml" />
    <link rel="apple-touch-icon" href="webclip.png" />
    <meta property="og:site_name" content="ページタイトル" />
    <meta property="og:url" content="URL" />
    <meta property="og:type" content="website or article" />
    <meta property="og:title" content="ページのタイトル" />
    <meta property="og:description" content="ページの説明" />
    <meta property="og:image" content="URL" />
    <meta property="og:locale" content="ja_JP" />
    <meta property="fb:app_id" content="AppID">
    <meta name="twitter:card" content="summary_large_image or summary" />
    <meta name="twitter:site" content="@twitter_id" />
    <meta name="twitter:description" content="ページの説明" />
    <meta name="twitter:image:src" content="URL" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>><?php wp_body_open(); ?>
    <header class="l-header">
        <div class="l-header-content">
            <h1 class="l-header__logo">
                <a href="">ロゴ</a>
            </h1>
            <div class="l-header__right">
                <button class="l-header-hamburger">
                    <span class="l-header-hamburger__bar"></span>
                    <span class="l-header-hamburger__bar"></span>
                    <span class="l-header-hamburger__bar"></span>
                </button>
                <nav class="l-header-nav">
                    <ul class="l-header-nav__list">
                        <li class="l-header-nav__item"><a href="">トップ</a></li>
                        <li class="l-header-nav__item"><a href="">サービス</a></li>
                        <li class="l-header-nav__item"><a href="">事例</a></li>
                        <li class="l-header-nav__item"><a href="">会社概要</a></li>
                        <li class="l-header-nav__item"><a href="">ブログ</a></li>
                        <li class="l-header-nav__item"><a href="">お問い合わせ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>