<?php if ($block) : ?>
<div class="plans">
  <div class="container">

    <div class="plans__header">
      <h2 class="plans__title"><?php echo $block['title']; ?></h2>
      <p class="plans__text">
        <?php echo $block['text']; ?>
      </p>
    </div>

    <?php if ( $block['items'] ) : ?>
      <div class="plans__content">

        <?php foreach( $block['items'] as $post): ?>
          <?php setup_postdata($post); ?>
            <a href="#insurance-modal-<?php echo $post->post_name; ?>" class="plans-item modal-trigger">
              <i class="far fa-plus-circle plans-item__icon"></i>
              <div class="plans-item__content">
                <span class="plans-item__subtitle">PROVIDER</span>
                <h3 class="plans-item__title"><?php the_title(); ?></h3>
              </div>
            </a>
            <div class="modal modal--white" id="insurance-modal-<?php echo $post->post_name; ?>">

              <button type="button" class="modal__close modal__close--blue modal-close">
                <i class="far fa-times"></i>
              </button>

              <div class="modal__header modal__header--big-padding modal__header--blue-line">
                <h2 class="modal__title modal__title--blue modal__title--big modal__title--center"><?php the_title(); ?></h2>
              </div>

              <div class="modal__content modal__content--big-padding">
                <?php if ( get_field( 'plan_features' ) ) : ?>
                  <?php foreach ( get_field( 'plan_features' ) as $plan_feature ) : ?>
                    <div class="arrow-item">
                      <i class="far fa-caret-right arrow-item__icon"></i>
                      <p class="arrow-item__text"><?php echo $plan_feature['text']; ?></p>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>

              <div class="current-postiton current-postiton--center current-postiton--bottom">
                <button class="btn-simple btn-simple--icon btn-simple--orange btn-simple--big btn-simple--high waves-effect waves-light" type="button">
                  <i class="far fa-calendar-alt btn-simple__icon"></i>
                  <span class="btn-simple__text btn-simple__text--very-big">Book Free Consultation</span>
                </button>
              </div>

            </div>
        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>

      </div>

    <?php endif; ?>
  </div>
</div>
<?php endif; ?>