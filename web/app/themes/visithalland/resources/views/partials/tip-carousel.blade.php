<section class="tip-carousel col-11 md-col-10 lg-col-10 mx-auto mx-auto clearfix">
    @if( have_rows('tips') )
        @php while( have_rows('tips') ) : the_row();
            $value = get_sub_field('tip');
        @endphp
                <div class="tip col col-10 sm-col-8 md-col-5">
                    <div class="tip__img-container topographic-pattern">
                        @php
                            $thumbnail_id = get_post_thumbnail_id( $value[0]->ID );
                            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                        @endphp
                        <picture>
                            <source
                                data-srcset="{{ get_the_post_thumbnail_url( $value[0]->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $value[0]->ID, 'vh_medium@2x' ) . " 2x" }}" />
                            <img class="tip__img lazyload"
                                data-src="{{ get_the_post_thumbnail_url( $value[0]->ID, 'vh_medium' ) }}"
                                alt="{{ $alt }}"
                            />
                        </picture>
                    </div>
                    <div class="tip__content inline-block">
                        <h3 class="mt3 tip__title">
                            @if (get_field("title", $value[0]->ID) != '')
                                {{ the_field("title", $value[0]->ID) }}
                            @else
                                {{ $value[0]->post_title }}
                            @endif
                        </h3>
                        <p class="my3 tip__quote">{{ the_sub_field('quote', $value[0]->ID) }}</p>
                        <div class="tip__links">
                            <a class="link-reset" href="{{ get_permalink($value[0]->ID) }}">
                                <div class="read-more inline-block">
                                    <span class="read-more__text">
                                        @php _e( 'Läs mer', 'visithalland' ) @endphp
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
                </div>
        @endwhile
    @endif
</section>
