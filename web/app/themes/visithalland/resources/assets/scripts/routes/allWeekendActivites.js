import Map from '../util/map';
var Flickity = require('flickity');

export default {
    init() {
        initMap();
        $(document).ready( () => {
        	this.initFlickity();
        });
    },

    initFlickity() {	
        // Init map on last element in dom. Makes it work with infinite scroll
        var galleries = $('.category--gallery');

        galleries.each(function(key, el) {
        	new Flickity(el, {
		        cellAlign: 'left',
		        contain: true,
		        prevNextButtons: false,
		        pageDots: false,
		        imagesLoaded: true
		    });
        })

    }
};

export function initMap() {
    Map.bind();
};
