<!DOCTYPE html>
<html>
<head>
	<title><?php echo wp_get_document_title(); ?></title>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/dist/css/main.min.css" />
    <link rel="stylesheet" href="https://use.typekit.net/vzi2bvt.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fetches Material Icons - Will be removed -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />


    <?php wp_head(); ?>
</head>
<body>
    <header class="header">

        <!--- Header Inner Start -->
        <!-- Is used to restrict width on larger screens -->
        <div class="header__inner col-12 sm-col-12 md-col-11 lg-col-10">
            

            <!--- Top Header Start -->
            <a class="skip-to-content topographic-pattern" href="#main-content">
                <span class="skip-to-content__label">Skip to content</span>
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
                                <a href="<?php echo $val["url"] ?>" class="header__support-link">
                                    <span><?php echo $val["native_name"] ?></span>
                                </a>
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
                                data-srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/logo-horizontal.svg"/>
                            <source 
                                media="(min-width: 40em)"
                                data-srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/logo-vertical.svg"/>
                            <img 
                                class="header__logo center" 
                                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/logo-small.svg"  
                                alt="Visithalland.com" />
                        </picture>
                    </a>
                </div>
                <div class="header__right flex items-center justify-end">
                    <div class="header__happenings">
                        <button class="happenings__dropdown-button has-happenings icon-button mr2">
                            <svg class="icon icon-button__icon">
                                <use xlink:href="#calendar-icon"/>
                            </svg>
                        </button>
                        <div class="happenings__dropdown">
                            <div class="happenings__dropdown-inner p3">
                                <?php 
                                $happenings = vh_get_happenings(3);
                                foreach ($happenings as $index => $value) : ?>
                                    <article class="happening-list-item mb3 <?php echo $value->taxonomy["slug"]?>">
                                        <a href="<?php echo get_permalink($value->ID) ?>" class="link-reset">
                                            <div class="clearfix">
                                                <div class="col col-5 sm-col-4 ">
                                                    <div class="happening-list-item__img-container topographic-pattern relative">
                                                        <img class="happening-list-item__img" data-src="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_medium"] ?>" alt=<?php echo get_field("cover_image", $value->ID)["alt"] ?> />
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
                                <div class="btn btn--primary block coastal-living center">View all</div>
                            </div>
                        </div>
                    </div>
                    <div class="header__search">
                        <button class="icon-button search-button z3">
                            <svg class="icon icon-button__icon">
                                <use xlink:href="#search-icon"/>
                            </svg>
                        </button>
                        <button class="icon-button mobile-search-button z3">
                            <svg class="icon icon-button__icon">
                                <use xlink:href="#search-icon"/>
                            </svg>
                        </button>
                        <input class="search__input inline-block z1" type="search" placeholder="Skriv för att börja söka">
                        <div class="search__results">
                            
                        </div>
                    </div>
                </div>
            </section>
            <!--- Top Header End -->

            <!--- Navigation Start -->
            <nav class="navigation center topographic-pattern">
                <div class="navigation__inner">
                    <?php
                        $langMenuCode = ICL_LANGUAGE_CODE != "sv" ? "-" . ICL_LANGUAGE_CODE : "";
                        $mainMenuItems = wp_get_nav_menu_items("huvudmeny" . $langMenuCode);
                        foreach ($mainMenuItems as $key => $value) : ?>
                            <div class="navigation__item <?php echo $value->post_name ?>">
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
            

            <!--- Mobile Search Start -->
            <div class="mobile-search topographic-pattern">
                <div class="mobile-search__inner p2">
                    <input class="mobile-search__input inline-block" type="search" placeholder="Skriv för att börja söka">
                    <div class="mobile-search__suggestions">
                        <h5 class="mobile-search__header light">Populära sökningar:</h5>
                        <ul class="mobile-search__suggestions-list light">
                            <li class="mobile-search__suggestions-list-item mt2 light">
                                <i class="mobile-search__suggestions-list-icon material-icons">search</i><span>Hundvänliga badplatser</span></li>
                            <li class="mobile-search__suggestions-list-item mt2 light">
                                <i class="mobile-search__suggestions-list-icon material-icons">search</i><span>Fina downhill spår</span></li>
                            <li class="mobile-search__suggestions-list-item mt2 light">
                                <i class="mobile-search__suggestions-list-icon material-icons">search</i><span>Familjevänliga utflykter</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--- Mobile Search End -->
            
            <!--- Mobile Navigation Start -->
            <nav class="mobile-navigation topographic-pattern">
                <div class="mobile-navigation__inner p2">
                    <h5 class="mobile-navigation__header light">Vad intresserar dig?</h5>

                    <?php
                        foreach ($mainMenuItems as $key => $value) : ?>
                            <div class="mobile-navigation__item <?php echo $value->post_name ?>">
                                <a href="<?php echo get_permalink($value->ID) ?>" class="mobile-navigation__link link-reset <?php echo array_walk($value->classes, create_function('$a', 'echo $a . " ";')); ?>">
                                    <div class="mobile-navigation__icon-wrapper">
                                        <div class="mobile-navigation__icon"></div>
                                    </div>
                                    <span><?php echo $value->title ?></span>
                                </a>
                            </div>
                    <?php endforeach ?>
                    <div class="mobile-navigation__support mt4">
                        <h5 class="mobile-navigation__header light">Växla språk</h5>
                        <?php
                            foreach ($langs as $k => $val) : ?>
                               <a href="<?php echo $val["url"] ?>" class="mobile-navigation__support-link my2 block">
                                    <span><?php echo $val["native_name"] ?></span>
                                </a>
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