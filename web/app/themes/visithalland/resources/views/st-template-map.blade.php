{{--
  Template Name: Map Skördetider
--}}

@extends('layouts.skordetider')

@section('content')

@php($fields = get_field('category', get_page_by_path('skordetid-i-halland/allt-som-skordetid-i-halland-har-att-erbjuda')->ID))


<div class="st-map acf-map">
	@foreach($fields as $key => $field)
		@php($object = (object) $field)
		@foreach($object->links as $key => $link)
			@php($location = $link["location"]);
			{{ $object->icon }}
			<div class="marker" data-lat="{{$location["lat"]}}" data-lng="{{ $location["lng"] }}" data-icon="@asset('images/map-pin.svg')">
				<h4>{{ $link["name"] }}</h4>
				<p>Adress: {{ $location["address"] }}</p>
				<a href="{{ $link["link"] }}" target="_blank">
					<div class="read-more mt3 coastal-living">
                        <span class="read-more__text">Gå till hemsida</span>
                        <div class="read-more__button">
                            <svg class="icon read-more__icon">
                                <use xlink:href="#arrow-right-icon"/>
                            </svg>
                        </div>
                    </div>
                </a>
			</div>
		@endforeach
	@endforeach
</div>

@endsection