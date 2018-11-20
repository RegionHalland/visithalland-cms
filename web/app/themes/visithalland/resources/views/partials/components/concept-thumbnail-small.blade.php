{{-- Concept Thumbnail --}}
{{-- A component designed to show a preview of an experience --}}
{{-- @parameters 
     - url
     - title
     - classes
     - theme
     - image sizes
--}}

<article class="scrim overflow-hidden aspect-container aspect-1 relative rounded {{ isset($classes) ? $classes : '' }} {{ $theme }}">
    @include(
        'partials.components.picture-element', 
        [
            'img' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square"],
            'classes' => "absolute pin-l pin-t w-full", 
            'img_alt' => $navigation_item->meta_fields["cover_image"]["alt"]
        ]
    )
    <div class="z-40 absolute flex justify-end flex-col pin-t pin-b pin-r pin-l p-4">
        <h2 class="text-white text-3xl">{{ $title }}</h2>
        @include(
            'partials.components.button', [
            'title' => $title, 
            'url' => $url, 
            'icon' => "arrow-right-icon"]
        )
    </div>
</article>