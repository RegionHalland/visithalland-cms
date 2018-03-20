jQuery(function() {	
	//Toggle menu on mobile 
	$('.menu-button').on('click', function(){
		$('.mobile-navigation').fadeToggle(400);
		$('.mobile-navigation').toggleClass('active');
		$('body').toggleClass('overflow-hidden');
		$('#main-content').toggleClass('menu-open');

	});

	$('.happenings__dropdown-button').on('click', function(){
		$('.happenings__dropdown').fadeToggle(200);
		$('.happenings__dropdown').toggleClass('active');
	});



	$('.search-button, .search-close-button').on('click', function(){
		$('.header-search, .header__top-section').toggleClass('search-open');
		if ($('.header-search').attr('aria-expanded') === "false") {
			$('.algolia-autocomplete').removeClass('autocomplete-hide');
			$('.header-search').fadeIn(400);
			$('.header-search').attr( 'aria-expanded', 'true');
			$('.searchform__input').focus();
		}
	    else {
	    	$('.algolia-autocomplete').addClass('autocomplete-hide');
	    	$('.algolia-autocomplete').fadeOut(100);
	    	$('.header-search').fadeOut(400);
			$('.header-search').attr( 'aria-expanded', 'false');
			$('.searchform__input').val('');
		}
	});

	if ($('.navigation__link').hasClass('active')) {
	    var myScrollPos = $('.navigation__link.active').offset().left + $('.navigation__link.active').outerWidth(true)/2 + $('.navigation').scrollLeft() - $('.navigation').width()/2;
	    $('.navigation').animate({scrollLeft: myScrollPos}, 200);
    }
});