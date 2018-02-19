jQuery(function() {
	var nextPages = $("#nextPages").data("all");
	var $container = $('#infinite-container').infiniteScroll({
		// options
		path: function() {
			return nextPages[this.loadCount];
			//return nextUrl;
		},
		append: '#infinite-container',
		history: 'replace',
		status: '.page-load-status',
		debug: false,
		scrollThreshold: 800
	});

	$container.on( 'request.infiniteScroll', function( event, path ) {
		// console.log( 'Loading page: ' + path );
	});


	$container.on( 'load.infiniteScroll', function( event, response ) {
		var elements = $(response);
	});

	$container.on('append.infiniteScroll', function (event, response, path, items) {
		// console.log("lazyLoadInstance", lazyLoadInstance);
		// lazyLoadInstance.update();
	})

	$container.on( 'last.infiniteScroll', function( event, response, path ) {
		// console.log( 'Loaded: ' + path );
		// console.log('we have reached the end')
	});

	$container.on( 'error.infiniteScroll', function( event, error, path ) {
		// console.log( 'Could not load: ' + path )
	});

	$container.on('history.infiniteScroll', function (event, title, path) {
		//console.log('History changed to: ' + path);
		ga('create', 'UA-89278649-4');
		ga('send', {
			hitType: 'pageview',
			path: path.replace(/^.*\/\/[^\/]+/, '')
		});
		
	});
});