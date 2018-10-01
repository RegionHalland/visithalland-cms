<section class="{{ App::getTermClassName() }} relative" role="heading" id="page-content">
    <div class="height-5 py6 bg-blue-light absolute top-0 left-0 w-fill topographic-pattern">
    </div>
    <div class="relative container col-11 md-col-10 pt6">
        <div class="aspect-container relative scrim aspect-1 sm-aspect-3x2 md-aspect-16x9 topographic-pattern rounded">
            <picture>
                <source media="(min-width: 60em)"
                    data-srcset="{{ $post->featured_image["sizes"]['vh_hero_wide'] . " 1x," . $post->featured_image["sizes"]['vh_hero_wide@2x'] . " 2x" }}" />
                <source media="(min-width: 40em)"
                    data-srcset="{{ $post->featured_image["sizes"]['vh_large'] . " 1x," . $post->featured_image["sizes"]['vh_large@2x'] . " 2x" }}" />
                <source
                    data-srcset="{{ $post->featured_image["sizes"]['vh_medium_square'] . " 1x," . $post->featured_image["sizes"]['vh_medium_square@2x'] . " 2x" }}" />
                <img class="absolute w-fill top-0 left-0 lazyload"
                    data-src="{{ $post->featured_image["sizes"]['vh_hero_wide@2x'] }}"
                    alt="{{ $post->featured_image["alt"] }}"
                />
            </picture>

            @include('partials.components.image-credit')
            @include('partials.components.date-badge')

            <div class="absolute bottom-0 left-0 right-0 mx-auto center pb4 md-pb4 col-11 sm-col-8 z3">
                @include('partials.components.breadcrumbs')
                <h1 class="text-light text-225 md-text-275 line-height-2 mb3 center mt2">{{ $post->post_title }}</h1>
            </div>
        </div>
        <div class="scroll-indicator mx-auto left-0 right-0">
            <svg class="scroll-indicator__icon">
                <use xlink:href="#arrow-down-icon"/>
            </svg>
        </div>
    </div>
</section>