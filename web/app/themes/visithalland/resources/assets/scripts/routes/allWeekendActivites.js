var Flickity = require('flickity-imagesloaded');

export default {
    init() {
        $(document).ready( () => {
        	this.initFlickity();
        });
    },

    initFlickity() {	
        // Init map on last element in dom. Makes it work with infinite scroll
        var galleries = $('.category--gallery');

        galleries.each(function(key, el) {
        	el.flickity = new Flickity(el, {
		        cellAlign: 'left',
		        contain: true,
		        prevNextButtons: false,
		        pageDots: false,
		        imagesLoaded: true
		    });
        })
    }
};