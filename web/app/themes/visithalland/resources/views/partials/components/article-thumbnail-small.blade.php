<a href="{{ $url }}" title="{{ $title }}" class="{{ isset($classes) ? $classes : '' }}">
	<div class="flex mr-8 rounded">
		<div class="h-24 w-24 overflow-hidden bg-blue relative rounded mr-3">
			@include(
                'partials.components.picture-element', 
                [
                    'img_lg' => isset($img_lg) ? $img_lg : '',
	                'img_lg_retina' => isset($img_lg_retina) ? $img_lg_retina : '',
	                'img_md' => isset($img_md) ? $img_md : '',
	                'img_md_retina' => isset($img_md_retina) ? $img_md_retina : '',
	                'img_sm' => isset($img_sm) ? $img_sm : '',
	                'img_sm_retina' => isset($img_sm_retina) ? $img_sm_retina : '',
	                'img' => isset($img) ? $img : '',
	                'classes' => "absolute pin-l pin-t w-full h-auto", 
	                'img_alt' => isset($img_alt) ? $img_alt : ''
                ]
            )
		</div>
		<div class="flex-1">
			<h3>{{ $title }}</h3>
			@include(
	            'partials.components.read-more', [
	            'title' => "Läs mer", 
	            'classes' => "mt-2 inline-block"]
	        )
		</div>
	</div>
</a>