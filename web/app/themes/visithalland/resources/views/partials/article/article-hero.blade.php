<section class="{{ App::getTermClassName() }} relative" role="heading" id="page-content">
    <div class="h-64 py-6 bg-blue-light absolute pin-t pin-l w-full topographic-pattern">
    </div>
    <div class="relative container w-11/12 lg:w-10/12 pt-32">
        <div class="aspect-container relative scrim aspect-1 sm:aspect-3x2 lg:aspect-16x9 topographic-pattern rounded">
            @include(
                'partials.components.picture-element', 
                [   
                    'img_lg' => $post->featured_image["sizes"]['vh_hero_wide'],
                    'img_lg_retina' => $post->featured_image["sizes"]['vh_hero_wide@2x'],
                    'img_md' => $post->featured_image["sizes"]['vh_large'],
                    'img_md_retina' => $post->featured_image["sizes"]['vh_large@2x'],
                    'img_sm' => $post->featured_image["sizes"]['vh_medium_square'],
                    'img_sm_retina' => $post->featured_image["sizes"]['vh_medium_square@2x'],
                    'img' => $post->featured_image["sizes"]['vh_hero_wide@2x'],
                    'classes' => "absolute w-full pin-t pin-l", 
                    'img_alt' => $post->featured_image["alt"]
                ]
            )
            @image_credit(
                [
                    'photographer' => $post->featured_image["title"]
                ]
            )
            @endimage_credit
            @if(get_field("start_date"))
                <div class="absolute pin-l pin-t mt-3 ml-3 z-20">
                    @date(
                        [
                            'start_date_day' => $dateobj = date("j", strtotime(get_field("start_date"))),
                            'start_date_month' => $dateobj = date("M", strtotime(get_field("start_date"))),
                            'end_date_day' => $dateobj = date("j", strtotime(get_field("end_date"))),
                            'end_date_month' => $dateobj = date("M", strtotime(get_field("end_date")))
                        ]
                    )
                    @enddate
                </div>
            @endif
            <div class="absolute pin-b pin-l pin-r mx-auto text-center pb-8 md:pb-12 w-11/12 sm:w-8/12 z-30">
                @include('partials.components.breadcrumbs')
                <h1 class="text-white text-3xl md:text-5xl mb-3 text-center mt-2">{{ $post->post_title }}</h1>
            </div>
        </div>
        <div class="absolute text-center mx-auto pin-b -mb-5 pin-l pin-r">
            @scroll_indicator()
            @endscroll_indicator
        </div>
    </div>
</section>