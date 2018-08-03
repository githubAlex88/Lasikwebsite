<section class="downloads-section">
  <div class="container">

    <div class="download-item">
      <div class="download-item__img lr-direction">
        <div class="image-wrapper">
          <img src="<?php the_field( "candidacy_image" ); ?>" alt="Candidacy Quiz">
        </div>
      </div>
      <div class="download-item__content">
        <h2>CANDIDACY QUIZ</h2>
        <h3><?php the_field( "candidacy_title" ); ?></h3>
        <p><?php the_field( "candidacy_text" ); ?></p>
        <a href="#candidacy-quiz" class="btn-simple btn-simple--icon btn-simple--orange btn-simple--full-width modal-trigger">
          <i class="far fa-question-circle btn-simple__icon" aria-hidden="true"></i>
          <span class="btn-simple__text"><?php the_field( "candidacy_button_text" ); ?></span>
        </a>
      </div>
    </div>

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