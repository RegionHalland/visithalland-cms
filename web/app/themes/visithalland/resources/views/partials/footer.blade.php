
<!-- Footer Start -->

<footer class="footer bg-blue topographic-pattern pt5">
    <div class="container col-11 md-col-10 lg-col-10 mx-auto">
        <div class="clearfix mxn3">

            <!-- Footer Site Info Start -->
            <div class="col col-12 sm-col-6 md-col-4 px3">
                <img class="mb2" src="@asset('images/logo-horizontal.svg')" />
                <p class="fira-font italic text-sm light mb4">{{ bloginfo('description') }}</p>
            </div>


            <!-- Social Icon -->
            <div class="footer__social col col-12 sm-col-6 md-col-8 flex px3">
                <a href="mailto:info@visithalland.com" target="_blank" class="link-reset inline-block">
                    <div class="social-icon bg-blue-xlight rounded-full flex items-center justify-center">
                        <svg class="icon-sm">
                            <use xlink:href="#mail-icon"/>
                        </svg>
                    </div>
                </a>
                <a href="https://www.facebook.com/visithalland/" target="_blank" class="link-reset inline-block ml3">
                    <div class="social-icon bg-blue-xlight rounded-full flex items-center justify-center">
                        <svg class="icon-sm">
                            <use xlink:href="#facebook-icon"/>
                        </svg>
                    </div>
                </a>
                <a href="https://www.instagram.com/visithalland/" target="_blank" class="link-reset inline-block ml3">
                    <div class="social-icon bg-blue-xlight rounded-full flex items-center justify-center">
                        <svg class="icon-sm">
                            <use xlink:href="#instagram-icon"/>
                        </svg>
                    </div>
                </a>
            </div>


            <div class="col col-12 mb5 px3">
                @foreach(App::get_navbar_items() as $primary_navigation_item)
                    @if(is_array($primary_navigation_item->children) && count($primary_navigation_item->children) > 0)
                            <div class="col col-12 md-col-6 mt4">
                                <h4 class="text-light mb3 text-lg">{{ $primary_navigation_item->post_title }}</h4>
                                @foreach($primary_navigation_item->children as $child)
                                    <div class="col col-12 md-col-6">
                                        <div class="nav-dropdown__li truncate text-light rift-font pb3">
                                            <a class="nav-dropdown__link text-light bold text-lg truncate" href="{{ $child->url }}">
                                                <div class="theme-icon {{$child->meta_fields["class_name"] ? $child->meta_fields["class_name"] : "coastal-living"}}">
                                                    <div class="theme-icon__inner">
                                                    </div>
                                                </div>
                                                <span class="ml2">{{ $child->post_title }}</span>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                    @else
                        <div class="col col-12 md-col-3 mt4">
                            <h4 class="text-light mb3 text-lg">{{ $primary_navigation_item->post_title ? $primary_navigation_item->post_title : $primary_navigation_item->title }}</h4>
                        </div>
                    @endif
                @endforeach
            </div>


        </div>

    </div>

    
    <!-- Footer European Union Credit Start -->
    <div class="clearfix bg-blue-light py3">
        <div class="container col-11 md-col-10 lg-col-10 mx-auto">
            <div class="mxn3">
            <div class="col col-6 sm-col-3 md-col-2 px3 pt3 mt1">
                <img class="max-width-4" src="@asset('images/eu-logo.svg')" />
            </div>
            <div class="col col-12 sm-col-10 md-col-8 px3 py3">
                <p class="italic text-light text-sm max-width-4">
                    <!-- TODO: Make dynamic -->
                    {{ get_field("eu_excerpt", apply_filters( 'wpml_object_id', get_page_by_path("destination-halland-2020")->ID, 'page' )) }}
                </p>
                <a class="mt3 inline-block" href="https://tillvaxtverket.se/om-tillvaxtverket/organisation/logotyper/logotyp-for-eu-finansierat-stod.html">
                    <div class="read-more">
                        <span class="read-more__text light">
                            @php _e('Läs mer om projektet', 'visithalland') @endphp
                        </span>
                        <div class="read-more__button bg-orange-gradient">
                            <svg class="icon read-more__icon">
                                <use xlink:href="#arrow-right-icon"/>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
            </div>
        </div>
    </div>

    <!-- Footer European Union Credit End -->

    <!-- Cookie Banner Start -->

    @if(!isset($_COOKIE["cookie_consent"]))
        <div class="cookie-banner col-12">
            <div class="cookie-banner__inner col-12 sm-col-6 md-col-4" tabindex="1">
                <span class="cookie-banner__policy">
                    <?php echo get_field("cookie_accept_message", apply_filters( 'wpml_object_id', get_page_by_path("kakor")->ID, 'page' )); ?>
                    <a href="<?php echo get_permalink( apply_filters( 'wpml_object_id', get_page_by_path("kakor")->ID, 'page' ) ); ?>" class="cookie-banner__link">
                        <?php _e( 'Se användningsvillkor', 'visithalland' ); ?>
                    </a>
                </span>
                <button class="cookie-banner__button icon-button" id="cookie-accept" title="<?php _e( 'Stäng', 'visithalland' ); ?>" tabindex="2">
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
