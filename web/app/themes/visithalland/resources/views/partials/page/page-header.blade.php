<div class="bg-blue topographic-pattern mb-4">
	<div class="container w-11/12 md:w-10/12 pt-6 mt-4 pb-5 mt-6 md:mt-16 md:pb-16 md:pt-16 relative">
		@include('partials.components.breadcrumbs')
		<h1 class="text-white">
			{{ post_type_archive_title(null, false) ? post_type_archive_title(null, false) : get_the_title() }}
		</h1>
		<div class="scroll-indicator">
            <svg class="scroll-indicator__icon">
                <use xlink:href="#arrow-down-icon"/>
            </svg>
        </div>
	</div>
</div>