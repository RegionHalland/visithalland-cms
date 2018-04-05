class GooglePlace {
    // TODO: Test if it works
    constructor() {
        this.map;
        this.service;

        if (document.getElementById('map')){
            var lat = $('.acf-map').find(".marker").data('lat');
            var lng = $('.acf-map').find(".marker").data('lng');

            this.initMap(lat, lng)
        }
    }

    initMap(lat, lng) {
        var locationToSearch = { lat: Number(lat), lng: Number(lng) };

        this.map = new google.maps.Map(document.getElementById('map'), {
            center: locationToSearch,
            zoom: 15
        });

        this.service = new google.maps.places.PlacesService(map);
        this.service.nearbySearch({
            location: locationToSearch,
            radius: 50,
            keyword: $(".article-hero__title").text(),
        }, this.callback.bind(this));
    }

    callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            if (results.length > 0) {
                var place = results[0];

                // TODO - make this.service to be defined here...
                this.service.getDetails({ placeId: place.place_id }, this.detailCallback);
            }
        }
    }

    detailCallback(results, status) {
        if (status == google.maps.places.PlacesServiceStatus.OK) {
            var opening_hours;

            //Add link to shown on map
            $('#google-details-show-on-map').attr('href', results.url)

            //Add link to visit website
            $('#google-details-visit-website').attr('href', results.website)

            if(results.opening_hours) {
                $('.google-details__open-hours').show();

                opening_hours = results.opening_hours.weekday_text.map(function (val, key) {
                    return '<li class="details__open-hour">' + val + '</li>';
                });

                //Add opening hours list items to content
                $('#opening-hours').append(opening_hours);
            }
        }
    }
}

export default GooglePlace;
