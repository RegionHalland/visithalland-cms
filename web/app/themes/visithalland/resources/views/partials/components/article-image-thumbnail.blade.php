{{-- Article Thumbnail --}}
{{-- A component designed to show a preview of an article --}}
{{-- @parameters 
     - url
     - title
     - classes
     - theme
     - image sizes
--}}

<a href="{{ $url }}" title="{{ $title }}" class="inline-block {{ isset($classes) ? $classes : '' }}">
    <article class="scrim overflow-hidden bg-blue relative h-full w-full rounded flex {{ isset($aspect_ratio) ? $aspect_ratio : '' }}">
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
                'classes' => "absolute pin-l pin-t h-full w-auto max-w-none", 
                'img_alt' => isset($img_alt) ? $img_alt : ''
            ]
        )
        @if(isset($theme))
            <div class="theme-icon {{ $theme }} absolute pin-l pin-t ml-2 mt-2 z-20">
                <div class="theme-icon__inner">
                </div>
            </div>
        @endif
        <div class="z-40 absolute flex justify-end flex-col pin-t pin-b pin-r pin-l p-4">
            <h2 class="text-white text-3xl">{{ $title }}</h2>
            @include(
                'partials.components.read-more', [
                'title' => "Läs mer", 
                'url' => $url, 
                'classes' => "mt-2 inline-block text-white"]
            )
        </div>
    </article>
</a>