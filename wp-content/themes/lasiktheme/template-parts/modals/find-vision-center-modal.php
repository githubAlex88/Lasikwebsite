<!--=== Search start ===-->
<div class="modal" id="search-vision-center">

  <button type="button" class="modal__close modal-close">
    <i class="far fa-times"></i>
  </button>

  <!--=== Search Form start ===-->
  <div class="search-modal">
    <h2 class="search-modal__title">VISION CENTERS NEAR ME</h2>
    <p class="search-modal__subtitle">Enter your zip code, city, or a doctor name below to find a vision center.</p>
    <div class="search-modal__content">
      <form action="" class="search-modal__form">
        <div class="input-field">
          <input
            type="text"
            id="vision-center"
            class="search-modal__input search-trigger browser-default"
          >
          <label for="vision-center" class="search-modal__label">Zip Code, City, or Doctor</label>
        </div>
        <button type="submit" class="search-modal__submit">
          <i class="fal fa-map-marker search-modal__icon"></i>
        </button>
      </form>

      <div class="search-modal__results" id="show-result">

        <?php
        // Get vision centers for the state
        $args = array(
          'numberposts'	=> -1,
          'post_type'		=> 'lasik_location'
        );
        $locations_query = new WP_Query( $args );
        if( $locations_query->have_posts() ):
          while( $locations_query->have_posts() ) :
            $locations_query->the_post();
            // Get team members for current vision center
            $team_members = get_posts( array(
              'post_type' => 'lasik_team_member',
              'meta_query' => array(
                array(
                  'key' => 'team_member_vision_centers',
                  'value' => '"' . get_the_ID() . '"',
                  'compare' => 'LIKE'
                )
              )
            ));
            $team_members_array = array();
            foreach ( $team_members as $team_member ) : ?>
              <!--=== Vision item start ===-->
              <div class="vision-item search-item">
                <div class="vision-item__img-wrapper">
                  <div class="vision-item__header">
                    <a href="<?php the_permalink(); ?>" class="vision-item__name"><span class="search-field"><?php the_field( 'location_city' ); ?></span>, <?php echo get_field( 'location_state' )['value']; ?> LasikPlus Vision Center</a>

                    <div class="vision-item__reviews">
                      <div class="rating">
                        <div class="rating__content">
                          <span class="rating__number">4.5</span>
                          <!--=include ../common/star_bar.html -->
                        </div>
                        <a href="#" class="rating__reviews">330 Google Reviews</a>
                      </div>
                    </div>

                  </div>
                  <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo the_title(); ?>" class="vision-item__img">
                </div>

                <div class="vision-item__body">
                  <div class="vision-item__content">
                    <div class="vision-item__doctor">
                      <img src="<?php echo get_the_post_thumbnail_url( $team_member->ID ); ?>" alt="doctor">
                    </div>
                    <div class="vision-item__info">
                      <h3 class="vision-item__title">
                        <a href="#">Dr. <span class="search-field"><?php echo get_the_title( $team_member->ID ); ?></span></a>
                      </h3>
                      <p class="vision-item__text"><?php the_field( 'location_address' ); ?></p>
                      <p class="vision-item__text"><?php the_field( 'location_city' ); ?>, <?php echo get_field( 'location_state' )['value']; ?> <span class="search-field"><?php the_field( 'location_zip' ); ?></span></p>
                    </div>
                  </div>
                  <a href="#" class="btn-simple btn-simple--icon btn-simple--orange btn-simple--full-width">
                    <i class="far fa-calendar-alt btn-simple__icon"></i>
                    <span class="btn-simple__text btn-simple__text--small">
                  Schedule Free Eye Exam at our <?php the_field( 'location_city' ); ?> Vision Center
                </span>
                  </a>
                </div>
              </div>
              <!--=== Visison item finish ===-->
            <?php endforeach; ?>
          <?php endwhile;
        endif;
        wp_reset_query();
        ?>

      </div>

    </div>
  </div>
  <!--=== Search Form end ===-->

</div>
<!--=== Search end ===-->