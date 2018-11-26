<div class="topographic-pattern bg-blue-light border-b border-px border-blue">
	<div class="container w-11/12 lg:w-10/12 mx-auto">
	    <div class="infinite-scroll-request py-4 relative">
	    	<div class="next-article w-full inline-flex">
				<div class="overflow-hidden rounded relative h-24 w-24 -mt-8">
					<img class="next-article__img absolute pin-l pin-t w-full h-auto" src="" alt="">
				</div>
	    		<div class="next-article__content pl-4 flex-1">
	    			<span class="next-article__heading block font-rift my-1 text-sm text-grey-light">@php _e( 'Nästa artikel', 'visithalland' ); @endphp</span>
	    			<span class="next-article__title block font-rift font-bold text-white text-2xl max-w-8 whitespace-no-wrap truncate"></span>
	    		</div>
	    	</div>

	    	<div class="absolute vertical-center pin-r">
	            @include('partials.components.scroll-indicator')
	        </div>
	    </div>
	</div>
</div>