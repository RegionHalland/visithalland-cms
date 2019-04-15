var Flickity = require('flickity');
import DynamicGrid from '../util/dynamicGrid';
import InitializeFlickity from '../util/initializeFlickity';

export default {
  init() {

    // Initializes Carousel
    InitializeFlickity($('.js-carousel'))

    // Initializes Masonry Grid
    new DynamicGrid();

  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
