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





// ----------------------------------------------------------------------------------------------
// バージョン情報を隠す
// ----------------------------------------------------------------------------------------------
remove_action('wp_head', 'wp_generator');



// ----------------------------------------------------------------------------------------------
// アイキャッチ画像の有効化
// ----------------------------------------------------------------------------------------------
add_action('init', function () {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    // メニューのsupport
    register_nav_menus([
        'nav' => 'ナビゲーション'
    ]);
});



// ----------------------------------------------------------------------------------------------
// contact form 7 pタグ、brタグの削除
// ----------------------------------------------------------------------------------------------
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
    return false;
}



// ----------------------------------------------------------------------------------------------
// mw wp form pタグ、brタグの削除
// ----------------------------------------------------------------------------------------------
// function mvwpform_autop_filter()
// {
//     if (class_exists('MW_WP_Form_Admin')) {
//         $mw_wp_form_admin = new MW_WP_Form_Admin();
//         $forms = $mw_wp_form_admin->get_forms();
//         foreach ($forms as $form) {
//             add_filter('mwform_content_wpautop_mw-wp-form-' . $form->ID, '__return_false');
//         }
//     }
// }
// mvwpform_autop_filter();



// ----------------------------------------------------------------------------------------------
// お問い合わせフォームのフリガナバリデーション
// ----------------------------------------------------------------------------------------------
function custom_wpcf7_validate_kana($result, $tag)
{
  $tag   = new WPCF7_Shortcode($tag);
  $name  = $tag->name;
  $value = isset($_POST[$name]) ? trim(wp_unslash(strtr((string) $_POST[$name], "\n", " "))) : "";

  // //カタカナのみ
  if (($name === "kana") && !empty($value)) {
    $pattern = "/^[ァ-ン]+$/u";

    if (!preg_match($pattern, $value)) {
      $result->invalidate($tag, "カタカナで入力してください。");
    }
  }


  return $result;
}
add_filter('wpcf7_validate_text', 'custom_wpcf7_validate_kana', 11, 2);
add_filter('wpcf7_validate_text*', 'custom_wpcf7_validate_kana', 11, 2);



// ----------------------------------------------------------------------------------------------
// archive.phpのスラッグ名指定
// ----------------------------------------------------------------------------------------------
function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true;
        $args['has_archive'] = 'archive';
        // $args['label'] = 'ブログ';
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);



// ----------------------------------------------------------------------------------------------
// Breadcrumb NavXT  archive.phpのパンくずへの表示
// ----------------------------------------------------------------------------------------------
function my_static_breadcrumb_adder($breadcrumb_trail)
{
  if (get_post_type() === 'post') {
    $item = new bcn_breadcrumb('ブログ', NULL, array('post'), home_url('archive/'), null, true);
    $stuck = array_pop($breadcrumb_trail->breadcrumbs); // HOMEのパンくず一時退避
    $breadcrumb_trail->breadcrumbs[] = $item; //投稿のパンくず追加
    $breadcrumb_trail->breadcrumbs[] = $stuck; //HOMEのパンくずを戻す
  }
}
add_action('bcn_after_fill', 'my_static_breadcrumb_adder');


// ----------------------------------------------------------------------------------------------
// ページネーションのh2を非表示に(ページネーション実装時にコメントアウト)
// ----------------------------------------------------------------------------------------------
// function cut_screen_reader_text($template)
// {
//   $template = '
// 		<nav class="navigation %1$s" aria-label="%4$s">
// 			<div class="nav-links">%3$s</div>
// 		</nav>';
//   return $template;
// }
// add_filter('navigation_markup_template', 'cut_screen_reader_text');


// ----------------------------------------------------------------------------------------------
// コンテンツごとにアーカイブページの表示件数を変更する(使用時にコメントアウト)
// ----------------------------------------------------------------------------------------------
// function change_posts_per_page($query) {
//     if ( is_admin() || ! $query->is_main_query() )
//         return;

//     /* アーカイブページの時に表示件数を9件にセット */
//     if ( $query->is_archive() ) {
//         $query->set( 'posts_per_page', '9' );
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
//    /* taxonomy-○○ページの時に表示件数を25件にセット */
//    if ($query->is_tax('ここにタクソノミーのスラッグを入れる')) {
//      $query->set('posts_per_page', '2');
//    }
// }
// add_action( 'pre_get_posts', 'change_posts_per_page' );
