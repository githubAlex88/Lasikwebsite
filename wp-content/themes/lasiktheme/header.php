<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<title>
  <?php wp_title('|', true, 'right'); ?>
  <?php bloginfo('name'); ?>
</title>

<?php wp_head(); ?>
<body <?php body_class( '' ); ?>>
	<div id="app">
		<div class="content-wrapper landing-page">

			<?php get_template_part( 'template-parts/header/header', 'top' ); ?>
			<?php get_template_part( 'template-parts/header/sidenav', 'top' ); ?>

		
	
	
	
	
	