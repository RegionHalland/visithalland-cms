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

	jQuery('.nav-button').on('click', function(){
		jQuery('.nav').toggleClass('active');
	});
});
jQuery(function() {
	console.log("place", php_vars);

      var map;
      var service;
      initMap();

      function initMap() {
        var locationToSearch = {lat: 56.36948109999999, lng: 13.16865919999998};

        map = new google.maps.Map(document.getElementById('map'), {
          center: locationToSearch,
          zoom: 15
        });

        service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
          location: locationToSearch,
          radius: 500,
          keyword: "Kungsbygget Äventyrspark"
        }, callback);
      }

      function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
          console.log(results);
          var place = results[0];
          service.getDetails({placeId: place.place_id}, detailCallback);
          /*for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
          }*/
        }
      }

          function detailCallback(results, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
              console.log(results)
                /*vm.phone = results.international_phone_number ? results.international_phone_number : results.formatted_phone_number;
                vm.website = results.website;
                vm.openNow = results.opening_hours ? results.opening_hours.open_now : false;
                vm.openingHours = results.opening_hours ? results.opening_hours.weekday_text : [];
                vm.forceUpdate();*/
            }
        }
});