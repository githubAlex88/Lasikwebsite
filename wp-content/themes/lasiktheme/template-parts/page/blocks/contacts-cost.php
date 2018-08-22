<?php if ($block) : ?>
<div class="select-block">
  <div class="container">
    <h2 class="select-block__title"><?php echo $block['title']; ?></h2>
    <div class="row">

      <div class="col s12 m6 select-block__item">
        <div class="input-field form-select">
          <select name="age" id="select-age">
            <option value="" disabled selected>Choose your option</option>
            <?php foreach ( $block['age_ranges'] as $index => $range ) : ?>
              <option value="<?php echo $index + 1; ?>"><?php echo $range['lower_limit']; ?> - <?php echo $range['upper_limit']; ?></option>
            <?php endforeach; ?>
          </select>
          <label for="select-age">Your Age Range:</label>
        </div>
      </div>

      <div class="col s12 m6 select-block__item">
        <div class="input-field form-select">
          <select name="type" id="select-type">
            <option value="" disabled selected>Choose your option</option>
            <?php foreach ( $block['contacts_types'] as $index => $type ) : ?>
              <option value="<?php echo $index + 1; ?>"><?php echo $type['name']; ?></option>
            <?php endforeach; ?>
          </select>
          <label for="select-type">Your Contacts Type:</label>
        </div>
      </div>

    </div>
  </div>

</div>

<div class="info-block">

  <div class="info-block__content">

    <div class="info-block__icon-wrapper">
      <img src="<?php echo get_template_directory_uri() . '/assets/svg/lca-logo-white.svg'; ?>" alt="img" class="info-block__img">
    </div>

    <div class="info-block__info">
      <p class="info-block__subtitle">††Estimated cost of your contacts over time:</p>
      <p class="info-block__text info-block__text--big info-block__text--center">$24,640</p>
    </div>
  </div>

  <div class="info-block__footer">
    <button class="info-block__button btn-simple btn-simple--icon btn-simple--orange btn-simple--big btn-simple--center waves-effect waves-light" type="button">
      <i class="far fa-usd-circle btn-simple__icon"></i>
      <span class="btn-simple__text">
      Book Free Consultation
    </span>
    </button>
  </div>

</div>

<div class="info-text">
  <div class="container">
    <div class="info-text__content">
      <p class="info-text__text">
        <?php echo $block['info_text']; ?>
      </p>
    </div>
  </div>
</div>
<?php endif; ?>
