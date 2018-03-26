// import external dependencies
import 'jquery';

// Import everything from autoload
import "./autoload/**/*";

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import archive from './routes/archive';
import home from './routes/home';
import aboutUs from './routes/about';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,

  archive,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});


// Load Events
jQuery(document).ready(() => routes.loadEvents());

// Build SVG sprite
var __svg__ = { 
	path: '../icons/**/*.svg', 
	name: 'icons/sprite.svg'
};
