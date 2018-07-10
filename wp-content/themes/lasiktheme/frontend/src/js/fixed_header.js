import utils from './utils'

export default {
  classNames: {
    fixed: 'header-fixed',
    hidden: 'header-show',
  },
  offset: 65,
  lastOffset: 0,
  init() {
    const that = this;

    $(document).on('scroll', function(e) {
      (utils.throttle(function() {
        const position = $(window).scrollTop();
        
        if (position >= that.offset) {
          $('.header').addClass(that.classNames.fixed);
          if(that.lastOffset > position) {
            $('.header').addClass(that.classNames.hidden)
          } else {
            $('.header').removeClass(that.classNames.hidden)
          }
        } else {
          $('.header').removeClass(that.classNames.fixed, that.classNames.hidden)
        }
        
        that.lastOffset = position;
      }, 200)());
    })
  }
}
