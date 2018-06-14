{{--
  Template Name: Landing Skordetider
--}}

@extends('layouts.landing')

@section('content')

<header style="height: 20rem;">
	
</header>

<section>
	@php($timeline = get_field('timeline'))
	@foreach ($timeline as $week)
		@include('partials.st-week')
	@endforeach
</section>

@endsection