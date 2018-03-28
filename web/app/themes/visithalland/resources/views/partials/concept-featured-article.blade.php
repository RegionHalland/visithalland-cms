@php
    if (get_field('featured_article', $term)) {
        $featured_article = get_field('featured_article', $term);
        $post_id = $featured_article->ID;
        $thumbnail_id = get_post_thumbnail_id($post_id);
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
    }
@endphp

@if(isset($featured_article))
    <article class="article-full relative my5 {{ App::getTermClassName() }}">
        <a href="{{ get_permalink($featured_article->ID) }}" title="{{ get_permalink($featured_article->ID) }}" class="link-reset article-full__link link light">
            <div class="article-full__img-container topographic-pattern">
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
            <div class="article-full__inner col-11 lg-col-10 mx-auto">
                <div class="article-full__header">

                    {{-- Section Header Start --}}
                    <header class="section-header">
                        <div class="section-header__icon-wrapper">
                            <svg class="section-header__icon icon">
                                <use xlink:href="#recommend-icon"/>
                            </svg>
                        </div>
                        <div class="section-header__title">
                            @php _e( 'Populärt just nu', 'visithalland' ); @endphp
                        </div>
                    </header>
                    {{-- Section Header End --}}

                </div>
                <div class="article-full__content col-10 sm-col-8 lg-col-5">
                    <h2 class="article-full__title light mt1">{{ $featured_article->post_title }}</h2>
                    <div class="read-more mt4 inline-block">
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
            </div>
        </a>
    </article>

@endif
