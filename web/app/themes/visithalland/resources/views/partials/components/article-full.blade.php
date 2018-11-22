<a href="{{ $url }}" title="{{ $title }}" class="block {{ $theme }}">
    <article class="scrim aspect-container {{ isset($aspect_ratio) ? $aspect_ratio : '' }}">
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
                'classes' => "absolute pin-l pin-t w-full h-auto", 
                'img_alt' => isset($img_alt) ? $img_alt : ''
            ]
        )
        <div class="z-20 container w-11/12 md:w-10/12 absolute flex justify-end flex-col pin-t pin-b pin-r pin-l mx-auto pb-8">
            <div class="absolute pin-t pin-l">
                @include(
                    'partials.components.header', 
                    [
                        'title' => "Populärt just nu"
                    ]
                )
            </div>
            <h2 class="text-white text-4xl">{{ $title }}</h2>
            @include(
                'partials.components.read-more', 
                [
                    'title' => "Läs mer", 
                    'classes' => "mt-2 inline-block text-white"
                ]
            )
        </div>
    </article>
</a>
