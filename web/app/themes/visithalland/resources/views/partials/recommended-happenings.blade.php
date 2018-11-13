<div class="container w-11/12  md:w-10/12  lg:w-10/12  mx-auto pb-8 mt-8">
    @if(is_array($happenings))
        <header class="bg-blue font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
            @php _e( 'Kommande events', 'visithalland' ) @endphp
        </header>
        <div class="flex flex-wrap -mx-2">
            @foreach($happenings as $key => $happening)
                <div class="w-full sm:w-4/12 px-2">
                    @include('partials.happening-thumbnail')
                </div>
            @endforeach
        </div>
    @endif
</div>
