<div class="concept-grid col col-12 md-col-12 lg-col-8 no-gutter">
    <div class="clearfix mxn2">
            @php $posts = App::getPosts(array("happening", "places", "companies"), get_queried_object()); @endphp
            @foreach($posts as $key => $post)

                @php
                    //Sets current_index to index + 1
                    $current_index = $key + 1
                @endphp

                {{-- Checks for every third item in foreach-loop --}}
                @if($current_index % 3 === 0)
                    <div class="concept-grid__item col col-12 {{ App::getTermClassName() }}">
                        <a href="{{ get_permalink($post->ID) }}" title="{{ $post->post_title }}" class="link-reset">
                        <article class="article-image relative">
                            <div class="article-image__img-container topographic-pattern">
                                <div class="article-tag mt3 ml3 absolute z3 left-0 top-0">
                                    <div class="article-tag__icon-wrapper">
                                        <div class="article-tag__icon"></div>
                                    </div>
                                </div>
                                <picture>
                                    <source media="(min-width:40em)"
                                        data-srcset="{{ get_the_post_thumbnail_url( $post->ID, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( $post->ID, 'vh_large@2x' ) . " 2x" }}" />
                                    <source
                                        data-srcset="{{ get_the_post_thumbnail_url( $post->ID, 'vh_hero_tall' ) . " 1x," . get_the_post_thumbnail_url( $post->ID, 'vh_hero_tall@2x' ) . " 2x" }}" />
                                    <img class="article-image__img lazyload"
                                        data-src="{{ get_the_post_thumbnail_url( $post->ID, 'vh_large' ) }}"
                                        alt="{{ get_post_meta(get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true) }}"
                                    />
                                </picture>
                            </div>
                            <div class="article-image__content absolute left-0 bottom-0">
                                <h2 class="article-image__title light my1">{{ $post->post_title }}</h2>
                                <div class="read-more mt3 mb2">
                                    <span class="read-more__text light">
                                        @php _e( 'Läs mer', 'visithalland' ); @endphp
                                    </span>
                                    <div class="read-more__button coastal-living">
                                        <svg class="icon read-more__icon">
                                            <use xlink:href="#arrow-right-icon"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </article>
                        </a>
                    </div>

                    {{-- Loops remaining items --}}
                    @else
                        <div class="concept-grid__item col col-12 sm-col-6">
                        <a href="{{ get_permalink($post->ID) }}" title="{{ $post->post_title }}" class="link-reset">
                            <article class="article-medium relative {{ App::getTermClassName() }}">
                                    <div class="article-medium__img-container relative topographic-pattern">
                                        <div class="article-tag mt2 ml2 absolute z3 left-0 top-0">
                                            <div class="article-tag__icon-wrapper">
                                                <div class="article-tag__icon"></div>
                                            </div>
                                        </div>
                                        @php
                                            $thumbnail_id = get_post_thumbnail_id( $post->ID );
                                            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                                        @endphp
                                        <picture>
                                            <source
                                                data-srcset="{{ get_the_post_thumbnail_url( $post->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $post->ID, 'vh_medium@2x' ) . " 2x" }}" />
                                            <img class="article-medium__img lazyload"
                                                data-src="{{ get_the_post_thumbnail_url( $post->ID, 'vh_medium' ) }}"
                                                alt="{{ $alt }}"
                                            />
                                        </picture>
                                    </div>
                                    <div class="article-medium__content mt3 {{ App::getTermClassName() }}">
                                        <h3 class="article-medium__title mb1 mt1 pt0">{{ $post->post_title }}</h3>
                                        <p class="article-medium__excerpt mt2">@php the_field("excerpt", $post->ID) @endphp</p>
                                        <div class="read-more my3">
                                            <span class="read-more__text">
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
                        </div>
                    @endif
            @endforeach
    </div>
</div>
