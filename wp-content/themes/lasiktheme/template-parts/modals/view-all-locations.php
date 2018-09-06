<?php
// Get state field
$state_field = get_field_object('field_5b8719391ae7e');
// Get field choices ( array: state_code => state_name )
$states = $state_field['choices'];
?>
<!--=== Candidacy Quiz start ===-->
<div class="modal" id="all-location">

  <button type="button" class="modal__close modal-close">
    <i class="far fa-times"></i>
  </button>
  <div class="modal__location modal-content">
    <div class="container">
      <h3 class="modal__title">All LasikPlus Locations - Select a State</h3>

      <div class="locations">
        <div class="locations__nav">
          <ul class="locations__list">
            <?php foreach( $states as $state_code => $state_name ) : ?>
            <li class="locations__item">
                <a href="#location-<?php echo $state_code; ?>" class="locations__link <?php echo $state_code == 'AZ' ? 'active' : ''; ?>">
                    <?php echo $state_name; ?>
                </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="locations__position">
          <?php
          foreach( $states as $state_code => $state_name ) :
            // Get vision centers for the state
            $args = array(
              'numberposts'	=> -1,
              'post_type'	=> 'lasik_location',
              'meta_key'	=> 'location_state',
              'meta_value'	=> $state_code
            );
            $locations_query = new WP_Query( $args );
            $map_src = 'http://maps.googleapis.com/maps/api/staticmap?key=AIzaSyATq-O1KcWeOwIlHV5eZ07IXP1nBw1_rAk&size=400x215&markers=icon:https://www.lasikplus.com/assets/images/marker.png';
          ?>
            <div id="location-<?php echo $state_code; ?>" class="location__items-wrapper" style="display: none;">
              <?php if( $locations_query->have_posts() ): ?>
                <div class="locations__img-wrapper">
                  <img src="http://maps.googleapis.com/maps/api/staticmap?key=AIzaSyATq-O1KcWeOwIlHV5eZ07IXP1nBw1_rAk&size=400x215&markers=icon:https://www.lasikplus.com/assets/images/marker.png" alt="img" class="locations__img">
                </div>

                <div class="locations__items">
                  <?php while( $locations_query->have_posts() ) : $locations_query->the_post();
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
                    // Add markers to src for the map image
                    if ( get_field( 'location_lat' ) && get_field( 'location_lng' ) ) {
                      $map_src .= '|' . get_field( 'location_lat' ) . ',' . get_field( 'location_lng' );
                    } ?>
                    <div class="location-item">
                      <h3 class="location-item__title">LASIK in <?php the_title(); ?></h3>
                      <p class="location-item__text"><?php the_field( 'location_address' ); ?></p>
                      <p class="location-item__text"><?php echo get_field( 'location_city' ) . ', ' . $state_code . ' ' . get_field('location_zip'); ?></p>
                      <?php foreach ( $team_members as $team_member ) :
                        $job = wp_get_post_terms( $team_member->ID, 'lasik_job', array('fields' => 'names') ); ?>
                        <p class="location-item__name"><?php echo get_the_title( $team_member->ID ) . ', ' . ( $job ? $job[0] : '' ) ; ?></p>
                      <?php endforeach; ?>
                    </div>
                  <?php endwhile; ?>
                  <script>
                    jQuery( function () {
                      jQuery( "#location-<?php echo $state_code; ?> img" ).attr( "src", "<?php echo $map_src; ?>" )
                    })
                  </script>
                </div>
              <?php endif; ?>
              <?php wp_reset_query(); ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  
  
</div>
<!--=== Candidacy Quiz end ===-->