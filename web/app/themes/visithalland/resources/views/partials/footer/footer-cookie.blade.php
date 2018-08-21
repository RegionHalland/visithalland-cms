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