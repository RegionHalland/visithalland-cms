<div class="concept-sidebar col col-12 lg-col-4 mb4">

    @if(isset($top_lists))
        <div>
            <header class="bg-blue rift-font text-sm bold px3 py2 mt2 mb3 rounded-pill inline-block text-light">
                @php _e( 'Våra tips', 'visithalland' ) @endphp
            </header>
            @foreach($top_lists as $top_list)
                <div class="col col-12 sm-col-6 md-col-12 mb3">
                    @include('partials.components.top-list')
                </div>
            @endforeach
        </div>
    @endif

    @if(is_array($happenings))
        <div class="">
            <header class="bg-blue rift-font text-sm bold px3 py2 mb3 rounded-pill inline-block text-light">
                @php _e( 'Kommande events', 'visithalland' ) @endphp
            </header>
            @foreach($happenings as $key => $happening)
                @include('partials.happening-list-item')
            @endforeach
        </div>
    @endif


    @if(is_array($navigation_items))
        <header class="bg-blue-light rift-font text-sm bold px3 py2 mb3 rounded-pill inline-block text-light">
            @php _e( 'Fler upplevelser', 'visithalland' ) @endphp
        </header>
        @foreach($navigation_items as $key => $navigation_item)
            <div class="mb2">
                @include('partials.concept.concept-thumbnail-small')
            </div>
        @endforeach
    @endif
    
</div>
