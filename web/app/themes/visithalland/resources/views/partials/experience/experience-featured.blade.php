@if(isset($featured_experiences))
	<section class="mt-12 container w-11/12 md:w-10/12 lg:w-10/12 mx-auto {{ App::getTermClassName() }}">
		<header class="bg-theme font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
			@php _e( 'Populära artiklar', 'visithalland' ) @endphp
		</header>
		<div class="masonry-grid featured-grid">
		    @foreach ($featured_experiences as $post)
				{{-- Gets first item in array --}}
				@if($loop->iteration == 1)
					<div class="featured-grid__item featured-grid__item--large col w-full sm:w-full lg:w-8/12  ">
						<a class="" href="{{ $post->url }}" title="{!! $post->post_title !!}">
							<article class="scrim overflow-hidden relative h-full w-full rounded flex">
		                        <picture>
		                        	<source media="(min-width:60em)"
		                                data-srcset="{{ $post->featured_image["sizes"]['vh_large'] . " 1x," . $post->featured_image["sizes"]['vh_large@2x'] . " 2x" }}" />
		                            <source media="(min-width:40em)"
		                                data-srcset="{{ $post->featured_image["sizes"]['vh_hero_wide'] . " 1x," . $post->featured_image["sizes"]['vh_hero_wide@2x'] . " 2x" }}" />
		                            <source
		                                data-srcset="{{ $post->featured_image["sizes"]['vh_medium_square'] . " 1x," . $post->featured_image["sizes"]['vh_medium_square@2x'] . " 2x" }}" />
		                            <img class="absolute pin-l pin-t h-full w-auto lazyload"
		                                data-src="{{ $post->featured_image["sizes"]['vh_medium_square@2x'] }}"
										alt="{{ $post->featured_image["alt"] }}"
		                            />
		                        </picture>
		                        <div class="z-40 absolute flex justify-end flex-col pin-t pin-b pin-r pin-l p-4">
		                            <h2 class="text-white">{!! $post->post_title !!}</h2>
		                            <div class="read-more mt-3">
		                                <span class="read-more__text light">
		                                    @php _e( 'Läs mer', 'visithalland' ); @endphp
		                                </span>
		                                <div class="read-more__button">
		                                    <svg class="icon read-more__icon">
		                                        <use xlink:href="#arrow-right-icon"/>
		                                    </svg>
		                                </div>
		                            </div>
		                        </div>
				            </article>
			            </a>
		            </div>

				{{-- Gets second and third item in array --}}
				@elseif($loop->iteration > 1 && $loop->iteration <= 3)
					<div class="featured-grid__item featured-grid__item--medium col w-full sm:w-6/12  lg:w-4/12 ">
					<a class="" href="{{ $post->url }}" title="{!! $post->post_title !!}">
						<article class="scrim overflow-hidden relative h-full w-full rounded flex">
							<picture>
	                        	<source media="(min-width:60em)"
	                                data-srcset="{{ $post->featured_image["sizes"]['vh_hero_tall'] . " 1x," . $post->featured_image["sizes"]['vh_hero_tall@2x'] . " 2x" }}" />
	                            <source
	                                data-srcset="{{ $post->featured_image["sizes"]['vh_medium_square'] . " 1x," . $post->featured_image["sizes"]['vh_medium_square@2x'] . " 2x" }}" />
	                            <img class="absolute pin-l pin-t h-full w-auto lazyload"
	                                data-src="{{ $post->featured_image["sizes"]['vh_hero_tall@2x'] }}"
									alt="{{ $post->featured_image["alt"] }}"
	                            />
	                        </picture>
	                        <div class="z-40 absolute flex justify-end flex-col pin-t pin-b pin-r pin-l p-4">
	                            <h2 class="text-white">{!! $post->post_title !!}</h2>
	                            <div class="read-more mt-3">
	                                <span class="read-more__text light">
	                                    @php _e( 'Läs mer', 'visithalland' ); @endphp
	                                </span>
	                                <div class="read-more__button">
	                                    <svg class="icon read-more__icon">
	                                        <use xlink:href="#arrow-right-icon"/>
	                                    </svg>
	                                </div>
	                            </div>
	                        </div>
			            </article>
		            </a>
		            </div>

				{{-- Loops remaining items as small --}}
				@else
					<div class="featured-grid__item featured-grid__item--small col w-full sm:w-6/12  lg:w-4/12">
					<a class="" href="{{ $post->url }}" title="{!! $post->post_title !!}">
						<article class="scrim overflow-hidden relative h-full w-full rounded flex">
							<picture>
	                            <source
	                                data-srcset="{{ $post->featured_image["sizes"]['vh_medium_square'] . " 1x," . $post->featured_image["sizes"]['vh_medium_square@2x'] . " 2x" }}" />
	                            <img class="absolute pin-l pin-t h-auto w-full lazyload"
	                                data-src="{{ $post->featured_image["sizes"]['vh_medium_square@2x'] }}"
									alt="{{ $post->featured_image["alt"] }}"
	                            />
	                        </picture>
	                        <div class="z-40 absolute flex justify-end flex-col pin-t pin-b pin-r pin-l p-4">
	                            <h2 class="text-white">{!! $post->post_title !!}</h2>
	                            <div class="read-more mt-3">
	                                <span class="read-more__text light">
	                                    @php _e( 'Läs mer', 'visithalland' ); @endphp
	                                </span>
	                                <div class="read-more__button">
	                                    <svg class="icon read-more__icon">
	                                        <use xlink:href="#arrow-right-icon"/>
	                                    </svg>
	                                </div>
	                            </div>
	                        </div>
			            </article>
		            </a>
					</div>
				@endif
		    @endforeach
		</div>
	</section>

    <?php wp_reset_postdata(); ?>

@endif





