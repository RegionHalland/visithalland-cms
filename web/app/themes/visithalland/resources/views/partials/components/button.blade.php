<a href="{{ $url }}" title="{{ $title }}" id="{{ isset($id) }}">
    <div class="px-2 py-2 {{ isset($classes) ? $classes : 'bg-theme' }} topographic-pattern-dark rounded items-center inline-flex mt-3">
        <span class="font-rift m-2 font-bold text-base text-white">
        	@if(isset($title))
	    		@php _e( $title, 'visithalland' ); @endphp
	    	@else
	    		@php _e( 'Läs mer', 'visithalland' ); @endphp
	    	@endif
        </span>
        @if(isset($icon))
	        <svg class="icon fill-current mr-2">
	            <use xlink:href="#{{ $icon }}"/>
	        </svg>
        @endif
    </div>
</a>