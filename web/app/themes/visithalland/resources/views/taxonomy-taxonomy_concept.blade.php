@extends('layouts.app')
@section('content')
    @include('partials.concept-header')
    @include('partials.concept-featured')
    @include('partials.concept-spotlight')
    @include('partials.concept-featured-article')
    <div class="mt2 col-11 md-col-10 lg-col-10 clearfix mx-auto">
    	@include('partials.concept-grid')
    	@include('partials.concept-sidebar')	
    </div>
@endsection
