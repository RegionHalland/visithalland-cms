@extends('layouts.app')

@section('content')

@include('partials.page.page-header')

@foreach($get_happenings_by_month as $key => $month)
	@include('partials.happening-month', [
			'month_name' => $key,
			'posts' => $month,
		]
	)
@endforeach

@endsection