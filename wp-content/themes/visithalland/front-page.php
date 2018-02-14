<?php get_header(); ?>
<main role="main" class="container" id="main-content">
	<div class="landing-header relative">
    	<div class="landing-header__img-container">
    		<span class="landing-header__logo center">
    			<img data-src="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/landing-logo.svg">
    		</span>
    		<picture>
				<source media="(min-width: 60em)" data-srcset="<?php echo get_the_post_thumbnail_url(get_option( 'page_on_front' ), 'vh_hero_wide' ) . " 1x," . get_the_post_thumbnail_url(get_option( 'page_on_front' ), 'vh_hero_wide@2x' ) . " 2x" ?>" />
				<source data-srcset="<?php echo get_the_post_thumbnail_url(get_option( 'page_on_front' ), 'vh_hero_tall' ) . " 1x," . get_the_post_thumbnail_url(get_option( 'page_on_front' ), 'vh_hero_tall@2x' ) . " 2x" ?>" />
				<img class="concept-header__img" 
					data-src="<?php echo get_the_post_thumbnail_url(get_option( 'page_on_front' ), 'vh_hero_wide' )?>"
					alt="<?php echo get_field("cover_image", get_option( 'page_on_front' ))["alt"] ?>" />
			</picture>
		</div>
		<div class="landing-eu clearfix z3">
			<div class="col-12 col-11 md-col-10 lg-col-10 mx-auto">
	            <div class="landing-eu__inner clearfix">
	                <div class="col col-5 sm-col-3 md-col-2 my2 px3">
	                    <a href="https://tillvaxtverket.se/om-tillvaxtverket/organisation/logotyper/logotyp-for-eu-finansierat-stod.html">
	                        <img data-src="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/eu-logo.svg" />
	                    </a>
	                </div>
	                <div class="col col-12 sm-col-9 md-col-6 my2 px3">
	                    <div class="landing-eu__paragraph light mt0">
	                    	<?php echo get_field("excerpt", apply_filters( 'wpml_object_id', get_page_by_path("eu")->ID, 'page' )); ?> 
	                    </div>
	                </div>
	                <div class="col col-12 sm-col-9 md-col-4 my2 px3">
	                    <button class="btn btn--primary landing-eu__btn coastal-living block" id="eu-btn"><?php _e( 'Okej!', 'visithalland' ); ?></button>
	                </div>
	            </div>
	        </div>
		</div>
	</div>
	<div class="landing-concepts clearfix mt4 mxn2">
		<div class="slider-button-container py3 col-11 md-col-10 lg-col-10 mx-auto clearfix relative z4 px2">
			<header class="landing-concepts__header inline-block">
				<div class="landing-concepts__badge inline">
					<svg class="icon landing-concepts__icon">
                    	<use xlink:href="#recommend-icon"/>
                	</svg>
				</div>
				<div class="landing-concepts__title inline ml2">
					<?php _e( 'Vad gillar du?', 'visithalland' ); ?>
				</div>
			</header>
			<button class="slider-button landing-concepts__carousel--next right">
				<svg class="icon slider-button__icon">
                    <use xlink:href="#arrow-right-icon"/>
                </svg>
            </button>
            <button class="slider-button landing-concepts__carousel--previous mr2 right">
				<svg class="icon slider-button__icon">
                    <use xlink:href="#arrow-left-icon"/>
                </svg>
			</button>
        </div>
		<div class="landing-concepts__carousel col-11 md-col-10 lg-col-10 mx-auto">
		<?php
		    $langMenuCode = ICL_LANGUAGE_CODE != "sv" ? "-" . ICL_LANGUAGE_CODE : "";
            $mainMenuItems = wp_get_nav_menu_items("huvudmeny" . $langMenuCode);
			//$menuItems = wp_get_nav_menu_items("huvudmeny");
			foreach ($mainMenuItems as $key => $value): ?>
			<?php
				$term_id = get_post_meta($value->ID, '_menu_item_object_id', true);
				$current_term = get_term($term_id);
				$current_term_cover_image = get_field("cover_image", $current_term);
				//$featured_id = get_field("featured", get_post(get_post_meta( $post_id, '_menu_item_object_id', true )))[0]->ID;
				$featured = get_field("featured", $current_term)[0];

			?>
		        <div class="col col-10 sm-col-5 lg-col-4 px2 landing-concepts__item landing-concepts__item--small">
		            <div class="concept-thumbnail-small <?php echo vh_get_taxonomyslug_by_string($value->post_name)?>">
		                <a href="<?php echo $value->url ?>" class="link-reset">
		                    <div class="concept-thumbnail-small__img-container">
		                    	<picture>
	                            	<source media="(min-width:40em)"
	                                    data-srcset="<?php echo $current_term_cover_image["sizes"]["vh_medium_square"] . " 1x," . $current_term_cover_image["sizes"]["vh_medium_square@2x"] . " 2x" ?>" />
	                                <source
	                                    data-srcset="<?php echo $current_term_cover_image["sizes"]["vh_medium"] . " 1x," . $current_term_cover_image["sizes"]["vh_medium@2x"] . " 2x" ?>" />
	                                <img class="concept-thumbnail-small__img" data-src="<?php echo $current_term_cover_image["sizes"]["vh_medium"] ?>" alt="<?php echo $current_term_cover_image["alt"] ?>" />
	                            </picture>
		                    <div class="concept-thumbnail-small__inner center">
		                    <div class="concept-thumbnail-small__icon mx-auto mb2"></div>
		                        <h2 class="concept-thumbnail-small__title">
		                            <?php echo $value->post_title ?>
		                        </h2>
		                    </div>
		                    </div>
		                </a>
		            </div>
		        </div>
	        
	    	<?php endforeach ?>
	    </div>
	</div>
	

	<?php $happenings = vh_get_happenings(); ?>
	<?php if (count($happenings) > 0)  : ?>
	<div class="landing-happenings clearfix mxn2 mt4">

		<div class="col-11 md-col-10 lg-col-10 mx-auto">

			<div class="landing-happenings__header px2 py3 flex justify-between items-center ">
				<header class="landing-concepts__header inline-block">
					<div class="landing-concepts__badge inline">
						<svg class="icon landing-concepts__icon">
	                    	<use xlink:href="#calendar-icon"/>
	                	</svg>
					</div>
					<div class="landing-concepts__title inline ml2">
						<?php _e( 'Just nu', 'visithalland' ); ?>
					</div>
				</header>
				<a href="<?php echo get_permalink( apply_filters( 'wpml_object_id', get_page_by_path("happenings")->ID, 'page' ) ); ?>" class="btn btn--primary coastal-living inline-block right"><?php _e( 'Visa fler', 'visithalland' ); ?></a>
				
			</div>

			<?php foreach ($happenings as $index => $value) : ?>
	        	<div class="col col-12 sm-col-4 px2 mt3">
				    <article class="happening-list-item <?php echo vh_get_taxonomyslug_by_string($value->taxonomy['slug']); ?>">
		                <a href="<?php echo get_permalink($value->ID) ?>" class="link-reset">
		                    <div class="clearfix">
		                        <div class="col col-5 sm-col-4 ">
		                            <div class="happening-list-item__img-container topographic-pattern relative">
		                            	<picture>
												<source
	                                			data-srcset="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_thumbnail' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_thumbnail@2x' ) . " 2x" ?>" />
	                                		<img class="happening-list-item__img"
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
		                            <h4 class=""><?php echo $value->post_title ?></h4>
		                            <div class="read-more">
								    	<span class="read-more__text">
								    		<?php _e( 'Läs mer', 'visithalland' ); ?>
								    	</span>
								    	<div class="read-more__button">
									    	<svg class="icon read-more__icon">
		                                    	<use xlink:href="#arrow-right-icon"/>
		                                	</svg>
	                                	</div>
								    </div>
		                        </div>
		                    </div>
		                </a>
		            </article>
	        	</div>
	    	<?php endforeach ?>
	    </div>
	</div>
	<?php endif?>
</main>

<?php get_footer(); ?>