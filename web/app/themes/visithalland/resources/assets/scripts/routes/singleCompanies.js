import Map from '../util/map';
import Place from '../util/google-place';

export default {
    init() {
        // Init Infinite scroll
        initMap();
        var place = new Place();
        //var lat = $('.acf-map').find(".marker").data('lat');
        //var lng = $('.acf-map').find(".marker").data('lat')

        console.log();
        //place.initMap();

        console.log("company maan")
    },
    finalize() {
        // JavaScript to be fired on the home page, after the init JS
    },
};

export function initMap() {
    Map.bind();
};
