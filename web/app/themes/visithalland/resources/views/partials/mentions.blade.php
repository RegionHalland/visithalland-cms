@php $mentions = get_field("mentioned"); @endphp
@if(isset($mentions) && is_array($mentions))
    <div class="article-mentions mt3 clearfix">
         <header class="section-header inline-block mb2 coastal-living">
            <div class="section-header__icon-wrapper">
                <svg class="section-header__icon icon">
                    <use xlink:href="#recommend-icon"/>
                </svg>
            </div>
            <div class="section-header__title">
                @php _e( 'Tips från artikeln', 'visithalland' ) @endphp
            </div>
        </header>
        @foreach ($mentions as $key => $mention)
            <a href="{{ get_permalink($mention->ID) }}" class="link-reset">
                <article class="article-mention col col-12 sm-col-6 mt3">
                    <div class="clearfix">
                        <div class="col col-4 sm-col-4 ">
                            <div class="article-mention__img-container relative">
                                @php
                                    $thumbnail_id = get_post_thumbnail_id( $mention->ID );
                                    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                                @endphp
                                <picture>
                                    <source
                                        data-srcset="{{ get_the_post_thumbnail_url( $mention->ID, 'vh_thumbnail' ) . " 1x," . get_the_post_thumbnail_url( $mention->ID, 'vh_thumbnail@2x' ) . " 2x" }}" />
                                    <img class="article-mention__img lazyload"
                                        data-src="{{ get_the_post_thumbnail_url( $mention->ID, 'vh_thumbnail' ) }}"
                                        alt="{{ $alt }}"
                                    />
                                </picture>
                            </div>
                        </div>
                        <div class="article-mention__content col col-7 sm-col-8">
                            <h4 class="article-mention__title">
                                @if(get_field("title", $mention->ID) != '')
                                    {{ the_field("title", $mention->ID) }}
                                @else
                                    {{ $mention->post_title }}
                                @endif
                            </h4>
                            <div class="read-more mt2">
                                <span class="read-more__text">
                                    @php _e( 'Läs mer', 'visithalland' ) @endphp
                                </span>
                                <div class="read-more__button">
                                    <svg class="icon read-more__icon">
                                        <use xlink:href="#arrow-right-icon"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </a>
        @endforeach
    </div>
@endif
