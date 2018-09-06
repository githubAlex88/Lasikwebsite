<?php

/*
  Template Name: Article's List Template
*/



get_header();

get_template_part("template-parts/articles/top-section"); ?>

<section class="wrap-article-list">
  <div class="article-list container">
    <?php
    // Query articles
    $article_query = new WP_Query( array(
      'posts_per_page'  => 11,
      'post_type'       => 'post'
    ));

    // Counter to place banner box in second row as the eighth element
    $item_count = 0;

    if ( $article_query->have_posts() ) :
      while ( $article_query->have_posts() ) :
        $article_query->the_post();
        $item_count++;

        // Get article item
        get_template_part( 'template-parts/articles/article-item' );

        if ( $item_count == 2 ) :
          echo do_shortcode( '[cta_banner]' );
        endif;
      endwhile;

      wp_reset_postdata();
    endif; ?>
  </div>
  <div class="article-list-load">
    <a href="#" class="button button-secondary button-big">
      <i class="fal fa-plus-circle"></i>
      <span>
        LOAD MORE
      </span>
    </a>
  </div>
</section>

<?php get_footer(); ?>