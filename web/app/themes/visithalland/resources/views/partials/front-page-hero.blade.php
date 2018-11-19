@foreach($navigation_items as $key => $navigation_item)
    @if($loop->iteration === 1)
        <article class="scrim overflow-hidden aspect-container aspect-5x4 sm:aspect-1 md:aspect-16x9 relative mt-5 md:mt0 {{ $navigation_item->meta_fields['class_name'] }}">
            <picture>
               <source media="(min-width:60em)"
                data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_wide"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_wide@2x"] . " 2x" }}" />
                <source media="(min-width:40em)"
                data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square@2x"] . " 2x" }}" />
                <source
                    data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_tall"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_tall@2x"] . " 2x" }}" />
                <img class="absolute pin-l pin-t w-full lazyload"
                    data-src="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_wide"] }}" alt="{{ $navigation_item->meta_fields["cover_image"]["alt"] }}"
                />
            </picture>
            <div class="z-40 absolute container w-full sm:w-11/12 md:w-10/12 flex justify-end flex-col pin-t mx-auto pin-b pin-r pin-l px-3 sm:px-0 pb-4 sm:pb-24">
                <div class="">
                    <header class="bg-theme font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
                        @php _e( 'Populärt just nu', 'visithalland' ) @endphp
                    </header>
                </div>
                <h1 class="text-white">{{ $navigation_item->post_title ? $navigation_item->post_title : $navigation_item->title }}</h1>
                <div>
                    <a href="{{ $navigation_item->url }}" title="{{ $navigation_item->post_title ? $navigation_item->post_title : $navigation_item->title }}">
                        <div class="px-2 py-2 bg-theme topographic-pattern-dark rounded items-center inline-flex mt-3">
                            <span class="font-rift my-2 ml-2 font-bold text-base text-white">
                                @php _e( 'Gå till', 'visithalland' ); @endphp
                                {{ $navigation_item->post_title ? $navigation_item->post_title : $navigation_item->title }}
                            </span>
                            <svg class="icon mx-2">
                                <use xlink:href="#arrow-right-icon"/>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </article>
    @endif
@endforeach