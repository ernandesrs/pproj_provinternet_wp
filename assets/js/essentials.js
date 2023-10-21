const navigation = {
    showing: false,
    toggler: null,
    navigation: null,

    /**
     * @param {String} navigation default is #jsNavigation
     * @param {String} toggler default is #jsNavigationToggler
     */
    start(navigation = '#jsNavigation', toggler = '#jsNavigationToggler') {
        this.toggler = document.querySelector(toggler);
        this.navigation = document.querySelector(navigation);

        this.setEventListener();
    },

    setEventListener() {
        this.toggler.addEventListener('click', (e) => {
            this.handleTheClick(e);
        });
    },

    handleTheClick(event) {
        if (this.showing) {
            this.hidden();
        } else {
            this.show();
        }
    },

    show() {
        this.navigation.classList.remove('-translate-x-full');
        this.navigation.classList.add('translate-x-0');

        this.showing = true;
    },

    hidden() {
        this.navigation.classList.remove('translate-x-0');
        this.navigation.classList.add('-translate-x-full');

        this.showing = false;
    }
};

export { navigation };