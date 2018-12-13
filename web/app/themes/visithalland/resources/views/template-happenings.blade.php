{{--
  Template Name: Happening Page
--}}

@extends('layouts.app')

@section('content')

@include('partials.navigation.page-header')

@foreach($get_happenings_by_month as $key => $month)
	@include('partials.collections.happening-month', [
			'month_name' => $key,
			'posts' => $month,
		]
	)
@endforeach

@endsection