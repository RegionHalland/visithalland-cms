<form role="search" method="get" id="searchform" class="searchform clearfix flex items-center justify-end">
    <label class="screen-reader-text sr-only col-12" for="s"><?php _e( 'Sök efter', 'visithalland' ); ?>:</label>
    <input type="text" placeholder="Skriv för att börja söka" value="" name="s" id="s" class="searchform__input">
    <button type="submit" class="icon-button ml2">
        <svg class="icon icon-button__icon">
            <use xlink:href="#search-icon"/>
        </svg>
    </button>
    <div class="icon-button search-close-button ml2">
        <svg class="icon icon-button__icon">
            <use xlink:href="#close-icon"/>
        </svg>
    </div>
</form>