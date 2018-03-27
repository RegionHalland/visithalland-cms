<div class="campaign-header relative">
    <div class="campaign-header__img-container">
        <span class="campaign-header__content col-11 md-col-10 lg-col-10 mx-auto">
            <h1 class="campaign-header__title">{{ get_field('campaign_title') }}</h1>
            <p class="campaign-header__excerpt">{{ get_field('campaign_excerpt') }}</p>
            @if(get_field('external_link'))
                <a class="btn btn--primary inline-block mt3 mr2" href="{{ get_field('external_link') }}">Gå till webbplats</a>
            @endif
            @if(get_field('internal_link'))
                <a class="btn inline-block mt3" href="{{ get_field('internal_link') }}">Läs mer</a>
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
    <div class="landing-eu clearfix z3">
        <div class="col-11 md-col-10 lg-col-10 mx-auto">
            <div class="landing-eu__inner clearfix">
                <div class="col col-5 sm-col-3 md-col-2 my2 px3">
                    <a href="https://tillvaxtverket.se/om-tillvaxtverket/organisation/logotyper/logotyp-for-eu-finansierat-stod.html">
                        <img src="@asset('images/eu-logo.svg')" />
                    </a>
                </div>
                <div class="col col-12 sm-col-9 md-col-7 my2 px3">
                    <p class="landing-eu__paragraph light mt0">
                        <?php 
                            echo get_field("eu_excerpt", apply_filters('wpml_object_id', get_page_by_path("destination-halland-2020")->ID, 'page'));
                        ?>
                   </p>
                </div>
            </div>
        </div>
    </div>
</div>