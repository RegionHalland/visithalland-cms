@extends('layouts.app')

@section('content')
    @php
        global $wp_query;
        $total_results = $wp_query->found_posts;
    @endphp
    {{ get_search_form() }}
    @if(isset($post))
	    <div role="main" id="main-content">
	        <div class="container w-11/12 lg:w-10/12 mx-auto pt-8">
	        	@if(isset($wp_query))
					@include(
				        'partials.components.header', [
				        'title' => "Dina sökresultat"]
				    )
		        	<div class="flex flex-wrap -mx-2 mb-4">
			            @foreach ($wp_query->posts as $key => $post)
			            	<div class="w-full sm:w-6/12 lg:w-4/12 px-2 mt-4">
			            		@include('partials.components.article-image-thumbnail', [
				                    'title' => $post->post_title,
				                    'url' => get_permalink($post->ID),
				                    'classes' => "w-full",
				                    'aspect_ratio' => "aspect-container aspect-1 lg:aspect-5x4",
				                    'theme' => "",
				                    'img_lg' => get_the_post_thumbnail_url($post->ID, 'vh_hero_tall' ),
				                    'img_lg_retina' => get_the_post_thumbnail_url($post->ID, 'vh_hero_tall@2x' ),
				                    'img_sm' => get_the_post_thumbnail_url($post->ID, 'vh_medium_square' ),
				                    'img_sm_retina' => get_the_post_thumbnail_url($post->ID, 'vh_medium_square@2x' ),
				                    'img' => get_the_post_thumbnail_url($post->ID, 'vh_hero_tall@2x' ),
				                    'img_alt' => "",
				                    ]
				                )
							</div>
					    @endforeach
	                </div>
                @endif
	    	</div>
	    	@include('partials.recommended-articles');
		</div>
    @endif
@endsection