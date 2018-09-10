<a href="{{ $happening->link }}" title="{{ $happening->post_title }}" class="mb3 block {{ $happening->terms["terms_default_lang"]->slug }}">
    <article class="scrim overflow-hidden aspect-container aspect-1 relative rounded">
        <picture>
            <source
                data-srcset="{{ $happening->cover_image['vh_medium_square'] . " 1x," . $happening->cover_image['vh_medium_square@2x'] . " 2x" }}" />
            <img class="absolute left-0 top-0 w-fill lazyload"
                data-src="{{ $happening->cover_image['vh_medium_square@2x'] }}"
            />
        </picture>
        <div class="bg-theme inline-flex px2 py1 mb2 rounded absolute top-0 left-0 ml2 mt2">
            <div class="">
                <span class="text-light rift-font text-sm bold">{{ $dateobj = date("j", strtotime($happening->meta_fields['start_date'])) }}</span>
                <span class="text-light rift-font text-sm bold">{{ $dateobj = date("M", strtotime($happening->meta_fields['start_date'])) }}</span>
            </div>
            <span class="mx1 text-light rift-soft">-</span>
            <div class="">
                <span class="text-light rift-font text-sm bold">{{ $dateobj = date("j", strtotime($happening->meta_fields['end_date'])) }}</span>
                <span class="text-light rift-font text-sm bold">{{ $dateobj = date("M", strtotime($happening->meta_fields['end_date'])) }}</span>
            </div>
        </div>
        <div class="z4 absolute flex justify-end flex-column top-0 bottom-0 right-0 left-0 p3">
            <h3 class="text-light h2">{{ $happening->post_title }}</h3>
            <div class="read-more mt3">
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