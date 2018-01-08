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

    <header role="banner" class="header col-12 sm-col-11 lg-col-10 mx-auto open">
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
                    <div class="nav__item <?php echo get_post(get_post_meta( $value->ID, '_menu_item_object_id', true ))->post_name ?>">
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
    </header>