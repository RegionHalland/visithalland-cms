<div class="page-header bg-blue topographic-pattern mb4">
	<div class="container col-11 md-col-10 pt6 mt4 pb4 mt5 sm-mt6  md-mt4 relative">
		@include('partials.components.breadcrumbs')
		<h1 class="page-header__title text-light">
			{{ post_type_archive_title(null, false) ? post_type_archive_title(null, false) : get_the_title() }}
		</h1>
		<div class="py3 flex flex-nowrap overflow-scroll">
			<a href="#september" class="px3 py3 mr3 bg-blue-xlight rift-font text-light rounded-pill inline-flex">
				September
			</a>
			<a href="#" class="px3 py3 mr3 bg-blue-xlight rift-font text-light rounded-pill inline-flex">
				Oktober
			</a>
			<a href="#" class="px3 py3 mr3 bg-blue-xlight rift-font text-light rounded-pill inline-flex">
				November
			</a>
			<a href="#" class="px3 py3 mr3 bg-blue-xlight rift-font text-light rounded-pill inline-flex">
				December
			</a>
			<a href="#" class="px3 py3 mr3 bg-blue-xlight rift-font text-light rounded-pill inline-flex">
				Januari
			</a>
		</div>
		<div class="scroll-indicator">
            <svg class="scroll-indicator__icon">
                <use xlink:href="#arrow-down-icon"/>
            </svg>
        </div>
	</div>
</div>