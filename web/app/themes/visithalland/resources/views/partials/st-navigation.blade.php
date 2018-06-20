@php($sh_navigation_items = App::getStNavigation())



<div class="st-navigation">
	<div class="st-navigation__inner container col-11 md-col-10 lg-col-10 mx-auto">
		<div class="st-navigation__logo">
			<a href="{{ get_the_permalink(7609) }}" class="link-reset">
				<img
					class="header__logo center"
					src="@asset('images/logo-dark.svg')"
					alt="Visithalland.com" />
			</a>
		</div>
		<nav class="st-navigation__links">
			@foreach($sh_navigation_items as $sh_navigation_item)
				<a href="{{ $sh_navigation_item->url }}" class="st-navigation__link {{ array_walk($sh_navigation_item->classes, create_function('$a', 'echo $a . " ";')) }}">
					{{$sh_navigation_item->title }}
				</a>
				
			@endforeach
		</nav>
	</div>
</div>