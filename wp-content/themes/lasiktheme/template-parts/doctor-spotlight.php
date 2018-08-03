<?php

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