class Navigation {
    constructor() {
        this.cache();
        this.bindMobileMenu();
        this.bindSearch();
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

    cache(){
        this.searchButton = $('.search-button');
        this.headerSearch = $('.header-search');
        this.headerTopSection = $('.header__top-section');
    }

    bindSearch(){
        this.searchButton.on("click", () => {
            console.log("click");
            this.headerTopSection.toggleClass('search-open');

            if (this.headerSearch.attr('aria-expanded') === "false") {
                $('.algolia-autocomplete').removeClass('autocomplete-hide');
                this.headerSearch.fadeIn(400);
                this.headerSearch.attr('aria-expanded', 'true');
                $('.searchform__input').focus();
            }
            else {
                $('.algolia-autocomplete').addClass('autocomplete-hide');
                $('.algolia-autocomplete').fadeOut(100);
                this.headerSearch.fadeOut(400);
                this.headerSearch.attr('aria-expanded', 'false');
                $('.searchform__input').val('');
            }
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
