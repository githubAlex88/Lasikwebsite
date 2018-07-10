import utils from './utils'
import $ from 'jquery/dist/jquery.slim'

export default {
  navTabs: $('.nav-tabs .tab[role="tab"]'),
  init() {
    this.navTabs.on('click', function(e) {
      e.preventDefault();
      const target = $(this).attr('href');

      $(this)
      .parent()
      .add(target)
      .addClass('active')
      .siblings()
      .removeClass('active');
    });
  }
}
