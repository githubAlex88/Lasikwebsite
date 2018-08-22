<?php if ($block) : ?>
<div class="info-block" style="padding-top: 0; margin-top: -55px;">
  <?php if ( $block['items'] ) : ?>
    <div class="info-block__questions">
      <?php foreach( $block['items'] as $post):
        setup_postdata($post);
        $categories = get_the_category(); ?>
        <div class="question">
          <span class="question__category"><?php echo $categories[0]->cat_name; ?></span>
          <a href="#faq-modal-<?php echo $post->post_name; ?>" class="question__title modal-trigger">
            <?php the_title(); ?>
          </a>
        </div>
        <div class="modal modal--white modal--no-padding" id="faq-modal-<?php echo $post->post_name; ?>">

          <button type="button" class="modal__close modal__close--blue modal-close">
            <i class="far fa-times"></i>
          </button>
          <div class="modal__wrapper modal__wrapper--padding">
            <div class="modal__header modal__header--blue-line modal__header--left">
              <span class="modal__subtitle modal__subtitle--small"><?php echo strtoupper( $categories[0]->cat_name ); ?></span>
              <h2 class="modal__title modal__title--blue modal__title--small modal__title--no-margin">
                <?php the_title(); ?>
              </h2>
            </div>

            <div class="modal__content modal__content--big-padding">
              <p class="modal__text">
                <?php the_content(); ?>
              </p>
            </div>

            <div class="current-postiton current-postiton--center current-postiton--bottom">
              <button class="btn-simple btn-simple--icon btn-simple--orange btn-simple--full-width btn-simple--high waves-effect waves-light" type="button">
                <i class="far fa-calendar-alt btn-simple__icon"></i>
                <span class="btn-simple__text btn-simple__text--very-big">Book Free Consultation</span>
              </button>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <?php wp_reset_postdata(); ?>
    </div>
  <?php endif; ?>

  <?php $footer = $block['footer']; ?>
  <?php if ( $footer['enable'] ) : ?>
    <div class="info-block__footer">
      <button class="info-block__button btn-simple btn-simple--icon btn-simple--orange btn-simple--big btn-simple--center waves-effect waves-light" type="button">
        <i class="far fa-<?php echo $footer['button_icon']; ?> btn-simple__icon"></i>
        <span class="btn-simple__text">
      <span><?php echo $footer['button_text']; ?></span>
    </span>
      </button>
      <?php if ( !$footer['button_only'] ): ?>
        <div class="communion">

          <ul class="communion__list communion__list--small">
            <li class="communion__item">
              <a href="#" class="communion__link">
                <i class="fal fa-mobile communion__icon"></i>
                <span class="communion__text">Call Us</span>
              </a>
            </li>
            <li class="communion__item">
              <a href="#" class="communion__link">
                <i class="fal fa-comment communion__icon"></i>
                <span class="communion__text">Live Chat</span>
              </a>
            </li>
            <li class="communion__item">
              <a href="#" class="communion__link">
                <i class="fal fa-envelope communion__icon"></i>
                <span class="communion__text">Email</span>
              </a>
            </li>
          </ul>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</div>
<?php endif; ?>