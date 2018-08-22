<?php if ($block) : ?>
<div class="info-block">

  <div class="info-block__content">

    <?php if ( $block['enable_image'] !== 'None' ): ?>
      <div class="info-block__icon-wrapper">
        <?php if ( $block['enable_image'] === 'FA Icon' ): ?>
          <i class="far fa-<?php echo $block['icon_class']; ?> info-block__icon"></i>
        <?php else : ?>
          <?php $src = $block['enable_image'] === 'Image' ? $block['image'] : ( get_template_directory_uri() . "/assets/svg/{$block['svg']}.svg" ); ?>
          <img src="<?php echo $src; ?>" alt="img" class="info-block__img">
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if ( $block['enable_image'] === 'Image' ): ?>
      <div class="info-block__icon-wrapper">
        <i class="far fa-<?php echo $block['icon_class']; ?> info-block__icon"></i>
      </div>
    <?php endif; ?>

    <div class="info-block__info">
      <p class="info-block__subtitle"><?php echo $block['subtitle']; ?></p>
      <h2 class="info-block__title"><?php echo $block['title']; ?></h2>
      <p class="info-block__text"><?php echo $block['text']; ?></p>
    </div>
  </div>

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