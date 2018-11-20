<article class="scrim overflow-hidden aspect-container aspect-1 relative rounded {{ $navigation_item->meta_fields['class_name'] }}">
    <picture>
        <source
            data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square@2x"] . " 2x" }}" />
        <img class="absolute pin-l pin-t w-full lazyload"
            data-src="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square@2x"] }}" alt="{{ $navigation_item->meta_fields["cover_image"]["alt"] }}"
        />
    </picture>
    <div class="z-40 absolute flex justify-end flex-col pin-t pin-b pin-r pin-l p-4">
        <h2 class="text-white">{{ $navigation_item->post_title ? $navigation_item->post_title : $navigation_item->title }}</h2>
        <div>
            <a class="" href="{{ $navigation_item->url }}" title="{{ $navigation_item->post_title ? $navigation_item->post_title : $navigation_item->title }}">
                <div class="px-2 py-2 bg-theme topographic-pattern-dark rounded items-center inline-flex mt-3">
                    <span class="font-rift my-2 ml-2 font-bold text-base text-white">
                        @php _e( 'Gå till', 'visithalland' ); @endphp
                        {{ $navigation_item->post_title ? $navigation_item->post_title : $navigation_item->title }}
                    </span>
                    <svg class="icon--sm mx-2">
                        <use xlink:href="#arrow-right-icon"/>
                    </svg>
                </div>
            </a>
        </div>
    </div>
</article>