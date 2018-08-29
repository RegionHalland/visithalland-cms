class Navigation {
    constructor() {
        this.bindNavigation();
    }

    bindNavigation(){
        //Toggle menu on mobile
        $('#dropdown-button').on('click', function () {
            $('.nav-dropdown').toggleClass('open');
            if ($('.has-dropdown').attr('aria-expanded') === "true") {
              $('.has-dropdown').attr('aria-expanded', 'false')
            }
            else {
              $('.has-dropdown').attr('aria-expanded', 'true')
            }
        });
    }
}

export default new Navigation();
