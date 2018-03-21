<div class="concept-content relative mt2 col-11 md-col-10 lg-col-10 mx-auto">
    {{-- Concept Grid Start--}}
    <div class="concept-grid col col-12 md-col-12 lg-col-8 no-gutter">
        <div class="clearfix mxn2">
                @php $posts = App::getPosts(array("happening", "places", "companies"), get_queried_object()); @endphp
                @foreach($posts as $key => $post)
                    @if(($key + 1) % 3 === 0)
                        <div class="concept-grid__item col col-12 beach-coast">
                            <a href="{{ get_permalink($post->ID) }}" class="link-reset">
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
                        @else
                            <div class="concept-grid__item col col-12 sm-col-6">
                            <a href="{{ get_permalink($post->ID) }}" class="link-reset">
                                <article class="article-medium relative beach-coast">
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
                                        <div class="article-medium__content mt3 beach-coast">
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



    <div class="concept-sidebar col col-12 lg-col-4">
        @php $concept_happenings = App::getHappenings(10, $term) @endphp
        @if(is_array($concept_happenings))
            <div class="concept-sidebar__happenings mxn2 mt3 clearfix">
            @foreach($concept_happenings as $key => $happening)
                <article class="happening-list-item col col-12 sm-col-6 lg-col-12 px2 mb3 {{ $happening->terms["terms_default_lang"]->slug }}">
                    <a href="{{ get_permalink($happening->ID) }}" class="link-reset">
                        <div class="clearfix">
                            <div class="col col-5 sm-col-4 ">
                                <div class="happening-list-item__img-container topographic-pattern relative">
                                    <picture>
                                        <source
                                            data-srcset="{{ get_the_post_thumbnail_url( $happening->ID, 'vh_thumbnail' ) . " 1x," . get_the_post_thumbnail_url( $happening->ID, 'vh_thumbnail@2x' ) . " 2x" }}" />
                                        <img class="happening-list-item__img lazyload"
                                            data-src="{{ get_the_post_thumbnail_url( $happening->ID, 'vh_thumbnail' ) }}"
                                            alt="{{ get_field("cover_image")["alt"] }}"
                                        />
                                    </picture>
                                </div>
                            </div>
                            <div class="happening-list-item__date">
                                <div class="date-badge">
                                    <span class="date-badge__day">{{ $dateobj = date("j", strtotime(get_field("start_date", $happening->ID))) }}</span>
                                    <span class="date-badge__month">{{ $dateobj = date("M", strtotime(get_field("start_date", $happening->ID))) }}</span>
                                </div>
                            </div>
                            <div class="happening-list-item__content col col-7 sm-col-8">
                                <span class="happening-list-item__title">{{ $happening->post_title }}</span>
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
                            </div>
                        </div>
                    </a>
                </article>
            @endforeach
            </div>
        @endif

        
        @php $primary_navigation_items = App::getPrimaryNavigation() @endphp
        @if(is_array($primary_navigation_items))
            <div class="concept-sidebar__concepts mxn2 mt3 clearfix">
                @foreach($primary_navigation_items as $key => $navigation_item)
                    <div class="concept-thumbnail-small px2 col col-12 sm-col-6 lg-col-12 mt3 block beach-coast">
                        <a href="{{ $navigation_item->url }}" class="link-reset">
                            <div class="concept-thumbnail-small__img-container">
                                <picture>
                                    <source media="(min-width:40em)"
                                        data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square@2x"] . " 2x" }}" />
                                    <source
                                        data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium@2x"] . " 2x" }}" />
                                    <img class="concept-thumbnail-small__img lazyload" data-src="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium"] }}" alt="{{ $navigation_item->meta_fields["cover_image"]["alt"] }}" />
                                </picture>
                            <div class="concept-thumbnail-small__inner center">
                            <div class="concept-thumbnail-small__icon mx-auto mb2"></div>
                                <h2 class="concept-thumbnail-small__title">
                                    {{ $navigation_item->post_title }}
                                </h2>
                            </div>
                            </div>
                        </a>
                    </div>
            @endforeach
            </div>
        @endif
    </div>



</div>
