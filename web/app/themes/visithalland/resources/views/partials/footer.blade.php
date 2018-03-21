
<!-- Footer Start -->

<footer class="footer topographic-pattern">
    <div class="footer__content relative col-11 md-col-10 lg-col-10 mx-auto">
        <div class="clearfix">

            <!-- Footer Site Info Start -->
            <div class="footer__column col col-12 sm-col-9 md-col-5">
                <img src="@asset('images/logo.svg')" />
                <p class="footer__intro light mt1">{{ bloginfo('description') }}</p>
                <div class="footer-contact mt3">
                    <a href="mailto:info@visithalland.com" target="_blank" class="footer-contact__a light">
                        <div class="footer-contact__icon-wrapper">
                            <svg class="footer-contact__icon">
                                <use xlink:href="#mail-icon"/>
                            </svg>
                        </div>
                        <span class="footer-contact__span">Email</span>
                    </a>
                    <a href="https://www.facebook.com/visithalland.se/" target="_blank" class="footer-contact__a light">
                        <div class="footer-contact__icon-wrapper facebook">
                            <svg class="footer-contact__icon">
                                <use xlink:href="#facebook-icon"/>
                            </svg>
                        </div>
                        <span class="footer-contact__span">Facebook</span>
                    </a>
                    <a href="https://www.instagram.com/visithalland/" target="_blank" class="footer-contact__a light">
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
            <div class="footer__column col col-6 sm-col-4 md-col-3 mt2">
                <span class="footer__column-header"><?php _e( 'Upplevelser', 'visithalland' ); ?></span>
                <nav class="footer__list footer-nav">
                    @php $primary_navigation_items = App::getPrimaryNavigation() @endphp
                    @if(is_array($primary_navigation_items))
                        @foreach($primary_navigation_items as $key => $navigation_item)
                            <div class="footer-nav__item footer__nav-item beach-coast">
                                <a href="{{ $navigation_item->url }}" class="footer-nav__link link-reset {{ array_walk($navigation_item->classes, create_function('$a', 'echo $a . " ";')) }}">
                                    <div class="footer-nav__icon-wrapper">
                                        <div class="footer-nav__icon"></div>
                                    </div>
                                    <span>{{ $navigation_item->title }}</span>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </nav>
            </div>
            <!-- Footer Navigation End -->

            <!-- Footer Secondary Menu, Partner Menu and Language Settings Start -->

            <div class="footer__column  col col-6 sm-col-3 md-col-3 mt2">
                <span class="footer__column-header"><?php _e( 'Fler alternativ', 'visithalland' ); ?></span>
                <ul class="footer__list">
                    @if(is_array($non_active_langs))
                        @foreach ($non_active_langs as $key => $lang)
                            <li class="footer__list-item mt1 light">
                                <a href="{{ $lang["url"] }}" class="footer__link link-reset"">
                                    <span>{{ $lang["native_name"] }}</span>
                                </a>
                            </li>
                        @endforeach
                    @endif

                    @if(is_array($secondary_menu_items))
                        @foreach ($secondary_menu_items as $key => $secondary_menu_item)
                            <li class="footer__list-item mt1 light">
                                <a href="{{ $secondary_menu_item->url }}>" class="footer__link link-reset"">
                                    <span>{{ $secondary_menu_item->title }}</span>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>

            <div class="footer__column col col-6 sm-col-3 md-col-3 mt2">
                <span class="footer__column-header"><?php _e( 'Partners', 'visithalland' ); ?></span>
                <ul class="footer__list">
                    <li class="footer__list-item mt1 light">
                        <a href="https://www.tripadvisor.se/Tourism-g189887-Halland_County_West_Coast-Vacations.html" class="footer__link link-reset">
                            <img src="@asset('images/tripadvisor-logo.svg')" />
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Footer Secondary Menu, Partner Menu and Language Settings End -->

            <!-- Footer European Union Credit Start -->
            <div class="footer__eu col col-12">
                <div class="clearfix">
                    <div class="col col-5 sm-col-3 md-col-2 pr4 mt2">
                        <a href="https://tillvaxtverket.se/om-tillvaxtverket/organisation/logotyper/logotyp-for-eu-finansierat-stod.html">
                            <img src="@asset('images/eu-logo.svg')" />
                        </a>
                    </div>
                    <div class="col col-12 sm-col-9 md-col-6 mt2">
                        <p class="light footer__eu-paragraph mt0">
                            <!-- TODO: Make dynamic -->
                            {{ get_field("eu_excerpt", apply_filters( 'wpml_object_id', get_page_by_path("destination-halland-2020")->ID, 'page' )) }}
                        </p>
                    </div>
                </div>
            </div>
            <!-- Footer European Union Credit End -->

        </div>
    </div>

    <!-- Cookie Banner Start -->

    @if(!isset($_COOKIE["cookie_notice_accepted"]))
        <div id="cookie-notice" class="cookie-banner col-12">
            <div class="cookie-banner__inner col-12 sm-col-6 md-col-4" tabindex="1">
                <span class="cookie-banner__policy">
                    {{ get_field("cookie_accept_message", apply_filters( 'wpml_object_id', get_page_by_path("kakor")->ID, 'page' )) }}
                    <a href="{{ get_permalink( apply_filters( 'wpml_object_id', get_page_by_path("kakor")->ID, 'page' ) ) }}" class="cookie-banner__link">
                        @php _e( 'Se användningsvillkor', 'visithalland' ) @endphp
                    </a>
                </span>
                <button id="cookie-consent" class="cookie-banner__button icon-button" id="cookie-accept" title="@php _e( 'Stäng', 'visithalland' ) @endphp" tabindex="2">
                    <svg class="icon icon-button__icon">
                        <use xlink:href="#close-icon"/>
                    </svg>
                </button>
            </div>
        </div>
	@endif
    <!-- Cookie Banner End -->

</footer>

<!-- Footer End -->
<?php wp_footer(); ?>

</body>
</html>
