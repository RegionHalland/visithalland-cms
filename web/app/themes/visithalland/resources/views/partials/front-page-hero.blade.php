<div class="landing-header relative">
    <div class="landing-header__img-container">
        <span class="landing-header__logo center">
            <img class="landing-header__logo" src="@asset('images/landing-logo.svg')">
        </span>
        <picture>
            <source media="(min-width: 60em)" data-srcset="{{ get_the_post_thumbnail_url($post, 'vh_hero_wide') . " 1x," . get_the_post_thumbnail_url($post, 'vh_hero_wide@2x' ) . " 2x"  }}" />
            <source data-srcset="{{ get_the_post_thumbnail_url($post, 'vh_hero_tall') . " 1x," . get_the_post_thumbnail_url($post, 'vh_hero_tall@2x') . " 2x"  }}" />
            <img class="landing-header__img lazyload"
                data-src="{{ get_the_post_thumbnail_url($post, 'vh_hero_wide') }}"
                alt="{{ get_field("cover_image", $post->ID)["alt"] }}" />
        </picture>
    </div>
</div>