class Helper {
  static horizontalScrollTo(wrapper: HTMLElement, scrollTo: number, duration = 300) {
      if (duration <= 0) return;

      const difference = scrollTo - wrapper.scrollLeft;
      const perTick = difference / duration * 10;

      wrapper.scrollLeft = wrapper.scrollLeft + perTick;

      setTimeout(() => {
          if (wrapper.scrollLeft === scrollTo) {
            return;
          };
          this.horizontalScrollTo(wrapper, scrollTo, duration - 10);
      }, 10);
  }

  static debounce(func: Function, delay: number) {
      let timer: number;
      return function (...args: any[]) {
        if (timer) {
          clearTimeout(timer);
        }
        timer = window.setTimeout(() => {
          func(...args);
        }, delay);
      };
  }
}

export default Helper;