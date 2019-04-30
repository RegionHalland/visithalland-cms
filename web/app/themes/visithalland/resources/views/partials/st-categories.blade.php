<section class="container pt-5 w-11/12  md:w-10/12  lg:w-10/12  mx-auto relative">
	@php($fields = get_field('category'))
	@foreach($fields as $key => $field)
		@php($object = (object) $field)
		<div id="{{sanitize_title( $object->name) }}" class="st-category mb-5 clearfix  -mx-3">
			<div class="col w-full sm:w-5/12 md:w-5/12 px-3 relative">
				@if(!empty($object->gallery))
				<div class="relative js-carousel-parent">
					<div class="absolute pin-b mb-4 pin-r mr-4 z-40">
						<button class="icon-button js-carousel-previous">
							<svg class="icon--sm icon-button__icon">
								<use xlink:href="#arrow-left-icon"/>
							</svg>
						</button>
						<button class="icon-button js-carousel-next">
							<svg class="icon--sm icon-button__icon">
								<use xlink:href="#arrow-right-icon"/>
							</svg>
						</button>
					</div>
					<div class="st-category__carousel js-carousel overflow-hidden">
						@foreach($object->gallery as $key => $gallery_image)
						<div class="st-category__img-container">
							<picture>
		                        <source
		                            data-srcset="{{ $gallery_image["sizes"]["vh_hero_tall"] . " 1x," . $gallery_image["sizes"]["vh_hero_tall@2x"] . " 2x" }}" />
		                        <img class="st-category__img lazyload"
		                            data-src="{{ $gallery_image["sizes"]["vh_hero_tall"] }}"
		                            alt="{{ $gallery_image["alt"] }}"
		                        />
		                    </picture>
		                </div>
						@endforeach
					</div>
				</div>
				@endif
			</div>
			<div class="col w-full sm:w-7/12  md:w-7/12  px-3">
				<h2 class="st-category__title mb-3">{{ $object->name }}</h2>
				<p class="st-category__description">{{ $object->description }}</p>
				<hr class="st-category__divider my3">
				@if(!empty($object->links))
				<ul class="st-category__list clearfix  -mx-2">			
					@foreach($object->links as $key => $link)
						<li class="st-category__list-item col w-full sm:w-6/12  md:w-6/12  px-2">
							<a class="st-category__link" href="{{$link["link"]}}" target="_blank">{{ $link["name"] }}</a>
							<div class="st-category__btn">
								<svg class="icon--sm st-category__btn-icon">
									<use xlink:href="#arrow-right-icon"/>
								</svg>
							</div>
						</li>
					@endforeach
				</ul>
				@endif
			</div>
		</div>
	@endforeach
</section>