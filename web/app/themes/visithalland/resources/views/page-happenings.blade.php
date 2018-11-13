{{--
  Template Name: Happening Page
--}}

@extends('layouts.app')

@section('content')
		@include('partials.page.page-header')
		<div class="container w-11/12  md:w-10/12  lg:w-10/12  mx-auto pt-2 pb-4">
			@php $happenings = App::getHappenings(100) @endphp
			<div class="pb4 pt-3 clearfix  -mx-2">
			    @if(is_array($happenings))
	                @foreach($happenings as $key => $happening)
	                    <div class="col w-full sm:w-6/12  md:w-4/12 px-2 mt-2">
	                        @include('partials.happening-thumbnail')
	                    </div>
	                @endforeach
			    @endif
		    </div>
		</div>
@endsection
