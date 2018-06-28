// import external dependencies
import 'jquery';

// Import everything from autoload
import "./autoload/**/*";

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import stTemplateAllActivities from './routes/stTemplateAllActivities';
import stTemplateMap from './routes/stTemplateMap';
import stTemplateLanding from './routes/stTemplateLanding';

/** Populate Router instance with DOM routes */
const routes = new Router({
    // allWeekendActivities page
    stTemplateAllActivities,
    // mapSkordetider page
    stTemplateMap,
    // templateLandingSkordetider page
    stTemplateLanding
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
