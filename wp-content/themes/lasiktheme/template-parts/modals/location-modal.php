<!--=== Search location start ===-->
<div class="modal" id="location-modal">

  <button type="button" class="modal__close modal-close">
    <i class="far fa-times"></i>
  </button>
  <!--=== Search Form start ===-->
  <div class="search-modal autocomplite">
    <div class="search-modal__content">
      <form action="<?php echo admin_url( 'admin-post.php' ); ?>" method="post" class="search-modal__form change-location" autocomplete="off">
        <?php wp_nonce_field('location-nonce', 'location_form_nonce'); ?>
        <div class="input-field">
          <input 
            type="text" 
            id="location"
            data-target="#locations"
            class="search-modal__input browser-default">
            <input type="hidden" name="action" value="process_form">
            <input id="locationData" type="hidden" name="location_data" value="">
            <label for="location" class="search-modal__label">Enter a Zip Code, City, State, or Doctor Name</label>
        </div>
        <button class="search-modal__submit" type="submit">
          <i class="far fa-search search-modal__icon"></i>
        </button>
      </form>
      <ul class="search-modal__result" id="locations">
        <?php get_template_part( 'template-parts/modals/location-list' ); ?>
      </ul>
    </div>
  </div>
  <!--=== Search Form end ===-->

  <div class="current-postiton">
    <span class="current-postiton__text">OR</span>
    <a href="#" class="current-postiton__button button button-secondary">
      <i class="far fa-map-marker"></i>
      <span>
        Use My Current Location
      </span>
    </a>
  </div>

</div>
<!--=== Search location end ===-->