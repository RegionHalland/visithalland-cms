import InfiniteScroll from '../util/infiniteScroll';
import Packery from 'packery';
import Map from '../util/map';

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
    Map.bind();
};
