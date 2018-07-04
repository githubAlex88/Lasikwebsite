<?php
/**
 * Template part for displaying single post
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

?>
 
<?php 
	if( has_post_thumbnail($post->ID) ) {
		$image_attachement 	= wp_get_attachment_image_src( get_post_thumbnail_id( get_queried_object_id() ), 'full' );
		$img_url 			= 'background-image: url(' . $image_attachement[0] . ')'; 
	}
	else {
		$img_url			= '';
	}
?>

<div class="wrap-article-top article-detail" style="<?php echo $img_url; ?>">
	<div class="container">
		<div class="category">
			<div>LASIK RESOURCES</div>
			<div>
				<?php 
					$categories = get_the_category(); 
					if( !empty($categories) )
						echo esc_html( $categories[0]->name );
				?>	
			</div>
			<!-- Location  -->
			<!-- <div>INDIANAPOLIS</div> --> 
		</div>
		<h1>
			<?php the_title(); ?>
		</h1>
	</div>
</div> 
<div class="wrap-article-detail">
	<div class="container">
		<div class="article-detail-content">
			<?php the_content(); ?>
		</div>
	</div>
</div>