<div class="landing-header relative">
    <div class="landing-header__img-container">
        <span class="landing-header__logo center">
            <img src="@asset('images/landing-logo.svg')">
        </span>
        <picture>
            <source media="(min-width: 60em)" data-srcset="{{ get_the_post_thumbnail_url($post, 'vh_hero_wide') . " 1x," . get_the_post_thumbnail_url($post, 'vh_hero_wide@2x' ) . " 2x"  }}" />
            <source data-srcset="{{ get_the_post_thumbnail_url($post, 'vh_hero_tall') . " 1x," . get_the_post_thumbnail_url($post, 'vh_hero_tall@2x') . " 2x"  }}" />
            <img class="concept-header__img lazyload"
                data-src="{{ get_the_post_thumbnail_url($post, 'vh_hero_wide') }}"
                alt="{{ get_field("cover_image", $post->ID)["alt"] }}" />
        </picture>
    </div>
    <div class="landing-eu clearfix z3">
        <div class="col-12 col-11 md-col-10 lg-col-10 mx-auto">
            <div class="landing-eu__inner clearfix">
                <div class="col col-5 sm-col-3 md-col-2 my2 px3">
                    <a href="https://tillvaxtverket.se/om-tillvaxtverket/organisation/logotyper/logotyp-for-eu-finansierat-stod.html">
                        <img src="@asset('images/eu-logo.svg')" />
                    </a>
                </div>
                <div class="col col-12 sm-col-9 md-col-6 my2 px3">
                    <p class="landing-eu__paragraph light mt0">
                        <?php 
                            echo get_field("eu_excerpt", apply_filters('wpml_object_id', get_page_by_path("destination-halland-2020")->ID, 'page'));
                        ?>
                   </p>
                </div>
                <div class="col col-12 sm-col-9 md-col-4 my2 px3">
                    <button class="btn btn--primary landing-eu__btn coastal-living block" id="eu-btn">
                        {{ _e( 'Okej!', 'visithalland' )}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>