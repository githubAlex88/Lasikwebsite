<div class="special-offer <?php echo $special_offer['static'] ? ' special-offer--static' : ''; ?>">
  <div class="container align-center text-white">
    <h2 class="special-offer__title"><?php echo $special_offer[ 'title' ];?></h2>
    <h3 class=special-offer__subtitle>
      <?php echo $special_offer[ 'subtitle' ]; ?>
    </h3>
    <p class="special-offer__text">
      <?php echo $special_offer[ 'offer_text' ]; ?>
    </p>
    <button class="btn-simple btn-simple--icon btn-simple--dark-green btn-simple--big special-offer__button waves-effect waves-light" type="button">
      <i class="far fa-calendar-alt btn-simple__icon"></i>
      <span class="btn-simple__text"><?php echo $special_offer[ 'schedule_button_text' ]; ?></span>
    </button>
  </div>
</div>