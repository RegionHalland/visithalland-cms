<picture>
    @if(isset($img_lg))
        <source media="(min-width:992px)" data-srcset="{{ $img_lg . " 1x," . $img_lg_retina . " 2x" }}" />
    @endif
    @if(isset($img_md))
        <source media="(min-width:768px)" data-srcset="{{ $img_md . " 1x," . $img_md_retina . " 2x" }}" />
    @endif
    @if(isset($img_sm))
        <source data-srcset="{{ $img_sm . " 1x," . $img_sm_retina . " 2x" }}" />
    @endif
    <img class="lazyload {{ $classes }}"
        data-src="{{ $img }}" alt="{{ isset($img_alt) ? $img_alt : '' }}"
    />
</picture>