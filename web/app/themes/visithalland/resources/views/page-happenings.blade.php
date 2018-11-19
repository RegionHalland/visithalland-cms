{{--
  Template Name: Happening Page
--}}

@extends('layouts.app')

@section('content')
		@include('partials.page.page-happenings-header')
		<div class="container col-11 md-col-10 lg-col-10 mx-auto pt2 pb4">
			@php $happenings = App::getHappenings(100) @endphp
			@include('partials.page-happenings-month')
		</div>
@endsection
