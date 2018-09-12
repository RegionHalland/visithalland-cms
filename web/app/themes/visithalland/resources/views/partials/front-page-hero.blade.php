@foreach($navigation_items as $key => $navigation_item)
    @if($loop->iteration === 1)
        <article class="scrim overflow-hidden aspect-container aspect-5x4 sm-aspect-1 md-aspect-16x9 relative mt5 md-mt0 {{ $navigation_item->meta_fields['class_name'] }}">
            <picture>
               <source media="(min-width:60em)"
                data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_wide"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_wide@2x"] . " 2x" }}" />
                <source media="(min-width:40em)"
                data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square@2x"] . " 2x" }}" />
                <source
                    data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_tall"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_tall@2x"] . " 2x" }}" />
                <img class="absolute left-0 top-0 w-fill lazyload"
                    data-src="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_wide"] }}" alt="{{ $navigation_item->meta_fields["cover_image"]["alt"] }}"
                />
            </picture>
            <div class="z4 absolute container col-12 sm-col-11 md-col-10 flex justify-end flex-column top-0 mx-auto bottom-0 right-0 left-0 px3 sm-px0 pb4 sm-pb6">
                <div class="">
                    <header class="bg-theme rift-font text-sm bold px3 py2 mb3 rounded-pill inline-block text-light">
                        @php _e( 'Populärt just nu', 'visithalland' ) @endphp
                    </header>
                </div>
                <h1 class="text-light">{{ $navigation_item->post_title }}</h1>
                <div>
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
            </div>
        </article>
    @endif
@endforeach