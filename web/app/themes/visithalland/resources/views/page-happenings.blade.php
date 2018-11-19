{{--
  Template Name: Happening Page
--}}

@extends('layouts.app')

@section('content')
		@include('partials.page.page-happenings-header')
		<div class="container col-11 md-col-10 lg-col-10 mx-auto pt2 pb4">
			@php $happenings = App::getHappenings(100) @endphp

			<section id="september" class="mt3">
				<header class="bg-blue rift-font text-sm bold px3 py2 rounded-pill inline-block text-light">
					@php _e( 'September', 'visithalland' ) @endphp
				</header>
				<div class="pb4 pt3 flex flex-wrap mxn2">
					<div class="col-12 md-col-8 flex flex-wrap md-px2 md-mxn2">
						@if(is_array($happenings))
			                @foreach($happenings as $key => $happening)
			                    <div class="col-12 px2 md-pr3 md-pl2">
			                        @include('partials.happening-thumbnail-large')
			                    </div>
			                @endforeach
					    @endif
					</div>
					<div class="col-12 md-col-4 flex flex-wrap flex-row md-flex-column mt4 md-mt0 md-px2 md-mxn2">
						@if(is_array($happenings))
			                @foreach($happenings as $key => $happening)
				                <div class="col-12 sm-col-6 md-col-12 px2">
				                	@include('partials.happening-list-item')
				                </div>
			                @endforeach
					    @endif
					</div>
			    </div>
		    </section>
		</div>
@endsection
