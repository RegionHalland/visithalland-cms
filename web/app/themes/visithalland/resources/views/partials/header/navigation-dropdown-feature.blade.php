<div class="w-full h-full flex items-center justify-start flex-row rounded p-4 md:p-3 bg-blue-light topographic-pattern">
	<div class="hidden lg:w-4/12 lg:flex lg:items-center lg:justify-center">
		<img class="w-fit mr-3 max-w-5" src="{{ $banner['image']['url'] }}" alt="{{ $banner['image']['alt'] }}">
	</div>
	<div class="w-full lg:w-7/12">
		<span class="rounded-full py-1 text-sm font-rift text-white px-2 mb-2 bg-orange inline-block">Nyhet</span>
		<h4 class="text-white md:text-xl lg:text-2xl mb-3">{{ $banner['title'] }}</h4>
		@include(
			'partials.components.read-more', [
			'title' => "Gå till sida", 
			'url' => $banner['link'], 
			'classes' => "light"]
		)
	</div>
</div>