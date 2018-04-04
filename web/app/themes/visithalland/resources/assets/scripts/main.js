// import external dependencies
import 'jquery';

// Import everything from autoload
import "./autoload/**/*";

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import archive from './routes/archive';
import singleTrip from './routes/singleTrip';
import singleHappening from './routes/singleHappening';
import singleMeetLocal from './routes/singleMeetLocal';
import singleEditorTip from './routes/singleEditorTip';
import singlePlaces from './routes/singlePlaces';
import singleCompanies from './routes/singleCompanies';
import home from './routes/home';

/** Populate Router instance with DOM routes */
const routes = new Router({
    // All pages
    common,
    // Archive
    archive,
    // Single Trip
    singleTrip,
    // Single Happening
    singleHappening,
    // Single Meet A Local
    singleMeetLocal,
    // Single Places
    singlePlaces,
    // Single Companies
    singleCompanies,
    // Single Editor tip
    singleEditorTip,
    // Home page
    home,
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
