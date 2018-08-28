@extends('layouts.app')

@section('content')
	@if (get_field('campaign_toggle'))
		@include('partials.campaign')
    @else
		@include('partials.front-page-hero')
    @endif
    <section class="container col-11 md-col-10 lg-col-10 mx-auto mtn5 relative pb4">
		@include('partials.front-page-concepts')
	</section>
	@include('partials.dh-banner')
	<section class="mt2 container col-11 md-col-10 lg-col-10 mx-auto pt3 pb4">
		@include('partials.front-page-grid')
	</section>
@endsection
