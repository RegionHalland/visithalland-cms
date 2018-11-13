
@extends('layouts.app')

@section('content')
    @include('partials.page.page-header')
    <div class="container w-11/12  md:w-10/12  pb-4 {{ App::getTermClassName() }}" role="main" id="main-content">
        <div class="flex flex-wrap pt-4  -mx-3">
            @if(is_array($featured_posts))
                <div class="w-full md:w-8/12  px-3">
                    <header class="bg-blue font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
                        @php _e( 'Populära guider', 'visithalland' ) @endphp
                    </header>
                    @foreach($featured_posts as $featured_post)
                        @include('partials.tips-guides.tips-guides-featured')
                    @endforeach
                    <div class="mt4">
                        <header class="bg-blue font-rift text-sm font-bold px-3 py-2 rounded-full inline-block text-white">
                            @php _e( 'Fler artiklar', 'visithalland' ) @endphp
                        </header>
                        <div class="flex flex-wrap  -mx-2">
                            @if (have_posts())
                                @while (have_posts())
                                    @php 
                                        $post = the_post(); 
                                    @endphp
                                    <div class="col w-full sm:w-6/12  px-2 mt-3">
                                        @include('partials.tips-guides.tips-guides-small')
                                    </div>          
                               @endwhile
                            @endif
                        </div>
                    </div>
                </div>
            @endif
            @if(is_array($top_lists))
                <div class="w-full md:w-4/12 mt-4 md:mt0">
                    <div class="w-full px-3">
                        <header class="bg-blue font-rift text-sm font-bold px-3 py-2 rounded-full inline-block text-white">
                            @php _e( 'Redaktionens tips', 'visithalland' ) @endphp
                        </header>
                    </div>
                    @if(isset($top_lists))
                        @foreach($top_lists as $top_list)
                            <div class="col w-full sm:w-6/12  md:w-full mt-3 mb-3 px-3">
                                @include('partials.components.top-list')
                            </div>
                        @endforeach
                    @endif
                </div>
            @endif
        </div>
    </div>
@endsection