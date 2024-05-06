<?php get_header(); ?>
<div class="l-wrapper">
  <?php get_template_part('template-parts/t-breadcrumb'); ?>
  <main class="l-main">
    <div class="p-archive">
      <div class="l-inner">
        <h1 class="c-lower-ttl"><?php echo esc_html(get_post_type_object(get_post_type(""))->label); ?>一覧</h1>
        <div class="p-archive__post-group">
          <?php
          $paged = get_query_var('paged') ? get_query_var('paged') : 1;  // ページネーションがある場合に必要
          $args =
            array(
              'post_type' => 'custom-post', //カスタム投稿名
              'paged' => $paged, // ページネーションがある場合に必要
              'posts_per_page' => 10, //投稿表示数
            );
          $my_query = new WP_Query($args); ?>
          <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
              <!-- 投稿アイテムのHTMLコード -->
              <article class="c-post">
                <a href="<?php the_permalink(); ?>" class="c-post__wrap">
                  <div class="c-post__img">
                    <?php if (has_post_thumbnail()) : /* もしアイキャッチが登録されていたら */ ?>
                      <?php echo the_post_thumbnail('thumbnail'); ?>
                    <?php else : /* 登録されていなかったら */ ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/image_dummy.png" alt="投稿サムネイル画像">
                    <?php endif; ?>
                  </div>
                  <div class="c-post__txt-box">
                    <h3 class="c-post__head"><?php the_title(); ?></h3>
                    <time datetime="<?php echo get_the_date(); ?>" class="c-post__date"><?php echo get_the_date(); ?></time>
                  </div>
                </a>
              </article>
          <?php endwhile;
            wp_reset_postdata();
          endif; ?>
        </div>
        <?php get_template_part('template-parts/t-pagination'); ?>
      </div>
    </div>
  </main>
</div>
<?php get_footer(); ?>