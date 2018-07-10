// import './jquery';

// export for others scripts to use

import './polyfills'
// import './materialize'
import materializeInit from './materialize_init'
import fixedHeader from './fixed_header'
import navbarDropdown from './navbar_dropdown'
import costCarousel from './cost_carousel'
import quizCarousel from './quiz_carousel'
import lazyload from './lazyload'
import stickyFooter from './sticky_footer'
import tabs from './tabs'
import patientSlider from './patient_slider'
//import VimeoPlayer from './vimeo_player'

materializeInit.init();
fixedHeader.init();
navbarDropdown.init();
costCarousel.init();
quizCarousel.init();
lazyload.init();
stickyFooter.init();
tabs.init();
patientSlider.init();

// window.vim = new VimeoPlayer('video1', {
//   autoplay: true,
//   loop: false,
//   title: false,
//   byline: false,
// })
