export default {
  debounce(fn, timeout, invokeAsap, ctx) {
    if (arguments.length == 3 && typeof invokeAsap != "boolean") {
      ctx = invokeAsap;
      invokeAsap = false;
    }

    let timer;
    return function () {
      const args = arguments;
      ctx = ctx || this;

      invokeAsap && !timer && fn.apply(ctx, args);

      clearTimeout(timer);

      timer = setTimeout(() => {
        invokeAsap || fn.apply(ctx, args);
        timer = null;
      }, timeout);
    };
  },

  throttle (func, ms) {
    var isThrottled = false,
      savedArgs,
      savedThis;
    function wrapper() {
      if (isThrottled) {
        savedArgs = arguments;
        savedThis = this;
        return;
      }
      func.apply(this, arguments);
      isThrottled = true;
      setTimeout(function () {
        isThrottled = false;
        if (savedArgs) {
          wrapper.apply(savedThis, savedArgs);
          savedArgs = savedThis = null;
        }
      }, ms);
    }
    return wrapper;
  },

  requestInterval(fn, delay, ctx) {
    const requestAnimFrame = (() => {
      return (
        window.requestAnimationFrame ||
        ((callback, element) => {
          window.setTimeout(callback, 1000 / 60);
        })
      );
    })();
    let start = new Date().getTime(),
    handle = {};
    const loop = () => {
      handle.value = requestAnimFrame(loop);
      const current = new Date().getTime(),
        delta = current - start;
      if (delta >= delay) {
        fn.call(ctx);
        start = new Date().getTime();
      }
    }
    handle.value = requestAnimFrame(loop);
    return handle;
  },

  clearInterval(id) {
    window.cancelAnimationFrame ? cancelAnimationFrame(id) : clearInterval(id);
  },

  wait(delay) {
    const dfd = jQuery.Deferred();

    setTimeout(() => {
      dfd.resolve()
    }, delay);

    return dfd.promise();
  },

  collectionIterator(collection, cb) {
    [].forEach.call(collection, cb);
  },
}