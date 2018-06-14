@php($fields = get_field('category'))


<div class="st-category-section overflow-hidden">
	<section class="container py4 col-11 md-col-10 lg-col-10 mx-auto relative">
		<button class="st-category-previous icon-button">
			<svg class="icon--sm icon-button__icon">
				<use xlink:href="#arrow-left-icon"/>
			</svg>
		</button>
		<button class="st-category-next icon-button">
			<svg class="icon--sm icon-button__icon">
				<use xlink:href="#arrow-right-icon"/>
			</svg>
		</button>
		<div class="st-category-carousel">
			@foreach($fields as $key => $field)
				@php($object = (object) $field)
				<a href="">
					<div class="st-category-thumbnail mr3">
						<div class="st-category-thumbnail__img-container">
							<picture>
								<img class="st-category-thumbnail__img" src="{{ $object->gallery[0]['sizes']['vh_small@2x'] }}" alt="">
							</picture>
						</div>
						<div class="st-category-thumbnail__content">
							<h4 class="st-category-thumbnail__title">{{ $object->name }}</h4>
						</div>
					</div>
				</a>
			@endforeach
		</div>
	</section>
</div>

