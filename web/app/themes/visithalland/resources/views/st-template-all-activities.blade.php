{{--
  Template Name: Listvy Skördetider
--}}

@extends('layouts.skordetider')

@section('content')


<header class="st-list__header flex items-center relative">
	<div class="container col-11 sm-col-8 md-col-7 lg-col-6 mx-auto relative">
		<h1 class="st-list__title center light">{{ the_title() }}</h1>
	</div>
</header>

@include('partials.st-carousel')

@include('partials.st-categories')

@endsection