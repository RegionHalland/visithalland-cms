// import external dependencies
import 'jquery';

// Import everything from autoload
import "./autoload/**/*";

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import templateAllActivitiesSkordetider from './routes/templateAllActivitiesSkordetider';
import mapSkordetider from './routes/mapSkordetider';
//import templateLandingSkordetider from './routes/templateLandingSkordetider';

/** Populate Router instance with DOM routes */
const routes = new Router({
    // allWeekendActivities page
    templateAllActivitiesSkordetider,
    // mapSkordetider page
    mapSkordetider,
    // templateLandingSkordetider page
    //templateLandingSkordetider
});


// Load Events
jQuery(document).ready(() =>
    routes.loadEvents()
);

// Build SVG sprite
var __svg__ = {
	path: '../icons/**/*.svg',
	name: 'icons/sprite.svg'
};
