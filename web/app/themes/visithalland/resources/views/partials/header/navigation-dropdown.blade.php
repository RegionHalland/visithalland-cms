<section class="nav-dropdown block fixed left-0 right-0 fill bg-blue box-shadow-lg z5">
	<div class="nav-dropdown__inner clearfix container col-11 md-col-10 lg-col-10 mxn3 py2 flex flex-column md-flex-row">
		<div class="mxn3">
			<div class="col col-12 sm-col-11 md-col-6 pt4 px3 pb2">
				<nav class="clearfix">
					@foreach($primary_navigation_item->children as $child)
						@if($child->type === 'taxonomy')
		                    <div class="truncate text-light rift-font col col-12 sm-col-4 md-col-6 pb3">
								<a class="text-light bold text-lg truncate inline-block" href="{{ $child->url }}">
									<div class="theme-icon {{$child->meta_fields["class_name"] ? $child->meta_fields["class_name"] : "coastal-living"}}">
										<div class="theme-icon__inner">
										</div>
									</div>
									<span class="ml2">{{ $child->post_title }}</span>
								</a>
							</div>
						@else 
							<div class="truncate text-light rift-font col col-12 sm-col-4 md-col-6 pb3">
								<a class="text-light bold text-lg truncate inline-block" href="{{ $child->url }}">
									<div class="theme-icon coastal-living">
										<div class="theme-icon__inner">
										</div>
									</div>
									<span class="ml2">{{ $child->title }}</span>
								</a>
							</div>
						@endif
	                @endforeach
				</nav>
			</div>
			<div class="nav-dropdown__feature col col-12 sm-col-12 md-col-6 relative px3 mt1 pt4 pb4">
				<div class="nav-dropdown__background rounded p3 bg-blue-xlight topographic-pattern">
					<div class="col col-5 sm-col-4 md-col-6 flex items-center justify-center">
						<img class="feature__img fit mr3 max-width-4" src="@asset('images/test.png')" alt="">
					</div>
					<div class="feature__content col col-7 sm-col-4 md-col-6 ">
						<span class="rounded py1 text-sm rift-font text-light px2 mb2 bg-orange-gradient inline-block">Nyhet</span>
						<h4 class="text-light mb3 line-height-3">Upptäck Hallands hemligheter med vår nya mobilguide</h4>
						<a href="#">
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
