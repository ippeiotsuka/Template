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
    </header>