@if(is_array($navigation_items))
    @include(
        'partials.components.header', [
        'title' => "Fler upplevelser"]
    )
    <div class="flex flex-wrap -mx-2">
        @foreach($navigation_items as $key => $navigation_item)
            @if($loop->iteration === 2 || $loop->iteration === 3)
                <div class="mb-3 w-full lg:w-6/12 px-2">
                    @include('partials.components.concept-thumbnail', [
                        'title' => $navigation_item->post_title ? $navigation_item->post_title : $navigation_item->title,
                        'url' => $navigation_item->url,
                        'text_size' => "text-4xl",
                        'classes' => "",
                        'theme' => $navigation_item->meta_fields['class_name'] ? $navigation_item->meta_fields['class_name'] : 'visithalland']
                    )
                </div>
            @endif
            @if($loop->iteration > 3)
                <div class="mb-3 w-full sm:w-6/12 lg:w-4/12 px-2">
                    @include('partials.components.concept-thumbnail', [
                        'title' => $navigation_item->post_title ? $navigation_item->post_title : $navigation_item->title,
                        'url' => $navigation_item->url,
                        'text_size' => "text-3xl",
                        'classes' => "opacity-25",
                        'theme' => $navigation_item->meta_fields['class_name'] ? $navigation_item->meta_fields['class_name'] : 'visithalland']
                    )
                </div>
            @endif
        @endforeach
    </div>
@endif
