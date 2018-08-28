@if(!isset($_COOKIE["cookie_consent"]))
    <div class="cookie-banner fixed fill display-none left-0 right-0 bottom-0 z5 p3 text-light col-12">
        <div class="cookie-banner__inner bg-blue topographic-pattern p4 relative rounded col-12 sm-col-6 md-col-4" tabindex="1">
            <p class="cookie-banner__policy text-grey-light text-sm">
                <?php echo get_field("cookie_accept_message", apply_filters( 'wpml_object_id', get_page_by_path("kakor")->ID, 'page' )); ?>
                <a href="<?php echo get_permalink( apply_filters( 'wpml_object_id', get_page_by_path("kakor")->ID, 'page' ) ); ?>" class="cookie-banner__link underline text-light">
                    <?php _e( 'Se användningsvillkor', 'visithalland' ); ?>
                </a>
            </p>
            <button class="height-4 width-4 rounded-full bg-blue-light flex items-center justify-center absolute outline-none top-0 right-0 mr3 mt3" id="cookie-accept" title="<?php _e( 'Stäng', 'visithalland' ); ?>" tabindex="2">
                <svg class="icon icon-white">
                    <use xlink:href="#close-icon"/>
                </svg>
            </button>
        </div>
    </div>
@endif