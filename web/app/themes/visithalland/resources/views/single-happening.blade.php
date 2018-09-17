@extends('layouts.app')

@section('content')
    @php while( have_posts() ) : the_post();
        $thumbnail_id = get_post_thumbnail_id();
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
        $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
    @endphp
    <div id="infinite-container">
    	<article class="{{ App::getTermClassName() }} infinite-item" data-posttype="{{get_post_type()}}">
            @include('partials.article-hero')
            <div class="clearfix container mt4 mb5">
                <div class="col-11 sm-col-9 md-col-11 mx-auto clearfix">
                    <div class="happening__content col col-12 md-col-6 mt2">
                        <p class="preamble">{{ get_field("excerpt") }}</p>
                    </div>
                    <aside class="col col-12 md-col-6 mt3">
                        <div class="happening-info topographic-pattern">
                            <div class="happening-info__map acf-map">
                                <div class="marker" data-lat="{{ get_field("location")['lat']}}" data-lng="{{ get_field("location")['lng']}}"></div>
                            </div>
                            <div class="happening-info__inner clearfix">
                                <section class="happening-info__section col col-12 sm-col-4">
                                    <span class="happening-info__section-label">@php _e( 'Datum', 'visithalland' ) @endphp</span>
                                    <span class="happening-info__date light">
                                        <span>{{ $dateobj = date("j", strtotime(get_field("start_date"))) }}</span>
                                        <span>{{ $dateobj = date("M", strtotime(get_field("start_date"))) }}</span>
                                    </span>
                                </section>
                                <section class="happening-info__section col col-12 sm-col-4">
                                    <span class="happening-info__section-label">@php _e( 'Plats', 'visithalland' ) @endphp</span>
                                    <a target="_blank" href="http://www.google.com/maps/place/{{ get_field("location")['lat'] . "," . get_field("location")['lng'] }}" class="happening-info__a inline-block">
                                        <svg class="icon happening-info__icon">
                                            <use xlink:href="#pin-icon"/>
                                        </svg>
                                        @php _e( 'Hitta hit', 'visithalland' ) @endphp
                                    </a>
                                </section>
                                <section class="happening-info__section col col-12 sm-col-4">
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
            @include('partials.share')
            @include('partials.components.next-article')
        </article>
        @endwhile
    </div>
    
@include('partials.infinite-scroll')
@endsection
