{{--
  Template Name: All activities
--}}

@extends('layouts.landing')

@section('content')
	<h1>{{ the_title() }}</h1>

	@php($fields = get_field('category'))
	@foreach($fields as $key => $field)
		@php($object = (object) $field)
		<div class="clearfix">
			<div class="col col-4">
				{{-- Image Gallery TODO: Add js plugin --}}
				@foreach($object->gallery as $key => $gallery_image)
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
				@endforeach
			</div>
			<div class="col col-8">
				<h3>{{ $object->name }}</h3>
				<p>{{ $object->description }}</p>
			</div>
			<ul>
				{{-- List of places mentioned --}}
				@foreach($object->links as $key => $link)
					<li><a href="{{$link["link"]}}">{{ $link["name"] }}</a></li>
				@endforeach
			</ul>
		</div>
	@endforeach


	{{-- Google Map --}}
	@php($fields = get_field('category'))
		<div id="map"></div>
		<div class="acf-map" style="height:100vh;width:100%;">
			@foreach($fields as $key => $field)
				@php($object = (object) $field)
				@foreach($object->links as $key => $link)
					@php($location = $link["location"]);
					{{ $object->icon }}
					<div class="marker" data-lat="{{$location["lat"]}}" data-lng="{{ $location["lng"] }}" data-icon="{{ $object->icon }}">
						<h4>{{ $link["name"] }}</h4>
						<p class="address">{{ $location["address"] }}</p>
					</div>
				@endforeach
			@endforeach
		</div>

@endsection