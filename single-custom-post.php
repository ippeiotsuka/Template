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
        <div class="p-single__related p-single-related">
          <h2 class="p-single__h2">関連記事</h2>
          <div class="p-single-related__post-group">
            <?php
            $current_id = get_the_ID();
            $terms = get_the_terms($current_id, 'custom-taxonomy');//タクソノミースラッグを書き換える
            if ($terms && !is_wp_error($terms)) {
              $term_ids = wp_list_pluck($terms, 'term_id');
              $args = [
                'post_type' => 'custom-post',//カスタム投稿名
                'posts_per_page' => 3,
                'tax_query' => [
                  [
                    'taxonomy' => 'custom-taxonomy',//タクソノミースラッグを書き換える
                    'field' => 'term_id',
                    'terms' => $term_ids,
                  ]
                ],
                'post__not_in' => array($current_id),
              ];
              $related_post = new WP_Query($args);
              if ($related_post->have_posts()) :
                while ($related_post->have_posts()) : $related_post->the_post();
            ?>
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
                <?php endwhile; ?>
              <?php else : ?>
                <p class="p-single-relate__no"> 記事がありません</p>
              <?php
              endif;
              wp_reset_postdata();
              ?>
          </div>
        <?php
            } else {
              echo '<p class="p-single-relate__no">関連する記事が見つかりません。</p>';
            }
        ?>
        </div>
      </div>
  </main>
</div>
<?php get_footer(); ?>