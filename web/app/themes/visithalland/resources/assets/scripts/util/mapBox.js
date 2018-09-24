import mapboxgl from 'mapbox-gl';

class MapBox {
    constructor() {
    }

    bind() {
        var vm = this;
        $(document).ready(function () {
        	var mapContainer = $('.acf-map').last();
        	if(!mapContainer[0]) return;
        	vm.new_map(mapContainer[0]);
        });
    }

    new_map(el) {
		const map = new mapboxgl.Map({
		    container: el,
		    style: 'https://openmaptiles.github.io/osm-bright-gl-style/style-cdn.json',
			center: [8.538961,47.372476],
			zoom: 10,
		});
    }
}

export default new MapBox();
