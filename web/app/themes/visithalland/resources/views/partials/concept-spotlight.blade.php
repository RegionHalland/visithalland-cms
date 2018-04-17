
@php $concept_spotlights = App::getPosts(array("happening", "places", "companies", "editor_tip", "meet_local"), get_queried_object()) @endphp

@if(is_array($concept_spotlights))
	<section class="spotlight-section container mt5 mb5 col-12 md-col-10 lg-col-10 mx-auto {{ App::getTermClassName() }}">
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
				<a href="{{ get_permalink($spotlight->ID) }}" title="{{ $spotlight->post_title }}" class="spotlight-thumbnail {{ App::getTermClassName() }}">
					<div class="spotlight-thumbnail__img-wrapper">
						<img class="spotlight-thumbnail__img lazyload"
		                    data-src="{{ get_the_post_thumbnail_url( $spotlight->ID, 'vh_thumbnail@2x' ) }}"
		                    alt="{{ get_field("cover_image")["alt"] }}"
		                />
					</div>
					<div class="spotlight-thumbnail__content">
						<h4 class="spotlight-thumbnail__title">

							@if (get_field("title", $spotlight->ID) != '')

								{{ the_field("title", $spotlight->ID) }}

							@else

								{{ $spotlight->post_title }}

							@endif
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
