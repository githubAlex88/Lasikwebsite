<!--=== Search location start ===-->
<div class="modal" id="location-modal">

  <button type="button" class="modal__close modal-close">
    <i class="far fa-times"></i>
  </button>

  <!--=== Search Form start ===-->
  <div class="search-modal autocomplite">
    <div class="search-modal__content">
      <form action="" class="search-modal__form">
        <div class="input-field">
          <input 
            type="text" 
            id="location"
            data-target="#locations"
            class="search-modal__input browser-default">
            <label for="location" class="search-modal__label">Enter a Zip Code, City, State, or Doctor Name</label>
        </div>
        <button type="button" class="search-modal__submit">
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
                  'key' => 'team_member_vision_center',
                  'value' => '"' . get_the_ID() . '"',
                  'compare' => 'LIKE'
                )
              )
            ));
            foreach ( $team_members as $team_member ) : ?>
              <li class="search-modal__item" style="display: none;"
                  data-state="<?php echo get_field('location_state')['label']; ?>"
                  data-city="<?php the_field('location_city'); ?>"
                  data-zip="<?php the_field('location_zip'); ?>"
                  data-team_member="<?php echo get_the_title( $team_member->ID ); ?>"
              >
                <span>City Match</span>
                <p><?php the_field('location_city'); ?>, <?php echo get_field('location_state')['label']; ?></p>
              </li>
            <?php endforeach;
          endwhile;
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