@if(isset($featured_experiences))
	<section class="mt5 container col-11 md-col-10 lg-col-10 mx-auto {{ App::getTermClassName() }}">
		<header class="bg-theme rift-font text-sm bold px3 py2 mb3 rounded-pill inline-block text-light">
			@php _e( 'Populära artiklar', 'visithalland' ) @endphp
		</header>
		<div class="masonry-grid">
		    @foreach ($featured_experiences as $post)

				{{-- Gets first item in array --}}
				@if($loop->iteration == 1)
					
					<a class="mt2 sm-mt0 masonry-grid__large masonry-grid__item scrim overflow-hidden aspect-container aspect-1 sm-aspect-16x9 md-aspect-3x2 relative rounded" href="{{ $post->url }}" title="{!! $post->post_title !!}">
						<article>
	                        <picture>
	                        	<source media="(min-width:60em)"
	                                data-srcset="{{ $post->featured_image['vh_large'] . " 1x," . $post->featured_image['vh_large@2x'] . " 2x" }}" />
	                            <source media="(min-width:40em)"
	                                data-srcset="{{ $post->featured_image['vh_hero_wide'] . " 1x," . $post->featured_image['vh_hero_wide@2x'] . " 2x" }}" />
	                            <source
	                                data-srcset="{{ $post->featured_image['vh_medium_square'] . " 1x," . $post->featured_image['vh_medium_square@2x'] . " 2x" }}" />
	                            <img class="absolute left-0 top-0 h-fill w-auto lazyload"
	                                data-src="{{ $post->featured_image['vh_medium_square@2x'] }}"
									alt="{{ $post->alt }}"
	                            />
	                        </picture>
	                        <div class="z4 absolute flex justify-end flex-column top-0 bottom-0 right-0 left-0 p3">
	                            <h2 class="text-light">{!! $post->post_title !!}</h2>
	                            <div class="read-more mt3">
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

				{{-- Gets second and third item in array --}}
				@elseif($loop->iteration > 1 && $loop->iteration <= 3)

					<a class="mt2 sm-mt0 masonry-grid__medium masonry-grid__item scrim overflow-hidden aspect-container aspect-1 md-aspect-5x4 relative rounded" href="{{ $post->url }}" title="{!! $post->post_title !!}">
						<article>
							<picture>
	                        	<source media="(min-width:60em)"
	                                data-srcset="{{ $post->featured_image['vh_hero_tall'] . " 1x," . $post->featured_image['vh_hero_tall@2x'] . " 2x" }}" />
	                            <source
	                                data-srcset="{{ $post->featured_image['vh_medium_square'] . " 1x," . $post->featured_image['vh_medium_square@2x'] . " 2x" }}" />
	                            <img class="absolute left-0 top-0 h-fill w-auto lazyload"
	                                data-src="{{ $post->featured_image['vh_hero_tall@2x'] }}"
									alt="{{ $post->alt }}"
	                            />
	                        </picture>
	                        <div class="z4 absolute flex justify-end flex-column top-0 bottom-0 right-0 left-0 p3">
	                            <h2 class="text-light">{!! $post->post_title !!}</h2>
	                            <div class="read-more mt3">
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

				{{-- Loops remaining items as small --}}
				@else

					<a class="mt2 sm-mt0 masonry-grid__small masonry-grid__item scrim overflow-hidden aspect-container aspect-1 relative rounded" href="{{ $post->url }}" title="{!! $post->post_title !!}">
						<article>
							<picture>
	                            <source
	                                data-srcset="{{ $post->featured_image['vh_medium_square'] . " 1x," . $post->featured_image['vh_medium_square@2x'] . " 2x" }}" />
	                            <img class="absolute left-0 top-0 h-fill w-auto lazyload"
	                                data-src="{{ $post->featured_image['vh_medium_square@2x'] }}"
									alt="{{ $post->alt }}"
	                            />
	                        </picture>
	                        <div class="z4 absolute flex justify-end flex-column top-0 bottom-0 right-0 left-0 p3">
	                            <h2 class="text-light">{!! $post->post_title !!}</h2>
	                            <div class="read-more mt3">
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

				@endif
		    @endforeach
		</div>
	</section>

    <?php wp_reset_postdata(); ?>

@endif





