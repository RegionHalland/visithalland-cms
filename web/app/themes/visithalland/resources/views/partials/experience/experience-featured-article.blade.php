@php
    if (get_field('featured_article', $term)) {
        $featured_article = get_field('featured_article', $term);
        $post_id = $featured_article->ID;
        $thumbnail_id = get_post_thumbnail_id($post_id);
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
    }
@endphp

@if($featured_article)
    <a href="{{ the_permalink($featured_article->ID) }}" title="{{$featured_article->post_title}}" class="block my5 {{ App::getTermClassName() }}">
        <article class="scrim overflow-hidden aspect-container aspect-5x4 sm:aspect-1 md:aspect-16x9 relative">
            <picture>
                <source
                    media="(min-width: 60em)"
                    data-srcset="{{ get_the_post_thumbnail_url($post_id, 'vh_hero_wide' ) . " 1x," . get_the_post_thumbnail_url($post_id, 'vh_hero_wide@2x' ) . " 2x" }}" />
                <source
                    media="(min-width: 40em)"
                    data-srcset="{{ get_the_post_thumbnail_url($post_id, 'vh_medium_square' ) . " 1x," . get_the_post_thumbnail_url($post_id, 'vh_medium_square@2x' ) . " 2x" }}" />
                <source
                    data-srcset="{{ get_the_post_thumbnail_url($post_id, 'vh_hero_tall' ) . " 1x," . get_the_post_thumbnail_url($post_id, 'vh_hero_tall@2x' ) . " 2x" }}" />
                <img
                    class="absolute pin-l pin-t  w-full h-auto lazyload"
                    data-src="{{ get_the_post_thumbnail_url($post_id, 'vh_hero_wide' )}}"
                    alt="{{ $alt }}" />
            </picture>
            <div class="z-40 container w-11/12  md:w-10/12  absolute flex justify-end flex-col pin-t pin-b pin-r pin-l mx-auto pb-5">

                <header class="bg-theme font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full absolute pin-t pin-l mt-4  text-white">
                    @php _e( 'Populärt just nu', 'visithalland' ) @endphp
                </header>
                <h2 class="text-white text-xxl">{{$featured_article->post_title}}</h2>
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
@endif
