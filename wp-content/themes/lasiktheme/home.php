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
          <div class="star-bar">
            <div class="empty-stars">
              <span>
                <svg viewBox="0 0 22 22">
                  <use xlink:href="#review-star"></use>
                </svg>
              </span>
              <span>
                <svg viewBox="0 0 22 22">
                  <use xlink:href="#review-star"></use>
                </svg>
              </span>
              <span>
                <svg viewBox="0 0 22 22">
                  <use xlink:href="#review-star"></use>
                </svg>
              </span>
              <span>
                <svg viewBox="0 0 22 22">
                  <use xlink:href="#review-star"></use>
                </svg>
              </span>
              <span>
                <svg viewBox="0 0 22 22">
                  <use xlink:href="#review-star"></use>
                </svg>
              </span>
            </div>
            <div class="accentuated-stars rate-4-5">
              <span>
                <svg viewBox="0 0 22 22">
                  <use xlink:href="#review-star"></use>
                </svg>
              </span>
              <span>
                <svg viewBox="0 0 22 22">
                  <use xlink:href="#review-star"></use>
                </svg>
              </span>
              <span>
                <svg viewBox="0 0 22 22">
                  <use xlink:href="#review-star"></use>
                </svg>
              </span>
              <span>
                <svg viewBox="0 0 22 22">
                  <use xlink:href="#review-star"></use>
                </svg>
              </span>
              <span>
                <svg viewBox="0 0 22 22">
                  <use xlink:href="#review-star"></use>
                </svg>
              </span>
            </div>
          </div>
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
        'post_type'     => 'story',
        'post_status'   => 'publish',
        'meta_key'      => 'show_on_homepage',
        'meta_value'    => '1'
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
                                        $stories_index  = $stories_query->current_post + 1; 
                                        $stories_count  = $stories_query->post_count; 
                                        $story_id       = $post->ID;
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
</section>
<section class="cost-section">
    <div class="container">
        <div class="row">
            <div class="col s12 xl4">
                <h2 class="text-white cost-section__title">
                    <?php echo get_field('cost_section_title'); ?>
                </h2>
            </div>
            <div class="col s12 xl8">
                <div class="row">
                    <div class="col s12 m6">
                        <div class="rotator">
                            <div class="rotator-circle">
                                <div class="bg-rotator">
                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="3461.658 610.83 47.527 60.17">
                                    <g id="lca-icon" transform="translate(3463.658 615.83)">
                                      <path id="Path_2423" class="cls-1" d="M16.414,2.23A27.253,27.253,0,0,0,3.6,12.866H14.125Z" transform="translate(-0.582 -0.173)"
                                      />
                                      <path id="Path_2424" class="cls-1" d="M25.864-.24a25.011,25.011,0,0,0-2.952.2l-.52,2.432L20.22,12.453H34.544l-.579,2.715-.7,3.248H18.953l-2.759,12.8H9.485l2.164-10.069.587-2.715H.512a1.938,1.938,0,0,1-.117.416C-1.87,29.41,5.871,37.947,17.654,37.93s23.205-8.578,25.478-19.156S37.664-.257,25.864-.24Z"
                                        transform="translate(-0.001 0.24)" />
                                    </g>
                                  </svg>
                                </div>
                                <div class="border-rotator">
                                    <svg viewBox="25 25 50 50">
                                        <circle cx="50" cy="50" r="25" fill="none" stroke="#1e2e45" stroke-width="0.3" />
                                        <circle class="border-path" cx="50" cy="50" r="25" fill="none" stroke="#ffffff" stroke-dashoffset="117.81" stroke-width="0.3" />
                                    </svg>
                                </div>
                                <div class="numbers">
                                        
                                    <?php if( have_rows('rotator_slider') ) : ?>
                                        <?php 
                                            $first_slider             = get_field( 'rotator_slider' )[0];
                                            $title                    = $first_slider['cost_title'];
                                            $sub_title                = $first_slider['cost_subtitle'];
                                            $section_description      = $first_slider['section_description'];
                                        ?>
                                        <?php while( have_rows( 'rotator_slider' ) ) : the_row(); ?>
                                            <?php 
                                                $index = get_row_index();
                                                $item_number = ($index < 9) ? '0' . $index : $index;
                                                $data_url = ($index < 9) ? 'cost-0' . $index : 'cost-' . $index;
                                                $is_active = ($index == 1) ? 'active' : '';
                                            ?>
                                        <div class="each <?php echo $is_active; ?>" data-number="<?php echo $index; ?>" data-url="<?php echo $data_url; ?>">
                                            <span data-target="cost-item__number" class="number"><?php echo $item_number; ?></span> 
                                            <div data-target="cost-item__title" class="hidden">
                                                <?php the_sub_field( 'cost_title' ); ?>
                                            </div>
                                            <div class="hidden" data-target="cost-item__subtitle">
                                                <?php the_sub_field( 'cost_subtitle' ); ?>
                                            </div>
                                            <div class="hidden" data-target="cost-item__description">
                                                <?php the_sub_field( 'section_description' ); ?>
                                            </div>
                                        </div>
                                    <?php endwhile; endif; ?>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rotator-shown-values-wrapper col s12 m6">
                      <span class="rotator-connector" aria-hidden="true"></span>
                      <div class="rotator-shown-values cost-item text-white">
                        <h2 class="cost-item__header">
                          <span class="text-black cost-item__number">01</span><span>:</span>
                          <span class="cost-item__title"><?php echo $title; ?></span>
                        </h2>
                        <h3 class="cost-item__subtitle"><?php echo $sub_title; ?></h3>
                        <p class="cost-item__description"><?php echo $section_description; ?> </p>
                        <div class="btn-simple__wrapper">
                          <a href="#" class="btn-simple btn-simple--icon btn-simple--dark-blue btn-simple--big">
                            <i class="far fa-usd-circle btn-simple__icon"></i>
                            <span class="btn-simple__text btn-simple__text--small">
                              Learn More About <span class="section-title">Financing LASIK</span>
                            </span>
                          </a>
                        </div>

                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
