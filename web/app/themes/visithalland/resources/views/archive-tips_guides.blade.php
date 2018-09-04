@extends('layouts.app')

@section('content')
    @include('partials.page.page-header')
    <div class="container col-11 md-col-10 pb4" role="main" id="main-content">
        <div class="content-grid__container pt4">
            <div class="content-grid__content">
                <!-- Insert Featured Articles -->
                <header class="bg-blue rift-font text-sm bold px3 py2 mb3 rounded-pill inline-block text-light">
                    @php _e( 'Populära guider', 'visithalland' ) @endphp
                </header>

                @php 
                    $featured_posts = get_field('featured-tips-guides', 'option'); 
                @endphp
                
                @foreach($featured_posts as $featured_post)
                    @include('partials.tips-guides.tips-guides-featured')
                @endforeach
            </div>
            <div class="content-grid__sidebar mxn3">
                <div class="col-12 px3">
                    <header class="bg-blue rift-font text-sm bold px3 py2 rounded-pill inline-block text-light">
                        @php _e( 'Redaktionens tips', 'visithalland' ) @endphp
                    </header>
                </div>
                <div class="col col-12 sm-col-6 md-col-12 mt3 mb3 px3">
                    @include('partials.components.top-list')
                </div>
            </div>
            <div class="content-grid__bottom-content">
                <header class="bg-blue rift-font text-sm bold px3 py2 rounded-pill inline-block text-light">
                    @php _e( 'Fler artiklar', 'visithalland' ) @endphp
                </header>
                <div class="clearfix mxn3">
                    @if (have_posts())
                        @while (have_posts())
                            @php 
                                $post = the_post(); 
                            @endphp
                            <div class="col col-12 sm-col-6 px3 mt3">
                                @include('partials.tips-guides.tips-guides-small')
                            </div>          
                       @endwhile
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection