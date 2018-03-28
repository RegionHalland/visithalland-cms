class Navigation {
    constructor() {
        this.bindMobileMenu();
        this.bindHappenings();
        this.bindNavigationLink();
    }

    bindMobileMenu(){
        //Toggle menu on mobile
        $('.menu-button').on('click', function () {
            $('.mobile-navigation').fadeToggle(400);
            $('.mobile-navigation').toggleClass('active');
            $('body').toggleClass('overflow-hidden');
            $('#main-content').toggleClass('menu-open');
        });
    }

    bindHappenings() {
        $('.happenings__dropdown-button').on('click', function () {
            $('.happenings__dropdown').fadeToggle(200);
            $('.happenings__dropdown').toggleClass('active');
        });
    }

    bindNavigationLink(){
        if ($('.navigation__link').hasClass('active')) {
            var myScrollPos = $('.navigation__link.active').offset().left + $('.navigation__link.active').outerWidth(true) / 2 + $('.navigation').scrollLeft() - $('.navigation').width() / 2;
            $('.navigation').animate({ scrollLeft: myScrollPos }, 200);
        }
    }


}

export default new Navigation();
