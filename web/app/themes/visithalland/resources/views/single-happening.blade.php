@extends('layouts.app')

@section('content')
@php while( have_posts() ) : the_post();
    $thumbnail_id = get_post_thumbnail_id();
    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
    $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
@endphp
<div id="infinite-container">
	<article class="container beach-coast" role="main" id="main-content">
	    <section class="happening-header relative clearfix">
                <div class="happening-header__backdrop topographic-pattern"></div>
                <div class="happening-header__inner col-11 md-col-10 lg-col-8 mx-auto relative">
                    <div class="happening-header__img-container topographic-pattern">
                        <div class="happening-header__date">
	                         <div class="date-badge">
								    <span class="date-badge__day">{{ $dateobj = date("j", strtotime(get_field("start_date"))) }}</span>
								    <span class="date-badge__month">{{ $dateobj = date("M", strtotime(get_field("start_date"))) }}</span>
							  </div>
                        </div>
                        <picture>
                            <source media="(min-width: 40em)" data-srcset="{{ get_the_post_thumbnail_url( $post_id, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( $post_id, 'vh_large@2x' ) . " 2x" }}" />

		                    <source data-srcset="{{ get_the_post_thumbnail_url( $post_id, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $post_id, 'vh_medium@2x' ) . " 2x" }}" />

                            <img class="happening-header__img lazyload"
                                data-src="{{ get_the_post_thumbnail_url( $post_id, 'vh_large' ) }}"
                                alt="{{ $alt }}"
                            />
		                </picture>
                        <?php if($thumbnail_image[0]->post_content) : ?>
                        <figcaption class="image-credit--large absolute top-0 right-0 mr2 mt2 z3">
                            <svg class="icon image-credit--large__icon">
                                <use xlink:href="#camera-icon"/>
                            </svg>
                            <span class="image-credit--large__author">{{ $thumbnail_image[0]->post_content }}</span>
                        </figcaption>
                        @endif
                    </div>
                    <div class="clearfix">
                        <div class="happening-header__content col col-11 sm-col-6 ">
                            <div class="article-tag">
			                    <div class="article-tag__icon-wrapper">
			                        <div class="article-tag__icon"></div>
			                    </div>
			                    <span class="article-tag__type">
                                    Editorial
			                        <?php // echo vh_get_pretty_post_type_name($post->post_type) ?>
			                    </span>
			                </div>
                            <h1 class="happening-header__title h1 mb3  mt2">{!! the_title() !!}</h1>
                            <p class="happening-header__preamble">
                                {{ the_content() }}
                            </p>

                        </div>
                        <aside class="happening-info relative  z3 col col-11 sm-col-6" role="complementary">
                            <div class="happening-info__inner topographic-pattern">
                                <section class="happening-info__section">
                                    <h3 class="happening-info__section-label">@php _e( 'Datum', 'visithalland' ) @endphp</h3>
                                    <span class="happening-info__section-info light">
                                    	<span>{{ $dateobj = date("j", strtotime(get_field("start_date"))) }}</span>
								    	<span>{{ $dateobj = date("M", strtotime(get_field("start_date"))) }}</span>
								    </span>
                                </section>
                                <section class="happening-info__section">
                                    <h3 class="happening-info__section-label">@php _e( 'Gå till webbplats', 'visithalland' ) @endphp</h3>
                                    <a href="{{ get_field("external_links")[0]["link"] }}" class="btn btn--primary inline-block">@php _e( 'Mer information', 'visithalland' ) @endphp</a>
                                </section>
                            </div>
                        </aside>
                    </div>
                </div>
            </section>
            @include('partials.share')
    </article>
    @endwhile
</div>

@include('partials.infinite-scroll')
@endsection
