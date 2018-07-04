<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

?>

<div class="item">
	<div class="img">
		<?php if( has_post_thumbnail($post->ID) ) : ?>
			<?php the_post_thumbnail('thumbnail'); ?>
		<?php else : ?>
			<img width="150" height="150" class="attachment-thumbnail size-thumbnail wp-post-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/img-article-empty.jpg">
		<?php endif; ?>
	</div>
	<div class="info">
		<div class="category">
			<?php 
				$categories = get_the_category(); 
				if( !empty($categories) )
					echo esc_html( $categories[0]->name );
			?>
		</div>
		<div class="title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</div>
		<div class="description">
			<?php the_excerpt(); ?>
		</div>
	</div>
</div>
