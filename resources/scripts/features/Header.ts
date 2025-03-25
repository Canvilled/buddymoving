import MainClass, { MAIN_CLASS_PARAMS } from "@scripts/utils/mainClass";

class Header extends MainClass {

  protected nav: Element;
  protected navBtn: Element;
  constructor(props: MAIN_CLASS_PARAMS) {
    super(props);
    this.init();
  }

  onNavClick(e: Event) {
    e.preventDefault()
    const nav = this.nav;
    this.navBtn.querySelectorAll('i').forEach(item => {
      item.classList.toggle('hidden')
      item.classList.toggle('block')
    })
    this.navBtn.toggleAttribute('aria-expanded');
    nav.classList.toggle('is-menu-active');
    nav.classList.toggle('is-menu-inactive');
  }

  onHandleChildren(){
    const childrenMenu = this.selector.querySelectorAll('.menu-item-has-children');
    childrenMenu.forEach(item => {
      item.addEventListener('click', (e) => {
        e.preventDefault();
        item.classList.toggle('bg-secondary');
        item.querySelector('ul').classList.toggle('max-xl:h-[0]')
      })
    })
  }

  init() {
    this.navBtn = this.selector.querySelector('[aria-label="Toggle Menu"]');
    const controlled = this.navBtn.getAttribute('aria-controls');
    this.nav = this.selector.querySelector('[aria-label="'+controlled+'"]');
    this.navBtn.addEventListener('click', this.onNavClick.bind(this));
    this.onHandleChildren()
  }
}

export default Header;
