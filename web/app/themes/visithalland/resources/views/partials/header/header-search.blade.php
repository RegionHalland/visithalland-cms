<div class="header-search flex items-center pl-3 lg:pl-8 xl:pl-3 md:order-2">
    <div class="header-search__form relative flex items-center">
    	<form method="get" action="/?s=">
    		<?php do_action( 'wpml_add_language_form_field' ) ?>
	        <input name="s" id="s" class="header-search__input font-fira rounded-full italic text-sm text-white bg-blue-light h-10" type="search" placeholder="Restauranger, Utflykter">
	        <button type="submit" class="header-search__button flex bg-blue-light xl:bg-blue items-center justify-center rounded-full">
	            <svg class="icon--sm">
	                <use xlink:href="#search-icon"/>
	            </svg>
	        </button>
    	</form>
    </div>
</div>