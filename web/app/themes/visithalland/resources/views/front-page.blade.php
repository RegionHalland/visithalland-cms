@extends('layouts.app')

@section('content')
	{{-- Experience Collection --}}
	@include('partials.collections.experience-collection')
	{{-- Experience Collection End --}}
	<div class="mt-2 container w-11/12 lg:w-10/12 mx-auto pt-3 mb-8">
		<div class="flex flex-wrap -mx-3 mt-4">
			{{-- Article Grid Start --}}
			<div class="w-full lg:w-8/12 mt-4 md:mt-0 md:mb-4 px-3">
                @header(
                	[
                		'title' => "Populära artiklar"
                	]
                )
                @endheader
				<div class="flex flex-wrap -mx-2">
					@foreach($recent_posts as $key => $recent_post)
						<div class="w-full sm:w-6/12 px-2 mt-3 mb-2">
							@article_thumbnail(
		                        [
			                        'title' => $recent_post->post_title,
									'excerpt' => $recent_post->excerpt,
									'url' => get_permalink($recent_post->ID),
									'classes' => "",
									'theme' => "",
									'img_sm' => $recent_post->featured_image["sizes"]['vh_medium'],
									'img_sm_retina' => $recent_post->featured_image["sizes"]['vh_medium'],
									'img' => $recent_post->featured_image["sizes"]['vh_medium'],
									'img_alt' => $recent_post->featured_image["alt"]
		                        ]
		                    )
		                    @endarticle_thumbnail
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
	                @header(
	                	[
	                		'title' => "Kommande events"
	                	]
	                )
	                @endheader
			        <div class="flex flex-wrap -mx-2 mt-3 mb-2">
			            @foreach($happenings as $key => $happening)
			            	<div class="w-full sm:w-6/12 lg:w-full px-2">
			            		@event_list_item(
			                        [
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
			                    @endevent_list_item
			                </div>
			            @endforeach
			        </div>
			    @endif
			    {{-- Events End --}}
				{{-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --}}
				{{-- Top Lists Start --}}
				@if(is_array($top_lists))
					<div class="mt-8">
						@header(
		                	[
		                		'title' => "Våra tips"
		                	]
		                )
		                @endheader
	                </div>
			        <div class="flex flex-wrap -mx-2 mb-3">
			            @foreach($top_lists as $top_list)
			                <div class="w-full sm:w-6/12 lg:w-full mb-3 px-2">
			                	@top_list(
			                		[
			                			'top_list' => $top_list
			                		]
			                	)
			                	@endtop_list
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