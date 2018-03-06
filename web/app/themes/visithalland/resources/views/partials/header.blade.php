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
                    @foreach ($langs as $key => $lang)
                        <a href="{{ $lang["url"] }}" class="header__support-link">
                            <span>{{ $lang["native_name"] }}</span>
                        </a>
                    @endforeach

                    @foreach ($secondary_menu_items as $key => $secondary_menu_item)
                        <a href="{{ $secondary_menu_item->url }}" class="header__support-link">
                            <span>{{ $secondary_menu_item->title }}</span>
                        </a>
                    @endforeach
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


				<div class="header__happenings">
					<?php $happenings = vh_get_happenings(3);
						if (count($happenings) > 0)  : ?>
						<button class="happenings__dropdown-button has-happenings icon-button">
							<svg class="icon icon-button__icon">
								<use xlink:href="#calendar-icon"/>
							</svg>
						</button>

						<div class="happenings__dropdown">
							<div class="happenings__dropdown-inner p3">
								<?php foreach ($happenings as $index => $value) : ?>
									<article class="happening-list-item mb3 <?php echo get_term_for_default_lang(get_the_terms($value, "taxonomy_concept")[0], "taxonomy_concept")->slug ?>">
										<a href="<?php echo get_permalink($value->ID) ?>" class="link-reset">
											<div class="clearfix">
												<div class="col col-5 sm-col-4 ">
													<div class="happening-list-item__img-container topographic-pattern relative">
														<picture>
															<source
																data-srcset="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_thumbnail' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_thumbnail@2x' ) . " 2x" ?>" />
															<img class="happening-list-item__img lazyload"
																data-src="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_thumbnail' ); ?>"
																alt="<?php echo get_field("cover_image")["alt"] ?>"
															/>
														</picture>
													</div>
												</div>
												<div class="happening-list-item__date">
													<div class="date-badge">
														<span class="date-badge__day"><?php echo $dateobj = date("j", strtotime(get_field("start_date", $value->ID))); ?></span>
														<span class="date-badge__month"><?php echo $dateobj = date("M", strtotime(get_field("start_date", $value->ID))); ?></span>
													</div>
												</div>
												<div class="happening-list-item__content col col-7 sm-col-8">
													<span class="happening-list-item__title"><?php echo $value->post_title ?></span>
												</div>
											</div>
										</a>
									</article>
								<?php endforeach ?>
									<a href="<?php echo get_permalink( apply_filters( 'wpml_object_id', get_page_by_path("happenings")->ID, 'page' ) ); ?>" class="btn btn--primary block coastal-living center">
										<?php _e( 'Visa fler', 'visithalland' ); ?>
									</a>
							</div>
							<?php ?>
						</div>
					<?php endif ?>
				</div>



			</div>
		</section>

	</div>
</header>
