@php $mentions = get_field("mentioned"); @endphp
@if(isset($mentions) && is_array($mentions))
    <div class="mt-12">
        @include(
            'partials.components.header', [
            'title' => "Tips från artikeln"]
        )
        <div class="flex flex-wrap -mx-2">
            @foreach ($mentions as $key => $post)
                
                <div class="w-full md:w-6/12 px-2 mb-3">
                    @include('partials.components.article-thumbnail-small', 
                        [
                            'title' => $post->post_title,
                            'url' => $post->url,
                            'classes' => "block",
                            'theme' => "",
                            'img_md' => $post->featured_image["sizes"]['vh_medium_square'],
                            'img_sm' => $post->featured_image["sizes"]['vh_thumbnail'],
                            'img_sm_retina' => $post->featured_image["sizes"]['vh_thumbnail@2x'],
                            'img' => $post->featured_image["sizes"]['vh_medium_square'],
                            'img_alt' => $post->featured_image["alt"],
                        ]
                    )
                </div>

                {{-- <a href="{{ get_permalink($mention->ID) }}" class="link-reset w-full sm:w-6/12 px-2">
                    <article class="mt-3">
                        <div class="flex flex-wrap">
                            <div class="w-4/12 sm:w-4/12">
                                <div class="aspect-container aspect-1 rounded overflow-hidden">
                                    @php
                                        $thumbnail_id = get_post_thumbnail_id( $mention->ID );
                                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                                    @endphp
                                    <picture>
                                        <source
                                            data-srcset="{{ get_the_post_thumbnail_url( $mention->ID, 'vh_thumbnail' ) . " 1x," . get_the_post_thumbnail_url( $mention->ID, 'vh_thumbnail@2x' ) . " 2x" }}" />
                                        <img class="absolute pin-l pin-t h-full w-auto lazyload"
                                            data-src="{{ get_the_post_thumbnail_url( $mention->ID, 'vh_thumbnail' ) }}"
                                            alt="{{ $alt }}"
                                        />
                                    </picture>
                                </div>
                            </div>
                            <div class="w-8/12 px-3">
                                <h4 class="text-2xl">
                                    @if(get_field("title", $mention->ID) != '')
                                        {{ the_field("title", $mention->ID) }}
                                    @else
                                        {{ $mention->post_title }}
                                    @endif
                                </h4>
                                <div class="read-more mt-2">
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
                </a> --}}
            @endforeach
        </div>
    </div>
@endif
