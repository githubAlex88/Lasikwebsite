<section class="downloads-section">
  <div class="container">

    <?php get_template_part( 'template-parts/page/candidacy-quiz', 'widgets' ); ?>

    <div class="download-item download-item__reverse">
      <div class="download-item__img rl-direction">
        <div class="image-wrapper">
          <img src="<?php the_field( "download_information_image" ); ?>" alt="Download Information">
        </div>
      </div>
      <div class="download-item__content">
        <h2>FREE DOWNLOAD</h2>
        <h3><?php the_field( "download_information_title" ); ?></h3>
        <p><?php the_field( "download_information_text" ); ?></p>
        <a href="#information-kit" class="btn-simple btn-simple--icon btn-simple--orange btn-simple--full-width modal-trigger">
          <i class="far fa-arrow-to-bottom btn-simple__icon" aria-hidden="true"></i>
          <span class="btn-simple__text"><?php the_field( "download_information_button_text" ); ?></span>
        </a>
      </div>
    </div>

  </div>

  <div class="background-decoration bottom-top" aria-hidden="true">
    <span class="brand-name"><span>Lasik</span><span>Plus</span></span>
  </div>
  <div class="background-decoration top-bottom" aria-hidden="true">
    <span class="brand-name"><span>Lasik</span>Plus</span>
  </div>

</section>