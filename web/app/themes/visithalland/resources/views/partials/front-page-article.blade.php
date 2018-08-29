<a href="{{ get_permalink($recent_post->ID) }}" title="{{ $recent_post->post_title }}" class="mb3">
    <article class="">
    	<div class="overflow-hidden aspect-container aspect-3x2 relative rounded">
            <picture>
                <source
                    data-srcset="{{ get_the_post_thumbnail_url( $recent_post->ID, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( $recent_post->ID, 'vh_large@2x' ) . " 2x" }}" />
                <img class="absolute left-0 top-0 w-fill lazyload"
                    data-src="{{ get_the_post_thumbnail_url( $recent_post->ID, 'vh_large' ) }}"
                    alt="{{ get_post_meta(get_post_thumbnail_id( $recent_post->ID ), '_wp_attachment_image_alt', true) }}"
                />
            </picture>
        </div>
        <h3 class="mt3">{{ $recent_post->post_title }}</h3>
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