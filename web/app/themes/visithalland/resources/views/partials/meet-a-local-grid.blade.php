@php $tips = get_field("tips"); @endphp

@if(isset($tips) && is_array($tips))
    <section class="mt5 mb5 container col-11 md-col-10 lg-col-10 mx-auto {{ App::getTermClassName() }}">
        <header class="bg-blue rift-font text-sm bold px3 py2 mb3 rounded-pill inline-block text-light">
            @php _e( 'Tips från ', 'visithalland' ) @endphp {{ the_title() }}
        </header>
        <div class="clearfix mxn2">
            @foreach ($tips as $key => $tip)
                @php
                    $current_tip = $tip["tip"][0];
                    $thumbnail_id = get_post_thumbnail_id( $current_tip->ID );
                    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                @endphp


                <div class="col col-12 sm-col-6 md-col-4 px2">
                    <a href="{{ the_permalink($current_tip->ID) }}" title="{!! $current_tip->post_title !!}" class="mb3 block">
                        <article class="scrim overflow-hidden aspect-container aspect-1 relative rounded">

                            <picture>
                                <source
                                    data-srcset="{{ get_the_post_thumbnail_url($current_tip->ID, 'vh_medium_square' ) . " 1x," . get_the_post_thumbnail_url($current_tip->ID, 'vh_medium_square@2x' ) . " 2x" }}" />
                                <img
                                    class="absolute left-0 top-0 w-fill lazyload"
                                    data-src="{{ get_the_post_thumbnail_url($current_tip->ID, 'vh_medium_square' )}}"
                                    alt="{{ $alt }}" />
                            </picture>
                            <div class="z4 absolute flex justify-end flex-column top-0 bottom-0 right-0 left-0 p3">
                                <h3 class="text-light h2">{!! $current_tip->post_title !!}</h3>
                                <div class="read-more mt3">
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
            @endforeach
        </div>
    </section>
@endif



