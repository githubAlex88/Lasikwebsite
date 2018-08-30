<?php if ( get_field( 'image_section_enable' ) ): ?>
  <div class="img-section">
    <div class="img-section__content">
      <img src="<?php the_field( 'image_section_image' ) ?>" class="img-section__img" alt="Article">
    </div>
  </div>
<?php endif; ?>