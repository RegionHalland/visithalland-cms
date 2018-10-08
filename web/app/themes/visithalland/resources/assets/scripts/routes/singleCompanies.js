import MapBox from '../util/mapBox';
import GooglePlace from '../util/google-place';

export default {
    init() {
        MapBox.bind();
        
        new GooglePlace();
    },
    finalize() {
        // JavaScript to be fired on the home page, after the init JS
    },
};

export function initMap() {
    MapBox.bind();
};
