import InfiniteScroll from '../util/infiniteScroll';
import Packery from 'packery';
import Map from '../util/map';

export default {
    init() {
        console.log("This is (REALLY) Happenings Page");
        initMap();
    },
    finalize() {
        // JavaScript to be fired on the home page, after the init JS
    },
};

export function initHappening() {
    console.log("HAPPP");
    //Init Map
    initMap();
};

export function initMap() {
    Map.bind();
    console.log("init map called");
};
