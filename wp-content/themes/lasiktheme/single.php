<?php get_header(); ?>
<?php 
	while (have_posts()) {
		the_post();
		get_template_part('template-parts/post/post', get_post_type());
	}
?>
<?php get_footer(); ?>