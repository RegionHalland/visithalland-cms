@if($campaign_mode)
    <article class="scrim overflow-hidden aspect-container aspect-5x4 sm:aspect-1 lg:aspect-16x9 relative mt-5 md:mt0">
        @include(
            'partials.components.picture-element', 
            [
                'img_lg' => $campaign_img["sizes"]["vh_hero_wide"],
                'img_lg_retina' => $campaign_img["sizes"]["vh_hero_wide@2x"],
                'img_md' => $campaign_img["sizes"]["vh_medium_square"],
                'img_md_retina' => $campaign_img["sizes"]["vh_medium_square@2x"],
                'img_sm' => $campaign_img["sizes"]["vh_hero_tall"],
                'img_sm_retina' => $campaign_img["sizes"]["vh_hero_tall@2x"],
                'img' => $campaign_img["sizes"]["vh_hero_wide"],
                'classes' => "absolute pin-l pin-t w-full", 
                'img_alt' => $campaign_img["alt"]
            ]
        )
        <div class="z-40 absolute container w-full sm:w-11/12 lg:w-10/12 flex justify-end flex-col pin-t mx-auto pin-b pin-r pin-l px-3 sm:px-0 pb-6 sm:pb-24">
            <div>
                @header(
                    [
                        'title' => $campaign_title
                    ]
                )
                @endheader
                <h1 class="text-white">{{ $campaign_excerpt }}</h1>
                @button(
                    [
                        'title' => "Läs mer om " . $campaign_title, 
                        'url' => $campaign_internal_link ? $campaign_internal_link : $campaign_external_link,
                        'icon' => "arrow-right-icon"
                    ]
                )
                @endbutton
            </div>
        </div>
    </article>
@else
    @if(is_array($navigation_items))
        @foreach($navigation_items as $key => $navigation_item)
            @if($loop->iteration === 1)
                <article class="scrim overflow-hidden aspect-container aspect-5x4 sm:aspect-1 lg:aspect-16x9 relative mt-5 md:mt0 {{ $navigation_item->meta_fields['class_name'] }}">
                    @include(
                        'partials.components.picture-element', 
                        [
                            'img_lg' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_wide"],
                            'img_lg_retina' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_wide@2x"],
                            'img_md' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square"],
                            'img_md_retina' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square@2x"],
                            'img_sm' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_tall"],
                            'img_sm_retina' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_tall@2x"],
                            'img' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_wide"],
                            'classes' => "absolute pin-l pin-t w-full", 
                            'img_alt' => $navigation_item->meta_fields["cover_image"]["alt"]
                        ]
                    )
                    <div class="z-40 absolute container w-full sm:w-11/12 lg:w-10/12 flex justify-end flex-col pin-t mx-auto pin-b pin-r pin-l px-3 sm:px-0 pb-6 sm:pb-24">
                        <div>
                            @header(
                                [
                                    'title' => "Populärt just nu"
                                ]
                            )
                            @endheader
                            <h1 class="text-white">{{ $navigation_item->post_title ? $navigation_item->post_title : $navigation_item->title }}</h1>
                            @button(
                                [
                                    'title' => $navigation_item->post_title ? $navigation_item->post_title : $navigation_item->title, 
                                    'url' => $navigation_item->url, 
                                    'icon' => "arrow-right-icon"
                                ]
                            )
                            @endbutton
                        </div>
                    </div>
                </article>
            @endif
        @endforeach
    @endif
@endif


<div class="container w-11/12 lg:w-10/12 mx-auto mt-4 sm:-mt-16 relative mb-8">
    @if(is_array($navigation_items))
        @header(
            [
                'title' => "Fler upplevelser"
            ]
        )
        @endheader
        <div class="flex flex-wrap -mx-2">
            @foreach($navigation_items as $key => $navigation_item)
                @if($campaign_mode ? $loop->iteration === 1 || $loop->iteration === 2 : $loop->iteration === 2 || $loop->iteration === 3)
                    <div class="mb-3 w-full lg:w-6/12 px-2">
                        @concept_thumbnail(
                            [
                                'title' => $navigation_item->post_title ? $navigation_item->post_title : $navigation_item->title,
                                'url' => $navigation_item->url,
                                'theme' => $navigation_item->meta_fields['class_name'] ? $navigation_item->meta_fields['class_name'] : 'visithalland',
                                'img_lg' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square"],
                                'img_lg_retina' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square@2x"],
                                'img_md' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_wide"],
                                'img_md_retina' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_hero_wide@2x"],
                                'img_sm' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square"],
                                'img_sm_retina' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square@2x"],
                                'img' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square"],
                                'img_alt' => $navigation_item->meta_fields["cover_image"]["alt"],
                                'classes' => "absolute pin-l pin-t w-full",
                                'aspect' => "aspect-1 sm:aspect-16x9 lg:aspect-1"
                            ]
                        )
                        @endconcept_thumbnail
                    </div>
                @endif
                @if($campaign_mode ? $loop->iteration > 2 : $loop->iteration > 3)
                    <div class="mb-3 w-full sm:w-6/12 lg:w-4/12 px-2">
                        @concept_thumbnail(
                            [
                                'title' => $navigation_item->post_title ? $navigation_item->post_title : $navigation_item->title,
                                'url' => $navigation_item->url,
                                'theme' => $navigation_item->meta_fields['class_name'] ? $navigation_item->meta_fields['class_name'] : 'visithalland',
                                'img' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square"],
                                'img_alt' => $navigation_item->meta_fields["cover_image"]["alt"],
                                'classes' => "absolute pin-l pin-t w-full"
                            ]
                        )
                        @endconcept_thumbnail
                    </div>
                @endif
            @endforeach
        </div>
    @endif
</div>
{{-- Concept Grid End --}}
