<?php
$args = array(
  'post_type'     => 'story',
  'post_status'   => 'publish',
  'meta_key'      => 'is_homepage_visible',
  'meta_value'    => '1'
);
$stories_query = new WP_Query( $args );
?>
<section class="patient-stories">
  <div class="container">
    <div class="patient-stories__slider">
      <?php if(have_posts()) : while($stories_query->have_posts()) : $stories_query->the_post(); ?>
        <div class="patient-stories__item">
          <?php $meta_data = get_post_meta($post->ID); ?>
          <div class="row">
            <div class="col x12 m6 l5 xl6 img">
              <?php if( isset($meta_data['image']) ) : ?>
                <div class="phone">
                  <picture class="hide-on-small-only">
                    <source media="(min-width: 540px)" data-srcset="<?php echo $meta_data['image'][0]; ?>" />
                    <img  alt="article" src="<?php echo $meta_data['image'][0]; ?>">
                    <noscript>
                      <img  alt="article" src="<?php echo $meta_data['image'][0]; ?>" />
                    </noscript>
                  </picture>
                  <picture class="hide-on-med-and-up">
                    <source media="(min-width: 540px)" data-srcset="<?php echo $meta_data['image'][0]; ?>" />
                    <img  alt="article" src="<?php echo $meta_data['image'][0]; ?>">
                    <noscript>
                      <img  alt="article" src="<?php echo $meta_data['image'][0]; ?>" />
                    </noscript>
                  </picture>
                </div>
              <?php endif; ?>
            </div>
            <div class="col x12 m6 l7 xl6 info">
              <div class="patient-stories__content">
                <div class="info__header">
                  <div class="custom-nav">
                    <button data-next class="custom-prev custom-nav__item" aria-hidden="true">
                      <i class="far fa-chevron-circle-left arrow-left "></i>
                    </button>
                    <button data-prev class="custom-next custom-nav__item" aria-hidden="true">
                      <i class="far fa-chevron-circle-right arrow-right"></i>
                    </button>
                    <div class="patient-stories__number">
                      <?php
                      $stories_index  = $stories_query->current_post + 1;
                      $stories_count  = $stories_query->post_count;
                      $story_id       = $post->ID;
                      ?>
                      PATIENT STORY <span class="current"><?php echo $stories_index; ?></span> OF <?php echo $stories_count; ?>
                    </div>
                  </div>
                  <ul class="custom-dots"></ul>
                </div>
                <div class="patient-stories__title">
                  <?php echo $meta_data['title'][0]; ?>
                </div>
                <div class="patient-stories__subtitle">
                  <?php echo $meta_data['subtitle'][0]; ?>
                </div>
                <div class="patient-stories__description">
                  <?php echo $meta_data['description'][0]; ?>
                </div>
                <a href="<?php echo get_post_permalink( $story_id );?>" class="btn-simple btn-simple--icon btn-simple--orange btn-simple--big">
                  <i class="far fa-angle-right btn-simple__icon"></i>
                  <span class="btn-simple__text">
                    <?php echo $meta_data['story_text'][0]; ?>
                  </span>
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
  </div>
</section>