@extends('layouts.app')

@section('content')
	@if (get_field('campaign_toggle'))
		@include('partials.campaign')
    @else
		@include('partials.front-page-hero')
    @endif
    <section class="container w-11/12  md:w-10/12  lg:w-10/12  mx-auto mt-3 sm:-mt-16 relative pb-4">
		@include('partials.front-page-concepts')
	</section>
	@include('partials.components.banner')
	<section class="mt2 container w-11/12 md:w-10/12 lg:w-10/12  mx-auto pt-3 pb-8">
		<div class="flex flex-wrap -mx-3 mt-4">
			<div class="w-full md:w-8/12  px-3">
				<header class="bg-blue font-rift text-sm font-bold px-3 py-2 rounded-full inline-block text-white">
					@php _e( 'Populära artiklar', 'visithalland' ) @endphp
				</header>
				<div class="flex flex-wrap -mx-2">
					@foreach($recent_posts as $key => $recent_post)
						<div class="w-full sm:w-6/12 px-2 mt-3 mb-2">
							@include('partials.front-page-article')
						</div>
		            @endforeach
		        </div>
			</div>
			<div class="w-full md:w-4/12 mt-4 md:mt-0 md:pb-4 px-3">
				@if(is_array($happenings))
			        <div class="w-full">
			            <header class="bg-blue font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
			                @php _e( 'Kommande events', 'visithalland' ) @endphp
			            </header>
			        </div>
			        <div class="clearfix -mx-2 mb-3">
			            @foreach($happenings as $key => $happening)
			            	<div class="w-full sm:w-6/12  md:w-full px-2">
			                	@include('partials.happening-list-item')
			                </div>
			            @endforeach
			        </div>
			    @endif
				
				@if(is_array($top_lists))
			        <div class="w-full">
			            <header class="bg-blue font-rift text-sm font-bold px-3 py-2 mt-2 mb-3 rounded-full inline-block text-white">
			                @php _e( 'Våra tips', 'visithalland' ) @endphp
			            </header>
			        </div>
			        <div class="clearfix -mx-2 mb-3">
			            @foreach($top_lists as $top_list)
			                <div class="w-full sm:w-6/12 md:w-full mb-3 px-2">
			                    @include('partials.components.top-list')
			                </div>
			            @endforeach
			        </div>
			    @endif
			</div>
		</div>
	</section>
@endsection
