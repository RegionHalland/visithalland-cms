<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/styles.css" />
    <link rel="stylesheet" href="https://use.typekit.net/vzi2bvt.css" />
            
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
</head>
<body>

    <header role="banner" class="header open">
        <div class="header__inner relative">
            <section class="masthead topographic-pattern flex items-center justify-center">
                <div class="masthead__left">
                    <button class="icon-button nav-button button-reset" aria-expanded="true" aria-controls="global-nav" onClick={this.menuClick.bind(this)}>
                        <span>
                            <i><?php echo get_stylesheet_directory_uri(); ?>/assets/icons/menu-icon.svg</i>
                        </span>
                    </button>
                </div>

                <div class="masthead__logo-wrapper center">
                    <a href="/" class="link-reset"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.svg" /></a>
                </div>

                <div class="masthead__right flex justify-end">
                    <button class="icon-button search-button button-reset active" aria-expanded="true" onClick={this.searchClick.bind(this)} aria-controls="global-search">
                        <span>
                            <i class="material-icons">{(this.props.showSearch ? "close" : "search")}</i>
                        </span>
                    </button>
                    <HeaderSearch showSearch={this.props.showSearch} />
                </div>
            </section>


            <nav class="nav topographic-pattern active" id="global-nav" tabIndex="-1" aria-labelledby="Navigation" aria-describedby="Navigation för webbplatsen" aria-hidden="true">
                <?php
                $menuItems = wp_get_nav_menu_items("huvudmeny");
                foreach ($menuItems as $key => $value): ?>
                    <div class="nav__item spa-wellness">
                        <a href="<?php echo $value->url ?>">
                            <div class="nav__icon-wrapper">
                                <div class="nav__icon"></div>
                            </div>
                            <span><?php echo $value->title ?></span>
                        </a>
                    </div>
                <?php endforeach ?>
            </nav>

            <HeaderNavigation menuItems={this.props.menuItems} showMenu={this.props.showMenu} breadcrumbs={this.props.breadcrumbs} />
            
            <div class={!this.props.loading ? "progress-bar topographic-pattern progress-bar--hide" : "topographic-pattern progress-bar"}>
                <div class="progress-bar__spinner">
                    <div class="progress-bar__spinner-icon"></div>
                </div>
            </div>
        </div> 
    </header>