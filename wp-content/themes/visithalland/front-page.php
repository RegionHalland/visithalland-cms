<?php get_header(); ?>
<main role="main" class="container" id="main-content">
	<div class="landing-header">
    	<div class="landing-header__img-container">
    		<span class="landing-header__logo center">
    			<img data-src="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/landing-logo.svg">
    		</span>
			<picture>
				<source media="(min-width: 60em)"
					data-srcset="<?php echo get_field("cover_image", get_option( 'page_on_front' ))["sizes"]["vh_hero_wide"] . " 1x," . get_field("cover_image", get_option( 'page_on_front' ))["sizes"]["vh_hero_wide@2x"] . " 2x" ?>" />
				<source
					data-srcset="<?php echo get_field("cover_image", get_option( 'page_on_front' ))["sizes"]["vh_hero_tall"] . " 1x," . get_field("cover_image", get_option( 'page_on_front' ))["sizes"]["vh_hero_tall@2x"] . " 2x" ?>" />
				<img class="concept-header__img" data-src="<?php echo get_field("cover_image", get_option( 'page_on_front' ))["sizes"]["vh_hero_wide"] ?>" alt="<?php echo get_field("cover_image", get_option( 'page_on_front' ))["alt"] ?>" />
			</picture>
		</div>
	</div>
	<div class="clearfix mxn2">
		<div class="landing-concepts col-11 md-col-10 lg-col-10 mx-auto">
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
	    	<?php if($key === 0) : ?>
	        <div class="col col-12 landing-concepts__item">
		        <div class="concept-thumbnail-large px2 <?php echo vh_get_taxonomyslug_by_string($value->post_name) ?>">
			        <a href="<?php echo $value->url ?>">
			            <div class="concept-thumbnail-large__img-container">
			                <picture>
			                    <source media="(min-width: 40em)"
			                        data-srcset="<?php echo $current_term_cover_image["url"] ?>" />
			                    <source 
			                        data-srcset="<?php echo $current_term_cover_image["url"] ?>" />
			                    <img class="concept-thumbnail-large__img" data-src="<?php echo $current_term_cover_image["url"] ?>" />
			                </picture>
			            	<div class="concept-thumbnail-large__inner center">
			                	<div class="concept-thumbnail-large__icon mx-auto mb2"></div>
			                	<h2 class="concept-thumbnail-large__title"><?php echo $value->title ?></h2>
			            	</div>
			            </div>
			        </a>
			        <div class="clearfix">
				        <div class="concept-thumbnail-large__content col col-12 sm-col-7">
					        <p><?php the_field("excerpt", $current_term ) ?></p>
					        <hr class="concept-thumbnail-large__divider my3 block" />
					        <a class="btn btn--primary inline-block" href="<?php echo $value->url ?>">
					            <span><?php echo $value->title ?></span>
					        </a>
				        </div>

			        	<div class="concept-thumbnail-large__article col col-12 sm-col-5 mtn5">
			                <article class="article-medium <?php echo get_field("featured", $current_term)[0]->post_name ?>">
			                        <a href="<?php echo get_permalink(get_field("featured", $current_term)[0]->ID) ?>">
			                            <div class="article-medium__img-container topographic-pattern">
			                            	<div class="article-tag absolute top-0 left-0 mt2 ml2 z3">
												<div class="article-tag__icon-wrapper">
													<div class="article-tag__icon"></div>
												</div>
											</div>
											<picture>
											    <source media="(min-width: 40em)"
											        data-srcset="<?php echo get_field("cover_image", get_field("featured", $current_term)[0]->ID)["url"] ?>" />
											    <source
											        data-srcset="<?php echo get_field("cover_image", get_field("featured", $current_term)[0]->ID)["url"] ?>" />
											    <img class="concept-thumbnail-large__img" data-src="<?php echo get_field("cover_image", $featured->ID)["url"] ?>" />
											</picture>
			                            </div>
			                            <div class="article-medium__content">
			                                <h3 class="article-medium__title mb1 mt3 pt0"><?php echo $featured->post_title ?></h3>
			                                <p class="article-medium__excerpt mt2"><?php echo get_field("excerpt", $featured->ID) ?></p>
			                                <div class="read-more">
										    	<span class="read-more__text"><?php _e( 'Read more', 'visithalland' ); ?></span>
										    	<div class="read-more__button">
											    	<svg class="icon read-more__icon">
				                                    	<use xlink:href="#arrow-right-icon"/>
				                                	</svg>
			                                	</div>
										    </div>
			                            </div>
			                        </a>
			                </article>
			        	</div>
			        </div>
		        </div>
	    </div>

	    <?php else : ?>
	        <div class="col col-12 sm-col-4 px2 landing-concepts__item landing-concepts__item--small">
	            <div class="concept-thumbnail-small <?php echo vh_get_taxonomyslug_by_string($value->post_name)?>">
	                <a href="<?php echo $value->url ?>" class="link-reset">
	                    <div class="concept-thumbnail-small__img-container">
	                    	<picture>
		                        <source media="(min-width: 40em)"
		                            data-srcset="<?php echo $current_term_cover_image["sizes"]["vh_hero_tall"] ?>" />
		                        <source
		                            data-srcset="<?php echo $current_term_cover_image["sizes"]["vh_hero_tall"] ?>" />
		                        <img class="concept-thumbnail-small__img" data-src="<?php echo $current_term_cover_image["sizes"]["vh_hero_tall"] ?>" />
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
	    <?php endif ?>
	        
	    <?php endforeach ?>
	    </div>
	</div>
</main>

<?php get_footer(); ?>