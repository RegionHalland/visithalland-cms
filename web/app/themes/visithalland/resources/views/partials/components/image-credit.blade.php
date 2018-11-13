@if(isset($post->photographer))
    <figcaption class="image-credit--large absolute pin-t pin-r mr-2 mt-2 z-30">
        <svg class="icon image-credit--large__icon">
            <use xlink:href="#camera-icon"/>
        </svg>
        <span class="image-credit--large__author">{{ $post->photographer }}</span>
    </figcaption>
@endif