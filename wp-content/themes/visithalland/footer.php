<footer class="footer topographic-pattern pt6">
    <div class="footer__content relative col-11 md-col-10 lg-col-10 mx-auto">
        <div class="clearfix">
        <div class="footer__column col sm-col-6 col-12 md-col-5">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/logo.svg" />
            <p class="footer__intro mt1">En reseguide som hjälper dig att hitta till det bästa i Halland. Visithalland.com utvecklas och drivs av Region Halland.</p>
        </div>
        <div class="footer__column col sm-col-7 col-12 md-col-3 mt2">
            <span class="footer__column-header">Upplevelser</span>
            <nav class="footer__list">
            	<?php
                $mainMenuItems = get_menu_by_location("main-menu");
                foreach ($mainMenuItems as $key => $value): ?>
                <div class="nav__item footer__nav-item <?php echo $value->post_name ?>">
                	<a href="<?php echo get_permalink($value->ID) ?>" class="nav__link link-reset <?php echo array_walk($value->classes, create_function('$a', 'echo $a . " ";')); ?>">
				        <div class="nav__icon-wrapper">
				            <div class="nav__icon"></div>
				        </div>
				        <span><?php echo $value->title ?></span>
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
                            <a href="#" class="footer__link link-reset">Om cookies</a>
                        </li>
                    </ul>
                </div>
                <div class="footer__column  col col-12 sm-col-4 md-col-12 mt2">
                    <span class="footer__column-header">Språk</span>
                    <ul class="footer__list">
                        <?php $langs =  pll_the_languages(array('raw' => true)); ?>
                        <?php foreach ($langs as $key => $value) : ?>
                            <li class="footer__list-item mt1 light">
                                <a href="<?php echo isset($value["url"]) ? $value["url"] : "#"; ?>" class="footer__link link-reset"><?php echo isset($value["name"]) ? $value["name"] : "" ?> </a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="footer__column col col-12 sm-col-4 md-col-12 mt2">
                    <span class="footer__column-header">Partners</span>
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
        <div class="footer__eu col col-12">
            <div class="clearfix">
                <div class="col col-5 sm-col-3 md-col-2 footer__left mt2">
                    <a href="https://tillvaxtverket.se/om-tillvaxtverket/organisation/logotyper/logotyp-for-eu-finansierat-stod.html">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/eu-logo.svg" />
                    </a>
                </div>
                <div class="col col-12 sm-col-9 md-col-6 footer__right mt2">
                    <p class="light footer__eu-paragraph mt0">VisitHalland.com är del av EU-projektet Destination Halland 2020. Projektet finansieras via Europeiska regionala utvecklingsfonden.</p>
                </div>
            </div>
        </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>