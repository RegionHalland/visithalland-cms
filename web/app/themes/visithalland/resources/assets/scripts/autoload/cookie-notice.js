import Cookies from 'js-cookie';

class CookieNotice {
    constructor() {
        this.bind();
    }

    bind() {
        // Init Cookie-banner Star
        console.log(!Cookies.get('cookie_consent'));
        if (!Cookies.get('cookie_consent')) {
            $(".cookie-banner").fadeIn(600);
        };

        $('#cookie-accept').on('click', function () {
            console.log("accpet click")
            Cookies.set('cookie_consent', 'comply', { expires: 5000 });
            $(".cookie-banner").fadeOut(300); //$ to slide it up
        });
    }
}

export default new CookieNotice();
