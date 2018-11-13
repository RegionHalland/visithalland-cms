<a href="{{ $happening->link }}" title="{{ $happening->post_title }}" class="mb3 block {{ get_field('class_name', $happening->terms['terms_default_lang'])}}">
    <article class="scrim overflow-hidden aspect-container aspect-1 relative rounded">
        <picture>
            <source
                data-srcset="{{ $happening->featured_image["sizes"]['vh_medium_square'] . " 1x," . $happening->featured_image["sizes"]['vh_medium_square@2x'] . " 2x" }}" />
            <img class="absolute pin-l pin-t w-full lazyload"
                data-src="{{ $happening->featured_image["sizes"]['vh_medium_square@2x'] }}"
            />
        </picture>
        <div class="bg-theme inline-flex px-2 py-1 mb-2 rounded absolute pin-t pin-l ml-2 mt-2">
            <div class="">
                <span class="text-white font-rift text-sm font-bold">{{ $dateobj = date("j", strtotime($happening->meta_fields['start_date'])) }}</span>
                <span class="text-white font-rift text-sm font-bold">{{ $dateobj = date("M", strtotime($happening->meta_fields['start_date'])) }}</span>
            </div>
            <span class="mx1 text-white rift-soft">-</span>
            <div class="">
                <span class="text-white font-rift text-sm font-bold">{{ $dateobj = date("j", strtotime($happening->meta_fields['end_date'])) }}</span>
                <span class="text-white font-rift text-sm font-bold">{{ $dateobj = date("M", strtotime($happening->meta_fields['end_date'])) }}</span>
            </div>
        </div>
        <div class="z-40 absolute flex justify-end flex-col pin-t pin-b pin-r pin-l p-3">
            <h3 class="text-white h2">{{ $happening->post_title }}</h3>
            <div class="read-more mt-3">
                <span class="read-more__text light">
                    @php _e( 'Läs mer', 'visithalland' ); @endphp
                </span>
                <div class="read-more__button">
                    <svg class="icon read-more__icon">
                        <use xlink:href="#arrow-right-icon"/>
                    </svg>
                </div>
            </div>
        </div>
    </article>
</a>