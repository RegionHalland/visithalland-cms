{{--
  Template Name: Happening Page
--}}

@extends('layouts.app')

@section('content')
		@include('partials.page.page-header')
		<div class="container col-11 md-col-10 lg-col-10 mx-auto pt2 pb4">
			@php $happenings = App::getHappenings(100) @endphp
			<div class="pb4 pt3 clearfix mxn2">
			    @if(is_array($happenings))
	                @foreach($happenings as $key => $happening)
	                    <div class="col col-12 sm-col-6 md-col-4 px2 mt2">
	                        @include('partials.happening-thumbnail')
	                    </div>
	                @endforeach
			    @endif
		    </div>
		</div>
@endsection
