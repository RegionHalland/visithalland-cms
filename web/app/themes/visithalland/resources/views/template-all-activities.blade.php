{{--
  Template Name: All activities Skördetider
--}}

@extends('layouts.skordetider')

@section('content')


	<header class="st-list__header container py4 col-11 md-col-10 lg-col-10 mx-auto relative">
		<h1>{{ the_title() }}</h1>
	</header>

	@include('partials.all-activities-carousel')

	{{-- @php($fields = get_field('category'))
	@foreach($fields as $key => $field)
		@php($object = (object) $field)
		<div class="clearfix">
			<div class="category--gallery col col-4 overflow-hidden">

				@foreach($object->gallery as $key => $gallery_image)
				<div style="width: 100%; margin-right: 10px;">
					<picture>
                        <source media="(min-width:40em)"
                            data-srcset="{{ $gallery_image["sizes"]["vh_large"] . " 1x," . $gallery_image["sizes"]["vh_large@2x"] . " 2x" }}" />
                        <source
                            data-srcset="{{ $gallery_image["sizes"]["vh_hero_tall"] . " 1x," . $gallery_image["sizes"]["vh_hero_tall@2x"] . " 2x" }}" />
                        <img class="lazyload"
                            data-src="{{ $gallery_image["sizes"]["vh_hero_tall"] }}"
                            alt="{{ $gallery_image["alt"] }}"
                        />
                    </picture>
                </div>
				@endforeach
			</div>


			<div class="col col-8 pl4">
				<h3>{{ $object->name }}</h3>
				<p>{{ $object->description }}</p>
					

				<ul>			
					@foreach($object->links as $key => $link)
						<li><a href="{{$link["link"]}}" target="_blank">{{ $link["name"] }}</a></li>
					@endforeach
				</ul>

			</div>

		</div>
	@endforeach --}}

@endsection