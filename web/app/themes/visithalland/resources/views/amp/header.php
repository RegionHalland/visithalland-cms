<!doctype html>
<html ⚡>
    <head>
    <meta charset="utf-8">
    <title><?php the_title() ?></title>

    <!-- <link rel="canonical" href="./regular-html-version.html"> -->
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

    <?php
        $path = explode("/", \App\asset_path('styles/amp.css'));
        $myString = $path[3] . "/" . $path[4] . "/" . $path[5] . "/" . $path[6] . "/" . $path[7] . "/" . $path[8];

        if (file_exists($myString)) {
            echo "<style amp-custom>" . file_get_contents(\App\asset_path('styles/amp.css')) . "</style>";
        }
    ?>

    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <?php // do_action('amp_post_template_head', $this); ?>

    <?php wp_head(); ?>

</head>
<body>

<header class="header">
    <div class="header__inner col-12 sm-col-12 md-col-12 lg-col-10">
        <section class="header__top-section topographic-pattern flex relative z2">
            <a href="/" class="link-reset mx-auto">
                <amp-img
                    class="header__logo"
                    src="<?php echo \App\asset_path('images/logo-horizontal.svg') ?>"
                    alt="Visithalland.com"
                    width="9"
                    height="1"
                    layout="responsive">
            </a>
        </section>
        <nav class="navigation center topographic-pattern">
            <div class="navigation__inner">
                <?php
                    $primary_navigation_items = App::getPrimaryNavigation()
                ?>
                <?php if(is_array($primary_navigation_items)) : ?>
                    <?php foreach($primary_navigation_items as $key => $navigation_item) : ?>
                        <div class="navigation__item <?php echo $navigation_item->meta_fields['class_name'] ?>">
                            <a href="<?php echo $navigation_item->url ?>" class="navigation__link link-reset <?php array_walk($navigation_item->classes, create_function('$a', 'echo $a . " ";')) ?>">
                                <div class="navigation__icon-wrapper">
                                    <div class="navigation__icon"></div>
                                </div>
                                <span><?php echo $navigation_item->title ?></span>
                            </a>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </nav>
    </div>
</header>
