<?php

/*
  Template Name: Standard Page Template
*/

get_header(); ?>

<!--=== Top Section start ===-->
<?php get_template_part( 'template-parts/page/top-section', 'widgets' ); ?>
<!--=== Top Section end ===-->

<!--=== Image Section start ===-->
<?php get_template_part( 'template-parts/page/img-section', 'widgets' ); ?>
<!--=== Image Section end ===-->

<!--=== Special Offer Section start ===-->
<?php
$special_offer = get_field( 'special_offer' );
$special_offer['static'] = true;
if ( $special_offer ) { include( locate_template( 'template-parts/special-offer.php', false, false ) ); }
?>
<!--=== Special Offer Section end ===-->

<!--=== Blocks start ===-->
<?php
if( have_rows( 'blocks' ) ) :
  while( have_rows( 'blocks' ) ) : $row = the_row();
    $type = get_sub_field( 'type' );
    if ( $type ) :
      $block = get_sub_field( $type );
      include( locate_template( "template-parts/page/blocks/{$type}.php", 'widgets' ) );
    endif;
  endwhile;
endif;
?>
<!--=== Blocks end ===-->

<!--=== Partners start ===-->
<?php
if( get_field( 'partnerships_enable' ) ) :
  get_template_part( 'template-parts/page/partnerships-section', 'widgets' );
endif;
?>
<!--=== Partners end ===-->

<!--=== More Section start ===-->
<?php get_template_part( 'template-parts/page/more-section', 'widgets' ); ?>
<!--=== More Section end ===-->

<?php get_footer(); ?>
