var Flickity = require('flickity-imagesloaded');
import bindNavigation from '../util/bindFlickityNavigation';

export default {
    init() {
        $(document).ready( () => {
        	this.initFlickity();
        });
    },

    initFlickity() {	
        // Init map on last element in dom. Makes it work with infinite scroll
        var galleries = $('.st-category__carousel');
        var carousel = document.querySelector('.st-carousel');
        var weekCarousel = $('.st-week-carousel');

        galleries.each(function(key, el) {
            el.flickity = new Flickity(el, {
                cellAlign: 'left',
                contain: true,
                prevNextButtons: false,
                pageDots: false,
                imagesLoaded: true
            });

            bindNavigation(el);
        })

        carousel.flickity = new Flickity(carousel, {
            cellAlign: 'left',
            contain: true,
            prevNextButtons: false,
            pageDots: false,
            imagesLoaded: true
        });

        bindNavigation(carousel);

        weekCarousel.each((key, el) => {
            el.flickity = new Flickity(el, {
                cellAlign: 'left',
                contain: true,
                prevNextButtons: false,
                pageDots: false,
                imagesLoaded: true
            });

            bindNavigation(el);
        });
    },

    bindNavigation(el) {
        let previous = $(el).siblings('.js-carousel-previous');
        let next = $(el).siblings('.js-carousel-next');

        if (previous.length <= 0 && next.length <= 0) {
            return false;
        }

        previous.on('click', () => el.flickity.previous())
        next.on('click', () => el.flickity.next())
    }
};