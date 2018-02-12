jQuery(function() {
	var nextPages = jQuery("#nextPages").data("all");
	var $container = jQuery('#infinite-container').infiniteScroll({
		// options
		path: function() {
			return nextPages[this.loadCount];
			//return nextUrl;
		},
		append: '#infinite-container',
		history: 'replace',
		status: '.page-load-status',
		debug: false,
		scrollThreshold: 800
	});

	$container.on( 'request.infiniteScroll', function( event, path ) {
		// console.log( 'Loading page: ' + path );
	});


	$container.on( 'load.infiniteScroll', function( event, response ) {
		var elements = jQuery(response);
	});

	$container.on('append.infiniteScroll', function (event, response, path, items) {
		// console.log("lazyLoadInstance", lazyLoadInstance);
		lazyLoadInstance.update();
	})

	$container.on( 'last.infiniteScroll', function( event, response, path ) {
		// console.log( 'Loaded: ' + path );
		// console.log('we have reached the end')
	});

	$container.on( 'error.infiniteScroll', function( event, error, path ) {
		// console.log( 'Could not load: ' + path )
	});

	$container.on('history.infiniteScroll', function (event, title, path) {
		//console.log('History changed to: ' + path);
		ga('create', 'UA-89278649-4');
		ga('send', {
			hitType: 'pageview',
			page: path
		});
		
	});


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



	jQuery('.landing-concepts__carousel').flickity({
  		// options
  		cellAlign: 'left',
  		contain: true,
  		prevNextButtons: false,
  		pageDots: false,
	});

	jQuery('.landing-concepts__carousel--next').on( 'click', function() {
	  jQuery('.landing-concepts__carousel').flickity('next');
	});
	// next wrapped
	jQuery('.landing-concepts__carousel--previous').on( 'click', function() {
	  jQuery('.landing-concepts__carousel').flickity('previous');
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
	  days = 182; //number of days to keep the cookie
	  myDate = new Date();
	  myDate.setTime(myDate.getTime()+(days*24*60*60*1000));
	  document.cookie = "comply_cookie = comply_yes; expires = " + myDate.toGMTString(); //creates the cookie: name|value|expiry
	  jQuery(".cookie-banner").fadeOut(300); //jquery to slide it up
	});

	jQuery('#eu-btn').on('click', function () { 
	  jQuery(".landing-eu").fadeOut(300); //jquery to slide it up
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

jQuery(function() {
    var map;
    var service;

    if (jQuery('#map').length){
        initMap();
    }

    function initMap() {
        var locationToSearch = {lat: Number(phpVars.meta_fields.location.lat), lng: Number(phpVars.meta_fields.location.lng)};

        map = new google.maps.Map(document.getElementById('map'), {
            center: locationToSearch,
            zoom: 15
        });

        service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
            location: locationToSearch,
            radius: 500,
            keyword: phpVars.post.post_title
        }, callback);
    }

    function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            if (results.length > 0) {
                //We have a result
                var place = results[0];
                service.getDetails({placeId: place.place_id}, detailCallback);
            }
        }
    }

    function detailCallback(results, status) {
        if (status == google.maps.places.PlacesServiceStatus.OK) {
            var opening_hours;
            console.log(results)
            //Add link to shown on map
            jQuery('#details-show-on-map').attr('href', results.url)
            
            //Add link to visit website
            jQuery('#details-visit-website').attr('href', results.website)
            
            opening_hours = results.opening_hours.weekday_text.map(function(val, key){
                return '<li class="details__open-hour">' + val + '</li>';
            });
            //Add opening hours list items to content
            jQuery('#opening-hours').append(opening_hours);
        }
    }
});