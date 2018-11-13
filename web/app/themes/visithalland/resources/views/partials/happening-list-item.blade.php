<a href="{{ $happening->link }}" class="mb3 block">
    <article class="clearfix  -mx-2  {{ get_field('class_name', $happening->terms['terms_default_lang'])}}">
        <div class="col w-4/12 px-2">
            <div class="aspect-container aspect-1 rounded overflow-hidden">
                <picture>
                    <source media="(min-width:40em)"
                        data-srcset="{{ $happening->featured_image["sizes"]['vh_thumbnail'] . " 1x," . $happening->featured_image["sizes"]['vh_thumbnail@2x'] . " 2x" }}" />
                    <source
                        data-srcset="{{ $happening->featured_image["sizes"]['vh_thumbnail'] . " 1x," . $happening->featured_image["sizes"]['vh_thumbnail@2x'] . " 2x" }}" />
                    <img class="absolute pin-l pin-t h-fill w-auto lazyload"
                        data-src="{{ $happening->featured_image["sizes"]['vh_thumbnail@2x'] }}"
                    />
                </picture>
            </div>
        </div>
        <div class="col w-8/12  px-2">
            <div class="bg-theme inline-flex px-2 py-1 mb-2 rounded">
                <div>
                    <span class="text-white font-rift text-sm font-bold">{{ $dateobj = date("j", strtotime($happening->meta_fields['start_date'])) }}</span>
                    <span class="text-white font-rift text-sm font-bold">{{ $dateobj = date("M", strtotime($happening->meta_fields['start_date'])) }}</span>
                </div>
                <span class="mx1 text-white rift-soft">-</span>
                <div>
                    <span class="text-white font-rift text-sm font-bold">{{ $dateobj = date("j", strtotime($happening->meta_fields['end_date'])) }}</span>
                    <span class="text-white font-rift text-sm font-bold">{{ $dateobj = date("M", strtotime($happening->meta_fields['end_date'])) }}</span>
                </div>
            </div>
            <h3>{{ $happening->post_title }}</h3>
        </div>
    </article>
</a>