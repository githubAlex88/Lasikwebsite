<?php

/*
  Template Name: Article's List Template
*/



get_header();

get_template_part("template-parts/articles/top_section"); ?>

<section class="wrap-article-list">
  <div class="article-list container">
    <?php

    // Query articles
    $article_query = new WP_Query( array(
      'posts_per_page' => 11,
    ));

    // Counter to place banner box in second row as the eighth element
    $item_count = 0;

    if ( $article_query->have_posts() ) :
      while ( $article_query->have_posts() ) :
        $article_query->the_post();
        $item_count++; ?>
        <div class="item">
          <div class="img">
            <?php the_post_thumbnail( "thumbnail" ); ?>
          </div>
          <div class="info">
            <div class="category">
              COST OF LASIK
            </div>
            <div class="title">
              <a href="" >
                <?php the_title(); ?>
              </a>
            </div>
            <div class="description">
              <?php the_excerpt(); ?>
            </div>
          </div>
        </div>
        <?php if ( $item_count == 7 ) : ?>
          <!-- Banner code/shortcode goes here -->
        <?php endif; ?>
      <?php endwhile; ?>

       <?php wp_reset_postdata(); ?>

    <?php endif; ?>
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