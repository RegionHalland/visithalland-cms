jQuery(function() {
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

	jQuery('.search-button').on('click', function(){
		jQuery('.mobile-search').fadeToggle(400);
		jQuery('.mobile-search').toggleClass('active');
		jQuery('body').toggleClass('overflow-hidden');
		jQuery('#main-content').toggleClass('menu-open');

		if(jQuery('.mobile-navigation').hasClass('active')) {
			jQuery('.mobile-navigation').fadeToggle(400);
			jQuery('body').toggleClass('overflow-hidden');
			jQuery('.mobile-navigation').toggleClass('active');
			jQuery('#main-content').toggleClass('menu-open');
		}
	});

	jQuery('.happenings__dropdown-button').on('click', function(){
		jQuery('.happenings__dropdown').fadeToggle(200);
		jQuery('.happenings__dropdown').toggleClass('active');
	})


	jQuery('.nav-button').on('click', function(){
		jQuery('.nav').toggleClass('active');
	});
});