<!DOCTYPE html>
<html>
<head>
	<title><?php echo wp_get_document_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KC8VK82');</script>
    <!-- End Google Tag Manager -->
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KC8VK82"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header class="header">

        <!--- Header Inner Start -->
        <!-- The inner element is used to restrict width on larger screens -->
        <div class="header__inner col-12 sm-col-12 md-col-11 lg-col-10">

            <!--- Top Header Start -->
            <a class="skip-to-content topographic-pattern" href="#main-content">
                <span class="skip-to-content__label"><?php _e( 'Hoppa till innehåll', 'visithalland' ); ?></span>
            </a>
            
            <section class="header__top-section topographic-pattern flex justify-between relative z2">
                <div class="header__left flex items-center">
                    <button class="icon-button menu-button">
                        <svg class="icon icon-button__icon">
                            <use xlink:href="#menu-icon"/>
                        </svg>
                    </button>
                    <div class="header__support-links">
                        <?php
                            $langs = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
                            $langMenuCode = ICL_LANGUAGE_CODE != "sv" ? "-" . ICL_LANGUAGE_CODE : "";
                            $menuItems = wp_get_nav_menu_items("sekundar-meny" . $langMenuCode);

                            //Language switcher
                            foreach ($langs as $key => $val) : ?>
                                <?php if (!$val["active"]) : ?>
                                <a href="<?php echo $val["url"] ?>" class="header__support-link">
                                    <span><?php echo $val["native_name"] ?></span>
                                </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php 
                            foreach ($menuItems as $key => $value) : ?>
                                <a href="<?php echo $value->url ?>" class="header__support-link">
                                    <span><?php echo $value->title ?></span>
                                </a>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="header__middle">
                    <?php $my_home_url = apply_filters( 'wpml_home_url', get_option( 'home' ) ); ?>
                    <a href="<?php echo $my_home_url; ?>" class="link-reset">
                        <picture>
                            <source 
                                media="(min-width: 60em)"
                                srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/logo-horizontal.svg"/>
                            <source 
                                media="(min-width: 40em)"
                                srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/logo-vertical.svg"/>
                            <img 
                                class="header__logo center" 
                                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/logo-small.svg"  
                                alt="Visithalland.com" />
                        </picture>
                    </a>
                </div>
                <div class="header__right flex items-center justify-end">
                    <button class="icon-button search-button mr2">
                        <svg class="icon icon-button__icon">
                            <use xlink:href="#search-icon"/>
                        </svg>
                    </button>
                    <div class="header__happenings">
                        <?php $happenings = vh_get_happenings(3);
                           if (count($happenings) > 0)  : ?>
                            <button class="happenings__dropdown-button has-happenings icon-button">
                                <svg class="icon icon-button__icon">
                                    <use xlink:href="#calendar-icon"/>
                                </svg>
                            </button>

                            <div class="happenings__dropdown">
                                <div class="happenings__dropdown-inner p3">
                                   <?php foreach ($happenings as $index => $value) : ?>
                                        <article class="happening-list-item mb3 <?php echo get_term_for_default_lang(get_the_terms($value, "taxonomy_concept")[0], "taxonomy_concept")->slug ?>">
                                            <a href="<?php echo get_permalink($value->ID) ?>" class="link-reset">
                                                <div class="clearfix">
                                                    <div class="col col-5 sm-col-4 ">
                                                        <div class="happening-list-item__img-container topographic-pattern relative">
                                                            <picture>
                                                                <source
                                                                    data-srcset="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_thumbnail' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_thumbnail@2x' ) . " 2x" ?>" />
                                                                <img class="happening-list-item__img lazyload"
                                                                    data-src="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_thumbnail' ); ?>" 
                                                                    alt="<?php echo get_field("cover_image")["alt"] ?>"  
                                                                />
                                                            </picture>
                                                        </div>
                                                    </div>
                                                    <div class="happening-list-item__date">
                                                        <div class="date-badge">
                                                            <span class="date-badge__day"><?php echo $dateobj = date("j", strtotime(get_field("start_date", $value->ID))); ?></span>
                                                            <span class="date-badge__month"><?php echo $dateobj = date("M", strtotime(get_field("start_date", $value->ID))); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="happening-list-item__content col col-7 sm-col-8">
                                                        <span class="happening-list-item__title"><?php echo $value->post_title ?></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </article>
                                    <?php endforeach ?>

                                        <a href="<?php echo get_permalink( apply_filters( 'wpml_object_id', get_page_by_path("happenings")->ID, 'page' ) ); ?>" class="btn btn--primary block coastal-living center">
                                            <?php _e( 'Visa fler', 'visithalland' ); ?>
                                        </a>
                                </div>
                                <?php ?>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </section>

            <section class="header-search topographic-pattern flex justify-between relative z2" aria-expanded="false">
                <?php 
                    //Display search form
                    get_search_form() 
                ?>
            </section>
            <!--- Top Header End -->

            <!--- Navigation Start -->
            <nav class="navigation center topographic-pattern">
                <div class="navigation__inner">
                    <?php
                        $langMenuCode = ICL_LANGUAGE_CODE != "sv" ? "-" . ICL_LANGUAGE_CODE : "";
                        $mainMenuItems = wp_get_nav_menu_items("huvudmeny" . $langMenuCode);
                        foreach ($mainMenuItems as $key => $value) : ?>
                            <div class="navigation__item <?php echo vh_get_taxonomyslug_by_string($value->post_name) ?>">
                                <a href="<?php echo $value->url ?>" class="navigation__link link-reset <?php echo array_walk($value->classes, create_function('$a', 'echo $a . " ";')); ?>">
                                    <div class="navigation__icon-wrapper">
                                        <div class="navigation__icon"></div>
                                    </div>
                                    <span><?php echo $value->title ?></span>
                                </a>
                            </div>
                    <?php endforeach ?>
                </div>
            </nav>
            <!--- Navigation End -->
            
            <!--- Mobile Navigation Start -->
            <nav class="mobile-navigation topographic-pattern">
                <div class="mobile-navigation__inner p2">
                    <h5 class="mobile-navigation__header light"><?php _e( 'Upplevelser', 'visithalland' ); ?></h5>

                    <?php
                        foreach ($mainMenuItems as $key => $value) : ?>
                            <div class="mobile-navigation__item <?php echo vh_get_taxonomyslug_by_string($value->post_name) ?>">
                                <a href="<?php echo $value->url ?>" class="mobile-navigation__link link-reset <?php echo array_walk($value->classes, create_function('$a', 'echo $a . " ";')); ?>">
                                    <div class="mobile-navigation__icon-wrapper">
                                        <div class="mobile-navigation__icon"></div>
                                    </div>
                                    <span><?php echo $value->title ?></span>
                                </a>
                            </div>
                    <?php endforeach ?>
                    <div class="mobile-navigation__support mt4">
                        <h5 class="mobile-navigation__header light"><?php _e( 'Fler länkar', 'visithalland' ); ?></h5>
                        <?php
                            foreach ($langs as $k => $val) : ?>
                                <?php if (!$val["active"]) : ?>
                                <a href="<?php echo $val["url"] ?>" class="mobile-navigation__support-link my2 block">
                                    <span><?php echo $val["native_name"] ?></span>
                                </a>
                                <?php endif; ?>
                            <?php endforeach;

                            foreach ($menuItems as $key => $value) : ?>
                                <a href="<?php echo $value->url ?>" class="mobile-navigation__support-link my2 block">
                                    <span><?php echo $value->title ?></span>
                                </a>
                        <?php endforeach ?>
                    </div>
                </div>
            </nav>
            <!--- Mobile Navigation End -->

        </div>
        <!-- Header Inner End -->


    </header>

    <!-- Body tag continues -->