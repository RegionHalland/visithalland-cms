@php $tips = get_field("tips"); @endphp

@if(isset($tips) && is_array($tips))
    <section class="mt5 mb-5 container w-11/12  md:w-10/12  lg:w-10/12  mx-auto {{ App::getTermClassName() }}">
        <header class="bg-blue font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
            @php _e( 'Tips från ', 'visithalland' ) @endphp {{ the_title() }}
        </header>
        <div class="clearfix  -mx-2">
            @foreach ($tips as $key => $tip)
                @php
                    $current_tip = $tip["tip"][0];
                    $thumbnail_id = get_post_thumbnail_id( $current_tip->ID );
                    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                @endphp


                <div class="col w-full sm:w-6/12  md:w-4/12 px-2">
                    <a href="{{ the_permalink($current_tip->ID) }}" title="{!! $current_tip->post_title !!}" class="mb3 block">
                        <article class="scrim overflow-hidden aspect-container aspect-1 relative rounded">
                            <picture>
                                <source
                                    data-srcset="{{ get_the_post_thumbnail_url($current_tip->ID, 'vh_medium_square' ) . " 1x," . get_the_post_thumbnail_url($current_tip->ID, 'vh_medium_square@2x' ) . " 2x" }}" />
                                <img
                                    class="absolute pin-l pin-t w-full lazyload"
                                    data-src="{{ get_the_post_thumbnail_url($current_tip->ID, 'vh_medium_square' )}}"
                                    alt="{{ $alt }}" />
                            </picture>
                            <div class="z-40 absolute flex justify-end flex-col pin-t pin-b pin-r pin-l p-3">
                                <h3 class="text-white h2">{!! $current_tip->post_title !!}</h3>
                                <div class="read-more mt-3">
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



