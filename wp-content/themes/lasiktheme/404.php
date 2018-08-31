<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<section class="section-error error-404 page-404 align-center">
		<header class="page-header">
			<h1 class="page-404__title"><?php _e("Content Not Found");?></h1>
		</header>
		<div class="page-404__content">
			<p class="page-404__text"><?php _e("Unfortunately, the content you are looking for either no longer exisits on the site, or the link you clicked was broken"); ?></p>
		</div>
		<?php get_footer('not-found'); ?>
	
</section>
