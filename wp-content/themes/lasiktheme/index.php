<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>


<?php

if ( has_post_thumbnail( get_queried_object_id() ) ) :
	
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_queried_object_id() ), 'full' );
	?>
	<section class="wrap-article-top" style="background-image:url(<?php echo $image[0]; ?>)">
		<div class="container">
			<h1><?php echo single_post_title(); ?></h1>
			<a href="#" class="button button-secondary button-big" data-open-submenu="#submenu-resources">
			What Would You Like to Learn More About?
			</a>
		</div>
	</section>
	<?php
endif;
?>
<?php 
	if( have_posts() ) : 
		?>
		<section class="wrap-article-list">
			<section class="article-list container">
				<?php 
				while( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/post/content', get_post_format() );
				endwhile;
				?>
			</section>
		</section>
		<?php
	endif;
?>

<?php
get_footer();
