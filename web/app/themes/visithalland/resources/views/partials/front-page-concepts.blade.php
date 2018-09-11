@if(is_array($navigation_items))
    <header class="bg-blue-light rift-font text-sm bold px3 py2 mb3 rounded-pill inline-block text-light">
        @php _e( 'Fler upplevelser', 'visithalland' ) @endphp
    </header>
    <div class="clearfix mxn2">
        @foreach($navigation_items as $key => $navigation_item)
            @if($loop->iteration === 2 || $loop->iteration === 3)
                <div class="mb3 col col-12 md-col-6 px2">
                    @include('partials.concept.concept-thumbnail-large')
                </div>
            @endif
            @if($loop->iteration > 3)
                <div class="mb3 col col-12 sm-col-6 md-col-4 px2">
                    @include('partials.concept.concept-thumbnail-small')
                </div>
            @endif
        @endforeach
    </div>
@endif
