<!DOCTYPE html>
<html>
<head>
	<title><?php echo wp_get_document_title(); ?></title>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/dist/css/main.min.css" />
    <link rel="stylesheet" href="https://use.typekit.net/vzi2bvt.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
</head>
<body>

    <header role="banner" class="header open">
        <div class="header__inner relative">
            <section class="masthead topographic-pattern flex items-center justify-center">
                <div class="masthead__left">
                    <button class="icon-button nav-button button-reset" aria-expanded="true" aria-controls="global-nav" onClick="TODO">
                        <span>
                            <i><?php echo get_stylesheet_directory_uri(); ?>/assets/icons/menu-icon.svg</i>
                        </span>
                    </button>
                </div>

                <div class="masthead__logo-wrapper center">
                    <a href="/" class="link-reset"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/logo.svg" /></a>
                </div>

                <div class="masthead__right flex justify-end">
                    <button class="icon-button search-button button-reset active" aria-expanded="true" onClick="TODO" aria-controls="global-search">
                        <span>
                            <i class="material-icons">TODO {(this.props.showSearch ? "close" : "search")}</i>
                        </span>
                    </button>
                    <?php //TODO search ?>

                    
                    <div class="search-result list-style-none clearfix + (taxonomy_slug ? taxonomy_slug  : "finns ej")}">
                        <div class="col col-4">
                            <div class="search-result__img-container">
                                <picture>
                                    <source
                                      srcSet={suggestion.cover_image + " 1x," + suggestion.cover_image_2x + " 2x"} />
                                    <img class="search-result__img" src={suggestion.cover_image_2x} alt={suggestion.cover_image_alt} />
                                </picture>
                            </div>
                        </div>
                        <div class="search-result__content col col-8">
                            <ArticleTag 
                                articleType={suggestion.post_type ? suggestion.post_type : ""}
                                classes={'inline-block'}
                            />
                            <h4 class="search-result__title" dangerouslySetInnerHTML={{__html: suggestion._highlightResult.post_title.value ? suggestion._highlightResult.post_title.value : ""}}></h4>
                        </div>
                    </div>


                </div>
            </section>

            <nav class="nav topographic-pattern active" id="global-nav" tabIndex="-1" aria-labelledby="Navigation" aria-describedby="Navigation för webbplatsen" aria-hidden="true">
                <?php
                $menuItems = wp_get_nav_menu_items("huvudmeny");
                foreach ($menuItems as $key => $value): ?>
                <?php //var_dump($value) ?>
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