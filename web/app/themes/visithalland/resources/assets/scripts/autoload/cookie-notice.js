import cookies from 'js-cookie';

class CookieNotice {
    constructor() {
        this.name = 'cookie_notice_accepted';

        if (this.getCookie(this.name) !== undefined) {
            return;
        }

        this.cache();
        this.bind();
    }

    cache() {
        this.container = $('#cookie-notice');
        this.consentBtn = this.container.find('#cookie-consent');
    }

    bind() {
        this.consentBtn.on('click', () => {
            this.removeNotice();
            this.setCookie(this.name);
        })
    }

    removeNotice() {
        this.container.remove();
    }

    getCookie(name) {
        return cookies.get(name);
    }

    setCookie(name) {
        return cookies.set(name, 'true', { expires: 100 });
    }
}

export default new CookieNotice();
