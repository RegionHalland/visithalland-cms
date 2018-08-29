<div class="clearfix mxn3 mt4">
	<div class="col col-12 md-col-8 px3">
		<header class="bg-blue rift-font text-sm bold px3 py2 rounded-pill inline-block text-light">
			@php _e( 'Populära artiklar', 'visithalland' ) @endphp
		</header>

		<div class="clearfix mxn2">
			<div class="col col-12 sm-col-6 px2 mt3">
				<a href="" title="" class="mb3">
                    <article class="">
                    	<div class="overflow-hidden aspect-container aspect-3x2 relative rounded">
	                        <picture>
	                            <source media="(min-width:40em)"
	                                data-srcset="https://www.visithalland.com/app/uploads/2018/08/B9064260-900x600.jpg 1x, https://www.visithalland.com/app/uploads/2018/08/B9064260-900x600.jpg 2x"" />
	                            <source
	                                data-srcset="https://www.visithalland.com/app/uploads/2018/08/B9064260-400x350.jpg 1x, https://www.visithalland.com/app/uploads/2018/08/B9064260-900x600.jpg 2x"" />
	                            <img class="absolute left-0 top-0 w-fill lazyload"
	                                data-src="https://www.visithalland.com/app/uploads/2018/08/B9064260-900x600.jpg"
	                            />
	                        </picture>
                        </div>
                        <h3 class="mt3">En riktigt schysst artikel</h3>
                        <div class="read-more mt3">
                            <span class="read-more__text">
                                @php _e( 'Läs mer', 'visithalland' ); @endphp
                            </span>
                            <div class="read-more__button">
                                <svg class="icon read-more__icon">
                                    <use xlink:href="#arrow-right-icon"/>
                                </svg>
                            </div>
                        </div>
                    </article>
                </a>

            </div>
            <div class="col col-12 sm-col-6 px2 mt3">
				<a href="" title="" class="mb3">
                    <article class="">
                    	<div class="overflow-hidden aspect-container aspect-3x2 relative rounded">
	                        <picture>
	                            <source media="(min-width:40em)"
	                                data-srcset="https://www.visithalland.com/app/uploads/2018/08/B9064260-900x600.jpg 1x, https://www.visithalland.com/app/uploads/2018/08/B9064260-900x600.jpg 2x"" />
	                            <source
	                                data-srcset="https://www.visithalland.com/app/uploads/2018/08/B9064260-400x350.jpg 1x, https://www.visithalland.com/app/uploads/2018/08/B9064260-900x600.jpg 2x"" />
	                            <img class="absolute left-0 top-0 w-fill lazyload"
	                                data-src="https://www.visithalland.com/app/uploads/2018/08/B9064260-900x600.jpg"
	                            />
	                        </picture>
                        </div>
                        <h3 class="mt3">En riktigt schysst artikel</h3>
                        <div class="read-more mt3">
                            <span class="read-more__text">
                                @php _e( 'Läs mer', 'visithalland' ); @endphp
                            </span>
                            <div class="read-more__button">
                                <svg class="icon read-more__icon">
                                    <use xlink:href="#arrow-right-icon"/>
                                </svg>
                            </div>
                        </div>
                    </article>
                </a>

            </div>
        </div>
	</div>
	<div class="col col-12 md-col-4 md-mt0 md-pb4 px3">
		<header class="bg-blue rift-font text-sm bold px3 py2 mb3 rounded-pill inline-block text-light">
	        @php _e( 'Kommande events', 'visithalland' ) @endphp
	    </header>
	    @include('partials.front-page-happenings')

	    <header class="bg-blue rift-font text-sm bold px3 py2 mb3 mt4 rounded-pill inline-block text-light">
	        @php _e( 'Våra tips', 'visithalland' ) @endphp
	    </header>
	    <div class="sticky">
	    	@include('partials.components.editor-picks')
	    </div>
	</div>
</div>