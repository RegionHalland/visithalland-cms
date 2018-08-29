<div class="page-header bg-blue topographic-pattern mb4">
	<div class="container col-11 md-col-10 pt6 mt4 pb5 mt5 sm-mt6  md-mt4 relative">
		@include('partials.breadcrumbs')
		<h1 class="page-header__title text-light">
			{{ post_type_archive_title(null, false) ? post_type_archive_title(null, false) : get_the_title() }}
		</h1>
		<div class="scroll-indicator">
            <svg class="scroll-indicator__icon">
                <use xlink:href="#arrow-down-icon"/>
            </svg>
        </div>
	</div>
</div>