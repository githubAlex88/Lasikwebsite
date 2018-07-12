<?php
// Get state field
$state_field = get_field_object('field_5b4006e721d1e');
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
              'post_type'		=> 'lasik_location',
              'meta_key'		=> 'location_state',
              'meta_value'	=> $state_code
            );
            $the_query = new WP_Query( $args );
            $map_src = "http://maps.googleapis.com/maps/api/staticmap?key=AIzaSyATq-O1KcWeOwIlHV5eZ07IXP1nBw1_rAk&size=400x215&markers=icon:https://www.lasikplus.com/assets/images/marker.png";
          ?>
            <div id="location-<?php echo $state_code; ?>" class="location__items-wrapper" style="display: none;">
              <?php if( $the_query->have_posts() ): ?>
                <div class="locations__img-wrapper">
                  <img src="http://maps.googleapis.com/maps/api/staticmap?key=AIzaSyATq-O1KcWeOwIlHV5eZ07IXP1nBw1_rAk&size=400x215&markers=icon:https://www.lasikplus.com/assets/images/marker.png" alt="img" class="locations__img">
                </div>

                <div class="locations__items">
                  <?php while( $the_query->have_posts() ) : $the_query->the_post();
                    if ( get_field('location_lat') && get_field('location_lng') ) {
                      $map_src .= "|" . get_field('location_lat') . "," . get_field('location_lng');
                    } ?>
                    <div class="location-item">
                      <h3 class="location-item__title">LASIK in <?php the_title(); ?></h3>
                      <p class="location-item__text"><?php the_field('location_address'); ?></p>
                      <p class="location-item__text"><?php echo get_field('location_city') . ", " . $state_code . " " . get_field('location_zip'); ?></p>
                      <?php foreach ( get_field('location_team_members') as $team_member_post_id ) : ?>
                        <p class="location-item__name"><?php echo get_the_title( $team_member_post_id ); ?></p>
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