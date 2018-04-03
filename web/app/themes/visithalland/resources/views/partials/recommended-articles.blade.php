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
            @foreach($featuredArticles as $key => $value)
                <article class="article-medium mt3 px2 col col-12 sm-col-4 md-col-4">
                    <a href="{{ get_permalink($value->ID) }}" class="link-reset">
                        <div class="article-medium__img-container topographic-pattern">
                            <div class="article-tag absolute top-0 left-0 mt2 ml2 z3">
                                <div class="article-tag__icon-wrapper">
                                    <div class="article-tag__icon"></div>
                                </div>
                            </div>
                            <picture>
                                <source
                                    data-srcset="{{get_the_post_thumbnail_url( $value->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_medium@2x' ) . " 2x" }}" />
                                <img class="article-medium__img lazyload"
                                        data-src="{{ get_the_post_thumbnail_url( $value->ID, 'vh_medium' ) }}"
                                        alt="{{ get_field("cover_image")["alt"] }}"
                                />
                            </picture>
                        </div>
                        <div class="article-medium__content">
                            <h3 class="article-medium__title mb1 mt3 pt0">{{ $value->post_title }}</h3>
                            <p class="article-medium__excerpt mt2">{{ get_field("excerpt", $value->ID) }}</p>
                            <div class="read-more mt3">
                                <span class="read-more__text">{{ _e( 'Läs mer', 'visithalland' ) }}</span>
                                <div class="read-more__button">
                                    <svg class="icon read-more__icon">
                                        <use xlink:href="#arrow-right-icon"/>
                                    </svg>
                                </div>
                            </div>

                        </div>
                    </a>
                </article>
        @endforeach
    </div>
</div>
