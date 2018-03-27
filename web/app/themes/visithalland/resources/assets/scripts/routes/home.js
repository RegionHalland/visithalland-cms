export default {
  init() {
    // JavaScript to be fired on the home page
   	console.log("This is the homepage");

    var Packery = require('packery');

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
