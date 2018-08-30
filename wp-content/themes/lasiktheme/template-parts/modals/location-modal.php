<!--=== Search location start ===-->
<div class="modal" id="location-modal">

  <button type="button" class="modal__close modal-close">
    <i class="far fa-times"></i>
  </button>
  <!--=== Search Form start ===-->
  <div class="search-modal autocomplite">
    <div class="search-modal__content">
      <form action="<?php echo admin_url( 'admin-post.php' ); ?>" method="post" class="search-modal__form change-location" autocomplete="off">
        <?php wp_nonce_field('location-nonce', 'location_form_nonce'); ?>
        <div class="input-field">
          <input 
            type="text" 
            id="location"
            data-target="#locations"
            class="search-modal__input browser-default">
            <input type="hidden" name="action" value="process_form">
            <input id="locationData" type="hidden" name="location_data" value="">
            <label for="location" class="search-modal__label">Enter a Zip Code, City, State, or Doctor Name</label>
        </div>
        <button class="search-modal__submit" type="submit">
          <i class="far fa-search search-modal__icon"></i>
        </button>
      </form>
      <ul class="search-modal__result" id="locations">
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
            foreach ( $team_members as $team_member ) :
              $team_members_array[] = '"' . strtolower( get_the_title( $team_member->ID ) ) . '"';
            endforeach; ?>
            <li class="search-modal__item" style="display: none;"
                data-id="<?php echo $post->ID;?>"
                data-long="<?php echo the_field('location_lng');?>"
                data-lat="<?php echo the_field('location_lat');?>"
                data-name="<?php echo the_title(); ?>"
                data-state="<?php echo get_field( 'location_state' )['label']; ?>"
                data-state_short="<?php echo get_field( 'location_state' )['value']; ?>"
                data-city="<?php the_field( 'location_city' ); ?>"
                data-zip="<?php the_field( 'location_zip' ); ?>"
                data-team_member='[<?php echo implode(",", $team_members_array); ?>]'
            >
              <span>City Match</span>
              <p><?php the_field( 'location_city' ); ?>, <?php echo get_field( 'location_state' )['label']; ?></p>
            </li>
          <?php endwhile;
        endif;
        wp_reset_query();
        ?>
      </ul>
    </div>
  </div>
  <!--=== Search Form end ===-->

  <div class="current-postiton">
    <span class="current-postiton__text">OR</span>
    <a href="#" class="current-postiton__button button button-secondary">
      <i class="far fa-map-marker"></i>
      <span>
        Use My Current Location
      </span>
    </a>
  </div>

</div>
<!--=== Search location end ===-->