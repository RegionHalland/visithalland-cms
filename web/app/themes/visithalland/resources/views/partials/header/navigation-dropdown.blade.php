<section class="nav-dropdown block absolute left-0 right-0 fill bg-blue box-shadow z5">
	<div class="nav-dropdown__inner clearfix container col-12 md-col-11 lg-col-10 py2">
		<div class="col col-12 sm-col-12 md-col-6 pt3 pb2">
			<nav class="clearfix">
				
				<!-- Repeat ---> 
				@foreach($primary_navigation_item->children as $child)
                    <div class="nav-dropdown__li truncate text-light rift-font col col-12 sm-col-4 md-col-6 px3 pb3">
						<a class="nav-dropdown__link text-light bold text-lg truncate" href="">
							<div class="theme-icon hiking-biking">
								<div class="theme-icon__inner">
								</div>
							</div>
							<span class="ml2">{{ $child->post_title }}</span>
						</a>
					</div>
                @endforeach
				<!-- End Repeat -->

			</nav>
		</div>
		<div class="nav-dropdown__feature col col-12 sm-col-12 md-col-6 relative px3 mt1 pt3 pb3">
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
</section>