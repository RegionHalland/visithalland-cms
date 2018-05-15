@php 
	$page = get_page_by_path('a-day-in-halland');
	if(ICL_LANGUAGE_CODE != 'sv') {
		$page_id = icl_object_id($page->ID, 'page', true);
		$page = get_page($page_id);
	}
@endphp
<a href="{{ get_permalink(get_page_by_path('a-day-in-halland')->ID) }}">
	<div class="dh-banner topographic-pattern clearfix">
		<div class="container col-11 md-col-10 lg-col-10 mx-auto">
			<div class="clearfix flex items-center mxn2">
				<div class="dh-banner__mockup-section col col-12 sm-col-6 md-col-5 center px4">
					<img class="dh-banner__mockup lazyload" src="@asset('images/mockup.png')">
				</div>
				<div class="dh-banner__content col col-10 sm-col-6 md-col-4 px2">
					<div class="dh-banner__badge">
						<span class="badge__text light">@php _e( 'Nyhet', 'visithalland' ); @endphp</span>
					</div>
					<h2 class="dh-banner__title">{{$page->post_title}}</h2>
					<p class="dh-banner__desc light">{{$page->post_content}}</p>
					<div class="read-more mt4">
	                    <span class="read-more__text light">
	                        @php _e( 'Få inspiration', 'visithalland' ); @endphp
	                    </span>
	                    <div class="read-more__button">
	                        <svg class="icon read-more__icon">
	                            <use xlink:href="#arrow-right-icon"/>
	                        </svg>
	                    </div>
	                </div>
				</div>
			</div>
		</div>
	</div>
</a>