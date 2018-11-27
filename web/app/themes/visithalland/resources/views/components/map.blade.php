<div class="{{ isset($classes) ? $classes : 'h-64 my-4' }} rounded acf-map js-map">
    <div class="marker" data-lat="{{ get_field("location")['lat']}}" data-lng="{{ get_field("location")['lng']}}"></div>
</div>