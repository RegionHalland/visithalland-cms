@php($page_id = get_page_by_path('skordetid-i-halland/allt-som-skordetid-i-halland-har-att-erbjuda')->ID)
@php($fields = get_field('category', $page_id))

<section class="overflow-hidden st-carousel-section relative">
	<img
	class="st-beet"
	src="@asset('images/st-beet.svg')"
	alt="Visithalland.com" />
	<div class="container py5 col-11 md-col-10 lg-col-10 mx-auto relative">
		<h2 class="mb3 h3 st-carousel__title">Mer av skördetid i Halland</h2>
		<div class="relative js-carousel-parent">
			<button class="st-carousel-previous js-carousel-previous icon-button">
				<svg class="icon--sm icon-button__icon">
					<use xlink:href="#arrow-left-icon"/>
				</svg>
			</button>
			<button class="st-carousel-next js-carousel-next icon-button">
				<svg class="icon--sm icon-button__icon">
					<use xlink:href="#arrow-right-icon"/>
				</svg>
			</button>
			<div class="st-carousel js-carousel">
				@foreach($fields as $key => $field)
					@php($object = (object) $field)
					<a href="{{ get_permalink($page_id) . '#' . sanitize_title($object->name) }}" class="mr3">
						<div class="st-thumbnail">
						  <div class="st-thumbnail__img-container">
						  	<img class="st-category-thumbnail__img lazyload" src="{{ $object->gallery[0]['sizes']['vh_small@2x'] }}" alt="">
						  </div>
						  <div class="st-thumbnail__content">
						    <h4 class="st-thumbnail__title">{{ $object->name }}</h4>
						    <div class="ml3 st-thumbnail__btn">
								<svg class="icon--sm st-thumbnail__btn-icon">
									<use xlink:href="#arrow-right-icon"/>
								</svg>
							</div>
						  </div>
						</div>
					</a>
				@endforeach
			</div>
		</div>
	</div>
</section>
