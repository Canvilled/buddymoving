import { Swiper } from 'swiper';
import 'swiper/css';
import { Autoplay, EffectFade, Navigation, Pagination } from 'swiper/modules';
import MainClass, { MAIN_CLASS_PARAMS } from '@scripts/utils/mainClass';
import { SwiperOptions } from 'swiper/types';

class SliderInit extends MainClass {
  protected slider: Swiper;

  constructor(props: MAIN_CLASS_PARAMS) {
    super(props);
    this.init();
  }

  thumbsHandle({_thumbDOM}: {_thumbDOM: HTMLElement[]}) {
     if (!_thumbDOM) return;
      _thumbDOM.forEach((_thumb, index) => {
        const event = _thumb.getAttribute('data-slider-state') || 'click';
        const activeClasses = _thumb.getAttribute('data-slider-active') || '';
        const defaultClasses = _thumb.getAttribute('data-slider-default') || '';
        _thumb.addEventListener(event, (e) => {
          e.preventDefault();
          _thumbDOM.forEach((_thumb) => {

            const activeClassConfig = JSON.parse(activeClasses);
            const defaultClassConfig = JSON.parse(defaultClasses);

            if (activeClassConfig?.parent) _thumb.classList.remove(activeClassConfig.parent);
            if (activeClassConfig?.heading) _thumb.querySelector('h5')?.classList.remove(activeClassConfig.heading);

            if (defaultClassConfig?.parent) _thumb.classList.add(defaultClassConfig.parent);
            if (defaultClassConfig?.heading) _thumb.querySelector('h5')?.classList.add(defaultClassConfig.heading);
          });
          const activeClassConfig = JSON.parse(activeClasses);
          const defaultClassConfig = JSON.parse(defaultClasses);
          _thumb.classList.remove(defaultClassConfig.parent);
          _thumb.querySelector('h5').classList.remove(defaultClassConfig.heading);

          _thumb.classList.add(activeClassConfig.parent);
          _thumb.querySelector('h5').classList.add(activeClassConfig.heading);
          this.slider.slideTo(index);
        })
      })
  }

  init() {
    const THIS = this;
    if (!this.selector.offsetWidth) {
      console.warn('Swiper container has no width. Setting default width.');
      this.selector.style.width = '100%';
    }

    const getAttributesSelector: SwiperOptions = JSON.parse(
      this.selector.getAttribute('data-slider-config') || '{}'
    );

    const arrayModules = [];
    const swiperOptions: SwiperOptions = {
      ...getAttributesSelector,
      speed: 800,
      observer: true,
      observeParents: true
    };
    if (getAttributesSelector.pagination) {
      arrayModules.push(Pagination);
      swiperOptions.pagination = {
        el: this.selector.querySelector('.swiper-pagination') as HTMLElement,
      };
    }
    if (getAttributesSelector.navigation) {
      arrayModules.push(Navigation);
      swiperOptions.navigation = {
        nextEl: this.selector.querySelector('.swiper-button-next') as HTMLElement,
        prevEl: this.selector.querySelector('.swiper-button-prev') as HTMLElement,
      };
    }
    if (
      getAttributesSelector.autoplay &&
      typeof getAttributesSelector.autoplay !== 'boolean'
    ) {
      arrayModules.push(Autoplay);
      swiperOptions.autoplay = {
        delay: getAttributesSelector.autoplay.delay,
      };
    }
    if (getAttributesSelector.effect) {
      arrayModules.push(EffectFade);
      swiperOptions.fadeEffect = { crossFade: true };
    }



    // swiperOptions.modules = arrayModules;

    const SwiperInit = new Swiper(this.selector, {
      ...swiperOptions,
      init: true,
    });

    console.log(this.selector)


    console.log(swiperOptions)
    SwiperInit.on('init', () => {
    });

    SwiperInit.init();

    this.slider = SwiperInit;


    if (getAttributesSelector.thumbs) {
      const _thumbDOMs = document.querySelectorAll(getAttributesSelector.thumbs as string)
      this.thumbsHandle({_thumbDOM: Array.from(_thumbDOMs) as HTMLElement[]})
    }

    // NOTE: add event for button navigation
    const _btnPrev = this.selector.querySelector(
      '.swiper-button-prev'
    ) as HTMLElement;

    const _btnNext = this.selector.querySelector(
      '.swiper-button-next'
    ) as HTMLElement;

    if (getAttributesSelector.navigation) {
      // for prev btn
      if (_btnPrev) {
        _btnPrev.onclick = (e) => {
          e.preventDefault();
          SwiperInit.slidePrev();
        };
      }

      // for next btn
      if (_btnNext) {
        _btnNext.onclick = (e) => {
          e.preventDefault();
          SwiperInit.slideNext();
        };
      }
    }
  }
}

export default SliderInit;
