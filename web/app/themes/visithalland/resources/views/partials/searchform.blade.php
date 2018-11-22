<div class="bg-blue mt-4 pb-12 mt-6 pt-24 md:mt-8 md:pb-16 md:pt-24 topographic-pattern">
    <div class="w-11/12 lg:w-10/12 mx-auto">
        <form role="search" method="get" id="searchform" class="container flex items-center">
            <?php do_action( 'wpml_add_language_form_field' ) ?>
            <label class="screen-reader-text sr-only w-full" for="s">@php _e( 'Sök efter', 'visithalland' ) @endphp:</label>
            <div class="relative w-full">
                <input type="text" placeholder="Vad letar du efter?" value="" name="s" id="s" class="focus border-none appearance-none px-5 py-5 flex-1 block w-full font-fira rounded-full text-base text-white bg-blue-light">
                <button type="submit" class="h-12 w-12 mr-2 pin-r vertical-center absolute flex bg-blue items-center justify-center rounded-full">
                    <svg class="h-4 w-4">
                        <use xlink:href="#search-icon"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>
