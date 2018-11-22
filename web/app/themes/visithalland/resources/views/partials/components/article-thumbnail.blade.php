{{-- Article Thumbnail --}}
{{-- A component designed to show a preview of an article --}}
{{-- @parameters 
     - url
     - title
     - classes
     - theme
     - image sizes
     - excerpt
--}}

<a href="{{ $url }}" title="{{ $title }}" class="{{ isset($classes) ? $classes : '' }}">
    <article>
    	<div class="overflow-hidden aspect-container aspect-3x2 relative rounded">
            @if(isset($theme))
                <div class="theme-icon {{ $theme }} absolute pin-l pin-t ml-2 mt-2 z-20">
                    <div class="theme-icon__inner">
                    </div>
                </div>
            @endif
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
                    'classes' => "absolute pin-l pin-t w-full", 
                    'img_alt' => isset($img_alt) ? $img_alt : ''
                ]
            )
        </div>
        <h3 class="mt-3 text-2xl">{{ $title }}</h3>
        <p class="fade-text text-grey-darkest mt-2">{{ $excerpt }}</p>
        @include(
            'partials.components.read-more', [
            'title' => "Läs mer", 
            'classes' => "mt-3 mb-2 inline-block"]
        )
    </article>
</a>