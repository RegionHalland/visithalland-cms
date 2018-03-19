var Flickity = require('flickity');
class Sliders {
    constructor() {
        this.bind();
    }

    bind() {
        // TODO: Add Flickity for our new items -> this is how we do it now ---->
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

        // We can't do it like this anymore:
        /*$('.navigation-carousel').flickity({
            // options
            cellAlign: 'left',
            contain: true,
            prevNextButtons: false,
            pageDots: false,
        });

        $('.navigation-carousel--next').on('click', function () {
            $('.navigation-carousel').flickity('next');
        });

        // next wrapped
        $('.navigation-carousel--previous').on('click', function () {
            $('.navigation-carousel').flickity('previous');
        });

        $('.tip-carousel').flickity({
            // options
            cellAlign: 'left',
            contain: true,
            prevNextButtons: false,
            pageDots: false,
        });

        $('.tip-carousel--next').on('click', function () {
            $('.tip-carousel').flickity('next');
        });
        // next wrapped
        $('.tip-carousel--previous').on('click', function () {
            $('.tip-carousel').flickity('previous');
        });

        $('.landing-concepts__carousel').flickity({
            // options
            cellAlign: 'left',
            contain: true,
            prevNextButtons: false,
            pageDots: false,
        });

        $('.landing-concepts__carousel--next').on('click', function () {
            $('.landing-concepts__carousel').flickity('next');
        });

        // next wrapped
        $('.landing-concepts__carousel--previous').on('click', function () {
            $('.landing-concepts__carousel').flickity('previous');
        });*/
    }
}

export default new Sliders();
