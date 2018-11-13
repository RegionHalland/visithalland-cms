
@if(is_array($top_lists))
    <div class="w-full">
        <header class="bg-blue font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
            @php _e( 'Våra tips', 'visithalland' ) @endphp
        </header>
    </div>
    <div class="clearfix  -mx-2 mb-3">
        @foreach($top_lists as $top_list)
            <div class="col w-full sm:w-6/12  md:w-full mb-3 px-2">
                @include('partials.components.top-list')
            </div>
        @endforeach
    </div>
@endif

@if(!empty($happenings))
    <div class="w-full">
        <header class="bg-blue font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
            @php _e( 'Kommande events', 'visithalland' ) @endphp
        </header>
    </div>
    <div class="clearfix  -mx-2 mb-3">
        @foreach($happenings as $key => $happening)
            <div class="col w-full sm:w-6/12  md:w-full px-2">
                @include('partials.happening-list-item')
            </div>
        @endforeach
    </div>
@endif


@if(is_array($navigation_items))
    <div class="w-full">
        <header class="bg-blue font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
            @php _e( 'Fler upplevelser', 'visithalland' ) @endphp
        </header>
    </div>
    <div class="clearfix  -mx-2 mb-3">
        @foreach($navigation_items as $key => $navigation_item)
            <div class="col w-full sm:w-6/12  md:w-full px-2 mb-2">
                @include('partials.concept.concept-thumbnail-small')
            </div>
        @endforeach
    </div>
@endif

