<!--=== Candidacy Quiz start ===-->
<div class="modal modal--no-padding" id="candidacy-quiz">

  <div class="quiz" id="quiz">
    <header class="quiz__header quiz-results-hide">
      <button type="button" class="quiz__back quiz-prev none" aria-hidden="true">
        <i class="far fa-angle-left"></i>
      </button>
      <h2 class="quiz__title">
        Find out if LASIK is right for you
      </h2>
      <button type="button" class="quiz__close modal-close" aria-hidden="true">
        <i class="far fa-times"></i>
      </button>
    </header>

    <div class="quiz__content">
      <div class="quiz__congratulations quiz-results-show">
        <button type="button" class="quiz__back quiz-prev">
          <i class="far fa-angle-left"></i>
        </button>
        <span>Results</span>
        <h3>Congratulations!</h3>
        <p class="quiz__subtitle quiz__subtitle--small">
          Your vision issues can most likely be corrected with a 
          LASIK procedure. Schedule a free consultation today.
        </p>
        <button type="button" class="quiz__close modal-close">
          <i class="far fa-times"></i>
        </button>
      </div>
      <p class="quiz__subtitle quiz-results-hide">
        Answer 5 simple question to see if you are a candidate
      </p>
      <div class="quiz__carousel" id="quiz-carousel">

        <div class="quiz__item">
          <div class="quiz__number quiz__number--hide-left">
            <span>1</span>
          </div>

          <div class="answers">
            <h3 class="answers__title">What is your age group?</h3>
            <ul class="answers__list">
              <li class="answers__item">
                <input type="radio" name="age" class="answer-trigger" id="age-1">
                <label class="answers__label" for="age-1">
                  <span class="answers__icon">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                  <p class="answers__text">18 - 35</p>
                </label>
              </li>
              <li class="answers__item">
                <input type="radio" name="age" class="answer-trigger" id="age-2">
                <label class="answers__label" for="age-2">
                  <span class="answers__icon">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                  <p class="answers__text">35 - 55</p>
                </label>
              </li>
              <li class="answers__item">
                <input type="radio" name="age" class="answer-trigger" id="age-3">
                <label class="answers__label" for="age-3">
                  <span class="answers__icon">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                  <p class="answers__text">55+</p>
                </label>
              </li>
            </ul>
          </div>

        </div>

        <div class="quiz__item">
          <div class="quiz__number">
            <span>2</span>
          </div>
          <div class="answers">
            <h3 class="answers__title">Do you wear...</h3>
            <ul class="answers__list">
              <li class="answers__item">
                <input type="radio" name="wear" class="answer-trigger" id="wear-1">
                <label class="answers__label" for="wear-1">
                  <span class="answers__icon">
                    <i class="fal fa-glasses"></i>
                  </span>
                  <p class="answers__text">Glasses</p>
                </label>
              </li>
              <li class="answers__item">
                <input type="radio" name="wear" class="answer-trigger" id="wear-2">
                <label class="answers__label" for="wear-2">
                  <span class="answers__icon">
                    <i class="far fa-eye"></i>
                  </span>
                  <p class="answers__text">Contacts</p>
                </label>
              </li>
              <li class="answers__item">
                <input type="radio" name="wear" class="answer-trigger" id="wear-3">
                <label class="answers__label" for="wear-3">
                  <span class="answers__icon">
                    <i class="far fa-dice-two"></i>
                  </span>
                  <p class="answers__text">Both</p>
                </label>
              </li>
              <li class="answers__item">
                <input type="radio" name="wear" class="answer-trigger" id="wear-4">
                <label class="answers__label" for="wear-4">
                  <span class="answers__icon">
                    <i class="far fa-times-square"></i>
                  </span>
                  <p class="answers__text">Neither</p>
                </label>
              </li>
            </ul>
          </div>
        </div>

        <div class="quiz__item">
          <div class="quiz__number">
            <span>3</span>
          </div>
          <div class="answers">
            <h3 class="answers__title">With corrective lenses, do you have...</h3>
            <ul class="answers__list">
              <li class="answers__item">
                <input type="radio" name="corrective" class="answer-trigger" id="corrective-1">
                <label class="answers__label" for="corrective-1">                
                  <span class="answers__icon">
                    <i class="far fa-tree"></i>
                  </span>
                  <p class="answers__text">Trouble seeing far away</p>
                </label>
              </li>
              <li class="answers__item">
                <input type="radio" name="corrective" class="answer-trigger" id="corrective-2">
                <label class="answers__label" for="corrective-2">
                  <span class="answers__icon">
                    <i class="far fa-leaf"></i>
                  </span>
                  <p class="answers__text">Trouble seeing up close</p>
                </label>
              </li>
              <li class="answers__item">
                <input type="radio" name="corrective" class="answer-trigger" id="corrective-3">
                <label class="answers__label" for="corrective-3">
                  <span class="answers__icon">
                    <i class="far fa-eye-slash"></i>
                  </span>
                  <p class="answers__text">Overall blurry vision</p>
                </label>
              </li>
              <li class="answers__item">
                <input type="radio" name="corrective" class="answer-trigger" id="corrective-4">
                <label class="answers__label" for="corrective-4">
                  <span class="answers__icon">
                    <i class="far fa-newspaper"></i>
                  </span>
                  <p class="answers__text">Trouble with reading only</p>
                </label>
              </li>
            </ul>
          </div>
        </div>

        <div class="quiz__item">
          <div class="quiz__number">
            <span>4</span>
          </div>
          <div class="answers">
            <h3 class="answers__title">Have you ever been told you have astigmatism?</h3>
            <ul class="answers__list">
              <li class="answers__item">
                <input type="radio" name="astigmatism" class="answer-trigger" id="astigmatism-1">
                <label class="answers__label" for="astigmatism-1">                
                  <span class="answers__icon">
                    <i class="far fa-check"></i>
                  </span>
                  <p class="answers__text">Yes</p>
                </label>
              </li>
              <li class="answers__item">
                <input type="radio" name="astigmatism" class="answer-trigger" id="astigmatism-2">
                <label class="answers__label" for="astigmatism-2">
                  <span class="answers__icon">
                    <i class="far fa-times-square"></i>
                  </span>
                  <p class="answers__text">No</p>
                </label>
              </li>
            </ul>
          </div>
        </div>

        <div class="quiz__item">
          <div class="quiz__number">
            <span>5</span>
          </div>
          <div class="answers">
            <h3 class="answers__title">Have you ever been told you have dry eyes?</h3>
            <ul class="answers__list">
              <li class="answers__item">
                <input type="radio" name="dry" class="answer-trigger" id="dry-1">
                <label class="answers__label" for="dry-1">                
                  <span class="answers__icon">
                    <i class="far fa-check"></i>
                  </span>
                  <p class="answers__text">Yes</p>
                </label>
              </li>
              <li class="answers__item">
                <input type="radio" name="dry" class="answer-trigger" id="dry-2">
                <label class="answers__label" for="dry-2">
                  <span class="answers__icon">
                    <i class="fal fa-meh"></i>
                  </span>
                  <p class="answers__text">Not sure</p>
                </label>
              </li>
              <li class="answers__item">
                <input type="radio" name="dry" class="answer-trigger" id="dry-3">
                <label class="answers__label" for="dry-3">
                  <span class="answers__icon">
                    <i class="far fa-times-square"></i>
                  </span>
                  <p class="answers__text">No</p>
                </label>
              </li>
            </ul>
          </div>
        </div>
        
        <div class="quiz__item  quiz-results">
          <div class="quiz__number quiz__number--hide-right">
            <span>
              <i class="far fa-check"></i>
            </span>
          </div>

          <div class="quiz__img-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/quiz-img.jpg" alt="img" class="quiz__img">
            <span class="quiz__caption">
              CINCINNATY LASIK & PRK VISION CENTER
            </span>
          </div>

          <div class="quiz__info">
            <button type="button" class="quiz__calendar">
              <i class="far fa-calendar-alt"></i>
              <p>Schedule free consultation</p>
            </button>
            <div class="quiz__address">
              7480 Montgommery Rd, suite 100, First Floor, Cincinnaty OH 45236
            </div>
          </div>
          
        </div>

      </div>
      <button type="button" class="quiz__button quiz-next quiz-results-hide button button-secondary hide">
        <i class="far fa-chevron-right"></i>
        Next step
      </abutton>
    </div>

  </div>

</div>
<!--=== Candidacy Quiz end ===-->