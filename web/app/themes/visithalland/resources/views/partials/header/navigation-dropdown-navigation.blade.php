<nav class="flex flex-wrap">
	@foreach($primary_navigation_item->children as $child)
		@if($child->type === 'taxonomy')
            <div class="truncate text-white font-rift w-full sm:w-4/12 md:w-6/12  pb-3">
				<a class="text-white font-bold text-lg truncate inline-block" href="{{ $child->url }}">
					<div class="theme-icon {{$child->meta_fields["class_name"] ? $child->meta_fields["class_name"] : "visithalland"}}">
						<div class="theme-icon__inner">
						</div>
					</div>
					<span class="ml-2">{{ $child->post_title ? $child->post_title : $child->title }}</span>
				</a>
			</div>
		@else 
			<div class="truncate text-white font-rift col w-full sm:w-4/12 md:w-6/12  pb-3">
				<a class="text-white font-bold text-lg truncate inline-block" href="{{ $child->url }}">
					<div class="theme-icon visithalland">
						<div class="theme-icon__inner">
						</div>
					</div>
					<span class="ml-2">{{ $child->title ? $child->post_title : $child->title }}</span>
				</a>
			</div>
		@endif
    @endforeach
</nav>