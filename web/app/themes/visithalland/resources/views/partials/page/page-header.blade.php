<div class="bg-blue topographic-pattern mb-4">
	<div class="container w-11/12 md:w-10/12 pt-32 mt-4 pb-12 mt-6 md:mt-8 md:pb-16 md:pt-24 relative">
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