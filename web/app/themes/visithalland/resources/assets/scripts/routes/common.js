import mapboxgl from 'mapbox-gl';

export default {
	init() {
		// JavaScript to be fired on all pages
		mapboxgl.accessToken = 'pk.eyJ1Ijoic2ViYXN0aWFucmVnaW9uIiwiYSI6ImNqbWcyb3ZiNjQ5ZjQzcG8ybXB3MXJsNG0ifQ.qaB9ehi9rGD46vteTHbifA';
		const map = new mapboxgl.Map({
			container: 'mymap',
			zoom: 12,
			style: 'mapbox://styles/mapbox/streets-v9',
		});
		console.log(map);
		new mapboxgl.Marker()
			.setLngLat([12.8474449,56.6682916])
			.addTo(map);
		map.panTo([12.8474443,56.6682916])

	},
	finalize() {
	// JavaScript to be fired on all pages, after page specific JS is fired
	},
};
