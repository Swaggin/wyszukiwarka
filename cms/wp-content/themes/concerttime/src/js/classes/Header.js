export default class Header {
  constructor() {
    if (!this.settings()) return;

    this.events();
  }

  settings() {
    // init header element
    this.headerEl = document.querySelector('[data-header]');
    if (!this.headerEl) return false;

    // init header nav element
    this.navEl = this.headerEl.querySelector('[data-header-nav]');
    if (!this.navEl) return false;

    // init header close element
    this.closeEl = this.headerEl.querySelector('[data-header-close]');
    if (!this.closeEl) return false;

    // init header hamburger element
    this.hamburgerEl = this.headerEl.querySelector('[data-header-hamburger]');
    if (!this.hamburgerEl) return false;

    // init default classes
    this.classes = {
      active: 'header__nav--active',
    };

    // set flag
    this.open = false;

    return true;
  }

  events() {
    // add onClick event listener to hamburger & close elems
    this.hamburgerEl.addEventListener('click', this.setActive.bind(this));
    this.closeEl.addEventListener('click', this.setActive.bind(this));
  }

  setActive() {
    // set flag
    this.open = !this.open;

    // set classes
    if (this.open) this.navEl.classList.add(this.classes.active);
    else this.navEl.classList.remove(this.classes.active);
  }
}