@extends('layouts.app')

@section('content')
@php while( have_posts() ) : the_post();
    $thumbnail_id = get_post_thumbnail_id();
    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
    $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
@endphp

<div id="infinite-container">
    <article class="container beach-coast" role="main" id="main-content">
        <section class="editorial-header relative clearfix" role="heading" id="page-content">
            <div class="editorial-header__backdrop topographic-pattern"></div>
            <div class="editorial-header__inner col-11 md-col-10 lg-col-8 mx-auto">
                <div class="editorial-header__img-container topographic-pattern">
                    <picture>
                        <source media="(min-width: 40em)"
                            data-srcset="{{ get_the_post_thumbnail_url( $post->ID, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( $post->ID, 'vh_large@2x' ) . " 2x" }}" />
                        <source
                            data-srcset="{{ get_the_post_thumbnail_url( $post->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $post->ID, 'vh_medium@2x' ) . " 2x" }}" />
                        <img class="editorial-header__img lazyload"
                            data-src="{{ get_the_post_thumbnail_url( $post->ID, 'vh_large' ) }}"
                            alt="{{ $alt }}"
                        />
                    </picture>
                    @if(isset($thumbnail_image) && is_array($thumbnail_image) && $thumbnail_image[0]->post_content)
                        <figcaption class="image-cr?edit--large absolute top-0 right-0 mr2 mt2 z4">
                            <svg class="icon image-credit--large__icon">
                                <use xlink:href="#camera-icon"/>
                            </svg>
                            <span class="image-credit--large__author">{{ $thumbnail_image[0]->post_content }}</span>
                        </figcaption>
                    @endif
                </div>
                <div class="editorial-header__content center">
                    <div class="article-tag">
                        <div class="article-tag__icon-wrapper">
                            <div class="article-tag__icon"></div>
                        </div>
                        <span class="article-tag__type">
                            Editorial
                            <?php // echo vh_get_pretty_post_type_name($post->post_type) ?>
                        </span>
                    </div>
                    <h1 class="editorial-header__title h1 mb3 center mt2">{{ the_title() }}</h1>
                    <p class="editorial-header__preamble center">{{ get_field("excerpt") }}</p>

                    @include('partials.author')

                </div>
            </div>
        </section>
        <div class="article-content clearfix">
            <div class="col-11 md-col-10 lg-col-8 mx-auto">
                <article class="article-body">
                    {{ the_content() }}
                </article>

                @include('partials.mentions')
            </div>
        </div>
        @include('partials.share')
    </article>
    @endwhile
</div>

@include('partials.infinite-scroll')
@endsection
