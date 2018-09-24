import InfiniteScroll from '../util/infiniteScroll';
import MapBox from '../util/mapBox';

export default {
    init() {
        // Init Infinite scroll
        new InfiniteScroll();

        initMap();
    },
    finalize() {
        // JavaScript to be fired on the home page, after the init JS
    },
};

export function initHappening() {
    //Init Map
    initMap();
};

export function initMap() {
    MapBox.bind();
};
