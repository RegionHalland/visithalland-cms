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
		<div class="clearfix mxn3 mt4">
			<div class="col col-12 md-col-8 px3">
				<header class="bg-blue rift-font text-sm bold px3 py2 rounded-pill inline-block text-light">
					@php _e( 'Populära artiklar', 'visithalland' ) @endphp
				</header>
				<div class="clearfix mxn2">
					@foreach($recent_posts as $key => $recent_post)
						<div class="col col-12 sm-col-6 px2 mt3 mb2">
							@include('partials.front-page-article')
						</div>
		            @endforeach
		        </div>
			</div>
			<div class="col col-12 md-col-4 mt4 md-mt0 md-pb4 px3">
				<header class="bg-blue rift-font text-sm bold px3 py2 mb3 rounded-pill inline-block text-light">
			        @php _e( 'Kommande events', 'visithalland' ) @endphp
			    </header>
			    @include('partials.front-page-happenings')
			    <header class="bg-blue rift-font text-sm bold px3 py2 mb3 mt4 rounded-pill inline-block text-light">
			        @php _e( 'Våra tips', 'visithalland' ) @endphp
			    </header>
			   	@include('partials.components.top-list')
			</div>
		</div>
	</section>
@endsection
