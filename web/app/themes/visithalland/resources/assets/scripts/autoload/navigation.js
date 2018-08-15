class Navigation {
    constructor() {
        this.bindNavigation();
    }

    bindNavigation(){
        //Toggle menu on mobile
        $('.nav__button').on('click', function () {
            console.log("Navigation Toggle");
            $('.nav-dropdown').toggleClass('open');
            if ($('.has-popup').attr('aria-expanded') === "true") {
              $('.has-popup').attr('aria-expanded', 'false')
            }
            else {
              $('.has-popup').attr('aria-expanded', 'true')
            }
        });
    }
}

export default new Navigation();
