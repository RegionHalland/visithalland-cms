<div class="container w-11/12  md:w-10/12  pb-4 pt-4" role="main" id="main-content">
    <div class="flex flex-wrap -mx-3 pt-4">
        <div class="w-full md:w-8/12 px-3 {{ App::getTermClassName() }}">
            @if(is_array($featured_experiences))
                <header class="bg-blue font-rift text-sm font-bold px-3 py-2 mb-3 mt-4 rounded-full inline-block text-white">
                    @php _e( 'Utvalda artiklar', 'visithalland' ) @endphp
                </header>
                @foreach($featured_experiences as $post)
                    <a class="mb-4 block scrim overflow-hidden aspect-container aspect-1 sm:aspect-16x9 md:aspect-3x2 relative rounded" href="{{ $post->url }}" title="{!! $post->post_title !!}">
                        <article>
                            <picture>
                                <source media="(min-width:60em)"
                                    data-srcset="{{ $post->featured_image['sizes']['vh_large'] . " 1x," . $post->featured_image['sizes']['vh_large@2x'] . " 2x" }}" />
                                <source media="(min-width:40em)"
                                    data-srcset="{{ $post->featured_image['sizes']['vh_hero_wide'] . " 1x," . $post->featured_image['sizes']['vh_hero_wide@2x'] . " 2x" }}" />
                                <source
                                    data-srcset="{{ $post->featured_image['sizes']['vh_medium_square'] . " 1x," . $post->featured_image['sizes']['vh_medium_square@2x'] . " 2x" }}" />
                                <img class="absolute pin-l pin-t h-full w-auto lazyload"
                                    data-src="{{ $post->featured_image['sizes']['vh_medium_square@2x'] }}"
                                    alt="{{ $post->featured_image["alt"] }}"
                                />
                            </picture>
                            <div class="article-tag mt-3 ml-3 absolute z-30 pin-l pin-t">
                                <div class="article-tag__icon-wrapper">
                                    <div class="article-tag__icon"></div>
                                </div>
                            </div>
                            <div class="z-40 absolute flex justify-end flex-col pin-t pin-b pin-r pin-l p-3">
                                <h2 class="text-white">{!! $post->post_title !!}</h2>
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
                @endforeach
            @endif
            <div class="mt-8">
                @include('partials.experience.experience-grid-small')
            </div>
        </div>

        <div class="w-full md:w-4/12 px-3 mt-4 md:mt0">
            @include('partials.experience.experience-sidebar')
        </div>
    </div>
</div>