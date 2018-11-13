@if(!isset($_COOKIE["cookie_consent"]))
    <div class="cookie-banner fixed w-full display-none pin-l pin-r pin-b z-50 p-3 text-white w-full">
        <div class="cookie-banner__inner bg-blue topographic-pattern p-4 relative rounded w-full sm:w-6/12  md:w-4/12" tabindex="1">
            <p class="cookie-banner__policy text-grey-light text-sm">
                <?php echo get_field("cookie_accept_message", apply_filters( 'wpml_object_id', get_page_by_path("kakor")->ID, 'page' )); ?>
                <a href="<?php echo get_permalink( apply_filters( 'wpml_object_id', get_page_by_path("kakor")->ID, 'page' ) ); ?>" class="cookie-banner__link underline text-white">
                    <?php _e( 'Se användningsvillkor', 'visithalland' ); ?>
                </a>
            </p>
            <button class="h-4 w-4 rounded-full bg-blue-light flex items-center justify-center absolute outline-none pin-t pin-r mr-3 mt-3" id="cookie-accept" title="<?php _e( 'Stäng', 'visithalland' ); ?>" tabindex="2">
                <svg class="icon icon-white">
                    <use xlink:href="#close-icon"/>
                </svg>
            </button>
        </div>
    </div>
@endif