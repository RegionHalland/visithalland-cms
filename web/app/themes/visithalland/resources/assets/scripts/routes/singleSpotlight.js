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

export function initSpotlight() {
    initGrid();
};

export function initGrid() {
    var dg = new DynamicGrid();
};
