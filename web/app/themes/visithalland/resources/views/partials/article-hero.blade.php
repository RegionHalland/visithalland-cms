<section class="{{ App::getTermClassName() }} relative" role="heading" id="page-content">
    <div class="h-64 py-6 bg-blue-light absolute pin-t pin-l w-full topographic-pattern">
    </div>
    <div class="relative container w-11/12 md:w-10/12 pt-32">
        <div class="aspect-container relative scrim aspect-1 sm:aspect-3x2 md:aspect-16x9 topographic-pattern rounded">
            <picture>
                <source media="(min-width: 60em)"
                    data-srcset="{{ $post->featured_image["sizes"]['vh_hero_wide'] . " 1x," . $post->featured_image["sizes"]['vh_hero_wide@2x'] . " 2x" }}" />
                <source media="(min-width: 40em)"
                    data-srcset="{{ $post->featured_image["sizes"]['vh_large'] . " 1x," . $post->featured_image["sizes"]['vh_large@2x'] . " 2x" }}" />
                <source
                    data-srcset="{{ $post->featured_image["sizes"]['vh_medium_square'] . " 1x," . $post->featured_image["sizes"]['vh_medium_square@2x'] . " 2x" }}" />
                <img class="absolute w-full pin-t pin-l lazyload"
                    data-src="{{ $post->featured_image["sizes"]['vh_hero_wide@2x'] }}"
                    alt="{{ $post->featured_image["alt"] }}"
                />
            </picture>

            @include('partials.components.image-credit')
            @include('partials.components.date-badge')

            <div class="absolute pin-b pin-l pin-r mx-auto text-center pb-8 md:pb-12 w-11/12 sm:w-8/12 z-30">
                @include('partials.components.breadcrumbs')
                <h1 class="text-white text-3xl md:text-5xl mb-3 text-center mt-2">{{ $post->post_title }}</h1>
            </div>
        </div>
        <div class="scroll-indicator mx-auto pin-l pin-r">
            <svg class="scroll-indicator__icon">
                <use xlink:href="#arrow-down-icon"/>
            </svg>
        </div>
    </div>
</section>