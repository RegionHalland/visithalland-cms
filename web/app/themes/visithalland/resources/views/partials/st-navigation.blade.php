@php($sh_navigation_items = App::getStNavigation())

{{-- <a href="/" class="link-reset">
	<picture>
		<source
	        media="(min-width: 60em)"
			srcset="@asset('images/logo-horizontal.svg')"/>
		<source
			media="(min-width: 40em)"
			srcset="@asset('images/logo-vertical.svg')"/>
	    <source
	        srcset="@asset('images/logo-small.svg')"/>
		<img
			class="header__logo center"
			src="@asset('images/logo-horizontal.svg')"
			alt="Visithalland.com" />
	</picture>
</a>

<nav>
	<ul>
		@foreach($sh_navigation_items as $sh_navigation_item)
			<li>{{$sh_navigation_item->post_title }}</li>
		@endforeach
	</ul>
</nav> --}}