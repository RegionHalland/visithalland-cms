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
	<div class="container col-11 sm-col-8 md-col-7 lg-col-6 mx-auto center relative">
		<div class="st-video-outer col-12 mx-auto">
			<div class="st-video-container col-12 overflow-hidden">
				<video controls class="col-12"> 
				   <source src="{{ $videoUrl['webm'] }}" type="video/webm"> 
				   <source src="{{ $videoUrl['ogg'] }}" type="video/ogg">
				   <source src="{{ $videoUrl['mp4'] }}" type="video/mp4">  
				</video>
			</div>
		</div>
		<div class="col-12 sm-col-8 md-col-6 flex items-center mx-auto mt5">
			<div class="col col-12 md-col-6">
				<button class="btn block st-cta-button mx-auto">Se våra bästa tips</button>
			</div>
			<div class="col col-12 md-col-6">
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