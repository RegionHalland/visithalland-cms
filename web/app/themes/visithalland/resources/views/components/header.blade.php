<header class="bg-theme font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
    @if(isset($title))
		@php _e( $title, 'visithalland' ); @endphp
	@else
		@php _e( 'Sektion', 'visithalland' ); @endphp
	@endif
</header>