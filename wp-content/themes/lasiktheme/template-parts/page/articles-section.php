<div class="article-list container">
  <?php
  // Get post's primary tag
  $primary_tags = get_the_terms( $post, 'lasik_primary_tag' );

  // If post has a primary tag
  if( $primary_tags ) {
    $primary_tag = $primary_tags[0];

    // Check if articles for the current primary tag are cached on a transient
    if ( false === ( $articles_to_render = get_transient( "articles_for_ptag_{$primary_tag->slug}" ) ) ) {

      // Initialize an array to hold article's data
      $articles_to_render = array();

      // Query articles with primary tag as a taxonomy argument
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 4,
        'tax_query' => array(
          array(
            'taxonomy' => 'lasik_primary_tag',
            'field' => 'slug',
            'terms' => $primary_tag->slug,
          )
        )
      );
      $article_query = new WP_Query($args);

      // If there are articles with the same primary tag as the current page add them to article array
      if ($article_query->have_posts()) {
        while ($article_query->have_posts()) {
          $article_query->the_post();
          $articles_to_render[] = array(
            'image_url' => get_the_post_thumbnail_url(),
            'category' => esc_html(get_the_category()[0]->name),
            'permalink' => get_the_permalink(),
            'title' => get_the_title(),
          );
        }

      }
      // Reset query so page rendering continues as normally
      wp_reset_query();

      // If there are not enough articles with a matching primary tag query other posts
      if (count($articles_to_render) < 4) {
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 4 - count($articles_to_render),
          'tax_query' => array(
            array(
              'taxonomy' => 'lasik_primary_tag',
              'field' => 'slug',
              'terms' => $primary_tag->slug,
              'operator' => 'NOT IN',
            )
          )
        );
        $article_query = new WP_Query($args);

        // Add articles to the array
        if ($article_query->have_posts()) {
          while ($article_query->have_posts()) {
            $article_query->the_post();
            $articles_to_render[] = array(
              'image_url' => get_the_post_thumbnail_url(),
              'category' => esc_html(get_the_category()[0]->name),
              'permalink' => get_the_permalink(),
              'title' => get_the_title(),
            );
          }

        }
        // Reset query so page rendering continues as normally
        wp_reset_query();
      }

      // Store data in transient to avoid querying the DB for each request
      if ( !empty( $articles_to_render ) ) {
        set_transient( "articles_for_ptag_{$primary_tag->slug}", $articles_to_render, DAY_IN_SECONDS );
      }

    }
  }
  // Loop through the array and display articles
  if ( !empty( $articles_to_render ) ) :
    foreach( $articles_to_render as $article ) : ?>
      <div class="item">
        <div class="img">
          <a href="<?php echo $article['permalink']; ?>" >
            <img src="<?php echo $article['image_url']; ?>" alt="<?php echo $article['title']; ?>">
          </a>
        </div>
        <div class="info">
          <div class="category">
            <?php echo $article['category']; ?>
          </div>
          <div class="title">
            <a href="<?php echo $article['permalink']; ?>" >
              <?php echo $article['title']; ?>
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>

</div>