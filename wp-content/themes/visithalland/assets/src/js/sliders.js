
jQuery(function() {
	

	//Init Flickity
	$('.navigation-carousel').flickity({
  		// options
  		cellAlign: 'left',
  		contain: true,
  		prevNextButtons: false,
  		pageDots: false,
	});

	$('.navigation-carousel--next').on( 'click', function() {
	  $('.navigation-carousel').flickity('next');
	});
	// next wrapped
	$('.navigation-carousel--previous').on( 'click', function() {
	  $('.navigation-carousel').flickity('previous');
	});

	$('.tip-carousel').flickity({
  		// options
  		cellAlign: 'left',
  		contain: true,
  		prevNextButtons: false,
  		pageDots: false,
	});

	$('.tip-carousel--next').on( 'click', function() {
	  $('.tip-carousel').flickity('next');
	});
	// next wrapped
	$('.tip-carousel--previous').on( 'click', function() {
	  $('.tip-carousel').flickity('previous');
	});



	$('.landing-concepts__carousel').flickity({
  		// options
  		cellAlign: 'left',
  		contain: true,
  		prevNextButtons: false,
  		pageDots: false,
	});

	$('.landing-concepts__carousel--next').on( 'click', function() {
	  $('.landing-concepts__carousel').flickity('next');
	});
	// next wrapped
	$('.landing-concepts__carousel--previous').on( 'click', function() {
	  $('.landing-concepts__carousel').flickity('previous');
	});

});