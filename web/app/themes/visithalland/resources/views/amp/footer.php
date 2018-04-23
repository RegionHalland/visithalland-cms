
	
<footer class="footer topographic-pattern mt4">
    <div class="footer__content relative col-11 mx-auto">
        <div class="clearfix">

            <!-- Footer Site Info Start -->
            <div class="footer__column col col-12">
            	<div class="col-10">
	                <amp-img
	                    src="<?php echo \App\asset_path('images/logo.svg') ?>"
	                    alt="Visithalland.com"
	                    width="9"
	                    height="2"
	                    layout="responsive">
	                </div>
                <p class="footer__intro light mt1"><?php echo bloginfo('description') ?></p>
                <div class="footer-contact mt4">
                    <a href="mailto:info@visithalland.com" class="footer-contact__a light">
                        <div class="footer-contact__icon-wrapper">
                            <svg class="footer-contact__icon">
                                <use xlink:href="#mail-icon"/>
                            </svg>
                        </div>
                        <span class="footer-contact__span">Email</span>
                    </a>
                    <a href="https://www.facebook.com/visithalland.se/" class="footer-contact__a light">
                        <div class="footer-contact__icon-wrapper facebook">
                            <svg class="footer-contact__icon">
                                <use xlink:href="#facebook-icon"/>
                            </svg>
                        </div>
                        <span class="footer-contact__span">Facebook</span>
                    </a>
                    <a href="https://www.instagram.com/visithalland/" class="footer-contact__a light">
                        <div class="footer-contact__icon-wrapper instagram">
                            <svg class="footer-contact__icon">
                                <use xlink:href="#instagram-icon"/>
                            </svg>
                        </div>
                        <span class="footer-contact__span">Instagram</span>
                    </a>
                </div>
            </div>
            <!-- Footer Site Info End -->


            <!-- Footer Navigation Start -->
            <div class="footer__column col col-6 mt2">
                <span class="footer__column-header"><?php _e( 'Upplevelser', 'visithalland' ); ?></span>
                <nav class="footer__list footer-nav">
                    <?php $primary_navigation_items = App::getPrimaryNavigation() ?>
                    <?php if(is_array($primary_navigation_items)) : ?>
                        <?php foreach($primary_navigation_items as $key => $navigation_item) : ?>
                            <div class="footer-nav__item footer__nav-item <?php echo $navigation_item->meta_fields['class_name'] ?>">
                                <a href="<?php echo $navigation_item->url ?>" class="footer-nav__link link-reset <?php array_walk($navigation_item->classes, create_function('$a', 'echo $a . " ";')) ?>">
                                    <div class="footer-nav__icon-wrapper">
                                        <div class="footer-nav__icon"></div>
                                    </div>
                                    <span><?php echo $navigation_item->title ?></span>
                                </a>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </nav>
            </div>
            <!-- Footer Navigation End -->

            <!-- Footer Secondary Menu, Partner Menu and Language Settings Start -->

            <div class="footer__column  col col-6 mt2">
                <span class="footer__column-header"><?php _e( 'Fler alternativ', 'visithalland' ); ?></span>
                <ul class="footer__list">
                    <?php //TODO: Add secondary links and languages to footer ?>
                </ul>
            </div>


        </div>
    </div>

</footer>
    <?php do_action('amp_post_template_footer', $this); ?>
    <?php wp_footer(); ?>
</body>
