var Flickity = require('flickity-imagesloaded');

export default {
    init() {
        $(document).ready( () => {
            console.log("test");
        	this.initFlickity();
        });
    },

    initFlickity() {	
        // Init map on last element in dom. Makes it work with infinite scroll
        var galleries = $('.st-category__carousel');
        var carousel = document.querySelector('.st-carousel');

        galleries.each(function(key, el) {
        	el.flickity = new Flickity(el, {
		        cellAlign: 'left',
		        contain: true,
		        prevNextButtons: false,
		        pageDots: false,
		        imagesLoaded: true
		    });
        })

        carousel.flickity = new Flickity(carousel, {
            cellAlign: 'left',
            contain: true,
            prevNextButtons: false,
            pageDots: false,
            imagesLoaded: true
        });
    }
};