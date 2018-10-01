import mapboxgl from 'mapbox-gl';

class MapBox {
    constructor() {
    }

    bind() {
        console.log("bind me");
        // JavaScript to be fired on all pages
        mapboxgl.accessToken = 'pk.eyJ1Ijoic2ViYXN0aWFucmVnaW9uIiwiYSI6ImNqbWcyb3ZiNjQ5ZjQzcG8ybXB3MXJsNG0ifQ.qaB9ehi9rGD46vteTHbifA';
        const map = new mapboxgl.Map({
            container: 'mymap',
            zoom: 12,
            style: 'mapbox://styles/mapbox/streets-v9',
        });
        
        console.log(map);
        new mapboxgl.Marker()
            .setLngLat([12.8474441, 56.6682916])
            .addTo(map);
        map.panTo([12.8474443, 56.6682916])
        /*setTimeout(function() {
            map.resize();
        }, 3000);*/
        


        /*var vm = this;
        $(document).ready(function () {
        	var mapContainer = $('.acf-map').last();
        	if(!mapContainer[0]) return;
        	vm.new_map(mapContainer[0]);
        });*/
    }

    /*new_map(el) {
        mapboxgl.accessToken = 'pk.eyJ1Ijoic2ViYXN0aWFucmVnaW9uIiwiYSI6ImNqbWcyb3ZiNjQ5ZjQzcG8ybXB3MXJsNG0ifQ.qaB9ehi9rGD46vteTHbifA';
		const map = new mapboxgl.Map({
            container: el,
	        style: 'mapbox://styles/mapbox/streets-v9',
			zoom: 1,
		});
        var marker = new mapboxgl.Marker()
          .setLngLat([56.8966805, 12.803399300000024])
          .addTo(map);

        map.jumpTo([56.8966805, 12.803399300000024]);
        window.hej = map;

        /*window.setTimeout(function(){
            map.resize();
        }, 1000)

    }*/
}

export default new MapBox();
