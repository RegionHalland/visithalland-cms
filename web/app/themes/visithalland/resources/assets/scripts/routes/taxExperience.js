var Flickity = require('flickity');
import DynamicGrid from '../util/dynamicGrid';

export default {
  init() {
    //Adds the spotlight carousel
    var spotlightCarousel = new Flickity('.spotlight-carousel', {
        cellAlign: 'left',
        contain: true,
        prevNextButtons: false,
        pageDots: false,
        imagesLoaded: true
    });

    $('.spotlight-carousel--next').on('click', function () {
        spotlightCarousel.next();
    });

    $('.spotlight-carousel--previous').on('click', function () {
        spotlightCarousel.previous();
    });

    new DynamicGrid();

  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
