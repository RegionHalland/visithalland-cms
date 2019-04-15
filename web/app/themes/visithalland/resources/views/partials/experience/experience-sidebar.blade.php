{{-- Top Lists Start --}}
@if(is_array($top_lists) && !empty($top_lists))
    <div class="w-full">
        @header(
            [
                'title' => "Våra tips"
            ]
        )
        @endheader
    </div>
    <div class="flex flex-wrap -mx-2 mb-3">
        @foreach($top_lists as $top_list)
            <div class="w-full sm:w-6/12 lg:w-full mb-3 px-2">
                @top_list(
                    [
                        'top_list' => $top_list
                    ]
                )
                @endtop_list
            </div>
        @endforeach
    </div>
@endif
{{-- Top Lists End --}}

{{-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --}}

{{-- Happenings Start --}}
@if(!empty($happenings) && !empty($happenings))
    <div class="w-full">
        @header(
            [
                'title' => "Kommande event"
            ]
        )
        @endheader
    </div>
    <div class="flex flex-wrap -mx-2 mb-3">
        @foreach($happenings as $key => $happening)
            <div class="w-full sm:w-6/12 lg:w-full px-2">
                @event_list_item(
                    [
                        'title' => $happening->post_title,
                        'url' => $happening->link,
                        'theme' => get_field('class_name', $happening->terms['terms_default_lang']),
                        'classes' => "mb-3",
                        'img' => $happening->featured_image["sizes"]['vh_thumbnail'],
                        'img_sm' => $happening->featured_image["sizes"]['vh_thumbnail'],
                        'img_sm_retina' => $happening->featured_image["sizes"]['vh_thumbnail@2x'],
                        'start_date_day' => $dateobj = date("j", strtotime($happening->meta_fields['start_date'])),
                        'start_date_month' => $dateobj = date("M", strtotime($happening->meta_fields['start_date'])),
                        'end_date_day' => $dateobj = date("j", strtotime($happening->meta_fields['end_date'])),
                        'end_date_month' => $dateobj = date("M", strtotime($happening->meta_fields['end_date'])),
                    ]
                )
                @endevent_list_item
            </div>
        @endforeach
    </div>
@endif
{{-- Happenings End --}}

{{-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --}}

{{-- Experiences Start --}}
@if(is_array($navigation_items) && !empty($navigation_items))
    <div class="w-full">
        @header(
            [
                'title' => "Fler upplevelser"
            ]
        )
        @endheader
    </div>
    <div class="flex flex-wrap -mx-2 mb-3">
        @foreach($navigation_items as $key => $navigation_item)
            @if($navigation_item->type === 'taxonomy')
                <div class="w-full sm:w-6/12 lg:w-full px-2 mb-2">
                    @concept_thumbnail(
                        [
                            'title' => $navigation_item->post_title ? $navigation_item->post_title : $navigation_item->title,
                            'url' => $navigation_item->url,
                            'theme' => $navigation_item->meta_fields['class_name'] ? $navigation_item->meta_fields['class_name'] : 'visithalland',
                            'img' => $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square"],
                            'img_alt' => $navigation_item->meta_fields["cover_image"]["alt"],
                            'classes' => "absolute pin-l pin-t w-full",
                            'aspect' => "aspect-1",
                        ]
                    )
                    @endconcept_thumbnail
                </div>
            @endif
        @endforeach
    </div>
@endif
{{-- Experiences End --}}