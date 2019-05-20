@extends('layouts.app')

@section('content')

@include('partials.navigation.page-header')

@foreach($happenings as $key => $month)
	@include('partials.collections.happening-month', [
			'month_name' => $key,
			'posts' => $month,
			'events' => $events
		]
	)
@endforeach

@endsection