<span class="read-more {{ isset($classes) ? $classes : '' }}">
    <span class="read-more__text">
    	@if(isset($title))
    		@php _e( $title, 'visithalland' ); @endphp
    	@else
    		@php _e( 'Läs mer', 'visithalland' ); @endphp
    	@endif
    </span>
    <div class="read-more__button">
        <svg class="icon read-more__icon">
            <use xlink:href="#arrow-right-icon"/>
        </svg>
    </div>
</span>