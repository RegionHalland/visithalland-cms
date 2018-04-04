var Packery = require('packery');

class DynamicGrid {
    constructor() {
        console.log("grid me");
        var grid = $('.featured-grid')[0];

        var pckry = new Packery(grid, {
          itemSelector: '.featured-grid__item',
          percentPosition: true,
          transitionDuration: 0
        });
    }
}

export default DynamicGrid;
