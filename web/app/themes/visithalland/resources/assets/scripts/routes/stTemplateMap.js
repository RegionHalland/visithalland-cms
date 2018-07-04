import Map from '../util/map';

export default {
    init() {
        $(document).ready( () => {
        	this.initMap();
        });
    },

    initMap() {
    	Map.bind();
    }
};
