@extends('layouts.app')

@section('content')
    @php while ( have_posts() ) : the_post(); @endphp
    @php
        $author_id = get_the_author_meta('ID');
        $post_id = get_the_id();
        $currentTerm = count(get_the_terms($post, "taxonomy_concept")) ? get_the_terms($post, "taxonomy_concept")[0] : "";

        $thumbnail_id = get_post_thumbnail_id();
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
        $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
    @endphp

   <section class="place-header relative clearfix beach-coast" role="heading" id="page-content">
        <div class="place-header__backdrop topographic-pattern"></div>
        <div class="place-header__inner col-11 md-col-10 lg-col-8 mx-auto">
            <div class="place-header__img-container topographic-pattern">
                <picture>
                    <source media="(min-width: 40em)"
                        data-srcset="{{ get_the_post_thumbnail_url( $post->ID, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( $post->ID, 'vh_large@2x' ) . " 2x" }}" />
                    <source
                        data-srcset="{{ get_the_post_thumbnail_url( $post->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $post->ID, 'vh_medium@2x' ) . " 2x" }}" />
                    <img class="happening-header__img lazyload"
                        data-src="{{ get_the_post_thumbnail_url( $post->ID, 'vh_large' ) }}"
                        alt="{{ $alt }}"
                    />
                </picture>
                @if ($thumbnail_image[0]->post_content)
                <figcaption class="image-credit--large absolute top-0 right-0 mr2 mt2 z4">
                    <svg class="icon image-credit--large__icon">
                        <use xlink:href="#camera-icon"/>
                    </svg>
                    <span class="image-credit--large__author">{{ $thumbnail_image[0]->post_content }}</span>
                </figcaption>
                @endif
            </div>
            <div class="clearfix">
                <div class="place-header__content col col-12 md-col-7">
                    <div class="article-tag">
                        <div class="article-tag__icon-wrapper">
                            <div class="article-tag__icon"></div>
                        </div>
                        <span class="article-tag__type">
                            Editorial
                            <?php // echo vh_get_pretty_post_type_name($post->post_type) ?>
                        </span>
                    </div>
                    <h1 class="place-header__title h1 mb3 mt2">{!! get_the_title() !!}</h1>
                    <div class="place-header__details">
                        {!! the_content() !!}
                    </div>
                </div>

                @include('partials.business-details')

            </div>
        </div>
    </section>

        @include('partials.share')

        @include('partials.recommended-articles')

    </article>
    @endwhile
@endsection
