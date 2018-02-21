jQuery(function() {
	// Init Cookie-banner Star
    $('#cookie-accept').on('click', function () { 
		Cookies.set('test_cookie', 'comply', { expires: 7 });
		$(".cookie-banner").fadeOut(300); //$ to slide it up
	});

	$('#eu-btn').on('click', function () { 
	  $(".landing-eu").fadeOut(300); //$ to slide it up
	});


});