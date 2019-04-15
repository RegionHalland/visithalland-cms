{{-- Concept Thumbnail --}}
{{-- A component designed to show a preview of an experience --}}
{{-- @parameters 
     - url
     - title
     - classes
     - theme
     - image sizes
--}}

<article class="scrim overflow-hidden aspect-container relative rounded {{ isset($classes) ? $classes : '' }} {{ isset($aspect) ? $aspect : 'aspect-1' }} {{ $theme }}">
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
    <div class="z-40 absolute flex justify-end flex-col pin-t pin-b pin-r pin-l p-4">
        <h2 class="text-white text-4xl">{{ $title }}</h2>
        @button(
            [
                'title' => $title, 
                'url' => $url, 
                'icon' => "arrow-right-icon"
            ]
        )
        @endbutton
    </div>
</article>