@if(is_array($navigation_items))
    <header class="bg-blue-light font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
        @php _e( 'Fler upplevelser', 'visithalland' ) @endphp
    </header>
    <div class="clearfix -mx-2">
        @foreach($navigation_items as $key => $navigation_item)
            @if($loop->iteration === 2 || $loop->iteration === 3)
                <div class="mb-3 col w-full md:w-6/12 px-2">
                    @include('partials.concept.concept-thumbnail-large')
                </div>
            @endif
            @if($loop->iteration > 3)
                <div class="mb-3 col w-full sm:w-6/12 md:w-4/12 px-2">
                    @include('partials.concept.concept-thumbnail-small')
                </div>
            @endif
        @endforeach
    </div>
@endif
