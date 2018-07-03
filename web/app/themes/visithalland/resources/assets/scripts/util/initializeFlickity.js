import Flickity from 'flickity-imagesloaded';

const defaultOptions = {
	cellAlign: 'left',
	contain: true,
	prevNextButtons: false,
	pageDots: false,
	imagesLoaded: true
}

export default ($elements, options) => {
    
	return $elements.each((index, element) => {
		
		options = Object.assign(defaultOptions, options);

    	element.flickity = new Flickity(element, options);

    	let $parent = $(element).parent('.js-carousel-parent');
    	let $previous = $parent.find('.js-carousel-previous');
        let $next = $parent.find('.js-carousel-next');

		if ($previous.length <= 0 && $next.length <= 0) {
            return false;
        }

		$previous.on('click', () => element.flickity.previous())
        $next.on('click', () => element.flickity.next())
	})

}
