{{-- Carousel Component --}}
{{-- A component designed to show items in a carousel --}}
{{-- @parameters 
     - posts
--}}

<section class="js-carousel-parent focus:outline-none relative">
	<button class="h-10 w-10 z-20 inline-flex absolute pin-l -mr-3 lg:-ml-5 focus:outline-none vertical-center justify-center items-center bg-blue-light rounded-full js-carousel-previous">
		<svg class="h-3 w-3 align-center">
			<use xlink:href="#arrow-left-icon"/>
		</svg>
	</button>
	<button class="h-10 w-10 z-20 inline-flex absolute pin-r -mr-3 lg:-mr-5 focus:outline-none vertical-center justify-center items-center bg-blue-light rounded-full js-carousel-next">
		<svg class="h-3 w-3 align-center">
			<use xlink:href="#arrow-right-icon"/>
		</svg>
	</button>
	<div class="js-carousel focus:outline-none">
		@foreach($posts as $post)
			<div class="w-11/12 md:w-7/12 lg:w-5/12">
				@article_thumbnail_small(
					[
						'title' => $post->post_title,
						'url' => $post->url,
						'classes' => "",
						'theme' => "",
						'img_md' => $post->featured_image["sizes"]['vh_medium_square'],
						'img_sm' => $post->featured_image["sizes"]['vh_thumbnail'],
						'img_sm_retina' => $post->featured_image["sizes"]['vh_thumbnail@2x'],
						'img' => $post->featured_image["sizes"]['vh_medium_square'],
						'img_alt' => $post->featured_image["alt"]
					]
				)
				@endarticle_thumbnail_small
			</div>
		@endforeach
    </div>
</section>
