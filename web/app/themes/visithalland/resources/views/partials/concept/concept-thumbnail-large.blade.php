<article class="scrim overflow-hidden aspect-container aspect-1 sm:aspect-16x9 md:aspect-1 relative rounded {{ $navigation_item->meta_fields['class_name'] }}">
    <picture>
        <source media="(min-width:60em)"
            data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square@2x"] . " 2x" }}" />
        <source
        <source media="(min-width:40em)"
            data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_wide"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_wide"] . " 2x" }}" />
        <source
            data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square@2x"] . " 2x" }}" />
        <img class="absolute pin-l pin-t w-full lazyload"
            data-src="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square@2x"] }}" alt="{{ $navigation_item->meta_fields["cover_image"]["alt"] }}"
        />
    </picture>
    <div class="z-40 absolute flex justify-end flex-col pin-t pin-b pin-r pin-l p-3">
        <h2 class="text-white text-xxl">{{ $navigation_item->post_title ? $navigation_item->post_title : $navigation_item->title }}</h2>
        <a href="{{ $navigation_item->url }}" title="{{ $navigation_item->post_title ? $navigation_item->post_title : $navigation_item->title }}">
            <div class="px2 py-2 bg-theme topographic-pattern-dark rounded items-center inline-flex mt-3">
                <span class="font-rift my2 ml-2 font-bold text-base light">
                    @php _e( 'Gå till', 'visithalland' ); @endphp
                    {{ $navigation_item->post_title ? $navigation_item->post_title : $navigation_item->title }}
                </span>
                <svg class="icon--sm mx2">
                    <use xlink:href="#arrow-right-icon"/>
                </svg>
            </div>
        </a>
    </div>
</article>
