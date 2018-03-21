@php 
    $featured_article = get_field('featured_article', $term);
    $post_id = $featured_article->ID; 
    $thumbnail_id = get_post_thumbnail_id($post_id);
    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
@endphp

@if(isset($featured_article))
    {{-- <article class="article-full relative my5 beach-coast">
        <div class="article-full__img-container topographic-pattern">
            @php 
                  $thumbnail_id = get_post_thumbnail_id( $meet_local->ID );
                  $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
            @endphp 
            <picture>
                <source 
                    media="(min-width: 40em)"
                    data-srcset="{{ get_the_post_thumbnail_url($post_id, 'vh_hero_wide' ) . " 1x," . get_the_post_thumbnail_url($post_id, 'vh_hero_wide@2x' ) . " 2x" }}" />
                <source 
                    data-srcset="{{ get_the_post_thumbnail_url($post_id, 'vh_hero_tall' ) . " 1x," . get_the_post_thumbnail_url($post_id, 'vh_hero_tall@2x' ) . " 2x" }}" />
                <img 
                    class="article-full__img lazyload" 
                    data-src="{{ get_the_post_thumbnail_url($post_id, 'vh_hero_wide' )}}"
                    alt="{{ $alt }}" />
            </picture>
        </div>
        <div class="article-full__scrim absolute left-0 right-0 bottom-0 z1"></div>
        <div class="article-full__inner absolute bottom-0 left-0 right-0 z2 clearfix">
            <div class="article-full__content col col-12 md-col-6 lg-col-6">

                <div class="article-tag--light mt3 mb2">
                    <div class="article-tag__icon-wrapper">
                        <div class="article-tag__icon"></div>
                    </div>
                    <span class="article-tag__type">
                        Post type
                    </span>
                </div>
                
                <a href="{{ get_permalink($meet_local->ID) }}" class="link-reset article-full__link link light">
                    <h2 class="article-full__title light mt1">{{ $meet_local->post_title }}</h2>
                    <p class="article-full__excerpt mb2">{{ get_field("excerpt", $meet_local->ID) }}</p>
                    <div class="read-more mt3 inline-block">
                        <span class="read-more__text light">
                            @php _e( 'Läs mer', 'visithalland' ); @endphp
                        </span>
                        <div class="read-more__button">
                            <svg class="icon read-more__icon">
                                <use xlink:href="#arrow-right-icon"/>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>    
        </div>
    </article> --}}

@endif