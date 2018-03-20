@extends('layouts.app')

@section('content')
@php while( have_posts() ) : the_post();
    $thumbnail_id = get_post_thumbnail_id();
    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
    $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
@endphp

<div id="infinite-container">
	<article class="container beach-coast" role="main" id="main-content">
	    <section class="meet-a-local-header">
	        <div class="meet-a-local-header__img-container topographic-pattern">
	        	<picture>
	            	<source media="(min-width: 40em)" data-srcset="{{ get_the_post_thumbnail_url( $post_id, 'vh_hero_wide' ) . " 1x," . get_the_post_thumbnail_url( $post_id, 'vh_hero_wide@2x' ) . " 2x" }}" />
	                <source data-srcset="{{ get_the_post_thumbnail_url( $post_id, 'vh_hero_tall' ) . " 1x," . get_the_post_thumbnail_url( $post_id, 'vh_hero_tall@2x' ) . " 2x" }}" />
	                 <img class="meet-a-local-header__img lazyload"
                        data-src="{{ get_the_post_thumbnail_url( $post_id, 'vh_hero_wide' ) }}"
                        alt="{{ $alt }}"
                    />
	            </picture>
	            @if($thumbnail_image[0]->post_content)
	            <figcaption class="image-credit--large absolute bottom-0 right-0 mr3 mb5 z4">
                    <svg class="icon image-credit--large__icon">
                        <use xlink:href="#camera-icon"/>
                    </svg>
                    <span class="image-credit--large__author">{{ $thumbnail_image[0]->post_content }}</span>
                </figcaption>
                @endif
	        </div>
	        <div class="meet-a-local-header__inner col-12 md-col-10 lg-col-8 mx-auto">
	            <div class="meet-a-local-header__content center">
	                <div class="article-tag">
	                    <div class="article-tag__icon-wrapper">
	                        <div class="article-tag__icon"></div>
	                    </div><span class="article-tag__type">Editorial</span></div>
	                <h1 class="meet-a-local-header__title h1 mb3 center mt2">{{ the_title() }}</h1>
                    <p class="meet-a-local-header__preamble center">{{ the_field("excerpt") }}</p>

                    @include('partials.author')

	            </div>
	        </div>
    	</section>
    	<div class="article-content clearfix">
	        <div class="col-11 md-col-10 lg-col-8 mx-auto">
	            <article class="article-body">
	            	{{ the_content() }}
	            </article>
	        </div>
    	</div>
    	<div class="slider-button-container relative mt4 z4 py3 col-11 md-col-10 lg-col-10 mx-auto"">
			<button class="slider-button tip-carousel--previous">
				<svg class="icon slider-button__icon">
                    <use xlink:href="#arrow-left-icon"/>
                </svg>
			</button>
			<button class="slider-button tip-carousel--next">
				<svg class="icon slider-button__icon">
                    <use xlink:href="#arrow-right-icon"/>
                </svg>
			</button>
        </div>
            @include('partials.tip-carousel')
            @include('partials.share')
	</article>
	@endwhile
</div>


@include('partials.infinite-scroll')
@endsection
