@extends('layouts.app')

@section('content')
	@if (get_field('campaign_toggle'))
		@include('partials.campaign')
    @else
		@include('partials.front-page-hero')
    @endif
    @include('partials.front-page-concepts')
    @include('partials.dh-banner')
    @include('partials.front-page-happenings')
@endsection
