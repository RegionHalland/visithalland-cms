{{--
  Template Name: Landing Skordetider
--}}

@extends('layouts.skordetider')

@section('content')

<header class="st-list__header flex items-center">
	<div class="container col-11 sm-col-8 md-col-7 lg-col-6 mx-auto relative">
		<h1 class="st-list__title center">{{ the_title() }}</h1>
	</div>
</header>
	
@include('partials.st-carousel')

@foreach (get_field('timeline') as $week)
	@include('partials.st-week')
@endforeach

@endsection