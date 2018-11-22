{{-- Top Lists Start --}}
@if(is_array($top_lists) && !empty($top_lists))
    <div class="w-full">
        @include(
            'partials.components.header', [
            'title' => "Våra tips"]
        )
    </div>
    <div class="flex flex-wrap -mx-2 mb-3">
        @foreach($top_lists as $top_list)
            <div class="w-full sm:w-6/12 lg:w-full mb-3 px-2">
                @include('partials.components.top-list')
            </div>
        @endforeach
    </div>
@endif
{{-- Top Lists End --}}

{{-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --}}

{{-- Happenings Start --}}
@if(!empty($happenings) && !empty($happenings))
    <div class="w-full">
        @include(
            'partials.components.header', [
            'title' => "Kommande event"]
        )
    </div>
    <div class="flex flex-wrap -mx-2 mb-3">
        @foreach($happenings as $key => $happening)
            <div class="w-full sm:w-6/12 lg:w-full px-2">
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
{{-- Happenings End --}}

{{-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --}}

{{-- Experiences Start --}}
@if(is_array($navigation_items) && !empty($navigation_items))
    <div class="w-full">
        @include(
            'partials.components.header', [
            'title' => "Fler upplevelser"]
        )
    </div>
    <div class="flex flex-wrap -mx-2 mb-3">
        @foreach($navigation_items as $key => $navigation_item)
            <div class="w-full sm:w-6/12 lg:w-full px-2 mb-2">
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
{{-- Experiences End --}}