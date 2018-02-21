jQuery(function() {
	// Init Cookie-banner Star
    $('#cookie-accept').on('click', function () { 
	  days = 182; //number of days to keep the cookie
	  myDate = new Date();
	  myDate.setTime(myDate.getTime()+(days*24*60*60*1000));
	  document.cookie = "comply_cookie = comply_yes; expires = " + myDate.toGMTString(); //creates the cookie: name|value|expiry
	  $(".cookie-banner").fadeOut(300); //$ to slide it up
	});

	$('#eu-btn').on('click', function () { 
	  $(".landing-eu").fadeOut(300); //$ to slide it up
	});


});