<div class="header-search mt-2 md:mt-0 md:h-16 flex items-center pl-3 lg:pl-8 xl:pl-3 md:order-2">
    <div class="header-search__form relative flex items-center">
    	<form method="get" action="/?s=">
    		<?php do_action( 'wpml_add_language_form_field' ) ?>
	        <input name="s" id="s" class="header-search__input focus border-none appearance-none px-4 py-3 hidden xl:block w-64 font-fira rounded-full italic text-sm text-white bg-blue-light h-10" type="search" placeholder="Restauranger, Utflykter">
	        <button type="submit" class="header-search__button focus block xl:absolute xl:vertical-center h-8 w-8 xl:mr-2 pin-r flex bg-blue-light xl:bg-blue items-center justify-center rounded-full">
	            <svg class="h-4 w-4">
	                <use xlink:href="#search-icon"/>
	            </svg>
	        </button>
    	</form>
    </div>
</div>