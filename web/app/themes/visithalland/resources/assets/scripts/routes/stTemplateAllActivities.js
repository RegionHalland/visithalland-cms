import initFlickity from '../util/initializeFlickity'

export default {
    init() {
        $(document).ready(() => {
            let $carousels = $('.js-carousel');
            initFlickity($carousels);
        });
    },
};