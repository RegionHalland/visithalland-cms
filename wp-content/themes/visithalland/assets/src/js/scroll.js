//This file controls scroll events

jQuery(function() {
	$(document).on('scroll', function() {
		var scrollTop = $(document).scrollTop()
		var scrollBottom = scrollTop + $(window).height()

		pageBottom = $(document).height()

		var opacity = 1 - scrollTop / 500

		var transform = 0 + scrollTop / 15

		$('.concept-header__content').css('transform', 'translateY(' + transform + 'px)');
		$('.concept-header__content').css('opacity', opacity);
		//$('.landing-header__img').css('transform', 'translateY(' + transform + 'px)');
	})
});