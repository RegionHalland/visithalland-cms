{{-- Masonry Article Grid --}}
{{-- A component designed to show a bunch of articles in a masonry layout --}}
{{-- @parameters 
     - posts
--}}

<div class="masonry-grid featured-grid">
    @foreach ($posts as $post)
		@if($loop->iteration == 1)
			<div class="featured-grid__item featured-grid__item--large w-full sm:w-full lg:w-8/12">
				@article_image_thumbnail(
					[
						'title' => $post->post_title,
						'url' => $post->url,
						'classes' => "flex h-full",
						'aspect_ratio' => "",
						'theme' => "",
						'img_sm' => $post->featured_image["sizes"]['vh_medium'],
						'img_sm_retina' => $post->featured_image["sizes"]['vh_medium'],
						'img' => $post->featured_image["sizes"]['vh_medium_square'],
						'img_alt' => $post->featured_image["alt"]
					]
				)
				@endarticle_image_thumbnail
            </div>
		@elseif($loop->iteration > 1 && $loop->iteration <= 3)
			<div class="featured-grid__item featured-grid__item--medium w-full sm:w-6/12 lg:w-4/12 ">
				@article_image_thumbnail(
					[
						'title' => $post->post_title,
						'url' => $post->url,
						'classes' => "flex h-full",
						'aspect_ratio' => "",
						'theme' => "",
						'img_sm' => $post->featured_image["sizes"]['vh_medium'],
						'img_sm_retina' => $post->featured_image["sizes"]['vh_medium'],
						'img' => $post->featured_image["sizes"]['vh_medium'],
						'img_alt' => $post->featured_image["alt"]
					]
				)
				@endarticle_image_thumbnail
            </div>
		@else
			<div class="featured-grid__item featured-grid__item--small w-full sm:w-6/12 lg:w-4/12">
				@article_image_thumbnail(
					[
						'title' => $post->post_title,
						'url' => $post->url,
						'classes' => "flex h-full",
						'aspect_ratio' => "",
						'theme' => "",
						'img_sm' => $post->featured_image["sizes"]['vh_medium'],
						'img_sm_retina' => $post->featured_image["sizes"]['vh_medium'],
						'img' => $post->featured_image["sizes"]['vh_medium'],
						'img_alt' => $post->featured_image["alt"]
					]
				)
				@endarticle_image_thumbnail
			</div>
		@endif
    @endforeach
</div>