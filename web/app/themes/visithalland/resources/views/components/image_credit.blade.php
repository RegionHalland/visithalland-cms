@if(isset($photographer) && !empty($photographer))
    <figcaption class="px-3 py-2 bg-blue rounded-full absolute pin-t pin-r mr-2 mt-2 z-30 text-white">
        <svg class="fill-current mr-2 h-3 w-3 align-middle">
            <use xlink:href="#camera-icon"/>
        </svg>
        <span class="italic text-xs font-fira">{{ $photographer }}</span>
    </figcaption>
@endif