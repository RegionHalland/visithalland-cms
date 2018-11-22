var Packery = require('packery');


//TODO: Change to more generic
class DynamicGrid {
    constructor() {
        var grid = $('.featured-grid')[0];

        var pckry = new Packery(grid, {
            itemSelector: '.featured-grid__item',
            percentPosition: true,
            transitionDuration: 0
        });
    }
}

export default DynamicGrid;
