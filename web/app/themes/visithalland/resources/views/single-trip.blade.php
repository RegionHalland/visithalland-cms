@extends('layouts.app')

@section('content')
    <?php while ( have_posts() ) : the_post();
        $post->ID = get_the_id();
        $thumbnail_id = get_post_thumbnail_id();
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
        $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
    ?>
    <div id="infinite-container">
        <article class="container beach-coast" role="main" id="main-content">
            <section class="spotlight-header">
                <div class="spotlight-header__img-container">
                    <picture>
                        <source media="(min-width: 40em)" data-srcset="{{ get_the_post_thumbnail_url( $post->ID, 'vh_hero_wide' ) . " 1x," . get_the_post_thumbnail_url( $post->ID, 'vh_hero_wide@2x' ) . " 2x" }} />
                        <source data-srcset="{{ get_the_post_thumbnail_url( $post->ID, 'vh_hero_tall' ) . " 1x," . get_the_post_thumbnail_url( $post->ID, 'vh_hero_tall@2x' ) . " 2x" }} />
                        <img class="spotlight-header__img lazyload"
                                data-src="{{ get_the_post_thumbnail_url( $post->ID, 'vh_hero_wide' ) }}"
                                alt="{{ $alt }}"
                        />
                    </picture>
                    <div class="spotlight-header__scrim absolute z1 left-0 bottom-0 right-0"></div>
                    <div class="spotlight-header__content z2 relative center">
                        <div class="clearfix">
                            <div class="col-12 sm-col-10 md-col-8 lg-col-6 mx-auto">
                                <div class="spotlight-header__icon mx-auto"></div>
                                <h1 class="spotlight-header__title center light"><?php the_title(); ?></h1>
                                <div class="spotlight-header__paragraph light mt2">
                                    <p>{{ get_field('excerpt') }}</p>
                                </div>
                                @if($thumbnail_image[0]->post_content)
                                <figcaption class="image-credit--large mt2">
                                    <svg class="icon image-credit--large__icon">
                                        <use xlink:href="#camera-icon"/>
                                    </svg>
                                    <span class="image-credit--large__author">{{ $thumbnail_image[0]->post_content }}</span>
                                </figcaption>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="spotlight-content col-11 md-col-10 lg-col-9 mx-auto">
                <div class="clearfix spotlight-grid">
                    @php
                        $spotlights = get_field("stops");
                    @endphp
                    @foreach ($spotlights as $index => $value)
                        @if(($index + 1) % 3 === 0)
                            <div class="spotlight-grid-item col col-12">
                                <div class="spotlight-large clearfix">
                                    <div class="spotlight-large__img-container topographic-pattern">
                                        @php
                                            $thumbnail_id = get_post_thumbnail_id( $value->ID );
                                            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                                        @endphp
                                        <picture>
                                            <source media="(min-width: 40em)" data-srcset="{{ get_the_post_thumbnail_url( $value->ID, 'vh_hero_wide' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_hero_wide@2x' ) . " 2x" }} />
                                            <source data-srcset="{{ get_the_post_thumbnail_url( $value->ID, 'vh_hero_tall' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_hero_tall@2x' ) . " 2x" }} />
                                            <img class="spotlight-large__img lazyload"
                                                data-src="{{ get_the_post_thumbnail_url( $value->ID, 'vh_hero_wide' ) }}"
                                                alt="{{ $alt }}"
                                            />
                                        </picture>
                                    </div>
                                    <div class="spotlight-large__content col-12 lg-col-8 relative">
                                        <h2 class="spotlight-large__title mt2 p0 mb0">{{$value->post_title}}</h2>
                                        <div class="spotlight-large__excerpt mt1">
                                            <p>{{ get_field("excerpt", $value->ID) }}</p>
                                        </div>
                                        <div class="spotlight-large__links">
                                            <a class="link-reset" href="{{ get_permalink($value->ID) }}">
                                                <div class="read-more">
                                                <span class="read-more__text light">@php _e("se", "visithalland") @endphp  {{ $value->post_title }}</span>
                                                    <div class="read-more__button">
                                                        <svg class="icon read-more__icon">
                                                            <use xlink:href="#arrow-right-icon"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="spotlight-grid-item col col-12  sm-col-6">
                                <div class="spotlight-small">
                                    <div class="spotlight-small__img-container topographic-pattern">
                                        @php
                                            $thumbnail_id = get_post_thumbnail_id( $value->ID );
                                            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                                        @endphp
                                        <picture>
                                            <source
                                                data-srcset="{{ get_the_post_thumbnail_url( $value->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_medium@2x' ) . " 2x" }}" />

                                            <img class="spotlight-small__img lazyload"
                                                    data-src="{{ get_the_post_thumbnail_url( $value->ID, 'vh_medium' ) }}"
                                                    alt="{{ $alt }}"
                                            />

                                        </picture>
                                    </div>
                                    <div class="spotlight-small__content col-12 lg-col-12 relative">
                                        <h3 class="spotlight-small__title mb2 mt3 p0 mb0">
                                            @if (get_field("title", $value->ID) != '')
                                                {{ get_field("title", $value->ID) }}
                                            @else
                                                {{ $value->post_title }}
                                            @endif
                                        </h3>
                                        <div class="spotlight-small__excerpt mt1">
                                            <p>{{ get_field("excerpt", $value->ID) }}</p>
                                        </div>
                                        <div class="spotlight-small__links mt3">
                                            <a class="link-reset" href="{{ get_permalink($value->ID) }}">
                                                <div class="read-more">
                                                    <span class="read-more__text">@php _e( 'Se', 'visithalland' ); @endphp {{ $value->post_title }}</span>
                                                    <div class="read-more__button">
                                                        <svg class="icon read-more__icon">
                                                            <use xlink:href="#arrow-right-icon"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @include('partials.share')
            </article>
        @endwhile

    </div>
    @include('partials.infinite-scroll')
@endsection
