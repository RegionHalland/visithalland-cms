<a href="{{ the_permalink($featured_post->ID) }}" title="{{$featured_post->post_title}}" class="block mb-3 {{ App::getTermClassName() }}">
    <article class="scrim overflow-hidden aspect-container aspect-1 sm:aspect-16x9 relative rounded">
        <picture>
            <source media="(min-width: 40em)"
                data-srcset="{{ get_the_post_thumbnail_url( $featured_post->ID, 'vh_hero_wide' ) . " 1x," . get_the_post_thumbnail_url( $featured_post->ID, 'vh_hero_wide@2x' ) . " 2x" }}" />
            <source
                data-srcset="{{ get_the_post_thumbnail_url( $featured_post->ID, 'vh_medium_square' ) . " 1x," . get_the_post_thumbnail_url( $featured_post->ID, 'vh_medium_square@2x' ) . " 2x" }}" />
            <img class="absolute pin-l pin-t w-full lazyload"
                data-src="{{ get_the_post_thumbnail_url( $featured_post->ID, 'vh_hero_wide' ) }}"
            />
        </picture>
        <div class="z-40 absolute flex justify-end flex-col pin-t pin-b pin-r pin-l p-4">
            <h2 class="text-white">{{$featured_post->post_title}}</h2>
            <div class="read-more mt-3">
                <span class="read-more__text light">
                    @php _e( 'Läs mer', 'visithalland' ); @endphp
                </span>
                <div class="read-more__button">
                    <svg class="icon read-more__icon">
                        <use xlink:href="#arrow-right-icon"/>
                    </svg>
                </div>
            </div>
        </div>
    </article>
</a>