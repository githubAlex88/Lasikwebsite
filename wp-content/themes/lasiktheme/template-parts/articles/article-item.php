<div class="item">
  <div class="img">
    <?php the_post_thumbnail( 'thumbnail' ); ?>
  </div>
  <div class="info">
    <div class="category">
      <?php
      $categories = get_the_category();
      if( !empty($categories) )
        echo esc_html( $categories[0]->name );
      ?>
    </div>
    <div class="title">
      <a href="<?php the_permalink(); ?>" >
        <?php the_title(); ?>
      </a>
    </div>
    <div class="description">
      <?php the_excerpt(); ?>
    </div>
  </div>
</div>