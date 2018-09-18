@extends('layouts.app')
@section('content')
    @include('partials.experience-header')
    @include('partials.experience-featured')
    @include('partials.experience-spotlight')
    @include('partials.experience-featured-article')
    <div class="mt2 container col-11 md-col-10 lg-col-10 mx-auto">
    	<div class="clearfix mxn3">
	    	<div class="col col-12 md-col-8 px3 pb5">
		    	@include('partials.experience-grid')
		    </div>
		    <div class="col col-12 md-col-4 px3 mb4">
	    		@include('partials.experience-sidebar')
	    	</div>	
    	</div>
    </div>
@endsection
