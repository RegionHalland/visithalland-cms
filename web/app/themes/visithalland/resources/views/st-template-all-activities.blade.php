{{--
  Template Name: Listvy Skördetider
--}}

@extends('layouts.skordetider')

@section('content')

<header class="st-list__header flex items-center relative">
	<div class="container col-11 sm-col-8 md-col-7 lg-col-6 mx-auto relative">
		<h1 class="st-list__title center">{{ the_title() }}</h1>
	</div>
	<img
		class="plant-img absolute left-0 bottom-0 lazyload"
		src="@asset('images/plant-bottom-left.png')"
		alt="Visithalland.com" />
	<img
		class="plant-img absolute top-0 right-0 lazyload"
		src="@asset('images/plant-top-right.png')"
		alt="Visithalland.com" />
</header>

@include('partials.st-carousel')

@include('partials.st-categories')

@endsection