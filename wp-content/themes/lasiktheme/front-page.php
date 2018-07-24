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
            <a class="modal-trigger location-search__show-all" href="#all-location">View All Locations</a>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--=== Top subsection end ===-->
  <!--=== Special Offer start ===-->
  <?php  if( have_rows( 'top_section' ) ): ?>
     <?php while( have_rows( 'top_section' ) ) : the_row(); ?>
        <?php $special_offer_row = get_sub_field( 'special_offer' ); ?>    
      <div class="special-offer">
        <div class="container align-center text-white">          
          <h2 class="special-offer__title"><?php echo $special_offer_row[ 'title' ];?></h2>
          <h3 class=special-offer__subtitle>
            <?php echo $special_offer_row[ 'subtitle' ]; ?>
          </h3>
          <p class="special-offer__text">
            <?php echo $special_offer_row[ 'offer_text' ]; ?>
          </p>
          <button class="btn-simple btn-simple--icon btn-simple--dark-green btn-simple--big special-offer__button waves-effect waves-light" type="button">
            <i class="far fa-calendar-alt btn-simple__icon"></i>
            <span class="btn-simple__text"><?php echo $special_offer_row[ 'schedule_button_text' ]; ?></span>
          </button>

      <?php endwhile; ?>
        </div>
      </div>
  <?php endif; ?>
  <!--=== Special Offer end ===-->
</section>
<!--=== Top section end ===-->

<?php 
    $args = array(
        'post_type'     => 'story',
        'post_status'   => 'publish',
        'meta_key'      => 'is_homepage_visible',
        'meta_value'    => '1'
    );
    $stories_query = new WP_Query( $args );
?>
<section class="patient-stories">
    <div class="container">         
        <div class="patient-stories__slider">
            <?php if(have_posts()) : while($stories_query->have_posts()) : $stories_query->the_post(); ?>
            <div class="patient-stories__item">
                <?php $meta_data = get_post_meta($post->ID); ?>
                <div class="row">
                    <div class="col x12 m6 l5 xl6 img">
                        <?php if( isset($meta_data['image']) ) : ?>
                        <div class="phone">
                            <picture class="hide-on-small-only">
                                <source media="(min-width: 540px)" data-srcset="<?php echo $meta_data['image'][0]; ?>" />
                                <img  alt="article" src="<?php echo $meta_data['image'][0]; ?>">
                                <noscript>
                                    <img  alt="article" src="<?php echo $meta_data['image'][0]; ?>" />
                                </noscript>
                            </picture>
                            <picture class="hide-on-med-and-up">
                                <source media="(min-width: 540px)" data-srcset="<?php echo $meta_data['image'][0]; ?>" />
                                    <img  alt="article" src="<?php echo $meta_data['image'][0]; ?>">
                                <noscript>
                                    <img  alt="article" src="<?php echo $meta_data['image'][0]; ?>" />
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
                                <?php echo $meta_data['title'][0]; ?>
                            </div>
                            <div class="patient-stories__subtitle">
                                <?php echo $meta_data['subtitle'][0]; ?>
                            </div>
                            <div class="patient-stories__description">
                                <?php echo $meta_data['description'][0]; ?>
                            </div>
                            <a href="<?php echo get_post_permalink( $story_id );?>" class="btn-simple btn-simple--icon btn-simple--orange btn-simple--big">
                                <i class="far fa-angle-right btn-simple__icon"></i>
                                <span class="btn-simple__text">
                                    <?php echo $meta_data['story_text'][0]; ?>
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
                                            <div class="hidden" data-target="section-title">
                                                <?php the_sub_field( 'cost_title' ); ?>
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
                              Learn More About <span class="section-title"><?php echo $title; ?></span>
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
<!--=== Spotlight start ===-->
<?php
$doctor = get_field("doctor_spotlight");

if( $doctor ):
  $vision_center = get_field( "team_member_vision_centers", $doctor->ID )[0];
  $job = wp_get_post_terms( $doctor->ID, "lasik_job", array("fields" => "names") )[0]; ?>
  <section class="spotlight">
    <div class="spotlight__wrapper">
      <div class="container">
        <div class="row align-center-xl justify-center-xl">
          <div class=" col s12 m6 l5 xl6">
            <!--=== Spotlight main info start ===-->
            <div class="spotlight__main-info">

              <div class="spotlight__header">
                <div class="spotlight__personal">
                  <h2 class="spotlight__name"><?php echo get_the_title( $doctor->ID ); ?>, <?php echo $job; ?></h2>
                  <p class="spotlight__place"><?php the_field( "location_city", $vision_center ); ?>, <?php the_field( "location_state", $vision_center ); ?> Vision Center</p>
                </div>
                <div class="spotlight__work-experience">
                  <p><?php the_field( "team_member_experience", $doctor->ID ); ?> Years of Experience</p>
                  <p>Over <?php echo number_format( get_field( "team_member_procedures", $doctor->ID ) ); ?> LASIK Procedures Performed</p>
                </div>
              </div>

              <div class="spotlight__about hide-on-med-and-up">
                “<?php the_field( "team_member_quote", $doctor->ID ); ?>”
              </div>

              <img src="<?php the_field( "team_member_picture", $doctor->ID ); ?>" alt="<?php echo get_the_title( $doctor->ID ); ?>, <?php echo $job; ?>">
            </div>
            <!--=== Spotlight main info end ===-->
          </div>
          <div class="col s12 m6 l7 xl6">
            <!--=== Spotlight review start ===-->
            <div class="spotlight__review">
              <div class="row align-end-l">

                <div class="col s12 l4 spotlight-with-photo">
                  <div class="row column-reverse-l">
                    <div class="col s12 m5 l12">
                      <div class="row">
                        <div class="col s4 m12">
                          <div class="spotlight__profile-photo">
                            <img class="hide-on-med-and-down" src="<?php echo get_the_post_thumbnail_url( $doctor->ID ); ?>" alt="<?php echo get_the_title( $doctor->ID ); ?>, <?php echo $job; ?>">
                            <img class="hide-on-large-only" src="<?php echo get_the_post_thumbnail_url( $doctor->ID ); ?>" alt="<?php echo get_the_title( $doctor->ID ); ?>, <?php echo $job; ?>">
                          </div>
                        </div>

                        <div class="col s8 m12 hide-on-large-only">
                          <a href="#" class="reviews-link" target="_blank" title="View the google reviews">
                            <!--=include ../common/star_bar.html -->
                            <div class="review-amount">
                              129 - Reviews on Google
                            </div>
                            <!--=include ../common/google_logo.html -->
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="col s12 m7 l12 hide-on-small-only">
                      <div class="spotlight__about">
                        “<?php the_field( "team_member_quote", $doctor->ID ); ?>”
                      </div>
                    </div>
                  </div>
                </div>

                <div class=" col s12 l8 spotlight-with-review">
                  <div class="col l12 hide-on-med-and-down">
                    <a href="#" class="reviews-link" target="_blank" title="View the google reviews">
                      <!--=include ../common/star_bar.html -->
                      <div class="review-amount">
                        129 - Reviews on Google
                      </div>
                      <!--=include ../common/google_logo.html -->
                    </a>
                  </div>
                  <div class="review-title">
                    <h3 class="review-own">A REVIEW FROM OUR PATIENT,  LORI S.</h3>
                    <div class="review-hint">
                      This review was unsolicited and submitted recently by Lori S. directly to Google for our Portland Vision Center.
                    </div>
                  </div>
                  <div class="review-body">
                    Absolutely wonderful! Best experience from beginning to end. Wonderful, knowledgeable staff who were very thorough in explaining all the steps from what was to happen in the initial consultation, through the procedure and the aftercare as well as what to expect from my vision all the way through the first year....
                  </div>
                  <a href="#" class="btn-simple btn-simple--icon btn-simple--orange btn-simple--full-width">
                    <i class="fab fa-wpexplorer btn-simple__icon"></i>
                    <span class="btn-simple__text">
                      Explore Our Vision Centers
                    </span>
                  </a>
                </div>

              </div>
            </div>
            <!--=== Spotlight review end ===-->
          </div>
        </div>
      <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
<?php endif; ?>
<!--=== Spotlight end ===-->
<!--=== Downloads start ===-->
<section class="downloads-section">
  <div class="container">

    <div class="download-item">
      <div class="download-item__img lr-direction">
        <div class="image-wrapper">
          <img src="<?php the_field( "candidacy_image" ); ?>" alt="Candidacy Quiz">
        </div>
      </div>
      <div class="download-item__content">
        <h2>CANDIDACY QUIZ</h2>
        <h3><?php the_field( "candidacy_title" ); ?></h3>
        <p><?php the_field( "candidacy_text" ); ?></p>
        <a href="#candidacy-quiz" class="btn-simple btn-simple--icon btn-simple--orange btn-simple--full-width modal-trigger">
          <i class="far fa-question-circle btn-simple__icon" aria-hidden="true"></i>
          <span class="btn-simple__text"><?php the_field( "candidacy_button_text" ); ?></span>
        </a>
      </div>
    </div>

    <div class="download-item download-item__reverse">
      <div class="download-item__img rl-direction">
        <div class="image-wrapper">
          <img src="<?php the_field( "download_information_image" ); ?>" alt="Download Information">
        </div>
      </div>
      <div class="download-item__content">
        <h2>FREE DOWNLOAD</h2>
        <h3><?php the_field( "download_information_title" ); ?></h3>
        <p><?php the_field( "download_information_text" ); ?></p>
        <a href="#information-kit" class="btn-simple btn-simple--icon btn-simple--orange btn-simple--full-width modal-trigger">
          <i class="far fa-arrow-to-bottom btn-simple__icon" aria-hidden="true"></i>
          <span class="btn-simple__text"><?php the_field( "download_information_button_text" ); ?></span>
        </a>
      </div>
    </div>

  </div>

  <div class="background-decoration bottom-top" aria-hidden="true">
    <span class="brand-name"><span>Lasik</span><span>Plus</span></span>
  </div>
  <div class="background-decoration top-bottom" aria-hidden="true">
    <span class="brand-name"><span>Lasik</span>Plus</span>
  </div>

</section>
<!--=== Downloads end ===-->
<!--=== Article feed start ===-->
<?php
// Query last 6 articles
$article_query = new WP_Query( array(
  'posts_per_page' => 6,
  'post_type'       => 'post'
));

if ( $article_query->have_posts() ) :
  $articles = $article_query->posts;
?>
<section class="article-feed-section">
  <div class="article-feed-presentation" aria-hidden="true">
    <div class="upper-layer">
      <div class="layer-presentation"></div>
    </div>
    <div class="bottom-layer">
      <div class="layer-presentation"></div>
    </div>
  </div>
  <div class="container">
    <h2 class="article-feed-title"><?php the_field( 'article_feed_title' ); ?></h2>
  </div>
  <div class="article-feed-main">
    <div class="container">
      <div class="row article-feed__content">
        <div class="col s12 m8">
          <?php
          $post = $articles[0];
          setup_postdata( $post );
          include( locate_template( 'template-parts/articles/article_middle.php', false, false ) );
          wp_reset_postdata();
          ?>
          <div class="row">
            <?php if ( $articles[1] ) : ?>
            <div class="col s12 m6">
              <?php
              $post = $articles[1];
              setup_postdata( $post );
              include( locate_template( 'template-parts/articles/article_small.php', false, false ) );
              wp_reset_postdata();
              ?>
            </div>
            <?php endif; ?>
            <?php if ( $articles[2] ) : ?>
              <div class="col s12 m6">
                <?php
                $post = $articles[2];
                setup_postdata( $post );
                include( locate_template( 'template-parts/articles/article_small.php', false, false ) );
                wp_reset_postdata();
                ?>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <div class="col s12 m4 social-reviews-wrapper">
          <?php get_template_part( 'template-parts/reviews/social_reviews', 'widgets' ) ?>
        </div>
        <div class="col s12 feed-banner-wrapper">
          <div class="feed-banner">
            <h2 class="feed-banner__title">
              <?php the_field( 'article_feed_banner_content' ); ?>
            </h2>
          </div>
        </div>
        <?php if ( $articles[3] ) : ?>
        <div class="col s12">
          <?php
          $post = $articles[3];
          setup_postdata( $post );
          include( locate_template( 'template-parts/articles/article_large.php', false, false ) );
          wp_reset_postdata();
          ?>
        </div>
        <?php endif; ?>
        <?php if ( $articles[4] ) : ?>
          <div class="col s12 m6">
            <?php
            $post = $articles[4];
            setup_postdata( $post );
            include( locate_template( 'template-parts/articles/article_horizontal.php', false, false ) );
            wp_reset_postdata();
            ?>
          </div>
        <?php endif; ?>
        <?php if ( $articles[5] ) : ?>
          <div class="col s12 m6">
            <?php
            $post = $articles[5];
            setup_postdata( $post );
            include( locate_template( 'template-parts/articles/article_horizontal.php', false, false ) );
            wp_reset_postdata();
            ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<!--=== Article feed end ===-->
<?php echo do_shortcode( '[instagram-feed accesstoken="3243597769.927e8a9.5f818e8bdaa14f8fb383607be5758f66"]' ); ?>
<?php get_footer(); ?>
