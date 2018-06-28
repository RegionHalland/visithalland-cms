{{--
  Template Name: Landing Skordetider
--}}

@extends('layouts.skordetider')

@section('content')

@include('partials.st-hero')
	
<section>
	@include('partials.st-carousel')
</section>

<section>
	@php($timeline = get_field('timeline'))
	@foreach ($timeline as $week)
		@include('partials.st-week')
	@endforeach
</section>

@endsection