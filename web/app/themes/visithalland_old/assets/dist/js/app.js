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
jQuery(function() {
	var nextPages = $("#nextPages").data("all");
	var $container = $('#infinite-container').infiniteScroll({
		// options
		path: function() {
			return nextPages[this.loadCount];
		},
		append: '#infinite-container',
		history: 'replace',
		status: '.page-load-status',
		debug: false,
		scrollThreshold: 800
	});

	$container.on( 'load.infiniteScroll', function( event, response ) {
		var elements = $(response);
	});

	$container.on('history.infiniteScroll', function (event, title, path) {
		ga('create', 'UA-89278649-4');
		ga('send', {
			hitType: 'pageview',
			path: path.replace(/^.*\/\/[^\/]+/, '')
		});
	});
});
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
jQuery(function() {
	$(document).on('scroll', function() {
		var scrollTop = $(document).scrollTop()
		var scrollBottom = scrollTop + $(window).height()
		pageBottom = $(document).height()
		var opacity = 1 - scrollTop / 500
		var transform = 0 + scrollTop / 15
		$('.concept-header__content').css('transform', 'translateY(' + transform + 'px)');
		$('.concept-header__content').css('opacity', opacity);
	})
});
jQuery(function() {
	//Init Flickity
	$('.navigation-carousel').flickity({
  		// options
  		cellAlign: 'left',
  		contain: true,
  		prevNextButtons: false,
  		pageDots: false,
	});

	$('.navigation-carousel--next').on( 'click', function() {
	  $('.navigation-carousel').flickity('next');
	});
	
	// next wrapped
	$('.navigation-carousel--previous').on( 'click', function() {
	  $('.navigation-carousel').flickity('previous');
	});

	$('.tip-carousel').flickity({
  		// options
  		cellAlign: 'left',
  		contain: true,
  		prevNextButtons: false,
  		pageDots: false,
	});

	$('.tip-carousel--next').on( 'click', function() {
		$('.tip-carousel').flickity('next');
	});
	// next wrapped
	$('.tip-carousel--previous').on( 'click', function() {
		$('.tip-carousel').flickity('previous');
	});

	$('.landing-concepts__carousel').flickity({
  		// options
  		cellAlign: 'left',
  		contain: true,
  		prevNextButtons: false,
  		pageDots: false,
	});

	$('.landing-concepts__carousel--next').on( 'click', function() {
		$('.landing-concepts__carousel').flickity('next');
	});
	
	// next wrapped
	$('.landing-concepts__carousel--previous').on( 'click', function() {
		$('.landing-concepts__carousel').flickity('previous');
	});
});
jQuery(function() {
	$.get('/wp-content/themes/visithalland/assets/dist/icons/sprite.svg', function(data) {
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