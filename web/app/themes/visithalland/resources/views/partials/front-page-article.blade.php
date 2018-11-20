<a href="{{ get_permalink($recent_post->ID) }}" title="{{ $recent_post->post_title }}" class="mb-3">
    <article>
    	<div class="overflow-hidden aspect-container aspect-3x2 relative rounded">
            <picture>
                <source
                    data-srcset="{{ $recent_post->featured_image["sizes"]['vh_medium'] . " 1x," . $recent_post->featured_image["sizes"]['vh_medium@2x'] . " 2x" }}" />
                <img class="absolute pin-l pin-t w-full lazyload"
                    data-src="{{ $recent_post->featured_image["sizes"]['vh_medium@2x'] }}"
                    alt="{{ $recent_post->featured_image["alt"] }}"
                />
            </picture>
        </div>
        <h3 class="mt-3">{{ $recent_post->post_title }}</h3>
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