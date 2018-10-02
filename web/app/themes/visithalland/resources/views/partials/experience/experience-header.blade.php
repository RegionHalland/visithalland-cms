<header class="{{ App::getTermClassName() }}" role="heading">
    <div class="aspect-container aspect-1 md-aspect-21x9 topographic-pattern">
        <picture>
            <source media="(min-width: 60em)"
                data-srcset="{{ get_field("cover_image", $term)["sizes"]["vh_hero_wide"] . " 1x," . get_field("cover_image", $term)["sizes"]["vh_hero_wide@2x"] . " 2x" }}" />
            <source
                data-srcset="{{ get_field("cover_image", $term)["sizes"]["vh_medium_square"] . " 1x," . get_field("cover_image", $term)["sizes"]["vh_medium_square@2x"] . " 2x" }}" />
            <img class="absolute w-fill h-auto bottom-0 left-0 lazyload" data-src="{{ get_field("cover_image", $term)["sizes"]["vh_hero_wide"] }}"
                alt="{{ get_field("cover_image", $term)["alt"] }}" />
        </picture>
    </div>
    <div class="topographic-pattern-theme relative">
        <div class="container py4 relative clearfix col-11 sm-col-11 md-col-10 lg-col-10 mx-auto bottom-0 left-0 right-0">

            <div class="mxn3">
                <div class="col col-12 sm-col-5 md-col-5 lg-col-5 my2 px3">
                    @include('partials.components.breadcrumbs')
                    <h1 class="mt0 mb3 light">
                        <span>{!! $term->name !!}</span>
                    </h1>
                </div>
                <div class="col col-12 sm-col-7 md-col-5 lg-col-5 my2 px3">
                    <span class="rift-font text-light opacity-75">Om {!! $term->name !!}</span>
                    <div class="fira-font text-light mt3">
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
