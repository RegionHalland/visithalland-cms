<div class="campaign-header relative">
    <div class="campaign-header__img-container">
        <span class="campaign-header__content col-11 md-col-10 lg-col-10 mx-auto">
            <h1 class="campaign-header__title">{{ get_field('campaign_title') }}</h1>
            <p class="campaign-header__excerpt">{{ get_field('campaign_excerpt') }}</p>
            @if(get_field('external_link'))
                <a class="btn btn--primary inline-block mt3 mr2" href="{{ get_field('external_link') }}">@php _e( 'Extern webbplats', 'visithalland' ) @endphp</a>
            @endif
            @if(get_field('internal_link'))
                <a class="inline-block mt3 mb2 vertical-middle" href="{{ get_field('internal_link') }}">
                    <div class="read-more">
                        <span class="read-more__text light">
                            @php _e( 'Läs mer', 'visithalland' ) @endphp
                        </span>
                        <div class="read-more__button coastal-living">
                            <svg class="icon read-more__icon">
                                <use xlink:href="#arrow-right-icon"/>
                            </svg>
                        </div>
                    </div>
                </a>
            @endif
        </span>
        <picture>
            <source media="(min-width: 60em)" data-srcset="{{ get_field('campaign_img')['sizes']['vh_hero_wide'] . " 1x," . get_field('campaign_img')['sizes']['vh_hero_wide@2x'] . " 2x"  }}" />
            <source data-srcset="{{ get_field('campaign_img')['sizes']['vh_hero_tall'] . " 1x," . get_field('campaign_img')['sizes']['vh_hero_tall@2x'] . " 2x"  }}" />
            <img class="concept-header__img lazyload"
                data-src="{{ get_the_post_thumbnail_url($post, 'vh_hero_wide') }}"
                alt="{{ get_field("cover_image", $post->ID)["alt"] }}" />
        </picture>
    </div>
</div>