<div class="campaign relative">
    <div class="campaign__img-container">
        <div class="campaign__content container w-11/12  md:w-10/12  lg:w-10/12  mx-auto">
            <h1 class="campaign__title">{{ get_field('campaign_title') }}</h1>
            <p class="campaign__excerpt">{{ get_field('campaign_excerpt') }}</p>
            <div class="campaign__buttons flex items-center mt-3 mb-2">
                @if(get_field('external_link'))
                    <a class="btn btn--primary inline-block mr-3" href="{{ get_field('external_link') }}">@php _e( 'Gå till webbplats', 'visithalland' ) @endphp</a>
                @endif
                @if(get_field('internal_link'))
                    <a class="inline-block vertical-middle" href="{{ get_field('internal_link') }}">
                        <div class="read-more">
                            <span class="read-more__text light">
                                @php _e( 'Läs mer', 'visithalland' ) @endphp
                            </span>
                            <div class="read-more__button visithalland">
                                <svg class="icon read-more__icon">
                                    <use xlink:href="#arrow-right-icon"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                @endif
            </div>
        </div>
        <picture>
            <source media="(min-width: 60em)" data-srcset="{{ get_field('campaign_img')['sizes']['vh_hero_wide'] . " 1x," . get_field('campaign_img')['sizes']['vh_hero_wide@2x'] . " 2x"  }}" />
            <source data-srcset="{{ get_field('campaign_img')['sizes']['vh_hero_tall'] . " 1x," . get_field('campaign_img')['sizes']['vh_hero_tall@2x'] . " 2x"  }}" />
            <img class="concept-header__img lazyload"
                data-src="{{ get_field('campaign_img')['sizes']['vh_hero_wide']}}"
                alt="{{ get_field('campaign_img')["alt"] }}" />
        </picture>
    </div>
</div>
