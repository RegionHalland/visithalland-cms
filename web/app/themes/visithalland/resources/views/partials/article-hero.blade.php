<section class="article-hero relative clearfix" role="heading" id="page-content">
    <div class="article-hero__backdrop topographic-pattern"></div>
    <div class="article-hero__inner relative col-11 md-col-10 lg-col-10 mx-auto">
        <div class="article-hero__img-container topographic-pattern">
            <picture>
                <source media="(min-width: 40em)"
                    data-srcset="{{ get_the_post_thumbnail_url( $post->ID, 'vh_hero_wide' ) . " 1x," . get_the_post_thumbnail_url( $post->ID, 'vh_hero_wide@2x' ) . " 2x" }}" />
                <source
                    data-srcset="{{ get_the_post_thumbnail_url( $post->ID, 'vh_hero_tall' ) . " 1x," . get_the_post_thumbnail_url( $post->ID, 'vh_hero_tall@2x' ) . " 2x" }}" />
                <img class="article-hero__img lazyload"
                    data-src="{{ get_the_post_thumbnail_url( $post->ID, 'vh_wide' ) }}"
                    alt="{{ $alt }}"
                />
            </picture>
            
            @if(isset($thumbnail_image) && is_array($thumbnail_image) && $thumbnail_image[0]->post_content)
                <figcaption class="image-credit--large absolute top-0 right-0 mr2 mt2 z3">
                    <svg class="icon image-credit--large__icon">
                        <use xlink:href="#camera-icon"/>
                    </svg>
                    <span class="image-credit--large__author">{{ $thumbnail_image[0]->post_content }}</span>
                </figcaption>
            @endif

            <div class="article-hero__content col-11 md-col-10">
                @include('partials.breadcrumbs')
                <h1 class="article-hero__title light h1 mb3 center mt2">{{ the_title() }}</h1>
            </div>
        </div>
        <div class="scroll-indicator mx-auto left-0 right-0">
            <svg class="scroll-indicator__icon">
                <use xlink:href="#arrow-down-icon"/>
            </svg>
        </div>
    </div>
</section>