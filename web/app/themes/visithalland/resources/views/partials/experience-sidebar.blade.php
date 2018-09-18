
@if(isset($top_lists))
    <div class="col-12">
        <header class="bg-blue rift-font text-sm bold px3 py2 mb3 rounded-pill inline-block text-light">
            @php _e( 'Våra tips', 'visithalland' ) @endphp
        </header>
    </div>
    <div class="clearfix mxn2 mb3">
        @foreach($top_lists as $top_list)
            <div class="col col-12 sm-col-6 md-col-12 mb3 px2">
                @include('partials.components.top-list')
            </div>
        @endforeach
    </div>
@endif

@if(!empty($happenings))
    <div class="col-12">
        <header class="bg-blue rift-font text-sm bold px3 py2 mb3 rounded-pill inline-block text-light">
            @php _e( 'Kommande events', 'visithalland' ) @endphp
        </header>
    </div>
    <div class="clearfix mxn2 mb3">
        @foreach($happenings as $key => $happening)
            <div class="col col-12 sm-col-6 md-col-12 px2">
                @include('partials.happening-list-item')
            </div>
        @endforeach
    </div>
@endif


@if(is_array($navigation_items))
    <div class="col-12">
        <header class="bg-blue-light rift-font text-sm bold px3 py2 mb3 rounded-pill inline-block text-light">
            @php _e( 'Fler upplevelser', 'visithalland' ) @endphp
        </header>
    </div>
    <div class="clearfix mxn2 mb3">
        @foreach($navigation_items as $key => $navigation_item)
            <div class="col col-12 sm-col-6 md-col-12 px2 mb2">
                @include('partials.concept.concept-thumbnail-small')
            </div>
        @endforeach
    </div>
@endif

