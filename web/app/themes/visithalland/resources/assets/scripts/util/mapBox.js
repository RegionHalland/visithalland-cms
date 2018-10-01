import mapboxgl from 'mapbox-gl';

class MapBox {
    constructor() {
    }

    bind() {
        this.newMap($('.acf-map').last());
    }

    newMap(el) {
        var markers = el.find('.marker');
        var mapContainer = el.get()[0];

        // JavaScript to be fired on all pages
        mapboxgl.accessToken = 'pk.eyJ1Ijoic2ViYXN0aWFucmVnaW9uIiwiYSI6ImNqbWcyb3ZiNjQ5ZjQzcG8ybXB3MXJsNG0ifQ.qaB9ehi9rGD46vteTHbifA';
        const map = new mapboxgl.Map({
            container: mapContainer,
            zoom: 12,
            center: [$(markers[0]).data("lng"), $(markers[0]).data("lat")],
            style: 'mapbox://styles/mapbox/streets-v9',
        });

        var bounds = new mapboxgl.LngLatBounds();
        markers.each(function () {
            var marker = [$(this).data("lng"), $(this).data("lat")];
            new mapboxgl.Marker()
                .setLngLat(marker)
                .addTo(map);
            bounds.extend(
                [$(this).data("lng"), $(this).data("lat")]
            );
        });
        
        map.fitBounds(bounds, { maxZoom: 12, padding: {top: 15, bottom:15, left: 15, right:15} });
    }
}

export default new MapBox();
