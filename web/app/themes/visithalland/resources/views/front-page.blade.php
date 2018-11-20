@extends('layouts.app')

@section('content')
	{{-- Hero Start --}}
	@include('partials.front-page-hero')
	{{-- Hero End --}}
	{{-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --}}
	{{-- Concept Grid Start --}}
    <div class="container w-11/12 lg:w-10/12 mx-auto mt-4 sm:-mt-16 relative mb-8">
		@include('partials.front-page-concepts')
	</div>
	{{-- Concept Grid End --}}
	<div class="mt-2 container w-11/12 lg:w-10/12 mx-auto pt-3 mb-8">
		<div class="flex flex-wrap -mx-3 mt-4">
			{{-- Article Grid Start --}}
			<div class="w-full lg:w-8/12 mt-4 md:mt-0 md:mb-4 px-3">
				@include(
                    'partials.components.header', [
                    'title' => "Populära artiklar"]
                )
				<div class="flex flex-wrap -mx-2">
					@foreach($recent_posts as $key => $recent_post)
						<div class="w-full sm:w-6/12 px-2 mt-3 mb-2">
							@include('partials.components.article-thumbnail', [
								'title' => $recent_post->post_title,
								'excerpt' => $recent_post->excerpt,
								'url' => get_permalink($recent_post->ID),
								'classes' => "",
								'theme' => "",
								'img_sm' => $recent_post->featured_image["sizes"]['vh_medium'],
								'img_sm_retina' => $recent_post->featured_image["sizes"]['vh_medium'],
								'img' => $recent_post->featured_image["sizes"]['vh_medium'],
								'img_alt' => $recent_post->featured_image["alt"],
								]
							)
						</div>
		            @endforeach
		        </div>
			</div>
			{{-- Article Grid End --}}
			{{-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --}}
			{{-- Sidebar Start --}}
			<aside class="w-full lg:w-4/12 mt-4 md:mt-0 md:mb-4 px-3">
				{{-- Events Start --}}
				@if(is_array($happenings) && !empty($happenings))
		            @include(
	                    'partials.components.header', [
	                    'title' => "Kommande events"]
	                )
			        <div class="flex flex-wrap -mx-2 mt-3 mb-2">
			            @foreach($happenings as $key => $happening)
			            	<div class="w-full sm:w-6/12 lg:w-full px-2">
			                	@include('partials.happening-list-item', [
			                		'title' => $happening->post_title,
			                		'url' => $happening->link,
			                		'theme' => get_field('class_name', $happening->terms['terms_default_lang']),
			                		'classes' => "mb-3",
			                		'img' => $happening->featured_image["sizes"]['vh_thumbnail'],
			                		'img_sm' => $happening->featured_image["sizes"]['vh_thumbnail'],
			                		'img_sm_retina' => $happening->featured_image["sizes"]['vh_thumbnail@2x'],
			                		'start_date_day' => $dateobj = date("j", strtotime($happening->meta_fields['start_date'])),
			                		'start_date_month' => $dateobj = date("M", strtotime($happening->meta_fields['start_date'])),
			                		'end_date_day' => $dateobj = date("j", strtotime($happening->meta_fields['end_date'])),
			                		'end_date_month' => $dateobj = date("M", strtotime($happening->meta_fields['end_date'])),
		                			]
		                		)
			                </div>
			            @endforeach
			        </div>
			    @endif
			    {{-- Events End --}}
				{{-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --}}
				{{-- Top Lists Start --}}
				@if(is_array($top_lists))
					<div class="mt-8">
			            @include(
		                    'partials.components.header', [
		                    'title' => "Våra tips"]
		                )
	                </div>
			        <div class="flex flex-wrap -mx-2 mb-3">
			            @foreach($top_lists as $top_list)
			                <div class="w-full sm:w-6/12 lg:w-full mb-3 px-2">
			                    @include('partials.components.top-list')
			                </div>
			            @endforeach
			        </div>
			    @endif
			    {{-- Top Lists End --}}
			</aside>
			{{-- Sidebar End --}}
		</div>
	</div> 
@endsection