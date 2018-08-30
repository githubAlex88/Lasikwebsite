<?php get_header(); ?>

<!--=== Top banner start ===-->
<section class="top-banner top-banner--mask-blue" style="background-image:url('<?php the_post_thumbnail_url(); ?>')">
  <div class="top-banner__wrapper">
    <!--=== Top banner content start ===-->
    <div class="top-banner__content">
      <h1 class="top-banner__title">
        <?php the_field( 'location_city' ); ?>, <?php the_field( 'location_state' ); ?> LASIK & PRK Vision Center
      </h1>
      <p class="top-banner__subtitle">
        <?php the_field( 'top_section_subtitle' ); ?>
      </p>
    </div>
    <!--=== Top banner content finish ===-->
    <a href="#information-kit" class="btn-simple btn-simple--orange btn-simple--big btn-simple--center modal-trigger">
    <span class="btn-simple__text btn-simple__text--big">
      <?php the_field( 'top_section_button_text' ); ?>
    </span>
    </a>
  </div>
</section>
<!--=== Top banner finish ===-->

<div class="address-block__wrapper address-block__wrapper--blue">
  <div class="address-block">
    <a href="#" class="btn-simple btn-simple--orange btn-simple--big">
      <i class="fas fa-map-marker-alt btn-simple__icon btn-simple__icon--static btn-simple__icon--big"></i>
      <span class="btn-simple__text">
      GET DIRECTIONS
    </span>
    </a>
    <div class="address-block__content">
      <p class="address-block__text"><?php the_field( 'location_address' ); ?></p>
      <p class="address-block__text"><?php the_field( 'location_city' ); ?>, <?php the_field( 'location_state' )['label']; ?> <?php the_field( 'location_zip' ); ?></p>
    </div>
  </div>
</div>

<!--=== Spotlight start ===-->
<?php
$doctor = get_field("doctor_spotlight");

if( $doctor ) {
  include( locate_template('template-parts/doctor-spotlight.php', false, false));
}
?>
<!--=== Spotlight end ===-->

<!--=== Patient stories start ===-->
<?php include( locate_template('template-parts/patient-stories.php', false, false)); ?>
<!--=== Patient stories end ===-->

<section class="article-feed-section wrap-article-list">
  <div class="article-feed-main">
    <div class="container">
      <div class="row article-feed__content">
        <div class="col s12 m8">
          <?php get_template_part( 'template-parts/page/candidacy-quiz', 'widgets' ); ?>

          <div class="row">
            <?php
            // Query articles
            $article_query = new WP_Query( array(
              'posts_per_page'  => 2,
              'post_type'       => 'post'
            ));

            if ( $article_query->have_posts() ) :
              while ( $article_query->have_posts() ) :
                $article_query->the_post(); ?>

                <div class="col s12 m6">
                  <?php get_template_part( 'template-parts/articles/article-item' ); ?>
                </div>

              <?php endwhile;

              wp_reset_postdata();
            endif; ?>
          </div>
        </div>

        <div class="col s12 m4 social-reviews-wrapper">
          <?php get_template_part( 'template-parts/reviews/social_reviews' ) ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!--=== Instagram feed start ===-->
<?php
if ( get_field( 'instagram_access_token' ) ) {
  $instagram_access_token = get_field( 'instagram_access_token' );

  include( locate_template( 'template-parts/instagram-feed.php', false, false ) );
}
?>
<!--=== Instagram feed end ===-->


<?php get_footer(); ?>