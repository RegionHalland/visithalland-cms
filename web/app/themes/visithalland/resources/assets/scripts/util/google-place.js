import formatGooglePlacePeriods from './formatGooglePlacePeriods'

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
            if (!results) {
                return
            }
            
            // Add link to visit website
            $('#js-map-link').attr('href', results.url)
            $('#js-website').attr('href', results.website)

            if (!results.opening_hours) {
                return
            }
            
            const openingHours = formatGooglePlacePeriods(results.opening_hours.periods).map(item => {
                if (item.closed) {
                    return `<tr class="rounded">
                        <td class="pl-2 pr-6 py-1"><span class="font-medium">${item.day}</span></td>
                        <td class="px-2 py-1">Stängt</td>
                    </tr>`
                }

                return `<tr class="rounded">
                    <td class="pl-2 pr-6 py-1"><span class="font-medium">${item.day}</span></td>
                    <td class="px-2 py-1">${item.open} - ${item.close}</td>
                </tr>`
            })

            $('#js-open-hours').show();
            $('#js-open-hours').append(openingHours);
        }
    }
}

export default GooglePlace;
