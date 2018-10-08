import Map from '../util/map';

export default {
    init() {
    	// TODO: Change to Mapbox
        $(document).ready( () => {
        	this.initMap();
        });
    },

    initMap() {
    	Map.bind();
    }
};
