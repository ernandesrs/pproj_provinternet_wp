const navigation = {
    showing: false,
    minSize: 0,
    toggler: null,
    navigation: null,

    /**
     * @param {String} navigation default is #jsNavigation
     * @param {String} toggler default is #jsNavigationToggler
     * @param {Number} minSize min window size
     */
    start(navigation = '#jsNavigation', toggler = '#jsNavigationToggler', minSize = 1280) {
        this.toggler = document.querySelector(toggler);
        this.navigation = document.querySelector(navigation);
        this.minSize = minSize;

        this.setEventsListener();
    },

    setEventsListener() {
        this.toggler.addEventListener('click', () => {
            this.handleTheClick();
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth >= this.minSize && this.navigation.style?.transform) {
                this.navigation.style.transform = null;
            }
        });
    },

    handleTheClick() {
        if (this.showing) {
            this.hidden();
        } else {
            this.show();
        }
    },

    show() {
        this.navigation.style.transform = 'translateX(0%)';

        document.addEventListener('click', (e) => {
            if (e.target === this.toggler) {
                return;
            }

            if (!this.navigation.contains(e.target) && window.innerWidth < this.minSize) {
                this.hidden();
            }
        });

        this.showing = true;
    },

    hidden() {
        this.navigation.style.transform = 'translateX(-100%)';

        this.showing = false;
    }
};

const smoothScroll = {
    start() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substr(1);
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    // Role suavemente até o elemento de destino
                    window.scrollTo({
                        top: targetElement.offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }
};

const fixedHeader = {
    header: null,
    content: null,
    headerHeight: null,
    isFixed: false,

    start(header = '#jsHeader', content = '#jsContent') {
        this.header = document.querySelector(header);
        this.content = document.querySelector(content);

        if (!this.header || !this.content) {
            throw new Error('The header or content html element not found.');
        }

        this.headerHeight = this.header.offsetHeight;

        this.setScrollEventListener();
    },

    setScrollEventListener() {
        window.addEventListener('scroll', () => {
            // fix the header
            if (window.scrollY > this.headerHeight - (this.headerHeight * .25)) {
                if (!this.isFixed) {
                    this.header.style.position = 'fixed';
                    this.header.style.zIndex = '999';
                    this.header.style.minHeight = (this.headerHeight - (this.headerHeight * .25)) + 'px';
                    this.header.style.height = (this.headerHeight - (this.headerHeight * .25)) + 'px';

                    this.content.style.marginTop = (this.headerHeight + ((this.headerHeight * (.25 * 2)))) + 'px';

                    this.isFixed = true;
                }
            } else {
                // unfix the header
                if (this.isFixed) {
                    this.header.style.position = 'relative';
                    this.header.style.minHeight = this.headerHeight + 'px';
                    this.header.style.height = this.headerHeight + 'px';

                    this.content.style.marginTop = '0px';

                    this.isFixed = false;
                }
            }
        });
    }
};

export { navigation, smoothScroll, fixedHeader };