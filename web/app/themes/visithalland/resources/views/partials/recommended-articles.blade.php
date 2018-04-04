<div class="recommended-articles col-11 md-col-10 lg-col-10 mx-auto pb5">
    <div class="clearfix mxn2">
        <header class="section-header mb2 px2 coastal-living">
            <div class="section-header__icon-wrapper">
                <svg class="section-header__icon icon">
                    <use xlink:href="#recommend-icon"/>
                </svg>
            </div>
            <div class="section-header__title">
                @php _e( 'Fler liknande artiklar', 'visithalland' ) @endphp
            </div>
        </header>
        @php
            $terms = get_the_terms($post->ID, 'taxonomy_concept');
            $featuredArticles = App::getPosts(array(), $terms[0], 3);
        @endphp
        <div class="pb4 pt3 clearfix mxn2">
            @foreach($featuredArticles as $key => $value)
                @php
                    $post_id = $value->ID;
                    $thumbnail_id = get_post_thumbnail_id($post_id);
                    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                @endphp
                <div class="col col-12 sm-col-4 px2 mt3">
                    <a href="{{ the_permalink($post_id) }}" title="{{ the_permalink($post_id) }}">
                        <article class="image-blurb image-blurb--fixed-height {{ $value->terms["terms_default_lang"]->slug }}">
                            <picture>
                                <source
                                    media="(min-width: 40em)"
                                    data-srcset="{{ get_the_post_thumbnail_url($post_id, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url($post_id, 'vh_large@2x' ) . " 2x" }}" />
                                <source
                                    data-srcset="{{ get_the_post_thumbnail_url($post_id, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url($post_id, 'vh_medium@2x' ) . " 2x" }}" />
                                <img
                                    class="image-blurb__img lazyload"
                                    data-src="{{ get_the_post_thumbnail_url($post_id, 'vh_medium' )}}"
                                    alt="{{ $alt }}" />
                            </picture>
                            <div class="image-blurb__content">
                                <h3 class="image-blurb__title">{{ $value->post_title}}</h3>
                                <div class="read-more my3">
                                    <span class="read-more__text light">
                                        @php _e( 'Läs mer', 'visithalland' ) @endphp
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
                </div>
            @endforeach
        </div>
    </div>
</div>
