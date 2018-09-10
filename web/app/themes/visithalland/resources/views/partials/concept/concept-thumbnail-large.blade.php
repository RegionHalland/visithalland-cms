<article class="scrim overflow-hidden aspect-container aspect-1 sm-aspect-16x9 md-aspect-1 relative rounded {{ $navigation_item->meta_fields['class_name'] }}">
    <picture>
        <source media="(min-width:60em)"
            data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square@2x"] . " 2x" }}" />
        <source
        <source media="(min-width:40em)"
            data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_wide"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_wide"] . " 2x" }}" />
        <source
            data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square@2x"] . " 2x" }}" />
        <img class="absolute left-0 top-0 w-fill lazyload"
            data-src="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square@2x"] }}" alt="{{ $navigation_item->meta_fields["cover_image"]["alt"] }}"
        />
    </picture>
    <div class="z4 absolute flex justify-end flex-column top-0 bottom-0 right-0 left-0 p3">
        <h2 class="text-light text-xxl">{{ $navigation_item->post_title }}</h2>
        <a href="{{ $navigation_item->url }}" title="{{ $navigation_item->post_title }}">
            <div class="px2 py2 bg-theme topographic-pattern-dark rounded items-center inline-flex mt3">
                <span class="rift-font my2 ml2 bold text-base light">
                    @php _e( 'Gå till', 'visithalland' ); @endphp
                    {{ $navigation_item->post_title }}
                </span>
                <svg class="icon--sm mx2">
                    <use xlink:href="#arrow-right-icon"/>
                </svg>
            </div>
        </a>
    </div>
</article>
