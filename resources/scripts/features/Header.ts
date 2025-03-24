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
    this.navBtn.setAttribute('aria-expanded', 'true');
    nav.classList.add('is-menu-active');
    nav.classList.remove('is-menu-inactive');
  }

  onCloseClick(e: Event) {
    e.preventDefault()
    const nav = this.nav;
    this.navBtn.setAttribute('aria-expanded', 'false');
    nav.classList.remove('is-menu-active');
    nav.classList.add('is-menu-inactive');
  }

  init() {
    this.navBtn = this.selector.querySelector('[aria-label="Toggle Menu"]');
    const controlled = this.navBtn.getAttribute('aria-controls');
    this.nav = this.selector.querySelector('[aria-label="'+controlled+'"]');
    const closeBtn = this.nav.querySelector('[aria-label="Close Menu"]');
    closeBtn.addEventListener('click', this.onCloseClick.bind(this));
    this.navBtn.addEventListener('click', this.onNavClick.bind(this));
  }
}

export default Header;
