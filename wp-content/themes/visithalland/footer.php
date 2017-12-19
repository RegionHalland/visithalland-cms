<footer class="footer topographic-pattern pt6">
    <div class="footer__content clearfix">
        <div class="footer__column col sm-col-6 col-12 md-col-5">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.svg" />
            <p class="footer__intro mt1">En reseguide som hjälper dig att hitta till det bästa i Halland. Visithalland.com utvecklas och drivs av Region Halland.</p>
        </div>
        <div class="footer__column col sm-col-7 col-12 md-col-3 mt2">
            <span class="footer__column-header">Upplevelser</span>
            <nav class="footer__list">
            	<?php
                $menuItems = wp_get_nav_menu_items("huvudmeny");
                foreach ($menuItems as $key => $value): ?>
                <div class="nav__item footer__nav-item <?php echo get_post(get_post_meta( $value->ID, '_menu_item_object_id', true ))->post_name ?>">
                	<a href="<?php echo $value->url ?>" class="nav__link link-reset active">
				        <div class="nav__icon-wrapper">
				            <div class="nav__icon"></div>
				        </div>
				        <span><?php echo get_post(get_post_meta( $value->ID, '_menu_item_object_id', true ))->post_title ?></span>
				    </a>
				</div>
                <?php endforeach ?>
            </nav>
        </div>
        <div class="col col-12 sm-col-12 md-col-4">
            <div class="clearfix">
                <div class="footer__column  col col-12 sm-col-4 md-col-12 mt2">
                    <span class="footer__column-header">Om webbplatsen</span>
                    <ul class="footer__list">
                        <li class="footer__list-item mt1 light">
                            <a href="/cookies" class="footer__link link-reset">Om cookies</a>
                        </li>
                    </ul>
                </div>
                <div class="footer__column  col col-12 sm-col-4 md-col-12 mt2">
                    <span class="footer__column-header">Språk</span>
                    <ul class="footer__list">
                        <li class="footer__list-item mt1 light">
                            <a class="footer__link link-reset">English</a>
                        </li>
                        <li class="footer__list-item mt1 light">
                            <a class="footer__link link-reset">Svenska</a>
                        </li>
                    </ul>
                </div>
                <div class="footer__column col col-12 sm-col-4 md-col-12 mt2">
                    <span class="footer__column-header">Partners</span>
                    <ul class="footer__list">
                        <li class="footer__list-item mt1 light">
                            <a href="https://www.tripadvisor.se/Tourism-g189887-Halland_County_West_Coast-Vacations.html" class="footer__link link-reset">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/tripadvisor-logo.svg" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer__eu col col-12">
            <div class="clearfix">
                <div class="col col-5 sm-col-3 md-col-2 footer__left mt2">
                    <a href="https://tillvaxtverket.se/om-tillvaxtverket/organisation/logotyper/logotyp-for-eu-finansierat-stod.html">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/eu-logo.svg" />
                    </a>
                </div>
                <div class="col col-12 sm-col-9 md-col-6 footer__right mt2">
                    <p class="light footer__eu-paragraph mt0">VisitHalland.com är del av EU-projektet Destination Halland 2020. Projektet finansieras via Europeiska regionala utvecklingsfonden.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>