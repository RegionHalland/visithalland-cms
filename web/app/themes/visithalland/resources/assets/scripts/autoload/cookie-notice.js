import Cookies from 'js-cookie';

class CookieNotice {
    constructor() {
        this.bind();
    }

    bind() {
        // Init Cookie-banner Star
        if (!Cookies.get('cookie_consent')) {
            $(".cookie-banner").fadeIn(600);
        };

        $('#cookie-accept').on('click', function () {
            Cookies.set('cookie_consent', 'comply', { expires: 5000 });
            $(".cookie-banner").fadeOut(300); //$ to slide it up
        });
    }
}

export default new CookieNotice();
