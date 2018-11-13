<div class="search-header topographic-pattern">
    <div class="w-11/12  md:w-10/12  lg:w-8/12 ">
        <form role="search" method="get" id="searchform" class="searchform container">
            <?php do_action( 'wpml_add_language_form_field' ) ?>
            <label class="screen-reader-text sr-only w-full" for="s">@php _e( 'Sök efter', 'visithalland' ) @endphp:</label>
            <input type="text" placeholder="Vad letar du efter?" value="" name="s" id="s" class="searchform__input">
            <button type="submit" class="icon-button icon-button--large ml-2">
                <svg class="icon icon-button__icon">
                    <use xlink:href="#search-icon"/>
                </svg>
            </button>
        </form>
    </div>
</div>
