class GooglePlace {
    // TODO: Test if it works
    constructor() {
        this.map;
        this.service;

        console.log("we may a map")
        console.log($('.acf-map').find(".marker"));
        var lat = $('.acf-map').find(".marker").data('lat');
        var lng = $('.acf-map').find(".marker").data('lng');

        this.initMap(lat, lng)
    }

    initMap(lat, lng) {
        console.log("lets init this shit", lat, lng)
        var locationToSearch = { lat: Number(lat), lng: Number(lng) };
        console.log(document.getElementById('map'));

        this.map = new google.maps.Map(document.getElementById('map'), {
            center: locationToSearch,
            zoom: 15
        });

        console.log("mt", $(".article-hero__title").text())
        this.service = new google.maps.places.PlacesService(map);
        this.service.nearbySearch({
            location: locationToSearch,
            radius: 50,
            keyword: $(".article-hero__title").text(),
        }, this.callback);
    }

    callback(results, status) {
        console.log("callback", results, status)
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            if (results.length > 0) {
                //We have a result
                console.log("res", results)
                var place = results[0];

                // TODO - make this.service to be defined here...
                this.service.getDetails({ placeId: place.place_id }, this.detailCallback);
            }
        }
    }

    detailCallback(results, status) {
        if (status == google.maps.places.PlacesServiceStatus.OK) {
            var opening_hours;
            console.log(results)
            //Add link to shown on map
            jQuery('#details-show-on-map').attr('href', results.url)

            //Add link to visit website
            jQuery('#details-visit-website').attr('href', results.website)

            opening_hours = results.opening_hours.weekday_text.map(function (val, key) {
                return '<li class="details__open-hour">' + val + '</li>';
            });
            //Add opening hours list items to content
            jQuery('#opening-hours').append(opening_hours);
        }
    }
}

export default GooglePlace;
