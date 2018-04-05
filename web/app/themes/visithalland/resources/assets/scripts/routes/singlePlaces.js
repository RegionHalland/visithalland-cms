import Map from '../util/map';
import Place from '../util/google-place';

export default {
    init() {
        // Init Infinite scroll
        initMap();
        new Place();
    },
    finalize() {
        // JavaScript to be fired on the home page, after the init JS
    },
};

export function initMap() {
    Map.bind();
};
