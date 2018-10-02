@if(isset($post->photographer))
    <figcaption class="image-credit--large absolute top-0 right-0 mr2 mt2 z3">
        <svg class="icon image-credit--large__icon">
            <use xlink:href="#camera-icon"/>
        </svg>
        <span class="image-credit--large__author">{{ $post->photographer }}</span>
    </figcaption>
@endif