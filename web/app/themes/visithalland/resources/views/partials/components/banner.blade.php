<div class="relative px3 pt4 pb4 bg-blue-xlight topographic-pattern">
	<div class="container col-11 md-col-10 lg-col-10 flex items-center">
		<div class="clearfix flex items-center">
			<div class="col col-4 sm-col-3 md-col-2 flex items-center justify-center">
				<img class="w-fit mr3 max-width-4 lazyload" data-src="{{ $banner['image']['url'] }}" alt="{{ $banner['image']['alt'] }}">
			</div>
			<div class="feature__content col col-8 sm-col-5 md-col-4 pl2">
				<span class="rounded-pill py1 text-sm rift-font text-light px2 mb2 bg-orange-gradient inline-block">Nyhet</span>
				<h3 class="text-light mb3 line-height-3 h2">{{ $banner['title'] }}</h3>
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