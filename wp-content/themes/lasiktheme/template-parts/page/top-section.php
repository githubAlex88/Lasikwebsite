<!--=== Top banner start ===-->
<section class="top-banner" style="background-image:url('<?php the_field('top_section_background'); ?>')">
  <!--=== Top banner content start ===-->
  <div class="top-banner__content">
    <div class="breadcrumbs">
      <ul class="breadcrumbs__list">
        <li class="breadcrumbs__item">
          <a href="/" class="breadcrumbs__link">Home</a>
        </li>
        <?php if ( $post->post_parent ): ?>
          <li class="breadcrumbs__item">
            <a href="<?php echo get_permalink( $post->post_parent ); ?>" class="breadcrumbs__link"><?php echo get_the_title( $post->post_parent ); ?></a>
          </li>
        <?php endif; ?>
        <li class="breadcrumbs__item">
          <a href="<?php the_permalink(); ?>" class="breadcrumbs__link"><?php the_title(); ?></a>
        </li>
      </ul>
    </div>

    <h1 class="top-banner__title">
      <?php get_field( 'top_section_title' ) ? the_field( 'top_section_title' ) : the_title(); ?>
    </h1>
  </div>
  <!--=== Top banner content finish ===-->
  <a href="#information-kit" class="btn-simple btn-simple--orange btn-simple--big btn-simple--center modal-trigger">
    <i class="far fa-calendar-alt btn-simple__icon btn-simple__icon--static btn-simple__icon--big" aria-hidden="true"></i>
    <span class="btn-simple__text btn-simple__text--big">
        <?php if ( get_field( 'top_section_schedule_button_title' ) ): ?>
          <span><?php the_field( 'top_section_schedule_button_title' ); ?></span>
        <?php endif; ?>
        <span>Shedule a Free Appointment</span>
      </span>
  </a>
</section>
<!--=== Top banner finish ===-->
