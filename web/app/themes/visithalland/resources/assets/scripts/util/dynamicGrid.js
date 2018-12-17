var Packery = require('packery');


//TODO: Change to more generic
class DynamicGrid {
    constructor() {
        var grid = $('.dynamic-grid')[0];

        var pckry = new Packery(grid, {
            itemSelector: '.dynamic-grid__item',
            percentPosition: true,
            transitionDuration: 0
        });
    }
}

export default DynamicGrid;
