import Cookies from 'js-cookie';

class CookieNotice {
    constructor() {
        this.bind();
    }

    bind() {
        // Init Cookie-banner Star
        console.log(!Cookies.get('cookie_consent'));
        if (!Cookies.get('cookie_consent')) {
            console.log("I REALLY SHOULD FADE IN NOW")
            setTimeout(() => {
                // TODO remove this... on ready does not work.... I think it's time to call the one and only davidö
                $(".cookie-banner").fadeIn(600);
            }, 1000);
        };
        $('#cookie-accept').on('click', function () {
            Cookies.set('cookie_consent', 'comply', { expires: 5000 });
            $(".cookie-banner").fadeOut(300); //$ to slide it up
        });

        //Click event for EU information
        $('#eu-btn').on('click', function () {
            $(".landing-eu").fadeOut(300); //$ to slide it up
        });

    }
}

export default new CookieNotice();
