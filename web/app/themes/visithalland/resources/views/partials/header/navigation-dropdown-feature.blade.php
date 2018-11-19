<div class="nav-dropdown__feature ">
	<div class="nav-dropdown__background rounded p-4 md:p-3 bg-blue-light topographic-pattern">
		<div class="hidden lg:w-4/12 lg:flex lg:items-center lg:justify-center">
			<img class="feature__img w-fit mr-3 max-w-5" src="{{ $banner['image']['url'] }}" alt="{{ $banner['image']['alt'] }}">
		</div>
		<div class="feature__content w-full lg:w-7/12">
			<span class="rounded-full py-1 text-sm font-rift text-white px-2 mb-2 bg-orange inline-block">Nyhet</span>
			<h4 class="text-white md:text-xl lg:text-2xl mb-3">{{ $banner['title'] }}</h4>
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