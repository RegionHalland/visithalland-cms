<header class="bg-blue rift-font text-sm bold px3 py2 mb3 rounded-pill inline-block text-light">
    @php _e( 'Fler artiklar', 'visithalland' ) @endphp
</header>
<div class="flex flex-wrap mxn2">
    @foreach($posts as $key => $post)
        @php
            $current_index = $key + 1
        @endphp

        @if($current_index % 3 === 0)
            <div class="col col-12 px2 mb3">
                <a href="{{ the_permalink($post->ID) }}" title="{{$post->post_title}}" class="block {{ App::getTermClassName() }}">
                    <article class="scrim overflow-hidden aspect-container aspect-1 sm-aspect-3x2 relative rounded">
                        <div class="article-tag mt3 ml3 absolute z3 left-0 top-0">
                            <div class="article-tag__icon-wrapper">
                                <div class="article-tag__icon"></div>
                            </div>
                        </div>
                        <picture>
                            <source media="(min-width: 40em)"
                                data-srcset="{{ get_the_post_thumbnail_url( $post->ID, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( $post->ID, 'vh_large@2x' ) . " 2x" }}" />
                            <source
                                data-srcset="{{ get_the_post_thumbnail_url( $post->ID, 'vh_medium_square' ) . " 1x," . get_the_post_thumbnail_url( $post->ID, 'vh_medium_square@2x' ) . " 2x" }}" />
                            <img class="absolute left-0 top-0 w-fill lazyload"
                                data-src="{{ get_the_post_thumbnail_url( $post->ID, 'vh_large@2x' ) }}"
                            />
                        </picture>
                        <div class="z4 absolute flex justify-end flex-column top-0 bottom-0 right-0 left-0 p3">
                            <h2 class="text-light">{{$post->post_title}}</h2>
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
        @else
            <div class="col col-12 sm-col-6 px2 mb3">
                <a href="{{ get_permalink($post->ID) }}" title="{{ $post->post_title }}" class="{{ App::getTermClassName() }}">
                    <article class="">
                        <div class="overflow-hidden aspect-container aspect-3x2 relative rounded">
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
                                    data-srcset="{{ get_the_post_thumbnail_url( $post->ID, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( $post->ID, 'vh_large@2x' ) . " 2x" }}" />
                                <img class="absolute left-0 top-0 w-fill lazyload"
                                    data-src="{{ get_the_post_thumbnail_url( $post->ID, 'vh_large' ) }}"
                                />
                            </picture>
                        </div>
                        <h3 class="mt3">{{ $post->post_title }}</h3>
                        <p class="fade-text mt2">{{ $post->excerpt }}</p>
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
                    </article>
                </a> 
            </div>
        @endif
    @endforeach
</div>
