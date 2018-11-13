<header class="{{ App::getTermClassName() }}" role="heading">
    <div class="aspect-container aspect-1 md:aspect-21x9 topographic-pattern">
        <picture>
            <source media="(min-width: 60em)"
                data-srcset="{{ get_field("cover_image", $term)["sizes"]["vh_hero_wide"] . " 1x," . get_field("cover_image", $term)["sizes"]["vh_hero_wide@2x"] . " 2x" }}" />
            <source
                data-srcset="{{ get_field("cover_image", $term)["sizes"]["vh_medium_square"] . " 1x," . get_field("cover_image", $term)["sizes"]["vh_medium_square@2x"] . " 2x" }}" />
            <img class="absolute w-full h-auto pin-b pin-l lazyload" data-src="{{ get_field("cover_image", $term)["sizes"]["vh_hero_wide"] }}"
                alt="{{ get_field("cover_image", $term)["alt"] }}" />
        </picture>
    </div>
    <div class="topographic-pattern-theme relative">
        <div class="container py-6 relative clearfix w-11/12 sm:w-11/12 md:w-10/12 lg:w-10/12 mx-auto pin-b pin-l pin-r">
            <div class="-mx-3 flex flex-wrap">
                <div class="w-full sm:w-5/12 md:w-5/12 lg:w-5/12 my-2 px-3">
                    @include('partials.components.breadcrumbs')
                    <h1 class="mt0 mb-3 light">
                        <span>{!! $term->name !!}</span>
                    </h1>
                </div>
                <div class="w-full sm:w-7/12 md:w-5/12 lg:w-5/12 my-2 px-3">
                    <span class="font-rift text-white opacity-75">Om {!! $term->name !!}</span>
                    <div class="font-fira text-white mt-3">
                        {!! term_description( $term->ID, $term ) !!}
                    </div>
                </div>
            </div>

            {{-- Scroll Indicator Start --}}
            <div class="scroll-indicator">
                <svg class="scroll-indicator__icon">
                    <use xlink:href="#arrow-down-icon"/>
                </svg>
            </div>
            {{-- Scroll Indicator End --}}

        </div>
    </div>
</header>
