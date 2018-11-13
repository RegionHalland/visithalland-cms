<header class="bg-blue font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
    @php _e( 'Fler artiklar', 'visithalland' ) @endphp
</header>
<div class="flex flex-wrap -mx-2">
    @foreach($posts_with_places_companies as $key => $post)
        @php
            $current_index = $key + 1
        @endphp

        @if($current_index % 3 === 0)
            <div class="w-full px-2 mb-3">
                <a href="{{ the_permalink($post->ID) }}" title="{{$post->post_title}}" class="block {{ App::getTermClassName() }}">
                    <article class="scrim overflow-hidden aspect-container aspect-1 sm:aspect-3x2 relative rounded">
                        <div class="article-tag mt-3 ml-3 absolute z-30 pin-l pin-t">
                            <div class="article-tag__icon-wrapper">
                                <div class="article-tag__icon"></div>
                            </div>
                        </div>
                        <picture>
                            <source media="(min-width: 40em)"
                                data-srcset="{{ get_the_post_thumbnail_url( $post->ID, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( $post->ID, 'vh_large@2x' ) . " 2x" }}" />
                            <source
                                data-srcset="{{ get_the_post_thumbnail_url( $post->ID, 'vh_medium_square' ) . " 1x," . get_the_post_thumbnail_url( $post->ID, 'vh_medium_square@2x' ) . " 2x" }}" />
                            <img class="absolute pin-l pin-t w-full lazyload"
                                data-src="{{ get_the_post_thumbnail_url( $post->ID, 'vh_large@2x' ) }}"
                            />
                        </picture>
                        <div class="z-40 absolute flex justify-end flex-col pin-t pin-b pin-r pin-l p-3">
                            <h2 class="text-white">{{$post->post_title}}</h2>
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
        @else
            <div class="w-full sm:w-6/12 px-2 mb-3">
                <a href="{{ get_permalink($post->ID) }}" title="{{ $post->post_title }}" class="{{ App::getTermClassName() }}">
                    <article class="">
                        <div class="overflow-hidden aspect-container aspect-3x2 relative rounded">
                            <div class="article-tag mt-2 ml-2 absolute z-30 pin-l pin-t">
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
                                    data-srcset="{{ get_the_post_thumbnail_url( $post->ID, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( $post->ID, 'vh_large@2x' ) . " 2x" }}" />
                                <img class="absolute pin-l pin-t w-full lazyload"
                                    data-src="{{ get_the_post_thumbnail_url( $post->ID, 'vh_large' ) }}"
                                />
                            </picture>
                        </div>
                        <h3 class="mt-4">{{ $post->post_title }}</h3>
                        <p class="fade-text mt-2">{{ $post->excerpt }}</p>
                        <div class="read-more mt-3">
                            <span class="read-more__text">
                                @php _e( 'Läs mer', 'visithalland' ); @endphp
                            </span>
                            <div class="read-more__button">
                                <svg class="icon read-more__icon">
                                    <use xlink:href="#arrow-right-icon"/>
                                </svg>
                            </div>
                        </div>
                    </article>
                </a> 
            </div>
        @endif
    @endforeach
</div>