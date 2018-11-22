{{-- Article Thumbnail --}}
{{-- A component designed to show a preview of an article --}}
{{-- @parameters 
     - url
     - title
     - classes
     - theme
     - image sizes
--}}

<a href="{{ $url }}" title="{{ $title }}" class="{{ isset($classes) ? $classes : 'inline-block' }}">
    <article class="scrim overflow-hidden bg-blue relative h-full w-full rounded flex {{ isset($aspect_ratio) ? $aspect_ratio : '' }} {{ isset($theme) ? $theme : 'visithalland' }}">
        @include(
            'partials.components.picture-element', 
            [   
                'img_lg' => isset($img_lg) ? $img_lg : '',
                'img_lg_retina' => isset($img_lg_retina) ? $img_lg_retina : '',
                'img_md' => isset($img_md) ? $img_md : '',
                'img_md_retina' => isset($img_md_retina) ? $img_md_retina : '',
                'img_sm' => isset($img_sm) ? $img_sm : '',
                'img_sm_retina' => isset($img_sm_retina) ? $img_sm_retina : '',
                'img' => isset($img) ? $img : '',
                'classes' => "absolute pin-l pin-t h-full w-auto max-w-none", 
                'img_alt' => isset($img_alt) ? $img_alt : ''
            ]
        )
        @if(isset($start_date_day))
            <div class="absolute pin-t pin-l ml-3 mt-3 z-20">
                @include(
                    'partials.components.date', 
                    [
                        'start_date_day' => $start_date_day,
                        'start_date_month' => $start_date_month,
                        'end_date_day' => $end_date_day,
                        'end_date_month' => $end_date_month,
                    ]
                )
            </div>
        @endif
        @if(isset($theme) && !isset($start_date_day))
            <div class="theme-icon {{ $theme }} absolute pin-l pin-t ml-3 mt-3 z-20">
                <div class="theme-icon__inner">
                </div>
            </div>
        @endif
        <div class="z-30 absolute flex justify-end flex-col pin-t pin-b pin-r pin-l p-4">
            <h2 class="text-white text-3xl">{{ $title }}</h2>
            @include(
                'partials.components.read-more', [
                'title' => "Läs mer", 
                'url' => $url, 
                'classes' => "mt-2 inline-block text-white"]
            )
        </div>
    </article>
</a>