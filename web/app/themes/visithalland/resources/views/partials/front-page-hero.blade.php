@php
    while ( have_posts() ) : the_post();
    $thumbnail_id = get_post_thumbnail_id();
    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
@endphp
    <div class="front-page-header relative">
        <div class="front-page-header__img-container">
            <img class="front-page-header__logo" src="@asset('images/landing-logo.svg')">
            <picture>
                <source media="(min-width: 60em)" data-srcset="{{ get_the_post_thumbnail_url($post, 'vh_hero_wide') . " 1x," . get_the_post_thumbnail_url($post, 'vh_hero_wide@2x' ) . " 2x"  }}" />
                <source data-srcset="{{ get_the_post_thumbnail_url($post, 'vh_hero_tall') . " 1x," . get_the_post_thumbnail_url($post, 'vh_hero_tall@2x') . " 2x"  }}" />
                <img class="front-page-header__img lazyload"
                    data-src="{{ get_the_post_thumbnail_url($post, 'vh_hero_wide') }}"
                    alt="{{ $alt }}" />
            </picture>
        </div>
    </div>
 @endwhile