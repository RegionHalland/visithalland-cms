export default {
  init() {

  	console.log("This is the Trip Page");

  	//Adds the dynamic featured article grid
    var Packery = require('packery');
    var Flickity = require('flickity');

    var grid = $('.featured-grid')[0];

    var pckry = new Packery(grid, {
      itemSelector: '.featured-grid__item',
      percentPosition: true,
      transitionDuration: 0
    });


  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
