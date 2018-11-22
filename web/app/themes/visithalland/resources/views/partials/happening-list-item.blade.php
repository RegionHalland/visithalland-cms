<a href="{{ $url }}" class="block {{ isset($classes) ? $classes : '' }}">
    <article class="flex flex-wrap -mx-2 {{ isset($theme) ? $theme : 'visithalland' }}">
        <div class="w-4/12 px-2">
            <div class="aspect-container aspect-1 rounded overflow-hidden">
                @include(
                    'partials.components.picture-element', 
                    [
                        'img_sm' => $img_sm,
                        'img_sm_retina' => $img_sm_retina,
                        'img' => $img,
                        'classes' => "absolute pin-l pin-t w-auto h-full"
                    ]
                )
            </div>
        </div>
        <div class="w-8/12 px-2">
            @include(
                'partials.components.date', 
                [
                    'start_date_day' => $start_date_day,
                    'start_date_month' => $start_date_month,
                    'end_date_day' => $end_date_day,
                    'end_date_month' => $end_date_month,
                ]
            )
            <span class="text-xl font-rift block font-bold text-black">{{ $title }}</span>
        </div>
    </article>
</a>