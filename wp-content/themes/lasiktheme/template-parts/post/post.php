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
<div class="sticky-footer fixed">
	<div class="container">
		<div class="sticky-footer__content">
			<div href="#" class="sticky-footer__question hide-on-small-only">
				<i class="far fa-file-alt sticky-footer__icon"></i>
				<a href="#" class="sticky-footer__link"><b>Did you know:</b> Over 99% of LASIK procedures performed by LCA result in 20/20 vision or better?</a>
			</div>
			<div class="social social--horizontal">
				<h2 class="social__title">Share:</h2>
				<ul class="social__list">
					<li class="social__item"><a href="#" class="social__link"><i class="fab fa-twitter"></i></a></li>
					<li class="social__item"><a href="#" class="social__link"><i class="fab fa-facebook-f"></i></a></li>
					<li class="social__item"><a href="#" class="social__link"><i class="far fa-link"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>