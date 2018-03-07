<header class="header">
	<div class="header__inner col-12 sm-col-12 md-col-11 lg-col-10">

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
						<img
							class="header__logo center"
							src="@asset('images/logo-small.svg')"
							alt="Visithalland.com" />
					</picture>
				</a>
            </div>

			<div class="header__right flex items-center justify-end">
				<button class="icon-button search-button mr2">
					<svg class="icon icon-button__icon">
						<use xlink:href="#search-icon"/>
					</svg>
				</button>

                @php $header_happenings = App::getHappenings(0) @endphp
                @if(is_array($header_happenings))
                    @foreach($header_happenings as $key => $happening)
                        <li>@php var_dump($happening->terms) @endphp </li>
                    @endforeach
                @endif


			</div>
		</section>

	</div>
</header>
