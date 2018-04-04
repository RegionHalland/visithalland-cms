import InfiniteScroll from '../util/infiniteScroll';
import DynamicGrid from '../util/dynamicGrid';

export default {
    init() {
        // Init Infinite scroll
        new InfiniteScroll();

        // Init Packery Grid
        initGrid();
    },
    finalize() {
        // JavaScript to be fired on the home page, after the init JS
    },
};

export function initMeetLocal() {
    initGrid();
};

export function initGrid() {
    // Init a new grid
    var dg = new DynamicGrid();
    console.log("i was called")
};
