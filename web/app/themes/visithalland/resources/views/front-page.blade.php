@extends('layouts.app')

@section('content')
	
	@if (get_field('campaign_toggle'))
		@include('partials.front-page-campaign')
    @else 
		@include('partials.front-page-hero')
    @endif
    @include('partials.front-page-concepts')
    @include('partials.front-page-ad')
    @include('partials.front-page-happenings')   
@endsection