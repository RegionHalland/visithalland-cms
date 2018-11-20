
@if(is_array($top_lists))
    <div class="w-full">
        <header class="bg-blue font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
            @php _e( 'Våra tips', 'visithalland' ) @endphp
        </header>
    </div>
    <div class="clearfix  -mx-2 mb-3">
        @foreach($top_lists as $top_list)
            <div class="col w-full sm:w-6/12  md:w-full mb-3 px-2">
                @include('partials.components.top-list')
            </div>
        @endforeach
    </div>
@endif

@if(!empty($happenings))
    <div class="w-full">
        <header class="bg-blue font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
            @php _e( 'Kommande events', 'visithalland' ) @endphp
        </header>
    </div>
    <div class="clearfix  -mx-2 mb-3">
        @foreach($happenings as $key => $happening)
            <div class="col w-full sm:w-6/12  md:w-full px-2">
                @include('partials.happening-list-item', [
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
            </div>
        @endforeach
    </div>
@endif


@if(is_array($navigation_items))
    <div class="w-full">
        <header class="bg-blue font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
            @php _e( 'Fler upplevelser', 'visithalland' ) @endphp
        </header>
    </div>
    <div class="clearfix  -mx-2 mb-3">
        @foreach($navigation_items as $key => $navigation_item)
            <div class="col w-full sm:w-6/12 md:w-full px-2 mb-2">
                @include('partials.components.concept-thumbnail-small', [
                    'title' => $navigation_item->post_title ? $navigation_item->post_title : $navigation_item->title,
                    'url' => $navigation_item->url,
                    'text_size' => "text-3xl",
                    'classes' => "",
                    'theme' => $navigation_item->meta_fields['class_name'] ? $navigation_item->meta_fields['class_name'] : 'visithalland']
                )
            </div>
        @endforeach
    </div>
@endif

