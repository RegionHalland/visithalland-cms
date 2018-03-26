
@php $concept_spotlights = App::getPosts(array("happening", "places", "companies", "editorial", "meet-a-local"), get_queried_object()) @endphp

@if(is_array($concept_spotlights))
	<section class="spotlight-section mt5 mb5 col-12 md-col-10 lg-col-10 mx-auto beach-coast">
		<button class="icon-button spotlight-carousel--previous">
			<svg class="icon--sm icon-button__icon">
				<use xlink:href="#arrow-left-icon"/>
			</svg>
		</button>
		<button class="icon-button spotlight-carousel--next">
			<svg class="icon--sm icon-button__icon">
				<use xlink:href="#arrow-right-icon"/>
			</svg>
		</button>
		<div class="spotlight-carousel">
		    @foreach($concept_spotlights as $key => $spotlight)
				<a href="{{ get_permalink($spotlight->ID) }}" title="{{ $spotlight->post_title }}" class="spotlight-thumbnail beach-coast {{ $spotlight->terms["terms_default_lang"]->slug }}">
					<div class="spotlight-thumbnail__img-wrapper">
						<img class="spotlight-thumbnail__img lazyload"
		                    data-src="{{ get_the_post_thumbnail_url( $spotlight->ID, 'vh_thumbnail@2x' ) }}"
		                    alt="{{ get_field("cover_image")["alt"] }}"
		                />
					</div>
					<div class="spotlight-thumbnail__content">
						<h4 class="spotlight-thumbnail__title">
							{{ $spotlight->post_title }}
						</h4>
						<div class="read-more mt2">
		                    <span class="read-more__text">
		                        @php _e( 'Läs mer', 'visithalland' ); @endphp
		                    </span>
		                    <div class="read-more__button">
		                        <svg class="icon read-more__icon">
		                            <use xlink:href="#arrow-right-icon"/>
		                        </svg>
		                    </div>
		                </div>
					</div>
				</a>
		    @endforeach
	    </div>
	</section>
@endif