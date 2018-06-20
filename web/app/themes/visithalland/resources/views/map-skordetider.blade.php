{{--
  Template Name: Map Skördetider
--}}

@extends('layouts.skordetider')

@section('content')

	{{-- Google Map --}}
	@php($fields = get_field('category', get_page_by_path('skordetider-listvy')->ID))
		<div id="map"></div>
		<div class="acf-map" style="height:100vh;width:100%;">
			@foreach($fields as $key => $field)
				@php($object = (object) $field)
				@foreach($object->links as $key => $link)
					@php($location = $link["location"]);
					{{ $object->icon }}
					<div class="marker" data-lat="{{$location["lat"]}}" data-lng="{{ $location["lng"] }}" data-icon="@asset($object->icon)">
						<h4>{{ $link["name"] }}</h4>
						<p>Adress: {{ $location["address"] }}</p>
						<a href="{{ $link["link"] }}" target="_blank">Gå till hemsida</a>
					</div>
				@endforeach
			@endforeach
		</div>

@endsection