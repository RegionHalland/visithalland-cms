<a href="{{ the_permalink() }}" title="{{ the_title() }}" class="mb-3 {{ App::getTermClassName() }}">
    <article class="">
        <div class="overflow-hidden aspect-container aspect-3x2 relative rounded">
            <img class="absolute pin-l pin-t w-full lazyload"
                data-src="{{ the_post_thumbnail_url( 'vh_large' ) }}"
            />
        </div>
        <h3 class="mt-3">{{ the_title() }}</h3>
        <p class="fade-text mt-2">{{ the_field('excerpt') }}</p>
        <div class="read-more mt-3">
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