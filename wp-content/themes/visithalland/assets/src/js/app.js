jQuery(function() {
	window.ga_debug = { trace: true };
	var nextUrl = jQuery('.next-link').attr('href');
	console.log("nextUrl:", nextUrl);
	var nextPages = [
		'http://visithalland.test/hiking-biking/trip/pa-tva-hjul-langs-kattegatt/',
		'http://visithalland.test/hiking-biking/editor_tip/cykelhistoria-i-halland/',
		/*'api',
		'events',
		'extras',
		'license',*/
	];
	

	var all = jQuery("#nextPages").data("all");
	console.log(all);
	var nextPages = all;
	console.log(nextPages);

	//if (typeof nextUrl !== "undefined") {
		var $container = jQuery('#container').infiniteScroll({
			// options
			path: function() {
				return nextPages[this.loadCount];
				//return nextUrl;
			},
			append: '#container',
			history: 'replace',
			status: '.page-load-status',
			debug: false,
			scrollThreshold: 800
		});

		$container.on( 'request.infiniteScroll', function( event, path ) {
		console.log( 'Loading page: ' + path );

		jQuery('.infinite-scroll').addClass('visible');
		});


		$container.on( 'load.infiniteScroll', function( event, response ) {
			var elements = jQuery(response);
			var nextUrlTwo = jQuery(response).find('.next-link');
			nextUrl = nextUrlTwo.attr('href');
			console.log(nextUrlTwo.attr('href'));
			

			console.log("Hide infinite thingy")
			jQuery('.infinite-scroll').removeClass('visible');
		});

		// jQuery
		$container.on( 'last.infiniteScroll', function( event, response, path ) {
			console.log( 'Loaded: ' + path );
			console.log('we have reached the end')

			jQuery('.infinite-scroll').removeClass('visible');
		});

		// jQuery
		$container.on('history.infiniteScroll', function (event, title, path) {
			console.log('History changed to: ' + path);
			
			ga('send', 'pageview', path);
		});

		$container.on( 'error.infiniteScroll', function( event, error, path ) {
		console.log( 'Could not load: ' + path )

		jQuery('.infinite-scroll').removeClass('visible');
		});
	/*} else {
		//We have no url we should not show loading state divs
		jQuery('.page-load-status').remove();
	}*/


	//Init lazyload and the IntersectionObserver API if supported by the browser
	(function(w, d){
		var b = d.getElementsByTagName('body')[0];
		var s = d.createElement("script"); s.async = true;
		var v = !("IntersectionObserver" in w) ? "8.6.0" : "10.4.1";
		s.src = "https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/" + v + "/lazyload.min.js";
		w.lazyLoadOptions = {}; // Your options here. See "recipes" for more information about async.
		b.appendChild(s);
	}(window, document));

	window.addEventListener('LazyLoad::Initialized', function (e) {
    // Get the instance and puts it in the lazyLoadInstance variable
    	lazyLoadInstance = e.detail.instance;

    	/*setTimeout(function() {
    		console.log(jQuery('.loaded').closest('div'))
    		jQuery('.loaded').closest('div').css('background-image', 'none');
    		jQuery('.loaded').closest('div').css('filter', 'none');
    	}, 2000);*/
    	
	}, false);

	

	//console.log(.closest( 'div' ))

  	//Init Flickity
	jQuery('.navigation-carousel').flickity({
  		// options
  		cellAlign: 'left',
  		contain: true,
  		prevNextButtons: false,
  		pageDots: false,
	});

	jQuery('.navigation-carousel--next').on( 'click', function() {
	  jQuery('.navigation-carousel').flickity('next');
	});
	// next wrapped
	jQuery('.navigation-carousel--previous').on( 'click', function() {
	  jQuery('.navigation-carousel').flickity('previous');
	});

	jQuery('.tip-carousel').flickity({
  		// options
  		cellAlign: 'left',
  		contain: true,
  		prevNextButtons: false,
  		pageDots: false,
	});

	jQuery('.tip-carousel--next').on( 'click', function() {
	  jQuery('.tip-carousel').flickity('next');
	});
	// next wrapped
	jQuery('.tip-carousel--previous').on( 'click', function() {
	  jQuery('.tip-carousel').flickity('previous');
	});





	//Toggle menu on mobile 
	jQuery('.menu-button').on('click', function(){

		jQuery('.mobile-navigation').fadeToggle(400);
		jQuery('.mobile-navigation').toggleClass('active');
		jQuery('body').toggleClass('overflow-hidden');
		jQuery('#main-content').toggleClass('menu-open');

		if(jQuery('.mobile-search').hasClass('active')) {
			jQuery('.mobile-search').fadeToggle(400);
			jQuery('body').toggleClass('overflow-hidden');
			jQuery('.mobile-search').toggleClass('active');
			jQuery('#main-content').toggleClass('menu-open');
		}
	});

	//Toggle search on mobile
	jQuery('.mobile-search-button').on('click', function(){

		jQuery('.mobile-search').fadeToggle(400);
		jQuery('.mobile-search').toggleClass('active');

		jQuery('.mobile-search__input').focus();

		jQuery('body').toggleClass('overflow-hidden');
		jQuery('#main-content').toggleClass('menu-open');

		if(jQuery('.mobile-navigation').hasClass('active')) {
			jQuery('.mobile-navigation').fadeToggle(400);
			jQuery('body').toggleClass('overflow-hidden');
			jQuery('.mobile-navigation').toggleClass('active');
			jQuery('#main-content').toggleClass('menu-open');
		}
	});

	//Toggle search on desktop
	jQuery('.search-button').on('click', function(){
		
		jQuery('.search__input').fadeToggle(250);
		//jQuery('.search__input').focus();

		//jQuery('body').toggleClass('overflow-hidden');
		//jQuery('#main-content').toggleClass('menu-open');
	});

	jQuery('.search__input').on('focus', function(){
		jQuery('.search__results').fadeIn(300);
	});

	jQuery('.search__input').on('focusout', function(){
		jQuery('.search__results').fadeOut(300);
	});



	jQuery(document).on('scroll', function() {
		var scrollTop = jQuery(document).scrollTop()
		var scrollBottom = scrollTop + jQuery(window).height()

		pageBottom = jQuery(document).height()

		var opacity = 1 - scrollTop / 500

		var transform = 0 + scrollTop / 10

		jQuery('.concept-header__img').css('transform', 'translateY(' + transform + 'px)');
		jQuery('.landing-header__img').css('transform', 'translateY(' + transform + 'px)');
	})


	// Init Cookie-banner Star
    jQuery('#cookie-accept').on('click', function () { 
      console.log("test")//on click event
	  days = 182; //number of days to keep the cookie
	  myDate = new Date();
	  myDate.setTime(myDate.getTime()+(days*24*60*60*1000));
	  document.cookie = "comply_cookie = comply_yes; expires = " + myDate.toGMTString(); //creates the cookie: name|value|expiry
	  jQuery(".cookie-banner").fadeOut(300); //jquery to slide it up
	});



	//Toggle happening dropdown

	jQuery('.happenings__dropdown-button').on('click', function(){
		jQuery('.happenings__dropdown').fadeToggle(200);
		jQuery('.happenings__dropdown').toggleClass('active');
	})

	jQuery.get('/wp-content/themes/visithalland/assets/dist/icons/sprite.svg', function(data) {
        var div = document.createElement('div');
        div.style.width = 0
        div.style.height = 0
        div.style.opacity = 0
        div.style.position = 'absolute'
        div.setAttribute("aria-hidden", "true")
        div.innerHTML = new XMLSerializer().serializeToString(data.documentElement);
        document.body.insertBefore(div, document.body.childNodes[0]);
    });

});
