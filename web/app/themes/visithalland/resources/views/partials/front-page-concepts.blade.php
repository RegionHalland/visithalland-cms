@if(is_array($navigation_items))
    <header class="bg-blue-light rift-font text-sm bold px3 py2 mb3 rounded-pill inline-block text-light">
        @php _e( 'Fler upplevelser', 'visithalland' ) @endphp
    </header>
    <div class="clearfix mxn2">
        @foreach($navigation_items as $key => $navigation_item)
            @if($loop->iteration === 2 || $loop->iteration === 3)
                @include('partials.concept.concept-thumbnail-large')
            @endif
            @if($loop->iteration > 3)
                @include('partials.concept.concept-thumbnail-small')
            @endif
        @endforeach
    </div>
@endif
