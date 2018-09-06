<div class="download-item<?php echo get_post_type() === 'lasik_location' ? ' download-item--big' : ''; ?>">
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