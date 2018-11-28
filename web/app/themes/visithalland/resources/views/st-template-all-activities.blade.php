{{--
  Template Name: Listvy Skördetider
--}}

@extends('layouts.skordetider')

@section('content')

<header class="st-list__header flex items-center relative">
	<div class="container w-11/12  sm:w-8/12  md:w-7/12  lg:w-6/12  mx-auto relative">
		<h1 class="st-list__title mt-4 mb-5 center light">{{ the_title() }}</h1>
	</div>
</header>

@include('partials.st-carousel')

@include('partials.st-categories')

@endsection