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
        data-long="<?php the_field('location_lng');?>"
        data-lat="<?php the_field('location_lat');?>"
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