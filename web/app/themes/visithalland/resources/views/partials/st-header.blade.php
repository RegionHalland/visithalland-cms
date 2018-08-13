@php($sh_navigation_items = App::getStNavigation())
@php($page_id = get_page_by_path('skordetid-i-halland')->ID)

<div class="st-navigation">
	<div class="support-header topographic-pattern py2">
		<div class="support-header__inner container col-11 md-col-10 lg-col-10 mx-auto">
			<a class="support-header__link" href="/">
				<svg class="support-header__icon mr1">
	           		 <use xlink:href="#arrow-left-icon"/>
	        	</svg>
	        	Tillbaka till visithalland.com
	        </a>
		</div>
	</div>
	<div class="st-navigation__inner container col-11 md-col-10 lg-col-10 mx-auto">
		<div class="st-navigation__logo">
			<a href="{{ get_the_permalink($page_id) }}" class="link-reset">
				<img
					class="header__logo center"
					src="@asset('images/st-logo.svg')"
					alt="Visithalland.com" />
			</a>
		</div>
		<nav class="st-navigation__links">
			@foreach($sh_navigation_items as $sh_navigation_item)
				<a href="{{ $sh_navigation_item->url }}" class="st-navigation__link {{ App::classNameGenerator($sh_navigation_item->classes) }}">
					{{$sh_navigation_item->title }}
				</a>
			@endforeach
		</nav>
	</div>
</div>