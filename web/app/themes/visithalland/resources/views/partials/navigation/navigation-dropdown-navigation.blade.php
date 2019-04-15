<nav class="flex flex-wrap">
	@foreach($primary_navigation_item->children as $child)
        <div class="truncate text-white font-rift w-full sm:w-4/12 md:w-6/12  pb-3">
        	@theme_link(
        		[
        			'title' => $child->post_title ? $child->post_title : $child->title, 
					'url' => $child->url, 
					'theme' => isset($child->meta_fields["class_name"]) && !empty($child->meta_fields["class_name"]) ? $child->meta_fields["class_name"] : "visithalland"
        		]
        	)
        	@endtheme_link
		</div>
    @endforeach
</nav>