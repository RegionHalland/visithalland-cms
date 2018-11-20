<article class="scrim overflow-hidden aspect-container aspect-1 sm:aspect-16x9 lg:aspect-1 relative rounded {{ isset($classes) ? $classes : '' }} {{ $theme }}">
    @include(
        'partials.components.picture-element', 
        [
            'img_lg' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square"],
            'img_lg_retina' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square@2x"],
            'img_md' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_wide"],
            'img_md_retina' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_wide@2x"],
            'img_sm' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square"],
            'img_sm_retina' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square@2x"],
            'img' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square"],
            'classes' => "absolute pin-l pin-t w-full", 
            'img_alt' => $navigation_item->meta_fields["cover_image"]["alt"]
        ]
    )
    <div class="z-40 absolute flex justify-end flex-col pin-t pin-b pin-r pin-l p-4">
        <h2 class="text-white text-4xl">{{ $title }}</h2>
        @include(
            'partials.components.button', [
            'title' => $title, 
            'url' => $url, 
            'icon' => "arrow-right-icon"]
        )
    </div>
</article>