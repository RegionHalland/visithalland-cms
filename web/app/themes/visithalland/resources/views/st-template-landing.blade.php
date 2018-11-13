{{--
  Template Name: Landing Skordetider
--}}

@extends('layouts.skordetider')

@section('content')

@php
$page_id = get_page_by_path('skordetid-i-halland/allt-som-skordetid-i-halland-har-att-erbjuda')->ID;
$videoUrl = array(
	'webm' => 'https://visithalland.ams3.digitaloceanspaces.com/resources/skordetider/skordetid_i_halland.webm',
	'mp4' => 'https://visithalland.ams3.digitaloceanspaces.com/resources/skordetider/skordetid_i_halland.mp4',
	'ogg' => 'https://visithalland.ams3.digitaloceanspaces.com/resources/skordetider/skordetid_i_halland.ogg'
);
@endphp

<header class="st-list__header flex items-center">
	<div class="container w-11/12  sm:w-8/12  md:w-7/12  lg:w-6/12  mx-auto center relative">
		<div class="st-video-outer w-full mx-auto overflow-hidden rounded">
			<div class="st-video-container w-full">
				<video controls class="w-full"> 
				   <source src="{{ $videoUrl['webm'] }}" type="video/webm"> 
				   <source src="{{ $videoUrl['ogg'] }}" type="video/ogg">
				   <source src="{{ $videoUrl['mp4'] }}" type="video/mp4">  
				</video>
			</div>
		</div>
		<div class="w-full sm:w-8/12  md:w-6/12  flex items-center mx-auto mt-5">
			<div class="col w-full md:w-6/12 ">
				<button class="btn block st-cta-button mx-auto">Se våra bästa tips</button>
			</div>
			<div class="col w-full md:w-6/12 ">
				<a href="{{the_permalink($page_id)}}" class="block">
					<div class="read-more my3">
						 <span class="read-more__text light">
							 Utforska allt
						 </span>
						 <div class="read-more__button">
							 <svg class="icon read-more__icon">
								 <use xlink:href="#arrow-right-icon"/>
							 </svg>
						 </div>
					 </div>
				 </a>
			</div>
		</div>
	</div>
</header>
	
@include('partials.st-carousel')

@foreach (get_field('timeline') as $week)
	@include('partials.st-week')
@endforeach

@include('partials.st-partners')

@endsection