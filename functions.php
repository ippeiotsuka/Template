<?php
add_action('wp_enqueue_scripts', 'add_styles');
function add_styles()
{
    // WordPress提供のjquery.jsを読み込まない
    // wp_deregister_script('jquery');  JS関連で何か異常があったときはこのコードを読み込んでみる
    // jQueryの読み込み
    wp_register_script('jquery_script', '//code.jquery.com/jquery-3.6.1.min.js', array(), '1.0', true);
    // swiper
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '1.0');
    // gsap
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js', array(), '1.0');
    // ScrollTrigger
    wp_enqueue_script('ScrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/ScrollTrigger.min.js', array(), '1.0');
    // main_js
    wp_enqueue_script('main_script', get_template_directory_uri() . '/assets/dist/js/bundle.js', array('jquery_script'), '1.0', true);
    //google fonts
    wp_enqueue_style('google-fonts-style', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700;900&display=swap', array(), null);
    //main css
    wp_enqueue_style('main_style', get_template_directory_uri() . '/assets/dist/css/style.css', array(), '1.0');
}





// バージョン情報を隠す
remove_action('wp_head', 'wp_generator');



// タイトルタグの自動設定
add_theme_support('title-tag');
function my_title_separator($separator)
{
    $separator = '|';
    return $separator;
}
add_filter('document_title_separator', 'my_title_separator');



// アイキャッチ画像の有効化
add_action('init', function () {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    // メニューのsupport
    register_nav_menus([
        'nav' => 'ナビゲーション'
    ]);
});



// contact form 7 pタグ、brタグの削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
    return false;
}



// mw wp form pタグ、brタグの削除
function mvwpform_autop_filter()
{
    if (class_exists('MW_WP_Form_Admin')) {
        $mw_wp_form_admin = new MW_WP_Form_Admin();
        $forms = $mw_wp_form_admin->get_forms();
        foreach ($forms as $form) {
            add_filter('mwform_content_wpautop_mw-wp-form-' . $form->ID, '__return_false');
        }
    }
}
mvwpform_autop_filter();




// お問い合わせ完了後サンクスページにジャンプする設定
add_action('wp_footer', 'add_origin_thanks_page');
function add_origin_thanks_page()
{
    $thanks = home_url('/thanks/');
    echo <<< EOC
     <script>
       var thanksPage = {
         42: '{$thanks}',
       };
     document.addEventListener( 'wpcf7mailsent', function( event ) {
       location = thanksPage[event.detail.contactFormId];
     }, false );
     </script>
   EOC;
}



// archive.phpのスラッグ名指定
function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true;
        $args['has_archive'] = 'archive';
        // $args['label'] = '投稿';
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);


// ----------------------------------------------------------------------------------------------
// コンテンツごとにアーカイブページの表示件数を変更する(使用時にコメントアウトする)
// ----------------------------------------------------------------------------------------------
// function change_posts_per_page($query) {
//     if ( is_admin() || ! $query->is_main_query() )
//         return;

//     /* アーカイブページの時に表示件数を10件にセット */
//     if ( $query->is_archive() ) {
//         $query->set( 'posts_per_page', '10' );
//     }
//     /* ポストアーカイブの時に表示件数を15件にセット */
//     if ( $query->is_post_type_archive() ) {
//         $query->set( 'posts_per_page', '15' );
//     }
//     /* 検索ページの時に表示件数を20件にセット */
//     if ( $query->is_search() ) {
//         $query->set( 'posts_per_page', '20' );
//     }
//     /* 筆者ページの時に表示件数を25件にセット */
//     if ( $query->is_author() ) {
//         $query->set( 'posts_per_page', '25' );
//     }
//     /* タグページの時に表示件数を25件にセット */
//     if ( $query->is_tag() ) {
//         $query->set( 'posts_per_page', '30' );
//     }
// }
// add_action( 'pre_get_posts', 'change_posts_per_page' );
