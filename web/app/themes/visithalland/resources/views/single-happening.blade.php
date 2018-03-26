@extends('layouts.app')

@section('content')
@php while( have_posts() ) : the_post();
    $thumbnail_id = get_post_thumbnail_id();
    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
    $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
@endphp
<div id="infinite-container">
	<article class="container beach-coast" role="main" id="main-content">
        @include('partials.article-hero')
        <div class="clearfix mt4">
            <div class="col-11 md-col-10 lg-col-10 mx-auto clearfix">
                <div class="col col-12 sm-col-6 mt2">
                    <p class="preamble">{!! the_content() !!}
                </div>
                <aside class="col col-12 sm-col-6 mt3">
                    <div class="happening-info">
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
                                <a href="{{ get_field("external_links")[0]["link"] }}" class="happening-info__a inline-block">
                                    <svg class="icon happening-info__icon">
                                        <use xlink:href="#pin-icon"/>
                                    </svg>
                                    @php _e( 'Hitta hit', 'visithalland' ) @endphp
                                </a>
                            </section>
                            <section class="happening-info__section col col-12 sm-col-4">
                                <a href="{{ get_field("external_links")[0]["link"] }}" class="btn btn--primary inline-block">@php _e( 'Mer information', 'visithalland' ) @endphp</a>
                            </section>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
        @include('partials.share')
    </article>
    @endwhile
</div>

@include('partials.infinite-scroll')
@endsection
