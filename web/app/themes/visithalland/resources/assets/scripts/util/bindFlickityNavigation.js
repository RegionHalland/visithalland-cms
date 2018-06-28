export default el => {
	let $parent = $(el).closest('.js-carousel-parent');
    let previous = $parent.find('.js-carousel-previous');
    let next = $parent.find('.js-carousel-next');

    if ($parent.length <= 0) {
        return false;
    }

    previous.on('click', () => el.flickity.previous())
	next.on('click', () => el.flickity.next())
}