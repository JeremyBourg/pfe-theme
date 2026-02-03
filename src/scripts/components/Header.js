export default class Header{
    constructor(element){
        this.element = element;
        this.options = {
            threshold: 0.1,
            colorThreshold: 0.05,
            noHide: false,
        };

        this.scrollPos = 0;
        this.lastScrollPos = 0;
        this.html = document.documentElement;

        this.init();
        this.initNavMobile();
    }

    init(){
        this.setOptions();

        window.addEventListener('scroll', this.onScroll.bind(this));
    }

    setOptions(){
        if('threshold' in this.element.dataset){
            this.options.threshold = this.element.dataset.threshold;
        }

        if('autoHide' in this.element.dataset){
            this.options.noHide = true;
        }
    }

    onScroll(){
        this.lastScrollPos = this.scrollPos;
        this.scrollPos = document.scrollingElement.scrollTop;

        this.setHeaderState();
        this.setDirections();
    }

    setHeaderState(){
        if(this.scrollPos > document.scrollingElement.scrollHeight * this.options.threshold && !this.options.noHide){
            this.html.classList.add('header-is-hidden');
        }
        if (this.scrollPos > document.scrollingElement.scrollHeight * this.options.colorThreshold) {
            this.html.classList.add('header-has-background');
        }
        else{
            this.html.classList.remove('header-is-hidden');
            this.html.classList.remove('header-has-background');
        }
    }

    setDirections(){
        if(this.scrollPos >= this.lastScrollPos){
            this.html.classList.add('is-scrolling-down');
            this.html.classList.remove('is-scrolling-up');
        }
        else{
            this.html.classList.add('is-scrolling-up');
            this.html.classList.remove('is-scrolling-down');
        }
    }

    initNavMobile(){
        const toggle = this.element.querySelector('.js-toggle');
      if(toggle)
        toggle.addEventListener('click', this.onToggleNav.bind(this));
    }

    onToggleNav(){
        this.html.classList.toggle('nav-is-active');
    }
}
