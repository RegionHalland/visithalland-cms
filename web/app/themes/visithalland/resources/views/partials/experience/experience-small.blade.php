<div class="container col-11 md-col-10 pb4 pt4" role="main" id="main-content">
    <div class="content-grid__container pt4">
        @if(is_array($featured_experiences))
            <div class="content-grid__content {{ App::getTermClassName() }}">
                <header class="bg-blue rift-font text-sm bold px3 py2 mb3 rounded-pill inline-block text-light">
                    @php _e( 'Utvalda artiklar', 'visithalland' ) @endphp
                </header>
                @foreach($featured_experiences as $post)
                    <a class="mb3 block scrim overflow-hidden aspect-container aspect-1 sm-aspect-16x9 md-aspect-3x2 relative rounded" href="{{ $post->url }}" title="{!! $post->post_title !!}">
                        <article>
                            <picture>
                                <source media="(min-width:60em)"
                                    data-srcset="{{ $post->featured_image['sizes']['vh_large'] . " 1x," . $post->featured_image['sizes']['vh_large@2x'] . " 2x" }}" />
                                <source media="(min-width:40em)"
                                    data-srcset="{{ $post->featured_image['sizes']['vh_hero_wide'] . " 1x," . $post->featured_image['sizes']['vh_hero_wide@2x'] . " 2x" }}" />
                                <source
                                    data-srcset="{{ $post->featured_image['sizes']['vh_medium_square'] . " 1x," . $post->featured_image['sizes']['vh_medium_square@2x'] . " 2x" }}" />
                                <img class="absolute left-0 top-0 h-fill w-auto lazyload"
                                    data-src="{{ $post->featured_image['sizes']['vh_medium_square@2x'] }}"
                                    alt="{{ $post->featured_image["alt"] }}"
                                />
                            </picture>
                            <div class="article-tag mt3 ml3 absolute z3 left-0 top-0">
                                <div class="article-tag__icon-wrapper">
                                    <div class="article-tag__icon"></div>
                                </div>
                            </div>
                            <div class="z4 absolute flex justify-end flex-column top-0 bottom-0 right-0 left-0 p3">
                                <h2 class="text-light">{!! $post->post_title !!}</h2>
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
                @endforeach
            </div>
        @endif

        <div class="content-grid__sidebar">
            @include('partials.experience.experience-sidebar')
        </div>

        <div class="content-grid__bottom-content">
            @include('partials.experience.experience-grid-small')
        </div>
    </div>
</div>