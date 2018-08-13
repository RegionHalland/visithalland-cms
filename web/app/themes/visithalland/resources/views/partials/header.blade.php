<header class="header">
	<div class="header__inner col-12 sm-col-12 md-col-12 lg-col-10">
		<a class="skip-to-content topographic-pattern" href="#main-content">
			<span class="skip-to-content__label"><?php _e( 'Hoppa till innehåll', 'visithalland' ); ?></span>
		</a>

		<section class="header__top-section topographic-pattern flex justify-between relative z2">
			<div class="header__left flex items-center">
				<button class="icon-button menu-button">
					<svg class="icon icon-button__icon">
						<use xlink:href="#menu-icon"/>
					</svg>
				</button>

				<div class="header__support-links">
                    @if(is_array($non_active_langs))
                        @foreach ($non_active_langs as $key => $lang)
                            <a href="{{ $lang["url"] }}" class="header__support-link">
                                <span>{{ $lang["native_name"] }}</span>
                            </a>
                        @endforeach
                    @endif

                    @if(is_array($secondary_menu_items))
                        @foreach ($secondary_menu_items as $key => $secondary_menu_item)
                            <a href="{{ $secondary_menu_item->url }}" class="header__support-link">
                                <span>{{ $secondary_menu_item->title }}</span>
                            </a>
                        @endforeach
                    @endif
				</div>
            </div>

			<div class="header__middle">
				<a href="/" class="link-reset">
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
            </div>

			<div class="header__right flex items-center justify-end">
				<a href="/?s" class="icon-button search-button mr2">
					<svg class="icon icon-button__icon">
						<use xlink:href="#search-icon"/>
					</svg>
                </a>

                @include('partials.happenings-dropdown')

            </div>
        </section>

        <nav class="navigation center topographic-pattern">
            <div class="navigation__inner">
                @php $primary_navigation_items = App::getPrimaryNavigation() @endphp
                @if(is_array($primary_navigation_items))
                    @foreach($primary_navigation_items as $key => $navigation_item)
                        <div class="navigation__item {{ $navigation_item->meta_fields['class_name'] }}">
                            <a href="{{ $navigation_item->url }}" class="navigation__link link-reset {{ App::classNameGenerator($navigation_item->classes) }}">
                                <div class="navigation__icon-wrapper">
                                    <div class="navigation__icon"></div>
                                </div>
                                <span>{{ $navigation_item->title }}</span>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </nav>

        <!--- Mobile Navigation Start -->
            <nav class="mobile-navigation topographic-pattern">
                <div class="mobile-navigation__inner p2">
                    <h5 class="mobile-navigation__header light"><?php _e( 'Upplevelser', 'visithalland' ); ?></h5>
                        @php $primary_navigation_items = App::getPrimaryNavigation() @endphp
                        @if(is_array($primary_navigation_items))
                            @foreach($primary_navigation_items as $key => $navigation_item)
                                <div class="mobile-navigation__item {{ $navigation_item->meta_fields['class_name'] }}">
                                    <a href="{{ $navigation_item->url }}" class="mobile-navigation__link link-reset {{ App::classNameGenerator($navigation_item->classes) }}">
                                        <div class="mobile-navigation__icon-wrapper">
                                            <div class="mobile-navigation__icon"></div>
                                        </div>
                                        <span>{{ $navigation_item->title }}</span>
                                    </a>
                                </div>
                            @endforeach
                        @endif

                    <div class="mobile-navigation__support mt4">
                        <h5 class="mobile-navigation__header light"><?php _e( 'Fler länkar', 'visithalland' ); ?></h5>
                        @if(is_array($non_active_langs))
                            @foreach ($non_active_langs as $key => $lang)
                                <a href="{{ $lang["url"] }}" class="mobile-navigation__support-link my2 block">
                                    <span>{{ $lang["native_name"] }}</span>
                                </a>
                            @endforeach
                        @endif

                    @if(is_array($secondary_menu_items))
                        @foreach ($secondary_menu_items as $key => $secondary_menu_item)
                            <a href="{{ $secondary_menu_item->url }}" class="mobile-navigation__support-link my2 block">
                                <span>{{ $secondary_menu_item->title }}</span>
                            </a>
                        @endforeach
                    @endif
                    </div>
                </div>
            </nav>
        <!--- Mobile Navigation End -->

	</div>
</header>
