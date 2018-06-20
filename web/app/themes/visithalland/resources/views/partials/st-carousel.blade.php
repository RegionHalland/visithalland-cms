@php($fields = get_field('category', 7611))

<section class="overflow-hidden st-carousel-section">
	<div class="container py5 col-11 md-col-10 lg-col-10 mx-auto relative">
		<h2 class="mb3 h3">Upptäck Halland i skördetid</h2>
		<div class="relative">
			<button class="st-carousel-previous icon-button">
				<svg class="icon--sm icon-button__icon">
					<use xlink:href="#arrow-left-icon"/>
				</svg>
			</button>
			<button class="st-carousel-next icon-button">
				<svg class="icon--sm icon-button__icon">
					<use xlink:href="#arrow-right-icon"/>
				</svg>
			</button>
			<div class="st-carousel">
				@foreach($fields as $key => $field)
					@php($object = (object) $field)
					<a href="" class="mr3">
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

