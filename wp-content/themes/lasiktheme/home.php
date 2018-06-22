<?php

/*
  Template Name: Home Page Template
*/


get_header(); ?>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; ?>
<?php endif; ?>
<!--=== Top section start ===-->
<section class="top-section">
  <!--=== Top subsection start ===-->
  <div class="top-subsection">
    <div class="upper-layer" aria-hidden="true">
      <div class="layer-presentation"></div>
    </div>
    <div class="bottom-layer" aria-hidden="true">
      <div class="layer-presentation"></div>
    </div>
    <div class="top-subsection__content">
      <h1 class="top-subsection__title">
        Give yourself a better life, experience LASIK or PRK laser eye surgery with the
        <span class="brand-name">
          Lasik<span>Plus</span>
        </span> 
        family.
      </h1>
      <div>
        <div class="google-reviews">
          <span class="amount">4.5</span>
          <!--=include ../common/star_bar.html -->
          <p>23,662 Total Google reviews proudly averaging 5.0 across all 54 of our locations!</p>
        </div>
        <div class="location-search">
          <form action="" class="location-search__form">
            <button class="location-search__button button button-secondary" type="button" aria-hidden="true">
              <i class="far fa-map-marker"></i>
            </button>
            <label for="id_location" class="location-search__label">
              Enter a Zip Code, City, State, or Doctor Name
            </label>
            <input id="id_location" class="location-search__input autocomplite-trigger browser-default" data-target="#location-autocomplite" type="text" placeholder="Where are you located?">
            <div class="location-search__autocomplete" id="location-autocomplite">
              <ul>
                <li>
                  <a href="#">
                    <span>Zip Code Match</span>
                    <p>Cincinnati Vision Center</p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span>Zip Code Match</span>
                    <p>Cincinnati Vision Center</p>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <span>Zip Code Match</span>
                    <p>Cincinnati Vision Center</p>
                  </a>
                </li>
              </ul>
            </div>
            <a class="modal-trigger location-search__show-all" href="#all-location ">View All Locations</a>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--=== Top subsection end ===-->
  <!--=== Special Offer start ===-->
  <div class="special-offer">
    <div class="container align-center text-white">
      <h2 class="special-offer__title">Special Offer</h2>
      <h3 class=special-offer__subtitle>
        LASIK Starting as low as $250
      </h3>
      <p class="special-offer__text">
        Hurry! Limited Time Offer!
      </p>
      <button class="btn-simple btn-simple--icon btn-simple--dark-green btn-simple--big special-offer__button waves-effect waves-light" type="button">
        <i class="far fa-calendar-alt btn-simple__icon"></i>
        <span class="btn-simple__text">Schedule Today!</span>
      </button>
    </div>
  </div>
  <!--=== Special Offer end ===-->
</section>
<!--=== Top section end ===-->

<?php 
	$args = array(
		'post_type'		=> 'story',
		'post_status'	=> 'publish',
		'meta_key'		=> 'show_on_homepage',
		'meta_value'	=> '1'
	);
	$stories_query = new WP_Query( $args );
?>
<section class="patient-stories">
  	<div class="container">
  		
			<div class="patient-stories__slider">
			<?php if(have_posts()) : while($stories_query->have_posts()) : $stories_query->the_post(); ?>
				<div class="patient-stories__item">
					<?php $meta_data = get_post_meta($post->ID, 'story_fields')[0]; ?>
					<div class="row">
						<div class="col x12 m6 l5 xl6 img">
							
							<?php if( isset($meta_data['image']) ) : ?>
							<div class="phone">
								<picture class="hide-on-small-only">
								  	<source media="(min-width: 540px)" data-srcset="<?php echo $meta_data['image']; ?>" />
								  	<img  alt="article" src="<?php echo $meta_data['image']; ?>">
								  	<noscript>
								    	<img  alt="article" src="<?php echo $meta_data['image']; ?>" />
								  	</noscript>
								</picture>
								<picture class="hide-on-med-and-up">
							  		<source media="(min-width: 540px)" data-srcset="<?php echo $meta_data['image']; ?>" />
								  		<img  alt="article" src="<?php echo $meta_data['image']; ?>">
								  	<noscript>
								    	<img  alt="article" src="<?php echo $meta_data['image']; ?>" />
								  	</noscript>
								</picture>
							</div>
							<?php endif; ?>
						</div>
						<div class="col x12 m6 l7 xl6 info">
						  <div class="patient-stories__content">
						    <div class="info__header">
						      <div class="custom-nav">
						        <button data-next class="custom-prev custom-nav__item" aria-hidden="true">
						          <i class="far fa-chevron-circle-left arrow-left "></i>
						        </button>
						        <button data-prev class="custom-next custom-nav__item" aria-hidden="true">
						          <i class="far fa-chevron-circle-right arrow-right"></i>
						        </button>
						        <div class="patient-stories__number">
						        	<?php 
						        		$stories_index 	= $stories_query->current_post + 1; 
						        		$stories_count 	= $stories_query->post_count; 
						        		$story_id 		= $post->ID;
						        	?>
						          PATIENT STORY <span class="current"><?php echo $stories_index; ?></span> OF <?php echo $stories_count; ?>
						        </div>
						      </div>
						      <ul class="custom-dots"></ul>
						    </div>
						    <div class="patient-stories__title">
						      <?php echo $meta_data['title']; ?>
						    </div>
						    <div class="patient-stories__subtitle">
						      <?php echo $meta_data['subtitle']; ?>
						    </div>
						    <div class="patient-stories__description">
						      <?php echo $meta_data['description']; ?>
						    </div>
						    <a href="<?php echo get_post_permalink($story_id);?>" class="btn-simple btn-simple--icon btn-simple--orange btn-simple--big">
						      <i class="far fa-angle-right btn-simple__icon"></i>
						      <span class="btn-simple__text">
						        Watch Stephanies’s LASIK Story
						      </span>
						    </a>
						  </div>
						</div>
					</div>
				</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>
			</div> 
  			
  		</div>
	</div>
</section>
<?php get_footer(); ?>
