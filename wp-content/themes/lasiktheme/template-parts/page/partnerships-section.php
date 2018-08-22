<?php $partners = get_field( 'partnerships_items' ); ?>
<?php if ( $partners ) : ?>
  <div class="partners">
    <div class="container">
      <div class="partners__header">
        <h2 class="partners__title"><?php the_field( 'partnerships_title' ); ?></h2>
        <p class="partners__subtitle"><?php the_field( 'partnerships_subtitle' ); ?></p>
      </div>
      <div class="partners__content">
        <?php foreach ( $partners as $post ) : ?>
          <?php setup_postdata($post); ?>
          <div class="partner-item">
            <div class="partner-item__img">
              <img src="<?php the_post_thumbnail_url(); ?>" alt="img">
            </div>
            <div class="partner-item__content">
              <h3 class="partner-item__title"><?php the_content(); ?></h3>
            </div>
          </div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
<?php endif; ?>