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
				<h3>{{ $object->name }}</h3>
			</div>
			<div class="col col-8">
				<p>{{ $object->description }}</p>
			</div>
		</div>
	@endforeach
@endsection