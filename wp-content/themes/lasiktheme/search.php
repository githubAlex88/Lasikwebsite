<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Lasik_Theme
 * @since Lasik Theme 1.0
 */

get_header(); ?>
<div class="wrap-article-top article-detail">
	<h1>Search Results for: <?php echo get_search_query(); ?></h1>
</div>

<?php
get_footer();
