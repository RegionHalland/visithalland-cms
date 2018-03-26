export default {
  init() {
    // JavaScript to be fired on the home page
   	console.log("This is the homepage");

   	var Flickity = require('flickity');
    var Packery = require('packery');

    var grid = $('.featured-grid')[0];
    
    var pckry = new Packery(grid, {
      itemSelector: '.featured-grid__item',
      percentPosition: true,
      transitionDuration: 0
    });
   	
    var landingConceptsCarousel = new Flickity('.landing-concepts__carousel', {
        cellAlign: 'left',
        contain: true,
        prevNextButtons: false,
        pageDots: false,
        imagesLoaded: true
    });

    $('.landing-concepts__carousel--next').on('click', function () {
        console.log("hej", landingConceptsCarousel);
        landingConceptsCarousel.next();
    });

    $('.landing-concepts__carousel--previous').on('click', function () {
        console.log("hej", landingConceptsCarousel);
        landingConceptsCarousel.previous();
    });

    //Click event for EU information
    $('#eu-btn').on('click', function () { 
      $(".landing-eu").fadeOut(300); //$ to slide it up
    });

    
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
