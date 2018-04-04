var Packery = require('packery');
var Flickity = require('flickity');

export default {
  init() {
  	console.log("This is the Archive Page");
    var grid = $('.featured-grid')[0];

    var pckry = new Packery(grid, {
      itemSelector: '.featured-grid__item',
      percentPosition: true,
      transitionDuration: 0
    });

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

  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
