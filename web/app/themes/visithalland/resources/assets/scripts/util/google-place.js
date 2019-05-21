class GooglePlace {
    constructor() {
        this.map = document.createElement("div");
        this.service;

        if ($('.js-map').last()){
            var lat = $('.js-map').find(".marker").data('lat');
            var lng = $('.js-map').find(".marker").data('lng');

            this.initMap(lat, lng)
        }
    }

    initMap(lat, lng) {
        var locationToSearch = { lat: Number(lat), lng: Number(lng) };

        this.service = new google.maps.places.PlacesService(this.map);
        this.service.nearbySearch({
            location: locationToSearch,
            radius: 80,
            keyword: $(".article-hero__title").text(),
        }, this.callback.bind(this));
    }

    callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            if (results.length > 0) {
                // We select the first object in the result array which has a opening hour
                var firstResultWithOpeningHours = results.find(function(element) {
                    return element.opening_hours;
                });

                if(!firstResultWithOpeningHours) return;

                var place = firstResultWithOpeningHours;
                this.service.getDetails({ placeId: place.place_id }, this.detailCallback);
            }
        }
    }

    detailCallback(results, status) {
        if (status == google.maps.places.PlacesServiceStatus.OK) {
            var opening_hours;
            console.log(results.website, "results")

            //Add link to shown on map
            $('#js-map-link').attr('href', results.url)

            //Add link to visit website
            $('#js-website').attr('href', results.website)

            if(results.opening_hours) {
                $('.js-open-hours').show();

                opening_hours = results.opening_hours.weekday_text.map(function (val, key) {
                    return '<li class="js-open-hours">' + val + '</li>';
                });

                //Add opening hours list items to content
                $('#js-open-hours').append(opening_hours);
            }
        }
    }
}

export default GooglePlace;
