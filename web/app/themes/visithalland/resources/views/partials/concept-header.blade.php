<section class="concept-header relative overflow-hidden beach-coast" role="heading">
    <div class="concept-header__img-container topographic-pattern">
        <picture>
            <source media="(min-width: 60em)"
                data-srcset="{{ get_field("cover_image", $term)["sizes"]["vh_hero_wide"] . " 1x," . get_field("cover_image", $term)["sizes"]["vh_hero_wide@2x"] . " 2x" }}" />
            <source
                data-srcset="{{ get_field("cover_image", $term)["sizes"]["vh_hero_tall"] . " 1x," . get_field("cover_image", $term)["sizes"]["vh_hero_tall@2x"] . " 2x" }}" />
            <img class="concept-header__img lazyload" data-src="{{ get_field("cover_image", $term)["sizes"]["vh_hero_wide"] }}"
                alt="{{ get_field("cover_image", $term)["alt"] }}" />
        </picture>
    </div>
    <div class="concept-header__content clearfix col-11 sm-col-11 md-col-10 lg-col-10 absolute mx-auto bottom-0 left-0 right-0">
        <div class="col col-12 sm-col-7 md-col-10 lg-col-5">
            <h1 class="concept-header__title mt0 mb2 light">
                <div class="concept-header__icon mr3 inline-block"></div>
                <span>{{ $term->name }}</span>
            </h1>
        </div>
        <div class="col col-12 sm-col-7 md-col-6 lg-col-5">
            <p class="concept-header__intro light"><?php the_field("excerpt", $term); ?></p>
        </div>
    </div>
</section>
