@php $tips = get_field("tips"); @endphp

@if(isset($tips) && is_array($tips))
    <section class="mt5 mb5 container col-11 md-col-10 lg-col-10 mx-auto {{ App::getTermClassName() }}">
        <header class="section-header inline-block mb3 coastal-living">
            <div class="section-header__icon-wrapper">
                <svg class="section-header__icon icon">
                    <use xlink:href="#recommend-icon"/>
                </svg>
            </div>
            <div class="section-header__title">
                @php _e( 'Tips från ', 'visithalland' ) @endphp {{ the_title() }}
            </div>
        </header>
        <div class="featured-grid clearfix">
            @foreach ($tips as $key => $tip)
                @php
                    $current_tip = $tip["tip"][0];
                    $thumbnail_id = get_post_thumbnail_id( $current_tip->ID );
                    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                @endphp
                @if($key % 2 === 0)
                    <div class="featured-grid__item featured-grid__item--medium col col-12 sm-col-6 lg-col-4">
                        <a href="{{ the_permalink($current_tip->ID) }}" title="{{ the_permalink($current_tip->ID) }}">
                            <article class="image-blurb">
                                <picture>
                                    <source
                                        media="(min-width: 40em)"
                                        data-srcset="{{ get_the_post_thumbnail_url($current_tip->ID, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url($current_tip->ID, 'vh_large@2x' ) . " 2x" }}" />
                                    <source
                                        data-srcset="{{ get_the_post_thumbnail_url($current_tip->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url($current_tip->ID, 'vh_medium@2x' ) . " 2x" }}" />
                                    <img
                                        class="image-blurb__img lazyload"
                                        data-src="{{ get_the_post_thumbnail_url($current_tip->ID, 'vh_medium' )}}"
                                        alt="{{ $alt }}" />
                                </picture>
                                <div class="image-blurb__content">
                                    <h3 class="image-blurb__title">{!! $current_tip->post_title !!}</h3>
                                    <div class="read-more my3">
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
                    <div class="featured-grid__item featured-grid__item--small col col-12 sm-col-6 lg-col-4">
                        <a href="{{ the_permalink($current_tip->ID) }}" title="{{ the_permalink($current_tip->ID) }}">
                            <article class="image-blurb">
                                <picture>
                                    <source
                                        media="(min-width: 40em)"
                                        data-srcset="{{ get_the_post_thumbnail_url($current_tip->ID, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url($current_tip->ID, 'vh_large@2x' ) . " 2x" }}" />
                                    <source
                                        data-srcset="{{ get_the_post_thumbnail_url($current_tip->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url($current_tip->ID, 'vh_medium@2x' ) . " 2x" }}" />
                                    <img
                                        class="image-blurb__img lazyload"
                                        data-src="{{ get_the_post_thumbnail_url($current_tip->ID, 'vh_medium' )}}"
                                        alt="{{ $alt }}" />
                                </picture>
                                <div class="image-blurb__content">
                                    <h3 class="image-blurb__title">{!! $current_tip->post_title !!}</h3>
                                    <div class="read-more my3">
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
                @endif
            @endforeach

        </div>
    </section>
@endif



