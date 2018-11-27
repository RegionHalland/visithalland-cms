<a href="{{ $url }}" target="_blank" class="focus rounded-full link-reset inline-block {{ isset($classes) ? $classes : '' }}">
    <div class="h-8 w-8 bg-blue-light rounded-full flex items-center justify-center text-white">
        <svg class="icon fill-current">
            <use xlink:href="#{{ isset($icon) ? $icon : '' }}"/>
        </svg>
    </div>
</a>