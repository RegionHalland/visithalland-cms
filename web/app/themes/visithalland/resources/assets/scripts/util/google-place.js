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
        var keyword = $('[data-post-title]').data('postTitle');

        if (!keyword) {
            return false
        }

        this.service = new google.maps.places.PlacesService(this.map);
        this.service.nearbySearch({
            location: locationToSearch,
            radius: 80,
            keyword: keyword,
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

            var ass = results.opening_hours.periods.map(item => {
                console.log(item)
                return ` <tr class="rounded">
                    <td class="pl-2 pr-6 py-1"><span class="font-medium">${item}</span></td>
                    <td class="px-2 py-1">12:00 – 16:00</td>
                  </tr>
                `
            })

            //Add link to shown on map
            $('#js-map-link').attr('href', results.url)

            //Add link to visit website
            $('#js-website').attr('href', results.website)

            if(results.opening_hours) {
                $('#js-open-hours').show();

                opening_hours = results.opening_hours.weekday_text.map(item => 
                    `<li class="js-open-hours">${item}</li>`
                );

                //Add opening hours list items to content
                $('#js-open-hours').append(ass);
            }
        }
    }
}

export default GooglePlace;
