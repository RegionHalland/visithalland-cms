jQuery(function() {	
	//Toggle menu on mobile 
	$('.menu-button').on('click', function(){

		$('.mobile-navigation').fadeToggle(400);
		$('.mobile-navigation').toggleClass('active');
		$('body').toggleClass('overflow-hidden');
		$('#main-content').toggleClass('menu-open');

		if($('.mobile-search').hasClass('active')) {
			$('.mobile-search').fadeToggle(400);
			$('body').toggleClass('overflow-hidden');
			$('.mobile-search').toggleClass('active');
			$('#main-content').toggleClass('menu-open');
		}
	});

	//Toggle search on mobile
	$('.mobile-search-button').on('click', function(){

		$('.mobile-search').fadeToggle(400);
		$('.mobile-search').toggleClass('active');

		$('.mobile-search__input').focus();

		$('body').toggleClass('overflow-hidden');
		$('#main-content').toggleClass('menu-open');

		if($('.mobile-navigation').hasClass('active')) {
			$('.mobile-navigation').fadeToggle(400);
			$('body').toggleClass('overflow-hidden');
			$('.mobile-navigation').toggleClass('active');
			$('#main-content').toggleClass('menu-open');
		}
	});

	$('.happenings__dropdown-button').on('click', function(){
		$('.happenings__dropdown').fadeToggle(200);
		$('.happenings__dropdown').toggleClass('active');
	});

});