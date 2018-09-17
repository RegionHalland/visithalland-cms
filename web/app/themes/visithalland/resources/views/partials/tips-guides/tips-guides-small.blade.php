<a href="{{ the_permalink() }}" title="{{ the_title() }}" class="mb3 {{ App::getTermClassName() }}">
    <article class="">
        <div class="overflow-hidden aspect-container aspect-3x2 relative rounded">
            <picture>
                <source
                    data-srcset="{{ get_the_post_thumbnail_url( the_ID(), 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( the_ID(), 'vh_large@2x' ) . " 2x" }}" />
                <img class="absolute left-0 top-0 w-fill lazyload"
                    data-src="{{ get_the_post_thumbnail_url( the_ID(), 'vh_large' ) }}"
                />
            </picture>
        </div>
        <h3 class="mt3">{{ the_title() }}</h3>
        <div class="read-more mt3">
            <span class="read-more__text">
                @php _e( 'Läs mer', 'visithalland' ); @endphp
            </span>
            <div class="read-more__button">
                <svg class="icon read-more__icon">
                    <use xlink:href="#arrow-right-icon"/>
                </svg>
            </div>
        </div>
    </article>
</a>       