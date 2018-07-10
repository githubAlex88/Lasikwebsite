import utils from './utils'

import './slick';
import './magnific-popup';

export default {
  slider: $('.patient-stories__slider'),
  sliderNav: $('.custom-nav button'),
  slider_video: $('.btn-video'),
  onClick(e) {
    e.preventDefault();
  },
  init() {
    $(this.slider_video).magnificPopup({
      items: [
        {
          src: 'https://player.vimeo.com/video/265513407/?byline=0&sidedock=0',
          type: 'iframe' // this overrides default type
        }],
        gallery: {
          enabled: false
        },
      type: 'image'
    });

    const slider = $(this.slider);
    const sliderNav = $(this.sliderNav);

    slider.on('init', function(event, slick){
      $('.slick-current').addClass('animated');
      slick.$slides.each(function(index, item){

        let dot = $(`<li class="custom-dots__item" data-slide="${index}">
                      ${index}
                    </li>`);

        if($(item).hasClass('slick-active')) {
          dot.addClass('active');
        }

        $('.custom-dots').append(dot);
      });
    });

    slider.slick({
      dots: false,
      arrows: false,
      speed: 500,
      accessibility: false
    });

    sliderNav.on('click', function(e) {
      e.preventDefault();
      if($(this).hasClass('custom-next')) {
        slider.slick('slickNext');
      } else {
        slider.slick('slickPrev');
      }
    })

    $(document).on('click', '.custom-dots__item', function(e) {
      e.preventDefault();
      let slideIndex = $(this).data('slide');
      slider.slick('slickGoTo', Number(slideIndex));
    });

    slider.on('afterChange', function(event, slick, currentSlide, nextSlide){
        const ind = currentSlide + 1;
        $('.slick-current.animated').removeClass('animated');
        $('.slick-current').addClass('animated');

        $('[data-slide="' + currentSlide + '"]')
        .addClass('active')
        .siblings()
        .removeClass('active');
    });
    //$(this.slider_video).on('click', this.onClick);
  }
}
