<a href="{{ $happening->link }}" class="mb3 block">
    <article class="clearfix mxn2 {{ $happening->terms["terms_default_lang"] ? $happening->terms["terms_default_lang"]->slug : "visithalland" }}">
        <div class="col col-4 px2">
            <div class="aspect-container aspect-1 rounded overflow-hidden">
                <picture>
                    <source media="(min-width:40em)"
                        data-srcset="{{ $happening->cover_image['vh_thumbnail'] . " 1x," . $happening->cover_image['vh_thumbnail'] . " 2x" }}" />
                    <source
                        data-srcset="{{ $happening->cover_image['vh_thumbnail'] . " 1x," . $happening->cover_image['vh_thumbnail'] . " 2x" }}" />
                    <img class="absolute left-0 top-0 h-fill w-auto lazyload"
                        data-src="{{ $happening->cover_image['vh_thumbnail'] }}"
                    />
                </picture>
            </div>
        </div>
        <div class="col col-8 px2">
            <div class="bg-theme inline-flex px2 py1 mb2 rounded">
                <div>
                    <span class="text-light rift-font text-sm bold">{{ $dateobj = date("j", strtotime($happening->meta_fields['start_date'])) }}</span>
                    <span class="text-light rift-font text-sm bold">{{ $dateobj = date("M", strtotime($happening->meta_fields['start_date'])) }}</span>
                </div>
                <span class="mx1 text-light rift-soft">-</span>
                <div>
                    <span class="text-light rift-font text-sm bold">{{ $dateobj = date("j", strtotime($happening->meta_fields['end_date'])) }}</span>
                    <span class="text-light rift-font text-sm bold">{{ $dateobj = date("M", strtotime($happening->meta_fields['end_date'])) }}</span>
                </div>
            </div>
            <h3>{{ $happening->post_title }}</h3>
        </div>
    </article>
</a>