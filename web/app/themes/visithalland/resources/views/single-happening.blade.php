@extends('layouts.app')

@section('content')
    @while(have_posts())
    {!! the_post() !!}
    <div id="infinite-container">
    	<article class="{{ App::getTermClassName() }} infinite-item" data-posttype="{{get_post_type()}}">
            @include('partials.article-hero')
            <div class="container mt-8 mb-5">
                <div class="w-11/12  sm:w-9/12  md:w-11/12  mx-auto flex flex-wrap">
                    <div class="happening__content w-full md:w-6/12  mt-2">
                        <p class="preamble">{{ get_field("excerpt") }}</p>
                    </div>
                    <aside class="w-full md:w-6/12  mt-3">
                        <div class="happening-info topographic-pattern">
                            <div id="mymap" class="happening-info__map acf-map">
                                <div class="marker" data-lat="{{ get_field("location")['lat']}}" data-lng="{{ get_field("location")['lng']}}"></div>
                            </div>
                            <div class="happening-info__inner flex flex-wrap">
                                <section class="happening-info__section w-full sm:w-4/12">
                                    <span class="happening-info__section-label">@php _e( 'Datum', 'visithalland' ) @endphp</span>
                                    <span class="happening-info__date light">
                                        <span>{{ $dateobj = date("j", strtotime(get_field("start_date"))) }}</span>
                                        <span>{{ $dateobj = date("M", strtotime(get_field("start_date"))) }}</span>
                                    </span>
                                </section>
                                <section class="happening-info__section w-full sm:w-4/12">
                                    <span class="happening-info__section-label">@php _e( 'Plats', 'visithalland' ) @endphp</span>
                                    <a target="_blank" href="http://www.google.com/maps/place/{{ get_field("location")['lat'] . "," . get_field("location")['lng'] }}" class="happening-info__a inline-block">
                                        <svg class="icon happening-info__icon">
                                            <use xlink:href="#pin-icon"/>
                                        </svg>
                                        @php _e( 'Hitta hit', 'visithalland' ) @endphp
                                    </a>
                                </section>
                                <section class="happening-info__section w-full sm:w-4/12">
                                    @if(get_field("external_link"))
                                        <a target="_blank" href="{{ get_field("external_link") }}" class="btn btn--primary inline-block">{{ _e('Gå till webbplats', 'visithalland') }}</a>
                                    @endif
                                </section>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
            @include('partials.recommended-happenings')
            @include('partials.components.next-article')
        </article>
        @endwhile
    </div>
    
@include('partials.infinite-scroll')
@endsection
