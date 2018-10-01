import MapBox from '../util/mapBox';
import InfiniteScroll from '../util/infiniteScroll';

export default {
    init() {
        // Init Infinite scroll
        new InfiniteScroll();

        MapBox.bind();
    },
    finalize() {
        // JavaScript to be fired on the home page, after the init JS
    },
};

export function initMap() {
    MapBox.bind();
};

export function initHappening() {
	initMap();
};