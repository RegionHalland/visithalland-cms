
<div class="relative px-3 pt-4 pb-4 bg-blue-light topographic-pattern">
	<div class="container w-11/12  md:w-10/12  lg:w-10/12  flex items-center">
		<div class="clearfix flex items-center">
			<div class="col w-4/12 sm:w-3/12 md:w-2/12 flex items-center justify-center">
				<img class="w-fit mr-3 max-w-8" src="{{ $banner['image']['url'] }}" alt="{{ $banner['image']['alt'] }}">
			</div>
			<div class="feature__content col w-8/12 sm:w-5/12 md:w-4/12 pl-6">
				<span class="rounded-full py-1 text-sm font-rift text-white px-2 mb-2 bg-orange inline-block">Nyhet</span>
				<h3 class="text-white mb-3 line-h-3 h2">{{ $banner['title'] }}</h3>
				<a href="{{ $banner['link'] }}" title="{{ $banner['title'] }}">
					<div class="read-more">
		                <span class="read-more__text light">
		                    @php _e('Få tips nu', 'visithalland') @endphp
		                </span>
		                <div class="read-more__button bg-orange-gradient">
		                    <svg class="icon read-more__icon">
		                        <use xlink:href="#arrow-right-icon"/>
		                    </svg>
		                </div>
		            </div>
	            </a>
			</div>
		</div>
	</div>
</div>