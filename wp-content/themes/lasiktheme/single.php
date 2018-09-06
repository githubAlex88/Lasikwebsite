<?php get_header();

// Start the loop.
while ( have_posts() ) :
  the_post(); ?>

	<section class="wrap-article-top article-detail" style="background-image:url('<?php the_post_thumbnail_url( 'large' ); ?>')">
		<div class="container">
			<div class="category">
        <?php $categories = get_the_category(); ?>
        <?php if ( !empty( $categories ) ) : ?>
				  <div><?php echo esc_html( $categories[0]->name ); ?></div>
        <?php endif; ?>
        <?php if ( $post->post_parent ): ?>
          <div><?php echo get_the_title( $post->post_parent ); ?></div>
        <?php endif; ?>
        <?php $market = get_the_terms( $post, 'lasik_market' ); ?>
        <?php if ( !empty( $market ) ) : ?>
          <div><?php echo esc_html( $market[0] ); ?></div>
        <?php endif; ?>
			</div>
			<h1>
        <?php the_title(); ?>
			</h1>
			<div class="article-author-info">
				<img src="<?php echo get_avatar_url( get_the_author_meta('user_email') ); ?>" alt="<?php the_author_meta( 'display_name' ); ?>">
				<div class="info">
					by <?php the_author_meta( 'display_name' ); ?>
				</div>
				<div class="info">
					on <?php echo get_the_date(); ?>
				</div>
			</div>
		</div>
	</section>

	<section class="wrap-article-detail" data-scroll-target>

		<div class="container">
			<div class="social social--horizontal-xs social--between-xs">
				<span class="social__title social__title--blue social__title--big hide-on-med-and-up">Choose Topic:</span>
				<ul class="social__list">
					<li class="social__item social__link social__link--blue">
            <?php echo do_shortcode( '[addtoany buttons="twitter"]' ); ?>
					</li>
					<li class="social__item social__link social__link--blue">
            <?php echo do_shortcode( '[addtoany buttons="facebook"]' ); ?>
					</li>
					<li class="social__item social__link social__link--blue">
            <?php echo do_shortcode( '[addtoany buttons="copy_link"]' ); ?>
					</li>
				</ul>
			</div>

			<div class="article-detail-content">
				<?php the_content(); ?>
			</div>

		</div>
	</section>

	<div class="wrap-more-posts">
		<div class="title">
			<a href="<?php echo !empty( $categories ) ? get_category_link( $categories[0]->term_id ) : ''; ?>">
       <span>
         MORE POSTS LIKE THIS
       </span>
				<i class="fal fa-angle-right"></i>
			</a>
		</div>
		<div class="author-title">
			<span>author</span>
		</div>
		<div class="about-author">
			<div class="img">
				<img src="<?php echo get_avatar_url( get_the_author_meta('user_email') ); ?>" alt="Dr. <?php the_author_meta( 'display_name' ); ?>">
			</div>
			<div class="info">
				<div class="name">
					Dr. <?php the_author_meta( 'display_name' ); ?>
				</div>
				<div class="description">
          <a href="<?php echo get_author_posts_url( $post->post_author ); ?>"><?php the_author_meta( 'description' ); ?></a>
				</div>
			</div>
		</div>
	</div>

	<section class="wrap-article-list type-3">
		<h2>
			YOU MIGHT ALSO LIKE...
		</h2>
    <?php $posts_per_page = 8; ?>
    <?php include( locate_template( 'template-parts/page/articles-section.php' ) ); ?>
	</section>

	<div class="sticky-footer">
		<div class="container">
			<div class="sticky-footer__content">
				<div href="#" class="sticky-footer__question hide-on-small-only">
					<i class="far fa-file-alt sticky-footer__icon"></i>
					<a href="#" class="sticky-footer__link">
						<b>Did you know:</b>  Over 99% of LASIK procedures performed by LCA result in 20/20 vision or better?
					</a>
				</div>
				<div class="social social--horizontal">
					<h2 class="social__title">Share:</h2>
					<ul class="social__list">
            <li class="social__item social__link">
              <?php echo do_shortcode( '[addtoany buttons="twitter"]' ); ?>
            </li>
            <li class="social__item social__link">
              <?php echo do_shortcode( '[addtoany buttons="facebook"]' ); ?>
            </li>
            <li class="social__item social__link">
              <?php echo do_shortcode( '[addtoany buttons="copy_link"]' ); ?>
            </li>
					</ul>
				</div>

			</div>
		</div>
	</div>

<?php
// End of the loop.
endwhile;

get_footer(); ?>