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