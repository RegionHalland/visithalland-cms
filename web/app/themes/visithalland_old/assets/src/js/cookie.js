jQuery(function() {
	// Init Cookie-banner Star
	$('#cookie-accept').on('click', function () { 
		Cookies.set('cookie_consent', 'comply', { expires: 5000 });
		$(".cookie-banner").fadeOut(300); //$ to slide it up
	});

	//Click event for EU information
	$('#eu-btn').on('click', function () { 
		$(".landing-eu").fadeOut(300); //$ to slide it up
	});
});