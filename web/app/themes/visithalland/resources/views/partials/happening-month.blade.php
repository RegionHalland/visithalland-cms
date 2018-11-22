{{-- Month Header Start --}}
<div class="pb-16 pt-16 lg:pt-24 bg-blue-light topographic-pattern">
	<div class="container w-11/12 lg:w-10/12 mx-auto">
		<div class="stick pin-t px-4 py-2 rounded-full inline-block bg-blue">
			<h2 class="text-white text-lg">{{ $month_name }}</h2>
		</div>
	</div>
</div>
{{-- Month Header End --}}
<div class="mt-2 container w-11/12 lg:w-10/12 mx-auto -mt-8 mb-8 z-10" id="{{ $month_name }}">
	<div class="flex flex-wrap -mx-3 mb-4">
		<div class="w-full lg:w-8/12 px-3">
			{{-- Happenings Start --}}
			@foreach($posts as $post)
				@include('partials.components.article-image-thumbnail', 
					[
		                'title' => $post->post_title,
		                'url' => get_permalink($post->ID),
		                'classes' => "w-full block mb-3",
		                'aspect_ratio' => "aspect-container aspect-1 md:aspect-16x9 lg:aspect-16x9",
		                'theme' => get_field('class_name', $post->terms['terms_default_lang']),
		                'img_lg' => $post->featured_image["sizes"]['vh_hero_wide'],
		                'img_lg_retina' => $post->featured_image["sizes"]['vh_hero_wide'],
		                'img_md' => $post->featured_image["sizes"]['vh_hero_wide'],
		                'img_md_retina' => $post->featured_image["sizes"]['vh_hero_wide@2x'],
		                'img_sm' => $post->featured_image["sizes"]['vh_medium_square'],
		                'img_sm_retina' => $post->featured_image["sizes"]['vh_medium_square'],
		                'img' => $post->featured_image["sizes"]['vh_hero_wide'],
		                'img_alt' => $post->featured_image["alt"],
		                'start_date_day' => $dateobj = date("j", strtotime($post->meta_fields['start_date'])),
	            		'start_date_month' => $dateobj = date("M", strtotime($post->meta_fields['start_date'])),
	            		'end_date_day' => $dateobj = date("j", strtotime($post->meta_fields['end_date'])),
	            		'end_date_month' => $dateobj = date("M", strtotime($post->meta_fields['end_date'])),
	                ]
	            )
			@endforeach
			{{-- Happenings End --}}
		</div>
		<aside class="w-full lg:w-4/12 mt-4 md:mt-0 md:mb-4 px-3">
			{{-- Events Start --}}
			@foreach($posts as $post)
				@include('partials.happening-list-item', [
	        		'title' => $post->post_title,
	        		'url' => $post->link,
	        		'theme' => get_field('class_name', $post->terms['terms_default_lang']),
	        		'classes' => "mb-3",
	        		'img' => $post->featured_image["sizes"]['vh_thumbnail'],
	        		'img_sm' => $post->featured_image["sizes"]['vh_thumbnail'],
	        		'img_sm_retina' => $post->featured_image["sizes"]['vh_thumbnail@2x'],
	        		'start_date_day' => $dateobj = date("j", strtotime($post->meta_fields['start_date'])),
	        		'start_date_month' => $dateobj = date("M", strtotime($post->meta_fields['start_date'])),
	        		'end_date_day' => $dateobj = date("j", strtotime($post->meta_fields['end_date'])),
	        		'end_date_month' => $dateobj = date("M", strtotime($post->meta_fields['end_date'])),
	    			]
	    		)
    		@endforeach
    		{{-- Events End --}}
		</aside>
	</div>
</div>