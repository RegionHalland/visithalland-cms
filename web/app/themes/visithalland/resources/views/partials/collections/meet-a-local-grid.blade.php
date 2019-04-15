{{-- @php $tips = get_field("tips"); @endphp --}}
@if(isset($tips) && is_array($tips))
    <section class="mt-8 mb-16 container w-11/12 lg:w-10/12 mx-auto {{ App::getTermClassName() }}">
        @header(
            [
                'title' => "Tips från artikeln"
            ]
        )
        @endheader
        <div class="flex flex-wrap -mx-2">
            @foreach ($tips as $key => $tip)
                @php
                    $current_tip = $tip["tip"][0];
                @endphp
                <div class="w-full sm:w-6/12 md:w-4/12 px-2">
                    @article_image_thumbnail(
                        [
                            'title' => $current_tip->post_title,
                            'url' => get_permalink($current_tip->ID),
                            'classes' => "w-full",
                            'aspect_ratio' => "aspect-container aspect-1 lg:aspect-5x4",
                            'theme' => "",
                            'img_lg' => get_the_post_thumbnail_url($current_tip->ID, 'vh_hero_tall' ),
                            'img_lg_retina' => get_the_post_thumbnail_url($current_tip->ID, 'vh_hero_tall@2x' ),
                            'img_sm' => get_the_post_thumbnail_url($current_tip->ID, 'vh_medium_square' ),
                            'img_sm_retina' => get_the_post_thumbnail_url($current_tip->ID, 'vh_medium_square@2x' ),
                            'img' => get_the_post_thumbnail_url($current_tip->ID, 'vh_hero_tall@2x' ),
                            'img_alt' => ""
                        ]
                    )
                    @endarticle_image_thumbnail
                </div>
            @endforeach
        </div>
    </section>
@endif
