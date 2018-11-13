@php $spotlights = get_field("stops"); @endphp
@if(isset($spotlights))
    <section class="mt5 container w-11/12  md:w-10/12  lg:w-10/12  mx-auto {{ App::getTermClassName() }}">
        <div class="featured-grid clearfix">
            @foreach ($spotlights as $post)
                <?php setup_postdata($post);
                    $post_id = $post->ID;
                    $thumbnail_id = get_post_thumbnail_id($post_id);
                    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                ?>
                {{-- Gets first item in array --}}
                @if($loop->iteration === 2 || $loop->iteration % 4 === 0)
                    <div class="featured-grid__item featured-grid__item--large col w-full sm:w-full lg:w-8/12 ">
                        <a href="{{ the_permalink($post->ID) }}" title="{{ the_permalink($post->ID) }}">
                            <article class="image-blurb">
                                <picture>
                                    <source
                                        media="(min-width: 40em)"
                                        data-srcset="{{ get_the_post_thumbnail_url($post_id, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url($post_id, 'vh_large@2x' ) . " 2x" }}" />
                                    <source
                                        data-srcset="{{ get_the_post_thumbnail_url($post_id, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url($post_id, 'vh_medium@2x' ) . " 2x" }}" />
                                    <img
                                        class="image-blurb__img max-w-none lazyload"
                                        data-src="{{ get_the_post_thumbnail_url($post_id, 'vh_medium' )}}"
                                        alt="{{ $alt }}" />
                                </picture>
                                <div class="image-blurb__content">
                                    <h2 class="image-blurb__title">{!! $post->post_title !!}</h2>
                                    <div class="read-more my-3">
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
                {{-- Loops remaining items as small --}}
                @else
                    <div class="featured-grid__item featured-grid__item--small col w-full sm:w-6/12  lg:w-4/12">
                        <a href="{{ the_permalink($post->ID) }}" title="{{ the_permalink($post->ID) }}">
                            <article class="image-blurb">
                                <picture>
                                    <source
                                        media="(min-width: 40em)"
                                        data-srcset="{{ get_the_post_thumbnail_url($post_id, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url($post_id, 'vh_large@2x' ) . " 2x" }}" />
                                    <source
                                        data-srcset="{{ get_the_post_thumbnail_url($post_id, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url($post_id, 'vh_medium@2x' ) . " 2x" }}" />
                                    <img
                                        class="image-blurb__img max-w-none lazyload"
                                        data-src="{{ get_the_post_thumbnail_url($post_id, 'vh_medium' )}}"
                                        alt="{{ $alt }}" />
                                </picture>
                                <div class="image-blurb__content">
                                    <h3 class="image-blurb__title">{!! $post->post_title !!}</h3>
                                    <div class="read-more my-3">
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
