<?php get_header(); ?>
<main role="main" class="container" id="main-content">
	<div class="landing-header">
    	<div class="landing-header__img-container">
    		<span class="landing-header__logo center">
    			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/src/img/landing-logo.svg">
    		</span>
			<picture>
				<source media="(min-width: 60em)"
					srcSet="<?php echo get_field("cover_image", get_option( 'page_on_front' ))["sizes"]["vh_hero_wide"] . " 1x," . get_field("cover_image", get_option( 'page_on_front' ))["sizes"]["vh_hero_wide@2x"] . " 2x" ?>" />
				<source
					srcSet="<?php echo get_field("cover_image", get_option( 'page_on_front' ))["sizes"]["vh_hero_tall"] . " 1x," . get_field("cover_image", get_option( 'page_on_front' ))["sizes"]["vh_hero_tall@2x"] . " 2x" ?>" />
				<img class="concept-header__img" src="<?php echo get_field("cover_image", get_option( 'page_on_front' ))["sizes"]["vh_hero_wide"] ?>" alt="<?php echo get_field("cover_image", get_option( 'page_on_front' ))["alt"] ?>" />
			</picture>
		</div>
	</div>
	<div class="clearfix mxn2">
		<div class="landing-concepts col-11 md-col-10 lg-col-10 mx-auto">
		<?php
			$menuItems = wp_get_nav_menu_items("huvudmeny");
			foreach ($menuItems as $key => $value): ?>
			<?php
				$term_id = get_post_meta($value->ID, '_menu_item_object_id', true);
				$current_term = get_term($term_id);
				$current_term_cover_image = get_field("cover_image", $current_term);
				//$featured_id = get_field("featured", get_post(get_post_meta( $post_id, '_menu_item_object_id', true )))[0]->ID;
				$featured = get_field("featured", $current_term)[0];

			?>
	    	<?php if($key === 0) : ?>
	        <div class="col col-12 landing-concepts__item">
		        <div class="concept-thumbnail-large px2 <?php echo $value->post_name ?>">
			        <a href="<?php echo $value->url ?>">
			            <div class="concept-thumbnail-large__img-container">
			                <picture>
			                    <source media="(min-width: 40em)"
			                        srcSet="<?php echo $current_term_cover_image["url"] ?>" />
			                    <source 
			                        srcSet="<?php echo $current_term_cover_image["url"] ?>" />
			                    <img class="concept-thumbnail-large__img" src="<?php echo $current_term_cover_image["url"] ?>" />
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
											<picture>
											    <source media="(min-width: 40em)"
											        srcSet="<?php echo get_field("cover_image", get_field("featured", $current_term)[0]->ID)["url"] ?>" />
											    <source
											        srcSet="<?php echo get_field("cover_image", get_field("featured", $current_term)[0]->ID)["url"] ?>" />
											    <img class="concept-thumbnail-large__img" src="<?php echo get_field("cover_image", $featured->ID)["url"] ?>" />
											</picture>
			                            </div>
			                            <div class="article-medium__content">
			                                    <div class="article-tag mt3 mb2 <?php echo $featured->post_type ?>">
			                                        <div class="article-tag__icon-wrapper">
			                                            <div class="article-tag__icon"></div>
			                                        </div>
			                                        <span class="article-tag__type">
			                                            <?php echo vh_get_pretty_post_type_name($featured->post_type) ?>
			                                        </span>
			                                    </div>
			                                <h3 class="mb1 mt1 pt0"><?php echo $featured->post_title ?></h3>
			                                <p class="mt2"><?php echo get_field("excerpt", $featured->ID) ?></p>
			                            </div>
			                        </a>
			                </article>
			        	</div>
			        </div>
		        </div>
	    </div>

	    <?php else : ?>
	        <div class="col col-12 sm-col-4 px2 landing-concepts__item landing-concepts__item--small">
	            <div class="concept-thumbnail-small <?php echo $value->post_name ?>">
	                <a href="<?php echo $value->url ?>" class="link-reset">
	                    <div class="concept-thumbnail-small__img-container">
	                    	<picture>
		                        <source media="(min-width: 40em)"
		                            srcSet="<?php echo $current_term_cover_image["sizes"]["vh_hero_tall"] ?>" />
		                        <source
		                            srcSet="<?php echo $current_term_cover_image["sizes"]["vh_hero_tall"] ?>" />
		                        <img class="concept-thumbnail-small__img" src="<?php echo $current_term_cover_image["sizes"]["vh_hero_tall"] ?>" />
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