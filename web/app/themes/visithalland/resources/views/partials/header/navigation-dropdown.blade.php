<section class="nav-dropdown block fixed pin-l pin-r w-full bg-blue box-shadow-lg">
	<div class="nav-dropdown__inner clearfix container w-11/12 lg:w-10/12 mx-auto py-2 flex flex-col md:flex-row">
		<div class="flex flex-wrap -mx-3">
			<div class="w-full sm:w-11/12  md:w-6/12  pt-4 px-3 pb-2">
				<nav class="flex flex-wrap">
					@foreach($primary_navigation_item->children as $child)
						@if($child->type === 'taxonomy')
		                    <div class="truncate text-white font-rift w-full sm:w-4/12 md:w-6/12  pb-3">
								<a class="text-white font-bold text-lg truncate inline-block" href="{{ $child->url }}">
									<div class="theme-icon {{$child->meta_fields["class_name"] ? $child->meta_fields["class_name"] : "visithalland"}}">
										<div class="theme-icon__inner">
										</div>
									</div>
									<span class="ml-2">{{ $child->post_title ? $child->post_title : $child->title }}</span>
								</a>
							</div>
						@else 
							<div class="truncate text-white font-rift col w-full sm:w-4/12 md:w-6/12  pb-3">
								<a class="text-white font-bold text-lg truncate inline-block" href="{{ $child->url }}">
									<div class="theme-icon visithalland">
										<div class="theme-icon__inner">
										</div>
									</div>
									<span class="ml-2">{{ $child->title ? $child->post_title : $child->title }}</span>
								</a>
							</div>
						@endif
	                @endforeach
				</nav>
			</div>
			<div class="nav-dropdown__feature w-full sm:w-full md:w-6/12 relative px-3 mt-1 pt-4 pb-4">
				<div class="nav-dropdown__background rounded p-3 bg-blue-light topographic-pattern">
					<div class="w-5/12 sm:w-4/12 md:w-4/12 flex items-center justify-center">
						<img class="feature__img w-fit mr-3 max-w-4" src="{{ $banner['image']['url'] }}" alt="{{ $banner['image']['alt'] }}">
					</div>
					<div class="feature__content w-7/12 sm:w-4/12 md:w-7/12  ">
						<span class="rounded-full py-1 text-sm font-rift text-white px-2 mb-2 bg-orange inline-block">Nyhet</span>
						<h4 class="text-white mb-3 line-h-3">{{ $banner['title'] }}</h4>
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
	</div>
</section>
