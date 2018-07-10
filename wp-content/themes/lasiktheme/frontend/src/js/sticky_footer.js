export default {
  init() {

    if($('[data-scroll-target]').length) {
      $(document).on('scroll', function(e) {
        const position = $(window).scrollTop();
        const targetOffsetTop = $('[data-scroll-target]').offset().top;
        
        if(targetOffsetTop > position) {
          $('.sticky-footer').removeClass('fixed');
        } else {
          $('.sticky-footer').addClass('fixed');
        }
      });
    }

  }
}