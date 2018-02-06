
<!-- Footer Start -->

<footer class="footer topographic-pattern">
    <div class="footer__content relative col-11 md-col-10 lg-col-10 mx-auto">
        <div class="clearfix">
            
            <!-- Footer Site Info Start -->
            <div class="footer__column col sm-col-6 col-12 md-col-5">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/logo.svg" />
                <p class="footer__intro mt1">En reseguide som hjälper dig att hitta till det bästa i Halland. Visithalland.com utvecklas och drivs av Region Halland.</p>
            </div>
            <!-- Footer Site Info End -->


            <!-- Footer Navigation Start -->
            <div class="footer__column col sm-col-7 col-12 md-col-3 mt2">
                <span class="footer__column-header"><?php _e( 'Upplevelser', 'visithalland' ); ?></span>
                <nav class="footer__list footer-nav">
                    <?php
                    $langMenuCode = ICL_LANGUAGE_CODE != "sv" ? "-" . ICL_LANGUAGE_CODE : "";
                    $mainMenuItems = wp_get_nav_menu_items("huvudmeny" . $langMenuCode);
                    foreach ($mainMenuItems as $key => $value): 
                        $term_id = get_post_meta($value->ID, '_menu_item_object_id', true);
                        $current_term = get_term($term_id); ?>
                    <div class="footer-nav__item footer__nav-item <?php echo vh_get_taxonomyslug_by_string($value->post_name) ?>">
                        <a href="<?php echo $value->url ?>" class="footer-nav__link link-reset <?php echo array_walk($value->classes, create_function('$a', 'echo $a . " ";')); ?>">
                            <div class="footer-nav__icon-wrapper">
                                <div class="footer-nav__icon"></div>
                            </div>
                            <span><?php echo $value->title ?></span>
                        </a>
                    </div>
                    <?php endforeach ?>
                    </nav>
            </div>
            <!-- Footer Navigation End -->


            <!-- Footer Secondary Menu, Partner Menu and Language Settings Start -->
            <div class="col col-12 sm-col-12 md-col-4">
                <div class="clearfix">
                    <div class="footer__column  col col-12 sm-col-4 md-col-12 mt2">
                        <span class="footer__column-header"><?php _e( 'Fler alternativ', 'visithalland' ); ?></span>
                        <ul class="footer__list">
                            <?php
                                $langs = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
                                $langMenuCode = ICL_LANGUAGE_CODE != "sv" ? "-" . ICL_LANGUAGE_CODE : "";
                                $menuItems = wp_get_nav_menu_items("sekundar-meny" . $langMenuCode);

                                //Language switcher
                                foreach ($langs as $key => $val) : ?>
                                <?php if (!$val["active"]) : ?>
                                    <li class="footer__list-item mt1 light">
                                        <a href="<?php echo $val["url"] ?>" class="footer__link link-reset"">
                                            <span><?php echo $val["native_name"] ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php endforeach; ?>

                                <?php 
                                foreach ($menuItems as $key => $value) : ?>
                                    <li class="footer__list-item mt1 light">
                                        <a href="<?php echo $value->url ?>" class="footer__link link-reset"">
                                            <span><?php echo $value->title ?></span>
                                        </a>
                                    </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="footer__column col col-12 sm-col-4 md-col-12 mt2">
                        <span class="footer__column-header"><?php _e( 'Partners', 'visithalland' ); ?></span>
                        <ul class="footer__list">
                            <li class="footer__list-item mt1 light">
                                <a href="https://www.tripadvisor.se/Tourism-g189887-Halland_County_West_Coast-Vacations.html" class="footer__link link-reset">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/tripadvisor-logo.svg" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Footer Secondary Menu, Partner Menu and Language Settings End -->


            <!-- Footer European Union Credit Start -->
            <div class="footer__eu col col-12">
                <div class="clearfix">
                    <div class="col col-5 sm-col-3 md-col-2 footer__left mt2">
                        <a href="https://tillvaxtverket.se/om-tillvaxtverket/organisation/logotyper/logotyp-for-eu-finansierat-stod.html">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/eu-logo.svg" />
                        </a>
                    </div>
                    <div class="col col-12 sm-col-9 md-col-6 footer__right mt2">
                        <p class="light footer__eu-paragraph mt0">
                            <!-- This needs to be dynamic -->
                            VisitHalland.com är del av EU-projektet Destination Halland 2020. Projektet finansieras via Europeiska regionala utvecklingsfonden.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Footer European Union Credit End -->


        </div>
    </div>

    <!-- Cookie Banner Start -->
    <?php if(!isset($_COOKIE["comply_cookie"])) { ?>
        <div class="cookie-banner col-12">
            <div class="cookie-banner__inner col-12 sm-col-6 md-col-4" tabindex="1">
                <span class="cookie-banner__policy">
                    <?php echo get_field("cookie_accept_message", apply_filters( 'wpml_object_id', get_page_by_path("kakor")->ID, 'page' )); ?>
                    <a href="<?php echo get_permalink( apply_filters( 'wpml_object_id', get_page_by_path("kakor")->ID, 'page' ) ); ?>" class="cookie-banner__link">
                        <?php _e( 'Se användningsvillkor', 'visithalland' ); ?>
                    </a>
                </span>

                <button class="cookie-banner__button icon-button" id="cookie-accept" title="<?php _e( 'Stäng', 'visithalland' ); ?>" tabindex="2">
                    <svg class="icon icon-button__icon">
                        <use xlink:href="#close-icon"/>
                    </svg>
                </button>
            </div>
        </div>
    <?php } ?>
    <!-- Cookie Banner End -->

</footer>

<!-- Footer End -->
<?php wp_footer(); ?>


</body>
</html>