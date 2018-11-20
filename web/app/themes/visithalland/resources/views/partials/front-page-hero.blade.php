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
                    @include(
                        'partials.components.header', [
                        'title' => "Populärt just nu"]
                    )
                    <h1 class="text-white">{{ $navigation_item->post_title ? $navigation_item->post_title : $navigation_item->title }}</h1>
                    @include(
                        'partials.components.button', [
                        'title' => $navigation_item->post_title ? $navigation_item->post_title : $navigation_item->title, 
                        'url' => $navigation_item->url, 
                        'icon' => "arrow-right-icon"]
                    )
                </div>
            </div>
        </article>
    @endif
@endforeach