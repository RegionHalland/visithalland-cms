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
					<?php
						$langs = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
						$langMenuCode = ICL_LANGUAGE_CODE != "sv" ? "-" . ICL_LANGUAGE_CODE : "";
						$menuItems = wp_get_nav_menu_items("sekundar-meny" . $langMenuCode);

						//Language switcher
						foreach ($langs as $key => $val) : ?>
							<?php if (!$val["active"]) : ?>
							<a href="<?php echo $val["url"] ?>" class="header__support-link">
								<span><?php echo $val["native_name"] ?></span>
							</a>
							<?php endif; ?>
						<?php endforeach; ?>
						<?php
						foreach ($menuItems as $key => $value) : ?>
							<a href="<?php echo $value->url ?>" class="header__support-link">
								<span><?php echo $value->title ?></span>
							</a>
					<?php endforeach ?>
				</div>


			</div>

			<div class="header__middle">
				<?php $my_home_url = apply_filters( 'wpml_home_url', get_option( 'home' ) ); ?>
				<a href="<?php echo $my_home_url; ?>" class="link-reset">
					<picture>
						<source
							media="(min-width: 60em)"
							srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/logo-horizontal.svg"/>
						<source
							media="(min-width: 40em)"
							srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/logo-vertical.svg"/>
						<img
							class="header__logo center"
							src="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/logo-small.svg"
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


				<!-- Happenings !-->



			</div>
		</section>

	</div>
</header>
