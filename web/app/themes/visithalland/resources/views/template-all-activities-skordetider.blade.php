{{--
  Template Name: Listvy Skördetider
--}}

@extends('layouts.skordetider')

@section('content')


	<header class="st-list__header">
		<div class="container py4 col-11 md-col-10 lg-col-10 mx-auto relative">
		</div>
	</header>

	@include('partials.st-carousel')
	

	<section class="container py4 col-11 md-col-10 lg-col-10 mx-auto relative">
		@php($fields = get_field('category'))
		@foreach($fields as $key => $field)
			@php($object = (object) $field)
			<div class="st-category mb4 mt3 clearfix mxn3">
				<div class="col col-12 sm-col-5 md-col-5 px3">
					<div class="st-category__carousel overflow-hidden">
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
				<div class="col col-12 sm-col-7 md-col-7 px3">
					<h2 class="st-category__title mb3 mt3">{{ $object->name }}</h2>
					<p class="st-category__description">{{ $object->description }}</p>
					<hr class="st-category__divider my3">
					<ul class="st-category__list clearfix mxn2">			
						@foreach($object->links as $key => $link)
							<li class="st-category__list-item col col-12 sm-col-6 px2">
								<a class="st-category__link" href="{{$link["link"]}}" target="_blank">{{ $link["name"] }}</a>
								<div class="st-category__btn">
									<svg class="icon--sm st-category__btn-icon">
										<use xlink:href="#arrow-right-icon"/>
									</svg>
								</div>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		@endforeach
	</section>

@endsection