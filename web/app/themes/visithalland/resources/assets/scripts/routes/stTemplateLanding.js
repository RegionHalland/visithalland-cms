import initFlickity from '../util/initializeFlickity'

export default {
    init() {
        $(document).ready(() => {
            let $carousels = $('.js-carousel');
            initFlickity($carousels);

            $('.st-cta-button').click(function(){
            	console.log("Scrolla");
            	$('html, body').animate({
			        scrollTop: $(".st-week-header").offset().top
			    }, 500);
            })
        });
    },
};