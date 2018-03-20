class GooglePlace {
    // TODO: Test if it works
    constructor() {
        this.map;
        this.service;

        if (jQuery('#map').length) {
            this.initMap();
        }
    }

    initMap() {
        var locationToSearch = { lat: Number(phpVars.meta_fields.location.lat), lng: Number(phpVars.meta_fields.location.lng) };

        this.map = new google.maps.Map(document.getElementById('map'), {
            center: locationToSearch,
            zoom: 15
        });

        this.service = new google.maps.places.PlacesService(map);
        this.service.nearbySearch({
            location: locationToSearch,
            radius: 500,
            keyword: phpVars.post.post_title
        }, this.callback);
    }

    callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            if (results.length > 0) {
                //We have a result
                var place = results[0];
                service.getDetails({ placeId: place.place_id }, this.detailCallback);
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

export default new GooglePlace();