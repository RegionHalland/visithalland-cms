<div class="container col-11 md-col-10 lg-col-10 mx-auto pb3">
    @if(is_array($happenings))
        <header class="bg-blue rift-font text-sm bold px3 py2 mb3 rounded-pill inline-block text-light">
            @php _e( 'Kommande events', 'visithalland' ) @endphp
        </header>
        <div class="clearfix mxn2">
            @foreach($happenings as $key => $happening)
                <div class="col col-12 sm-col-4 px2">
                    @include('partials.happening-thumbnail')
                </div>
            @endforeach
        </div>
    @endif
</div>
