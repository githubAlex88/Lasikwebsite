import utils from './utils'

import './slick';

export default {
  parent: $('#quiz'),
  slider: $('#quiz-carousel'),
  navPrev: $('.quiz-prev'),
  navNext: $('.quiz-next'),
  sliderItems: $('.quiz__item'),
  onClick(e) {
    e.preventDefault();
  },
  init() {
    let positionOnPage;
    const parent = $(this.parent);
    const slider = $(this.slider);
    const navPrev = $(this.navPrev);
    const navNext = $(this.navNext);
    const sliderItems = $(this.sliderItems);

    $('#candidacy-quiz').modal({
      onOpenEnd: function() {
        positionOnPage = $(window).scrollTop();
        $('body').css('position', 'fixed');

        slider.slick({
          dots: false,
          swipe: false,
          arrows: false,
          infinite: false,
          touchMove: false,
          speed: 500,
        });

        navPrev.on('click', function(e) {
          e.preventDefault();
          slider.slick('slickPrev');
        });

        navNext.on('click', function(e) {
          e.preventDefault();
          slider.slick('slickNext');
        });

        slider.find('.slick-active .answer-trigger').off('change').on('change', function() {
          hideNextButton($(this).prop('checked'));
        });

        checkedRadioButtons(slider.find('.slick-active .answer-trigger'), function(count) {
          hideNextButton(count);
        });

        if(slider.length) {
          if(slider.find('.slick-active').hasClass('quiz-results')) {
            $('.quiz-results-hide').hide();
            $('.quiz-results-show').show();
          } else {
            $('.quiz-results-show').hide();
            $('.quiz-results-hide').show();
          }
        }

        slider.on('beforeChange', function(event, slick, currentSlide, nextSlide){
          const activeSlide = slider.find('.slick-slide').eq(nextSlide);
          const triggers = activeSlide.find('.answer-trigger');

          if(!nextSlide) {
            navPrev.addClass('none');
          } else {
            navPrev.removeClass('none');
          }
          
          checkedRadioButtons(triggers, function(count) {
            hideNextButton(count);
          });

          triggers.off('change').on('change', function() {
            hideNextButton($(this).prop('checked'));
          });

          if(activeSlide.hasClass('quiz-results')) {
            $('.quiz-results-hide').hide();
            $('.quiz-results-show').show();
          } else {
            $('.quiz-results-show').hide();
            $('.quiz-results-hide').show();
          }

        });

        parent.addClass('animate');
      },
      onCloseStart: function() {
        $('body').css('position', '');
        $(window).scrollTop(positionOnPage);
      },
      onCloseEnd: function() {
        slider.slick('unslick');
        parent.removeClass('animate');
      }
    })

    function checkedRadioButtons(items, callback) {
      let counter = 0;

      items.each(function(index, item) {
        if($(item).prop('checked')) {
          counter++
        }
      });
      callback(counter);
    }

    function hideNextButton(value) {
      if(value) {
        navNext.removeClass('hide');
      } else {
        navNext.addClass('hide');
      }
    }


  }
}
