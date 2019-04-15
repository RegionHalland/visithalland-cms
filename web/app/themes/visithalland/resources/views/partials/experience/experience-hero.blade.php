<header class="{{ App::getTermClassName() }}" role="heading">
    <div class="aspect-container aspect-1 lg:aspect-21x9 topographic-pattern">
        @include(
            'partials.components.picture-element', 
            [
                'img_lg' => get_field("cover_image", $term)["sizes"]["vh_hero_wide"],
                'img_lg_retina' => get_field("cover_image", $term)["sizes"]["vh_hero_wide@2x"],
                'img_sm' => get_field("cover_image", $term)["sizes"]["vh_medium_square"],
                'img_sm_retina' => get_field("cover_image", $term)["sizes"]["vh_medium_square@2x"],
                'img' => get_field("cover_image", $term)["sizes"]["vh_hero_wide"],
                'classes' => "absolute w-full h-auto pin-b pin-l", 
                'img_alt' => get_field("cover_image", $term)["alt"]
            ]
        )
    </div>
    <div class="topographic-pattern-theme relative">
        <div class="container py-6 relative clearfix w-11/12 lg:w-10/12 mx-auto pin-b pin-l pin-r">
            <div class="-mx-3 flex flex-wrap">
                <div class="w-full sm:w-5/12 md:w-6/12 lg:w-5/12 my-2 px-3">
                    @include('partials.components.breadcrumbs')
                    <h1 class="mb-3 text-white">{!! $term->name !!}</h1>
                </div>
                <div class="w-full sm:w-7/12 md:w-6/12 lg:w-5/12 my-2 px-3">
                    <span class="font-rift text-white opacity-75">Om {!! $term->name !!}</span>
                    <div class="font-fira text-white mt-3 mb-4 sm:mb-0">
                        {!! term_description( $term->ID, $term ) !!}
                    </div>
                </div>
            </div>
            {{-- Scroll Indicator Start --}}
            <div class="absolute pin-b -mb-5 pin-l">
                @scroll_indicator()
                @endscroll_indicator
            </div>
            {{-- Scroll Indicator End --}}
        </div>
    </div>
</header>
