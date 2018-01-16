<!DOCTYPE html>
<html>
<head>
	<title><?php echo wp_get_document_title(); ?></title>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/dist/css/main.min.css" />
    <link rel="stylesheet" href="https://use.typekit.net/vzi2bvt.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <?php wp_head(); ?>
</head>
<body>


    <header class="header col-12 sm-col-12 md-col-11 lg-col-10">
        <section class="header__top-section topographic-pattern flex justify-between relative z2">
            <div class="header__left flex items-center">
                <button class="icon-button menu-button">
                    <i class="icon-button__icon material-icons">menu</i>
                </button>
            </div>
            <div class="header__middle">
                <picture>
                    <source 
                        media="(min-width: 60em)"
                        data-srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/logo-horizontal.svg"/>
                    <img 
                        class="header__logo center" 
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/logo-small.svg"  
                        alt="Visithalland.com" />
                </picture>
            </div>
            <div class="header__right flex items-center justify-end">
                <div class="header__happenings">
                    <button class="happenings__dropdown-button icon-button mr1">
                        <i class="icon-button__icon material-icons">date_range</i>
                    </button>
                    <div class="happenings__dropdown">
                        <a href="">test</a>
                        <a href="">test</a>
                        
                    </div>
                </div>
                <button class="icon-button search-button">
                    <i class="icon-button__icon material-icons">search</i>
                </button>
            </div>
        </section>
        
        <div class="mobile-search">
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
        
        <nav class="mobile-navigation topographic-pattern">
            <div class="mobile-navigation__inner p2">
                <h5 class="mobile-navigation__header light">Vad intresserar dig?</h5>
                <?php
                    $menuItems = wp_get_nav_menu_items("huvudmeny");
                    foreach ($menuItems as $key => $value) : ?>
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
                    <?php $langs =  pll_the_languages(array('raw' => true)); ?>
                        <?php foreach ($langs as $key => $value) : ?>
                            <a href="<?php echo isset($value["url"]) ? $value["url"] : "#"; ?>" class="mobile-navigation__support-link my2 block" ><?php echo isset($value["name"]) ? $value["name"] : "" ?> </a>
                        <?php endforeach ?>
                </div>
            </div>
        </nav>

    </header>



    <!-- <header role="banner" class="header col-12 sm-col-11 lg-col-10 mx-auto open">
        <div class="header__inner relative">
            <section class="masthead topographic-pattern flex items-center justify-center">
                <div class="masthead__left">
                    <button class="icon-button nav-button button-reset" aria-expanded="true" aria-controls="global-nav" onClick="">
                        <span>
                            <i class="material-icons">menu</i>
                        </span>
                    </button>
                </div>

                <div class="masthead__logo-wrapper center">
                    <a href="/" class="link-reset"><img class="masthead__logo inline-block" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/logo.svg" /></a>
                </div>

                <div class="masthead__right flex justify-end">
                    <?php //TODO search ?>
                    <button class="icon-button nav-button button-reset" aria-expanded="true" aria-controls="global-nav">
                        <span>
                            <i class="material-icons">search</i>
                        </span>
                    </button>
                </div>
            </section>

            <nav class="nav topographic-pattern" id="global-nav" tabIndex="-1" aria-labelledby="Navigation" aria-describedby="Navigation för webbplatsen" aria-hidden="true">
                <?php
                $menuItems = wp_get_nav_menu_items("huvudmeny");
                foreach ($menuItems as $key => $value) : ?>
                    <div class="nav__item <?php echo $value->post_name ?>">
                        <a href="<?php echo $value->url ?>" class="nav__link link-reset <?php echo array_walk($value->classes, create_function('$a', 'echo $a . " ";')); ?>">
                            <div class="nav__icon-wrapper">
                                <div class="nav__icon"></div>
                            </div>
                            <span><?php echo $value->title ?></span>
                        </a>
                    </div>
                <?php endforeach ?>
            </nav>
        </div> 
    </header>-->