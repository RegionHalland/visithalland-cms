<a href="{{ the_permalink($featured_post->ID) }}" title="{{$featured_post->post_title}}" class="block mb3 {{ App::getTermClassName() }}">
    <article class="scrim overflow-hidden aspect-container aspect-1 sm-aspect-16x9 relative rounded">
        <picture>
            <source media="(min-width: 40em)"
                data-srcset="{{ get_the_post_thumbnail_url( $featured_post->ID, 'vh_hero_wide' ) . " 1x," . get_the_post_thumbnail_url( $featured_post->ID, 'vh_hero_wide@2x' ) . " 2x" }}" />
            <source
                data-srcset="{{ get_the_post_thumbnail_url( $featured_post->ID, 'vh_medium_square' ) . " 1x," . get_the_post_thumbnail_url( $featured_post->ID, 'vh_medium_square@2x' ) . " 2x" }}" />
            <img class="absolute left-0 top-0 w-fill lazyload"
                data-src="{{ get_the_post_thumbnail_url( $featured_post->ID, 'vh_hero_wide' ) }}"
            />
        </picture>
        <div class="z4 absolute flex justify-end flex-column top-0 bottom-0 right-0 left-0 p3">
            <h2 class="text-light">{{$featured_post->post_title}}</h2>
            <div class="read-more mt3">
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