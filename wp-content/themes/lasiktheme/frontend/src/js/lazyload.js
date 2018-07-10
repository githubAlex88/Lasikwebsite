import LazyLoad from 'vanilla-lazyload'

export default {
  init() {
    this.myLazyLoad = new LazyLoad({
      elements_selector: '.img-lazy',
    });
  }
}
