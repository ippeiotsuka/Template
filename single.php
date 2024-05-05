<?php get_header(); ?>
<div class="l-wrapper">
  <?php get_template_part('template-parts/t-breadcrumb'); ?>
  <main class="l-main">
    <div class="p-single">
      <div class="l-inner">
        <div class="p-single__img">
          <?php if (has_post_thumbnail()) : /* もしアイキャッチが登録されていたら */ ?>
            <?php echo the_post_thumbnail('thumbnail'); ?>
          <?php else : /* 登録されていなかったら */ ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/image_dummy.png" alt="投稿サムネイル画像">
          <?php endif; ?>
        </div>
        <h1 class="p-single__head"><?php the_title(); ?></h1>
        <time datetime="<?php echo get_the_date(); ?>" class="p-single__date"><?php echo get_the_date(); ?></time>
        <div class="p-single__content">
          <?php the_content(); ?>
        </div>
        <div class="p-single__pagination">
          <?php
          the_post_navigation(array(
            'prev_text' => '&lt; 前の記事',
            'next_text' => '次の記事 &gt;',
          ));
          ?>
        </div>
      </div>
    </div>
  </main>
</div>
<?php get_footer(); ?>