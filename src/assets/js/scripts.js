import { navigation, smoothScroll, fixedHeader } from "./essentials.js";

navigation.start('#jsNavigation', '#jsNavigationToggler', 1280);
smoothScroll.start();
fixedHeader.start('#jsHeader', '#jsMain');

const cookie = {
    cookieElem: null,

    start() {
        this.cookieElem = document.querySelector('#jsCookieAlert');
        if (!this.cookieElem) {
            return;
        }

        if (!this.isAccepted()) {
            setTimeout(() => {
                this.show();
            }, 500);
        }
    },

    isAccepted() {
        return this.get() ? true : false;
    },

    show() {
        if (this.cookieElem.classList.contains('translate-y-full')) {
            this.cookieElem.classList.remove('translate-y-full');
            this.cookieElem.classList.add('duration-500');

            this.addAcceptButtonEventListener();
        }
    },

    hidden() {
        if (!this.cookieElem.classList.contains('translate-y-full')) {
            this.cookieElem.classList.add('translate-y-full');
            setTimeout(() => {
                this.cookieElem.classList.remove('duration-500');
            }, 500);
        }
    },

    addAcceptButtonEventListener() {
        const button = document.querySelector('#jsCookieAccept');
        button.addEventListener('click', (e) => {
            e.preventDefault();

            this.set();

            this.hidden();
        })
    },

    get() {
        return localStorage.getItem('site_cookie_accepts');
    },

    set() {
        localStorage.setItem('site_cookie_accepts', JSON.stringify({
            accepted: true,
            accepted_in: (new Date()).getTime()
        }));
    }
}

cookie.start();